@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (isset($message) && !empty($message))
                    <div class="alert alert-danger">{{$message}}</div>
                    <br/>
                @endif
                <div class="card">
                    <div class="card-header">إعادة تعيين كلمة المرور</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reset_password') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">كلمة المرور الحالية</label>

                                <div class="col-md-6">
                                    <input id="old_password" type="password" class="form-control" name="old_password" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">كلمة المرور الجديدة</label>

                                <div class="col-md-6">
                                    <input id="new_password" type="password" class="form-control" name="new_password" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">تأكيد كلمة المرور الجديدة</label>

                                <div class="col-md-6">
                                    <input id="confirm_password" type="password" class="form-control" name="confirm_password" required />
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        موافق
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection