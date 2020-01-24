@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4>المراسلات</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form method="POST" action="{{URL::to("/messages")}}">
                    @csrf
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="msg_type" class="custom-control-input"
                                   value="all" checked>
                            <label class="custom-control-label" for="customRadio2">رسالة جماعية</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio3" name="msg_type" class="custom-control-input"
                                   value="custom"/>
                            <label class="custom-control-label" for="customRadio3">تحديد المستلمين</label>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <select class="custom-select" multiple name="recipients[]" id="recipients" hidden>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
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