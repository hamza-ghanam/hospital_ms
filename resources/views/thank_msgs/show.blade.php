@extends('layouts.app')

@section('content')
    <div class="container">
        @if (isset($success) && !empty($success))
            <div class="alert alert-success">{{$success}}</div>
            <br/>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>تفاصيل رسالة الشكر</h2>
                <br/>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th scope="row">
                                <i class="fa fa-envelope"></i>&nbsp;
                                نص الرسالة
                            </th>
                        </tr>
                        <tr>
                            <td>
                                {{$thankMsg->body}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-calendar"></i>&nbsp;
                                تاريخ/توقيت الرسالة
                            </th>
                        </tr>
                        <tr>
                            <td class="date" dir="ltr">
                                {{date ("d/m/Y h:i:s a", strtotime($thankMsg->created_at))}}
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
                    <h5 class="modal-title" id="exampleModalLabel" dir="rtl">حذف رسالة</h5>
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
                    <button type="button" onclick="deleteThank_msg({{$thankMsg->id}})"
                            class="btn btn-primary"
                            data-dismiss="modal"
                            id="dd2">تأكيد الحذف
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteThank_msg(sid) {
            //alert(tid);
            var url = "{{ route('delete_thank_msg', ':id') }}";
            url = url.replace(':id', sid);
            document.location.href = url;
        }
    </script>
@endsection