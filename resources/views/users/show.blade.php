@extends('layouts.app')

@section('content')
    <div class="container">
        @if (isset($message) && !empty($message))
            <div class="alert alert-danger">{{$message}}</div>
            <br/>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>تفاصيل الموظف</h2>
                <br/>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th scope="row">
                                <i class="fa fa-user-md"></i>&nbsp;
                                اسم الموظف
                            </th>
                            <td>
                                {{$user->uname}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-inbox"></i>&nbsp;
                                البريد الإلكتروني
                            </th>
                            <td class="date" dir="ltr">
                                {{$user->email}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-tools"></i>&nbsp;
                                دور الموظف
                            </th>
                            <td>
                                @switch($user->rname)
                                    @case("Super Admin")مدير النظام
                                    @break
                                    @case("Surgery Emp")موظف عمليّات
                                    @break
                                    @case("Reception Emp")موظف استقبال
                                    @break
                                    @case("Main Reception Emp")موظف استقبال رئيسي
                                    @break
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <a href="{{URL::to("/users/$user->id/edit")}}" data-toggle="tooltip"
                                   data-placement="top" title="تعديل المعلومات"><i style="color: darkslategray;"
                                                                                   class="fas fa-edit fa-2x"></i></a>
                                &nbsp;
                                &nbsp;
                                <span data-toggle="modal" data-target="#myModal2">
                                    <a data-toggle="tooltip" data-placement="top" title="حذف">
                                        <i style="color: darkred; cursor: pointer;" class="fas fa-trash fa-2x"></i>
                                    </a>
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel2"
         aria-hidden="true"
         dir="rtl">
        <div class="modal-dialog" role="document" dir="rtl">
            <div class="modal-content" dir="rtl">
                <div class="modal-header" dir="rtl">
                    <h5 class="modal-title" id="exampleModalLabel" dir="rtl">حذف الموظف</h5>
                </div>
                <div class="modal-body" dir="rtl" style="text-align: right; ">
                    هل تريد حقًا حذف الموظف؟!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            style="margin-left: 10px;">
                        إلغاء
                        الأمر
                    </button>
                    <button type="button" onclick="deleteUser({{$user->id}})"
                            class="btn btn-primary"
                            data-dismiss="modal"
                            id="dd2">تأكيد الحذف
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteUser(cid) {
            //alert(tid);
            var url = "{{ route('delete_user', ':id') }}";
            url = url.replace(':id', cid);
            document.location.href = url;
        }
    </script>
@endsection