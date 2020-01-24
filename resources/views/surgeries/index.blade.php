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
        <h2>إدارة كافة العمليّات</h2>
        <br/>
        @can('add surgery')
            <a class="btn btn-info" href="{{URL::to('surgeries/create')}}"><i class="fa fa-folder-plus"></i>&nbsp;إضافة
                عملية</a>
            <br/>
            <br/>
            <br/>
        @endcan
        @role('Super Admin')
        <div class="row">
            بحث عن عملية بحسب التاريخ:
            <form method="post" action="{{URL::to("surgeries/search_surgeries")}}">
                @csrf
                <table style="border-spacing: 15px;">
                    <tr>
                        <td>
                            <input class="form-control" type="date" id="myInput" name="date_"
                                   value="{{!empty($date_) ? $date_ : ''}}"/>
                        </td>
                        <td>&nbsp;&nbsp;</td>
                        <td>
                            <button type="submit" class="btn btn-success btn-sm">بحث</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        @endrole
        <br/>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                        <tr align="center">
                            <th>@sortablelink('name', 'اسم العملية')</th>
                            <th>@sortablelink('date_', 'تاريخ العملية')</th>
                            <th>@sortablelink('time_', 'توقيت العملية')</th>
                            <th>@sortablelink('specialization', 'التخصّص')</th>
                            <th>@sortablelink('doctor_name', 'اسم الطبيب')</th>
                            <th>@sortablelink('status', 'حالة العملية')</th>
                            <th>@sortablelink('hall', 'القاعة')</th>
                            <th>@sortablelink('patient_name', 'اسم المريض')</th>
                            @can('show surgery')
                                <th></th>
                            @endcan
                            @can('edit surgery')
                                <th></th>
                            @endcan
                            @can('delete surgery')
                                <th></th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody id="myTable">
                        @foreach($surgeries as $surgery)
                            <tr align="center">
                                <td>{{$surgery->name}}</td>
                                <td dir="ltr" class="date">{{date ("d/m/Y", strtotime($surgery->date_))}}</td>
                                <td dir="ltr" class="date">{{date ("h:i:s a", strtotime($surgery->time_))}}</td>
                                <td>{{$surgery->specialization}}</td>
                                <td>{{$surgery->doctor_name}}</td>
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
                                <td>{{$surgery->hall}}</td>
                                <td>{{$surgery->patient_name}}</td>
                                @can('show surgery')
                                    <td><a href="{{URL::to("/surgeries/$surgery->id")}}" data-toggle="tooltip"
                                           data-placement="top" title="عرض التفاصيل"><i class="fas fa-info-circle"></i></a>
                                    </td>
                                @endcan
                                @can('edit surgery')
                                    <td>
                                        <a href="{{URL::to("/surgeries/$surgery->id/edit")}}" data-toggle="tooltip"
                                           data-placement="top" title="تعديل المعلومات"><i style="color: darkslategray;"
                                                                                           class="fas fa-edit"></i></a>
                                    </td>
                                @endcan
                                @can('delete surgery')
                                    <td>
                                <span data-toggle="modal" data-target="#myModal{{$surgery->id}}">
                                    <a data-toggle="tooltip" data-placement="top" title="حذف العمليّة">
                                        <i style="color: darkred; cursor: pointer;" class="fas fa-trash"></i>
                                    </a>
                                </span>
                                    </td>
                                @endcan
                            </tr>
                            <div class="modal fade" id="myModal{{$surgery->id}}" tabindex="-1" role="dialog"
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
                                                    id="dd{{$surgery->id}}">تأكيد الحذف
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $surgeries->links() }}
                </div>
                <br/>
                <div class="table-responsive">
                    <h4>إحصائيات العمليّات</h4>
                    <table class="table table-hover table-striped">
                        @php
                            $i = 0;
                        @endphp
                        @foreach($spec_counts as $key => $value)
                            @if($i%2 == 0)
                                <tr>
                                    <td>{{$key}}: {{$value}}</td>
                                    @php $i++; @endphp
                                    @else
                                        <td>{{$key}}: {{$value}}</td>
                                </tr>
                                @php $i++; @endphp
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function deleteSurgery(sid) {
        //alert(tid);
        var url = "{{ route('delete_surgery', ':id') }}";
        url = url.replace(':id', sid);
        document.location.href = url;
    }
</script>