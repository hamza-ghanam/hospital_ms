@extends('layouts.app')

@section('content')
    <script>
        $(document).ready(function () {
            $("#myInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    <div class="container">
        @if (isset($message) && !empty($message))
            <div class="alert alert-danger">{{$message}}</div>
            <br/>
        @endif
        <h2>إدارة الموظفين</h2>
        <br/>
        @can('manage user')
            <a class="btn btn-info" href="{{URL::to('users/create')}}"><i class="fa fa-user-md"></i>&nbsp;إضافة
                موظف</a>
            <br/>
            <br/>
        @endcan
        <div class="row">
            <div class="col-md-4">
                بحث عن موظف: <input class="form-control" type="text" id="myInput"/>
            </div>
        </div>
        <br/>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark" align="center">
                        <tr align="center">
                            <th>@sortablelink('uname', 'اسم الموظف')</th>
                            <th>@sortablelink('email', 'البربد الإلكتروني')</th>
                            <th>@sortablelink('rname', 'دور الموظف')</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody  id="myTable">
                        @foreach($users as $user)
                            <tr align="center">
                                <td>{{$user->uname}}</td>
                                <td>{{$user->email}}</td>
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
                                <td><a href="{{URL::to("/users/$user->id")}}" data-toggle="tooltip"
                                       data-placement="top" title="عرض التفاصيل"><i class="fas fa-info-circle"></i></a>
                                </td>
                                <td>
                                    <a href="{{URL::to("/users/$user->id/edit")}}" data-toggle="tooltip"
                                       data-placement="top" title="تعديل المعلومات"><i style="color: darkslategray;"
                                                                                       class="fas fa-edit"></i></a>
                                </td>
                                <td>
                                <span data-toggle="modal" data-target="#myModal{{$user->id}}">
                                    <a data-toggle="tooltip" data-placement="top" title="حذف">
                                        <i style="color: darkred; cursor: pointer;" class="fas fa-trash"></i>
                                    </a>
                                </span>
                                </td>
                            </tr>
                            <div class="modal fade" id="myModal{{$user->id}}" tabindex="-1" role="dialog"
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
                                                    id="dd{{$user->id}}">تأكيد الحذف
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function deleteUser(cid) {
        var url = "{{ route('delete_user', ':id') }}";
        url = url.replace(':id', cid);
        document.location.href = url;
    }
</script>