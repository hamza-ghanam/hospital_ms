@extends('layouts.app')

@section('content')
    <div class="container">
        @if (isset($message) && !empty($message))
            <div class="alert alert-danger">{{$message}}</div>
            <br/>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>تفاصيل العملية</h2>
                <br/>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th scope="row">
                                <i class="fa fa-file-medical-alt"></i>&nbsp;
                                اسم العملية
                            </th>
                            <td>
                                {{$surgery->name}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-calendar"></i>&nbsp;
                                تاريخ العملية
                            </th>
                            <td class="date" dir="ltr">
                                {{date("d/m/Y", strtotime($surgery->date_))}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-clock"></i>&nbsp;
                                توقيت العملية
                            </th>
                            <td class="date" dir="ltr">
                                {{date("h:i:s a", strtotime($surgery->time_))}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-stethoscope"></i>&nbsp;
                                التخصّص
                            </th>
                            <td>
                                {{$surgery->specialization}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-user-md"></i>&nbsp;
                                اسم الطبيب
                            </th>
                            <td>
                                {{$surgery->doctor_name}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-pager"></i>&nbsp;
                                حالة العملية
                            </th>
                            <td>
                                @switch($surgery->status)
                                    @case("waiting")<span class="badge badge-warning">انتظار</span>
                                    @break
                                    @case("in_progress")<span class="badge badge-primary">قيد التنفيذ</span>
                                    @break
                                    @case("finished")<span class="badge badge-success">منفّذة</span>
                                    @break
                                    @case("canceled")<span class="badge badge-danger">ملغاة</span>
                                    @break
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-person-booth"></i>&nbsp;
                                القاعة
                            </th>
                            <td>
                                {{$surgery->hall}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-procedures"></i>&nbsp;
                                اسم المريض
                            </th>
                            <td>
                                {{$surgery->patient_name}}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <a href="{{URL::to("/surgeries/$surgery->id/edit")}}" data-toggle="tooltip"
                                   data-placement="top" title="تعديل المعلومات"><i style="color: darkslategray;"
                                                                                   class="fas fa-edit fa-2x"></i></a>
                                &nbsp;
                                &nbsp;
                                <span data-toggle="modal" data-target="#myModal2">
                                    <a data-toggle="tooltip" data-placement="top" title="حذف العمليّة">
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
                    <h5 class="modal-title" id="exampleModalLabel" dir="rtl">حذف عمليّة</h5>
                </div>
                <div class="modal-body" dir="rtl" style="text-align: right; ">
                    هل تريد حقًا حذف العمليّة؟!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            style="margin-left: 10px;">
                        إلغاء
                        الأمر
                    </button>
                    <button type="button" onclick="deleteSurgery({{$surgery->id}})"
                            class="btn btn-primary"
                            data-dismiss="modal"
                            id="dd2">تأكيد الحذف
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteSurgery(sid) {
            //alert(tid);
            var url = "{{ route('delete_surgery', ':id') }}";
            url = url.replace(':id', sid);
            document.location.href = url;
        }
    </script>
@endsection