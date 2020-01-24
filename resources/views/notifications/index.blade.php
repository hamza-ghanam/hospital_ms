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
        @if (isset($success) && !empty($success))
            <div class="alert alert-success">{{$success}}</div>
            <br/>
        @endif
        <h2>إدارة إشعارات الصفحة الرئيسية</h2>
        <br/>
        @can('add thank_msg')
            <a class="btn btn-info" href="{{URL::to('notifications/create')}}"><i class="fa fa-sticky-note"></i>&nbsp;إضافة
                إشعار</a>
            <br/>
            <br/>
        @endcan
        <div class="row">
            <div class="col-md-4">
                بحث عن إشعار: <input class="form-control" type="text" id="myInput"/>
            </div>
        </div>
        <br/>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                        <tr align="center">
                            <th>@sortablelink('title', 'العنوان')</th>
                            <th>@sortablelink('body', 'النصّ')</th>
                            <th>@sortablelink('created_at', 'تاريخ/توقيت الإشعار')</th>
                            @can('show notification')
                                <th></th>
                            @endcan
                            @can('edit notification')
                                <th></th>
                            @endcan
                            @can('delete notification')
                                <th></th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody id="myTable">
                        @foreach($notifs as $notif)
                            <tr align="center">
                                <td>{{$notif->title}}</td>
                                <td>{{$notif->body}}</td>
                                <td dir="ltr"
                                    class="date">{{date ("Y-m-d h:i:s a", strtotime($notif->created_at))}}</td>
                                @can('show notification')
                                    <td><a href="{{URL::to("/notifications/$notif->id")}}" data-toggle="tooltip"
                                           data-placement="top" title="عرض التفاصيل"><i class="fas fa-info-circle"></i></a>
                                    </td>
                                @endcan
                                @can('edit notification')
                                    <td>
                                        <a href="{{URL::to("/notifications/$notif->id/edit")}}" data-toggle="tooltip"
                                           data-placement="top" title="تعديل المعلومات"><i style="color: darkslategray;"
                                                                                           class="fas fa-edit"></i></a>
                                    </td>
                                @endcan
                                @can('delete notification')
                                    <td>
                                <span data-toggle="modal" data-target="#myModal{{$notif->id}}">
                                    <a data-toggle="tooltip" data-placement="top" title="حذف الإشعار">
                                        <i style="color: darkred; cursor: pointer;" class="fas fa-trash"></i>
                                    </a>
                                </span>
                                    </td>
                                @endcan
                            </tr>
                            <div class="modal fade" id="myModal{{$notif->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel2"
                                 aria-hidden="true"
                                 dir="rtl">
                                <div class="modal-dialog" role="document" dir="rtl">
                                    <div class="modal-content" dir="rtl">
                                        <div class="modal-header" dir="rtl">
                                            <h5 class="modal-title" id="exampleModalLabel" dir="rtl">حذف الإشعار</h5>
                                        </div>
                                        <div class="modal-body" dir="rtl" style="text-align: right; ">
                                            هل تريد حقًا حذف الإشعار؟!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                    style="margin-left: 10px;">
                                                إلغاء
                                                الأمر
                                            </button>
                                            <button type="button" onclick="deleteNotif({{$notif->id}})"
                                                    class="btn btn-primary"
                                                    data-dismiss="modal"
                                                    id="dd{{$notif->id}}">تأكيد الحذف
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $notifs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function deleteNotif(sid) {
        //alert(tid);
        var url = "{{ route('delete_notif', ':id') }}";
        url = url.replace(':id', sid);
        document.location.href = url;
    }
</script>