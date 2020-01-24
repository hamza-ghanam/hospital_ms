@extends('layouts.app')

@section('content')
    <div class="container">
        @if (isset($message) && !empty($message))
            <div class="alert alert-danger">{{$message}}</div>
            <br/>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>تفاصيل جهة اتصال</h2>
                <br/>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th scope="row">
                                <i class="fa fa-user-md"></i>&nbsp;
                                الاسم
                            </th>
                            <td>
                                {{$contact->full_name}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-stethoscope"></i>&nbsp;
                                التخصص
                            </th>
                            <td>
                                {{$contact->specialization}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-phone"></i>&nbsp;
                                الهاتف
                            </th>
                            <td class="date" dir="ltr">
                                {{$contact->phone}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-mobile"></i>&nbsp;
                                المحمول
                            </th>
                            <td>
                                {{$contact->mobile}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-mobile"></i>&nbsp;
                                المحمول2
                            </th>
                            <td>
                                {{$contact->mobile2}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-phone"></i>&nbsp;
                                هاتف العيادة
                            </th>
                            <td>
                                {{$contact->clinic_phone}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-code-branch"></i>&nbsp;
                                الكود
                            </th>
                            <td>
                                {{$contact->code}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-map-marker-alt"></i>&nbsp;
                                العنوان
                            </th>
                            <td>
                                {{$contact->address}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-address-card"></i>&nbsp;
                                الرقم الوطني
                            </th>
                            <td>
                                {{$contact->national_num}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <i class="fa fa-list"></i>&nbsp;
                                ملاحظات
                            </th>
                            <td>
                                {{$contact->notes}}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <a href="{{URL::to("/contacts/$contact->id/edit")}}" data-toggle="tooltip"
                                   data-placement="top" title="تعديل المعلومات"><i style="color: darkslategray;"
                                                                                   class="fas fa-edit fa-2x"></i></a>
                                &nbsp;
                                &nbsp;@can('delete contact')
                                    <span data-toggle="modal" data-target="#myModal2">
                                    <a data-toggle="tooltip" data-placement="top" title="حذف">
                                        <i style="color: darkred; cursor: pointer;" class="fas fa-trash fa-2x"></i>
                                    </a>
                                </span>
                                @endcan
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
                    <h5 class="modal-title" id="exampleModalLabel" dir="rtl">حذف جهة اتصال</h5>
                </div>
                <div class="modal-body" dir="rtl" style="text-align: right; ">
                    هل تريد حقًا حذف جهة الاتصال؟!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            style="margin-left: 10px;">
                        إلغاء
                        الأمر
                    </button>
                    <button type="button" onclick="deleteContact({{$contact->id}})"
                            class="btn btn-primary"
                            data-dismiss="modal"
                            id="dd2">تأكيد الحذف
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteContact(cid) {
            //alert(tid);
            var url = "{{ route('delete_contact', ':id') }}";
            url = url.replace(':id', cid);
            document.location.href = url;
        }
    </script>
@endsection