@extends('layouts.app')

@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">{{$errors->first()}}</div>
            <br/>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">تعديل بيانات موظف</h5>

                    <div class="card-body">
                        <form method="POST" action="{{URL::to("/users/$user->id")}}">
                            @csrf
                            @method("PUT")
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">الاسم الكامل
                                    بالعربية</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{$user->uname}}" required autocomplete="name" autofocus>

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
                                    <input id="enname" type="text" class="form-control" name="enname" required value="{{$user->uenname}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">البريد
                                    الإلكتروني</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           required autocomplete="email" readonly value="{{$user->email}}"/>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">كلمة المرور<br/> <small style="color: red;">(اكتب الجديدة إذا كنت ترغب بتغييرها، وإلا اترك الحقلين فارغين)</small></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password">

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
                                           name="password_confirmation" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_role" class="col-md-4 col-form-label text-md-right">دور المستخدم</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <select name="user_role" id="user_role" required="required" class="form-control">
                                            <option {{ $user->rname == 'Super Admin' ? 'selected' : ''}} value="Super Admin">مدير النظام</option>
                                            <option {{ $user->rname == 'Surgery Emp' ? 'selected' : ''}} value="Surgery Emp">موظف عمليات</option>
                                            <option {{ $user->rname == 'Reception Emp' ? 'selected' : ''}} value="Reception Emp">موظف استقبال</option>
                                            <option {{ $user->rname == 'Main Reception Emp' ? 'selected' : ''}} value="Main Reception Emp">موظف استقبال رئيسي</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i>&nbsp;
                                        حفظ التغييرات
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
