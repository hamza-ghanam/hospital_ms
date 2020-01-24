<?php

namespace App\Http\Controllers;

use App\Contact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('list contacts'))
            return Redirect::to('contacts');

        $contacts = Contact::sortable()->paginate(10);

        foreach ($contacts as $contact) {
            $contact->last_uptade_by = User::find($contact->last_uptade_by)->name;
        }
    
	return view('contacts.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('add contact'))
            return Redirect::to('contacts');

        return View('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('add contact'))
            return Redirect::to('contacts');

        $rules = [
            'name' => 'required',
            'phone' => 'required'
        ];

        $messages = [
            'required' => 'يرجى ملئ حقل :attribute',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        $contact = new Contact;
        $contact->full_name = $request->input("name");
        $contact->specialization = $request->input("spec");
 
        if ($request->input("spec") == "غير ذلك") {
            if (empty($request->input("else_spec")) || $request->input("else_spec") == "" || $request->input("else_spec") == null) {
                return Redirect::back()->withErrors(['message' => 'يرجى كتابة التخصص في حال ذكر "غير ذلك"']);
	   }

            $contact->specialization = $request->input("else_spec");
        }

        $contact->phone = $request->input("phone");
        $contact->mobile = $request->input("mobile");
        $contact->mobile2 = $request->input("mobile2");
        $contact->clinic_phone = $request->input("clinic");
        $contact->code = $request->input("code");
        $contact->address = $request->input("address");
        $contact->notes = $request->input("notes");

        if ($request->input("national_num") != "") {
            if (strlen($request->input("national_num")) != 11) {
                return Redirect::back()->withErrors(['message' => 'يرجى التحقق من الرقم الوطني']);
            }
        }
        $contact->national_num = $request->input("national_num");
        $contact->last_uptade_by = Auth::id();
        $contact->save();

        return redirect('/contacts')->with('message', 'تمت إضافة جهة الاتصال بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->can('show contact'))
            return Redirect::to('contacts');

        $contact = Contact::find($id);
        $contact->last_uptade_by = User::find($contact->last_uptade_by);

        return View('contacts.show')->with(['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('edit contact'))
            return Redirect::to('contacts');

        $contact = Contact::find($id);

        return View('contacts.edit')->with(['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('edit contact'))
            return Redirect::to('contacts');

        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'code' => 'required',
            'address' => 'required',
            'national_num' => 'required'
        ];

        $messages = [
            'required' => 'يرجى ملئ حقل :attribute',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        $contact = Contact::find($id);

        $contact->full_name = $request->input("name");
        $contact->specialization = $request->input("spec");
        $contact->phone = $request->input("phone");
        $contact->mobile = $request->input("mobile");
        $contact->mobile2 = $request->input("mobile2");
        $contact->clinic_phone = $request->input("clinic");
        $contact->code = $request->input("code");
        $contact->address = $request->input("address");
        $contact->notes = $request->input("notes");

        if (strlen($request->input("national_num")) != 11) {
            return Redirect::back()->withErrors(['message' => 'يرجى التحقق من الرقم الوطني']);
        }

        $contact->last_uptade_by = Auth::id();
        $contact->save();

        return redirect('/contacts/' . $contact->id)->with('message', 'تم تعديل جهة الاتصال بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('delete contact'))
            return Redirect::to('contacts');

        $contact = Contact::find($id);

        $contact->delete();

        return Redirect::to('contacts')->with('message', 'تم حذف جهة الاتصال بنجاح');
    }

    public function search_contacts(Request $request)
    {
        if (!auth()->user()->can('list contacts'))
            return Redirect::to('contacts');

        $cname = $request->input("contact_name");

        $contacts = Contact::where('full_name', 'like', '%'.$cname.'%')
            ->sortable()
            ->get();

        foreach ($contacts as $contact) {
            $contact->last_uptade_by = User::find($contact->last_uptade_by)->name;
        }

        return view('contacts.index2', ['contacts' => $contacts, "cname" => $cname]);
    }
}
