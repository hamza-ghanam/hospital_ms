@extends('layouts.app')

@section('content')
    <script type="application/javascript">
        $(document).ready(function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $("#enname").focusout(function () {
                var en_name = $("#enname").val();

                var url = "{{ URL::to('/check_name') }}/" + en_name;

                $.get(url, function (data) {
                    $("#email").val(data);
                    $("#email").attr("value", data);
                    $("#email").prop("value", data);
                });
            });
        });
    </script>
    <div class="container">
        <div class="row justify-content-center">
            @if($errors->any())
                <div class="alert alert-success">{{$errors->first()}}</div>
                <br/>
            @endif
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">إضافة مستخدم جديد</h5>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">الاسم الكامل
                                    بالعربية</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="enname" class="col-md-4 col-form-label text-md-right">الاسم الكامل
                                    بالإنكليزية</label>

                                <div class="col-md-6">
                                    <input id="enname" type="text" class="form-control" name="enname" value="" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">البريد
                                    الإلكتروني</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           required autocomplete="email" />

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">كلمة المرور</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">تأكيد كلمة
                                المرور</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_role" class="col-md-4 col-form-label text-md-right">دور المستخدم</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <select name="user_role" id="user_role" required="required" class="form-control">
                                            <option value="Super Admin">مدير النظام</option>
                                            <option value="Surgery Emp">موظف عمليات</option>
                                            <option value="Reception Emp">موظف استقبال</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-user-plus"></i>&nbsp;
                                        إضافة
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
