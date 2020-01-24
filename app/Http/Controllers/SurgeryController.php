<?php

namespace App\Http\Controllers;

use App\Surgery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
Use Redirect;

class SurgeryController extends Controller
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
        if (!auth()->user()->can('list surgeries'))
            return Redirect::to('surgeries');

        $surgeries = Surgery::orderBy('date_', 'desc')->sortable()->paginate(10);


        $specs = DB::table('surgeries')->distinct()->pluck('specialization')->toArray();

        $spec_counts = [];

        foreach ($specs as $spec) {
            $spec_surgs = Surgery::where("specialization", $spec)->get();
            $spec_counts += [$spec => $spec_surgs->count()];
        }

        return View('surgeries.index')->with(['surgeries' => $surgeries, 'spec_counts' => $spec_counts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('add surgery'))
            return Redirect::to('surgeries');

        return View('surgeries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('add surgery'))
            return Redirect::to('surgeries');

        $rules = [
            'name' => 'required',
            'date_' => 'required',
            'time_' => 'required',
            'spec' => 'required',
            'doctor' => 'required',
            'state' => 'required',
            'hall' => 'required'
        ];

        $messages = [
            'required' => 'يرجى ملئ حقل :attribute',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        $surgery = new Surgery;
        $surgery->name = $request->input("name");
        $surgery->date_ = date("Y-m-d", strtotime($request->input("date_")));
        $surgery->time_ = date("H:i:s", strtotime($request->input("time_")));
        $surgery->specialization = $request->input("spec");
        $surgery->doctor_name = $request->input("doctor");
        $surgery->status = $request->input("state");
        $surgery->hall = $request->input("hall");
        $surgery->patient_name = $request->input("patient");
        $surgery->save();

        return redirect('/surgeries')->with('success', 'تمت إضافة العمليّة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->can('show surgery'))
            return Redirect::to('surgeries');

        $surgery = Surgery::find($id);
        $surgery->date_ = date('m/d/Y', strtotime($surgery->date_));
        $surgery->time_ = date('h:i:s a', strtotime($surgery->time_));

        return View('surgeries.show')->with(['surgery' => $surgery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('edit surgery'))
            return Redirect::to('surgeries');

        $surgery = Surgery::find($id);
        $surgery->date_time = date('m/d/Y h:i:sa', strtotime($surgery->date_time));

        return View('surgeries.edit')->with(['surgery' => $surgery]);
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
        if (!auth()->user()->can('edit surgery'))
            return Redirect::to('surgeries');

        $rules = [
            'name' => 'required',
            'date_' => 'required',
            'time_' => 'required',
            'spec' => 'required',
            'doctor' => 'required',
            'state' => 'required',
            'hall' => 'required'
        ];

        $messages = [
            'required' => 'يرجى ملئ حقل :attribute',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();
        $surgery = Surgery::find($id);

        $surgery->name = $request->input("name");
        $surgery->date_ = date("Y-m-d", strtotime($request->input("date_")));
        $surgery->time_ = date("H:i:s", strtotime($request->input("time_")));
        $surgery->specialization = $request->input("spec");
        $surgery->doctor_name = $request->input("doctor");
        $surgery->status = $request->input("state");
        $surgery->hall = $request->input("hall");
        $surgery->patient_name = $request->input("patient");
        $surgery->save();

        return redirect('/surgeries/' . $surgery->id)->with('message', $messages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('delete surgery'))
            return Redirect::to('surgeries');

        $surgery = Surgery::find($id);
        $surgery->delete();

        return Redirect::to('surgeries')->with('message', 'تم حذف العمليّة بنجاح');
    }


    public function search_surgeries(Request $request)
    {
        $date_ = $request->input("date_");

        if (!auth()->user()->can('list surgeries'))
            return Redirect::to('surgeries');

        $surgeries = Surgery::where("date_", $date_)
            ->orderBy('date_', 'desc')
            ->sortable()
            ->paginate(10);

        $specs = DB::table('surgeries')
            ->distinct()
            ->pluck('specialization')
            ->toArray();

        $spec_counts = [];

        foreach ($specs as $spec) {
            $spec_surgs = Surgery::where("specialization", $spec)
                ->where("date_", $date_)
                ->get();

            $spec_counts += [$spec => $spec_surgs->count()];
        }

        return view('surgeries.index', ['surgeries' => $surgeries, 'spec_counts' => $spec_counts]);
    }

}
