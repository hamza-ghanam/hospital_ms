@extends('layouts.app')

@section('content')
    <div class="container">
        @if (isset($message) && !empty($message))
            <div class="alert alert-danger">{{$message}}</div>
            <br/>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>المراسلات</h2>
                <br/>
                @can('send message')
                    <a class="btn btn-info" href="{{URL::to('messages/create')}}"><i class="fa fa-envelope"></i>&nbsp;إنشاء
                        رسالة جديدة </a>
                @endcan
                <br/>
                <br/>
                <br/>
                <h5>استعراض بحسب المستخدمين</h5>
                <ul class="list-group col-sm-4">
                    @foreach($users as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="messages/{{$user->id}}">{{$user->name}}</a>
                            @if($user->msg_count > 0)
                                <span class="badge badge-primary badge-pill">{{$user->msg_count}}</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection