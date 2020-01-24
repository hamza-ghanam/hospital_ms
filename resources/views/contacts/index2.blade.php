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
        <h2>إدارة جهات الاتصال</h2>
        <br/>
        @can('add contact')
            <a class="btn btn-info" href="{{URL::to('contacts/create')}}"><i class="fa fa-user-md"></i>&nbsp;إضافة
                جهة اتصال</a>
            <br/>
            <br/>
        @endcan
            <div class="row">
                بحث عن جهة الاتصال بحسب الاسم:&nbsp;
                <form method="post" action="{{URL::to("contacts/search_contacts")}}">
                    @csrf
                    <table style="border-spacing: 15px;">
                        <tr>
                            <td>
                                <input class="form-control" type="text" id="contact_name" name="contact_name"
                                       value="{{!empty($cname) ? $cname : ''}}"/>
                            </td>
                            <td>&nbsp;&nbsp;</td>
                            <td>
                                <button type="submit" class="btn btn-success btn-sm">بحث</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        <br/>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                        <tr align="center">
                            <th>
                                @sortablelink('full_name', 'الاسم')
                            </th>
                            <th>
                                @sortablelink('specialization', 'التخصص')
                            </th>
                            <th>@sortablelink('phone', 'رقم الهاتف')</th>
                            <th>@sortablelink('mobile', 'رقم المحمول')</th>
                            <th>@sortablelink('code', 'الكود')</th>
                            <th>@sortablelink('address', 'العنوان')</th>
                            <th>@sortablelink('national_num', 'الرقم الوطني')</th>
                            <th>آخر تعديل تم من قبل</th>
                            <th></th>
                            <th></th>
                            @can('delete contact')
                                <th></th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody  id="myTable">
                        @foreach($contacts as $contact)
                            <tr align="center">
                                <td>{{$contact->full_name}}</td>
                                <td>{{$contact->specialization}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->mobile}}</td>
                                <td>{{$contact->code}}</td>
                                <td>{{$contact->address}}</td>
                                <td>{{$contact->national_num}}</td>
                                <td>{{$contact->last_uptade_by}}</td>
                                <td><a href="{{URL::to("/contacts/$contact->id")}}" data-toggle="tooltip"
                                       data-placement="top" title="عرض التفاصيل"><i class="fas fa-info-circle"></i></a>
                                </td>
                                <td>
                                    <a href="{{URL::to("/contacts/$contact->id/edit")}}" data-toggle="tooltip"
                                       data-placement="top" title="تعديل المعلومات"><i style="color: darkslategray;"
                                                                                       class="fas fa-edit"></i></a>
                                </td>
                                @can('delete contact')
                                    <td>
                                        <span data-toggle="modal" data-target="#myModal{{$contact->id}}">
                                            <a data-toggle="tooltip" data-placement="top" title="حذف">
                                                <i style="color: darkred; cursor: pointer;" class="fas fa-trash"></i>
                                            </a>
                                        </span>
                                    </td>
                                @endcan
                            </tr>
                            <div class="modal fade" id="myModal{{$contact->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel2"
                                 aria-hidden="true"
                                 dir="rtl">
                                <div class="modal-dialog" role="document" dir="rtl">
                                    <div class="modal-content" dir="rtl">
                                        <div class="modal-header" dir="rtl">
                                            <h5 class="modal-title" id="exampleModalLabel" dir="rtl">حذف جهة
                                                الاتصال</h5>
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
                                                    id="dd{{$contact->id}}">تأكيد الحذف
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function deleteContact(cid) {
        var url = "{{ route('delete_contact', ':id') }}";
        url = url.replace(':id', cid);
        document.location.href = url;
    }
</script>