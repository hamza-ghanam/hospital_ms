<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MessageController extends Controller
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
        if (!auth()->user()->can('list messages'))
            return Redirect::to('messages');

        $users = User::where('id', '!=', Auth::id())->get();

        foreach ($users as $user) {
            $msg_count = Message::where('from_user', $user->id)->where('to_user', Auth::id())->where('seen', 0)->count();
            $user->msg_count = $msg_count;
        }
        return view("messages.index")->with("users", $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('send message'))
            return Redirect::to('messages');

        $users = User::where('id', '!=', Auth::id())->get();
        return view("messages.create")->with("users", $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('send message'))
            return Redirect::to('messages');

        $title = $request->input("title");
        $body = $request->input("body");

        if ($request->input('msg_type') == 'all') {
            $users = User::where('id', '!=', Auth::id())->get();

            foreach ($users as $user) {
                $msg = new Message;
                $msg->title = $title;
                $msg->body = $body;
                $msg->from_user = Auth::id();
                $msg->to_user = $user->id;

                $msg->save();
            }
        } elseif($request->input('msg_type') == 'custom') {
            foreach ($request->input('recipients') as $recipient) {
                $user = User::find($recipient);

                $msg = new Message;
                $msg->title = $title;
                $msg->body = $body;
                $msg->from_user = Auth::id();
                $msg->to_user = $user->id;

                $msg->save();
            }
        }else{
            $user = User::find($request->input('recipient'));

            $msg = new Message;
            $msg->title = $title;
            $msg->body = $body;
            $msg->from_user = Auth::id();
            $msg->to_user = $user->id;

            $msg->save();
        }

        return Redirect::to("messages");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->can('show message'))
            return Redirect::to('messages');

        $user = User::find($id);

        Message::where('from_user', $user->id)->where('seen', 0)->update(['seen' => 1]);

        $messages = Message::where(function ($query) use ($id) {
            $query->where('from_user', $id)
                  ->where('to_user', Auth::id());
        })->orWhere(function ($query) use ($id) {
            $query->where('to_user', $id)
                  ->where('from_user', Auth::id());
        })
        ->get();

        return view("messages.show")->with(["messages" => $messages->sortBy('created_at'), "user" => $user]);

    }
}
