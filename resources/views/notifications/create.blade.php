@extends('layouts.app')

@section('content')
    <div class="container">
        @if (isset($message) && !empty($message))
            <div class="alert alert-danger">{{$message}}</div>
            <br/>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h4 class="card-header">إضافة إشعار جديد</h4>
                    <div class="card-body">
                        <form method="POST" action="{{URL::to("/notifications")}}">
                            @csrf
                            <label for="title" class="col-sm-2 col-form-label">عنوان الإشعار</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-list"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="title" id="title" required max="25"/>
                                </div>
                            </div>
                            <br/>
                            <label for="body" class="col-md-10 col-form-label">نصّ الإشعار (150 محرف كحدّ أعظمي)</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-envelope-open"></i>
                                        </div>
                                    </div>
                                    <textarea maxlength="150" rows="4" cols="50 " name="body" required="required" id="body" class="form-control"></textarea>
                                </div>
                            </div>
                            <br/>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope"></i>&nbsp;إضافة
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection