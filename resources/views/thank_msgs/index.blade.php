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
        <h2>إدارة رسائل شكر الصفحة الرئيسية</h2>
        <br/>
        @can('add thank_msg')
            <a class="btn btn-info" href="{{URL::to('thank_msgs/create')}}"><i class="fa fa-envelope-open"></i>&nbsp;إضافة
                رسالة شكر</a>
            <br/>
            <br/>
        @endcan
        <div class="row">
            <div class="col-md-4">
                بحث عن رسالة: <input class="form-control" type="text" id="myInput"/>
            </div>
        </div>
        <br/>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                        <tr align="center">
                            <th>@sortablelink('body', 'الرسالة')</th>
                            <th>@sortablelink('created_at', 'تاريخ/توقيت الرسالة')</th>
                            @can('show thank_msg')
                                <th></th>
                            @endcan
                            @can('edit thank_msg')
                                <th></th>
                            @endcan
                            @can('delete thank_msg')
                                <th></th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody id="myTable">
                        @foreach($thankMsgs as $thankMsg)
                            <tr align="center">
                                <td>{{mb_substr($thankMsg->body, 0, 60, 'utf-8')}}...</td>
                                <td dir="ltr"
                                    class="date">{{date ("d/m/Y h:i:s a", strtotime($thankMsg->created_at))}}</td>
                                @can('show thank_msg')
                                    <td><a href="{{URL::to("/thank_msgs/$thankMsg->id")}}" data-toggle="tooltip"
                                           data-placement="top" title="عرض التفاصيل"><i class="fas fa-info-circle"></i></a>
                                    </td>
                                @endcan
                                @can('edit thank_msg')
                                    <td>
                                        <a href="{{URL::to("/thank_msgs/$thankMsg->id/edit")}}" data-toggle="tooltip"
                                           data-placement="top" title="تعديل المعلومات"><i style="color: darkslategray;"
                                                                                           class="fas fa-edit"></i></a>
                                    </td>
                                @endcan
                                @can('delete thank_msg')
                                    <td>
                                <span data-toggle="modal" data-target="#myModal{{$thankMsg->id}}">
                                    <a data-toggle="tooltip" data-placement="top" title="حذف الرسالة">
                                        <i style="color: darkred; cursor: pointer;" class="fas fa-trash"></i>
                                    </a>
                                </span>
                                    </td>
                                @endcan
                            </tr>
                            <div class="modal fade" id="myModal{{$thankMsg->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel2"
                                 aria-hidden="true"
                                 dir="rtl">
                                <div class="modal-dialog" role="document" dir="rtl">
                                    <div class="modal-content" dir="rtl">
                                        <div class="modal-header" dir="rtl">
                                            <h5 class="modal-title" id="exampleModalLabel" dir="rtl">حذف رسالة شكر</h5>
                                        </div>
                                        <div class="modal-body" dir="rtl" style="text-align: right; ">
                                            هل تريد حقًا حذف الرسالة؟!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                    style="margin-left: 10px;">
                                                إلغاء
                                                الأمر
                                            </button>
                                            <button type="button" onclick="deleteThankMsg({{$thankMsg->id}})"
                                                    class="btn btn-primary"
                                                    data-dismiss="modal"
                                                    id="dd{{$thankMsg->id}}">تأكيد الحذف
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $thankMsgs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function deleteThankMsg(sid) {
        //alert(tid);
        var url = "{{ route('delete_thank_msg', ':id') }}";
        url = url.replace(':id', sid);
        document.location.href = url;
    }
</script>