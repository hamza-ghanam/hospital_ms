@extends('layouts.app')

@section('content')
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="text-center" style="margin:0 auto;">
                <div class="card-header">
                    <h3>مراسلة، {{$user->name}}</h3>
                </div>
                <div class="card-body">
                    <div id="MainContent_conv" class="form-group has-feedback">
                        @if($messages->count() != 0)
                            @foreach($messages as $message)
                                @if($message->from_user == auth()->id())
                                    <div dir='rtl' class='well text-right' align="right"
                                         style='text-align: center !important; width: 50%; border-radius: 10px; margin-top: 3%; margin-bottom: 3%; background-color: lightblue; color: black; padding: 10px;'>
                                        <h6>{{$message->title}}</h6>
                                        <p>{{$message->body}}</p>
                                        <small>{{date("d/m/Y h:i:s a", strtotime($message->created_at))}}</small>
                                    </div>
                                @else
                                    <div dir='rtl' class='well text-left' align="left"
                                         style='text-align: center !important; width: 50%; border-radius: 10px;  margin: 0px 50% 3% auto; background-color: #000029; color: white; padding: 10px;'>
                                        <h6>{{$message->title}}</h6>
                                        <p>{{$message->body}}</p>
                                        <small>{{date("d/m/Y h:i:s a", strtotime($message->created_at))}}</small>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <h3 style="color: darkred;">لا توجد رسائل بعد</h3>
                        @endif
                    </div>
                </div>
                <hr/>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <h5>إرسال رسالة للموظف</h5>
            <br/>
            <div class="col-md-12">
                <form method="POST" action="{{URL::to("/messages")}}">
                    @csrf
                    <input type="hidden" value="{{$user->id}}" name="recipient"/>
                    <label for="title" class="col-sm-2 col-form-label">عنوان الرسالة</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-paper-plane"></i></div>
                            </div>
                            <input type="text" class="form-control" id="title" name="title" required="required"/>
                        </div>
                    </div>
                    <label for="body" class="col-sm-2 col-form-label">نصّ الرسالة</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-envelope-open-text"></i></div>
                            </div>
                            <textarea class="form-control" id="exampleTextarea" rows="3" name="body" id="body"
                                      required="required"></textarea>
                        </div>
                    </div>
                    <br/>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i>&nbsp;إرسال
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection