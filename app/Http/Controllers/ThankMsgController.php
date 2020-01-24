<?php

namespace App\Http\Controllers;

use App\ThankMsg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ThankMsgController extends Controller
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
        if (!auth()->user()->can('list thank_msg'))
            return Redirect::to('cms');

        $thankMsgs = ThankMsg::paginate(10);

        return View('thank_msgs.index')->with('thankMsgs', $thankMsgs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('add thank_msg'))
            return Redirect::to('cms');

        return View('thank_msgs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('add thank_msg'))
            return Redirect::to('cms');

        $rules = [
            'name' => 'body'
        ];

        $messages = [
            'required' => 'يرجى ملئ حقل :attribute',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        if (strlen($request->input("body")) > 510) {
            return Redirect::back()->withErrors(['message' => 'يرجى التحقق من نص الرسالة']);
        }

        $thankMsh = new ThankMsg;
        $thankMsh->body = $request->input("body");
        $thankMsh->save();

        return redirect('/thank_msgs')->with('success', 'تمت إضافة الرسالة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->can('show thank_msg'))
            return Redirect::to('cms');

        $thankMsg = ThankMsg::find($id);
        return View('thank_msgs.show')->with(['thankMsg' => $thankMsg]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('edit thank_msg'))
            return Redirect::to('cms');

        $thankMsg = ThankMsg::find($id);
        return View('thank_msgs.edit')->with(['thankMsg' => $thankMsg]);
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
        if (!auth()->user()->can('edit thank_msg'))
            return Redirect::to('cms');

        $rules = [
            'body' => 'required'
        ];

        $messages = [
            'required' => 'يرجى ملئ حقل :attribute',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        if (strlen($request->input("body")) > 510) {
            return Redirect::back()->withErrors(['message' => 'يرجى التحقق من نص الرسالة']);
        }

        $thankMsh = ThankMsg::find($id);
        $thankMsh->body = $request->input("body");
        $thankMsh->save();

        return redirect('/thank_msgs')->with('success', 'تم تعديل الرسالة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('delete thank_msg'))
            return Redirect::to('cms');

        $tmsg = ThankMsg::find($id);
        $tmsg->delete();

        return redirect('/thank_msgs')->with('message', 'تم حذف الرسالة بنجاح');
    }
}
