<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
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
        if (!auth()->user()->can('list notification'))
            return Redirect::to('cms');

        $notifs = Notification::paginate(10);

        return View('notifications.index')->with('notifs', $notifs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('add notification'))
            return Redirect::to('cms');

        return View('notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('add notification'))
            return Redirect::to('cms');

        $rules = [
            'title' => 'required',
            'body' => 'required'
        ];

        $messages = [
            'required' => 'يرجى ملئ حقل :attribute',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        if (strlen($request->input("title")) > 150) {
            return Redirect::back()->withErrors(['message' => 'يرجى التحقق من عنوان الإشعار']);
        }

        if (strlen($request->input("body")) > 150) {
            return Redirect::back()->withErrors(['message' => 'يرجى التحقق من نص الإشعار']);
        }

        $notif = new Notification;
        $notif->title = $request->input("title");
        $notif->body = $request->input("body");
        $notif->save();

        $success = "تمت إضافة الإشعار بنجاح";
        $notifs = Notification::all();

        return View('notifications.index')->with(['success'=> $success, 'notifs' => $notifs]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->can('show notification'))
            return Redirect::to('cms');

        $notif = Notification::find($id);
        return View('notifications.show')->with(['notif' => $notif]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('edit notification'))
            return Redirect::to('cms');

        $notif = Notification::find($id);
        return View('notifications.edit')->with(['notif' => $notif]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('edit notification'))
            return Redirect::to('cms');

        $rules = [
            'title' => 'required',
            'body' => 'required'
        ];

        $messages = [
            'required' => 'يرجى ملئ حقل :attribute',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        if (strlen($request->input("title")) > 150) {
            return Redirect::back()->withErrors(['message' => 'يرجى التحقق من عنوان الإشعار']);
        }

        if (strlen($request->input("body")) > 150) {
            return Redirect::back()->withErrors(['message' => 'يرجى التحقق من نص الإشعار']);
        }

        $notif = Notification::find($id);
        $notif->title = $request->input("title");
        $notif->body = $request->input("body");
        $notif->save();

        $success = "تم تعديل الإشعار بنجاح";
        $notifs = Notification::all();

        return View('notifications.show')->with(['success'=> $success, 'notif' => $notif]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('delete notification'))
            return Redirect::to('cms');

        $notif = Notification::find($id);
        $notif->delete();

        $notifs = Notification::all();

        return View('notifications.index')->with(['success'=> "تم حذف الإشعار بنجاح", 'notifs' => $notifs]);
    }
}
