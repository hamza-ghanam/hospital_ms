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
                    <h4 class="card-header">إنشاء رسالة شكر</h4>
                    <div class="card-body">
                        <form method="POST" action="{{URL::to("/thank_msgs")}}">
                            @csrf
                            <label for="body" class="col-md-4 col-form-label">نصّ الرسالة (350 محرف كحدّ أعظمي)</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-envelope-open"></i>
                                        </div>
                                    </div>
                                    <textarea maxlength="350" rows="6" cols="70" name="body" required="required" id="body" class="form-control"></textarea>
                                </div>
                            </div>
                            <br/>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope"></i>&nbsp;إنشاء
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection