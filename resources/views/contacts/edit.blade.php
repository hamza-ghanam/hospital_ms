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
                    <h4 class="card-header">تعديل جهة اتصال</h4>
                    <div class="card-body">
                        <form method="POST" action="{{URL::to("/contacts/$contact->id")}}">
                            @csrf
                            @method("PUT")
                            <label for="name" class="col-sm-2 col-form-label">الاسم</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-user-md"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{$contact->full_name}}"
                                           required="required"/>
                                </div>
                            </div>
                            <label for="spec" class="col-sm-2 col-form-label">التخصّص</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-stethoscope"></i></div>
                                    </div>
                                    <select name="spec" id="spec" class="form-control" required="required">
                                        <option {{$contact->specialization == 'بولية' ? 'selected' : ''}} value="بولية">
                                            بولية
                                        </option>
                                        <option {{$contact->specialization == 'أذنية' ? 'selected' : ''}} value="أذنية">
                                            أذنية
                                        </option>
                                        <option {{$contact->specialization == 'أسنان' ? 'selected' : ''}} value="أسنان">
                                            أسنان
                                        </option>
                                        <option {{$contact->specialization == 'أشعة' ? 'selected' : ''}} value="أشعة">
                                            أشعة
                                        </option>
                                        <option {{$contact->specialization == 'أطفال' ? 'selected' : ''}} value="أطفال">
                                            أطفال
                                        </option>
                                        <option {{$contact->specialization == 'عصبية' ? 'selected' : ''}} value="عصبية">
                                            عصبية
                                        </option>
                                        <option {{$contact->specialization == 'نسائية' ? 'selected' : ''}} value="نسائية">
                                            نسائية
                                        </option>
                                        <option {{$contact->specialization == 'أذن وأنف وحنجرة' ? 'selected' : ''}} value="أذن وأنف وحنجرة">
                                            أذن وأنف وحنجرة
                                        </option>
                                        <option {{$contact->specialization == 'تخدير' ? 'selected' : ''}} value="تخدير">
                                            تخدير
                                        </option>
                                        <option {{$contact->specialization == 'تنظير' ? 'selected' : ''}} value="تنظير">
                                            تنظير
                                        </option>
                                        <option {{$contact->specialization == 'جلدية' ? 'selected' : ''}} value="جلدية">
                                            جلدية
                                        </option>
                                        <option {{$contact->specialization == 'قلبية' ? 'selected' : ''}} value="قلبية">
                                            قلبية
                                        </option>
                                        <option {{$contact->specialization == 'كلية' ? 'selected' : ''}} value="كلية">
                                            كلية
                                        </option>
                                        <option {{$contact->specialization == 'اوعية دموية' ? 'selected' : ''}} value="اوعية دموية">
                                            اوعية دموية
                                        </option>
                                        <option {{$contact->specialization == 'مخبري' ? 'selected' : ''}} value="مخبري">
                                            مخبري
                                        </option>
                                        <option {{$contact->specialization == 'جراحة الفم والوجه والفكين' ? 'selected' : ''}} value="جراحة الفم والوجه والفكين">
                                            جراحة الفم والوجه والفكين
                                        </option>
                                        <option {{$contact->specialization == 'جراحة تجميل' ? 'selected' : ''}} value="جراحة تجميل">
                                            جراحة تجميل
                                        </option>
                                        <option {{$contact->specialization == 'جراحة عامة' ? 'selected' : ''}} value="جراحة عامة">
                                            جراحة عامة
                                        </option>
                                        <option {{$contact->specialization == 'جراحة عظمية' ? 'selected' : ''}} value="جراحة عظمية">
                                            جراحة عظمية
                                        </option>
                                        <option {{$contact->specialization == 'داخلية أورام' ? 'selected' : ''}} value="داخلية أورام">
                                            داخلية أورام
                                        </option>
                                        <option {{$contact->specialization == 'داخلية باطنية' ? 'selected' : ''}} value="داخلية باطنية">
                                            داخلية باطنية
                                        </option>
                                        <option {{$contact->specialization == 'صدرية' ? 'selected' : ''}} value="صدرية">
                                            صدرية
                                        </option>
                                        <option {{$contact->specialization == 'طفل انبوب' ? 'selected' : ''}} value="طفل انبوب">
                                            طفل انبوب
                                        </option>
                                        <option {{$contact->specialization == 'طوارئ' ? 'selected' : ''}} value="طوارئ">
                                            طوارئ
                                        </option>
                                        <option {{$contact->specialization == 'عينية' ? 'selected' : ''}} value="عينية">
                                            عينية
                                        </option>
                                        <option {{$contact->specialization == 'قابلة قانونية' ? 'selected' : ''}} value="قابلة قانونية">
                                            قابلة قانونية
                                        </option>
                                        <option {{$contact->specialization == 'مفاصل' ? 'selected' : ''}} value="مفاصل">
                                            مفاصل
                                        </option>
                                        <option {{$contact->specialization == 'ممارس عام' ? 'selected' : ''}} value="ممارس عام">
                                            ممارس عام
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <label for="phone" class="col-sm-8 col-form-label">الهاتف</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                           value="{{$contact->phone}}"/>
                                </div>
                            </div>
                            <label for="mobile" class="col-sm-2 col-form-label">المحمول</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-mobile"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="mobile" name="mobile"
                                           value="{{$contact->mobile}}"/>
                                </div>
                            </div>
                            <label for="mobile2" class="col-sm-2 col-form-label">المحمول 2</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-mobile"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="mobile2" name="mobile2"
                                           value="{{$contact->mobile2}}"/>
                                </div>
                            </div>
                            <label for="clinic" class="col-sm-2 col-form-label">هاتف العيادة</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="clinic" name="clinic"
                                           value="{{$contact->clinic_phone}}"/>
                                </div>
                            </div>
                            <label for="code" class="col-sm-2 col-form-label">الكود</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-code-branch"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="code" name="code"
                                           value="{{$contact->code}}"/>
                                </div>
                            </div>
                            <label for="address" class="col-sm-2 col-form-label">العنوان</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-map-marker-alt"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="address" name="address"
                                           value="{{$contact->address}}"/>
                                </div>
                            </div>
                            <label for="national_num" class="col-sm-2 col-form-label">الرقم الوطني</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-address-card"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="national_num" name="national_num"
                                           value="{{$contact->national_num}}"/>
                                </div>
                            </div>
                            <label for="notes" class="col-sm-2 col-form-label">ملاحظات</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-list"></i></div>
                                    </div>
                                    <textarea name="notes" id="notes" class="form-control" rows="2" cols="20">{{$contact->notes}}</textarea>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-folder-plus"></i>&nbsp;حفظ التغييرات
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>
@endsection