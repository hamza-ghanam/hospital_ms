@extends('layouts.app')

@section('content')
    <script>
        $(document).ready(function () {
            $("#else_spec_name").hide();
            $("#spec").on("change", function () {
                var conceptName = $('#spec').find(":selected").val();
                if (conceptName == "غير ذلك") {
                    $("#else_spec_name").slideDown();
                } else {
                    $("#else_spec_name").slideUp();
                }
            });
        });
    </script>
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">{{$errors->first()}}</div>
            <br/>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h4 class="card-header">إضافة جهة اتصال جديدة</h4>
                    <div class="card-body">
                        <form method="POST" action="{{URL::to("/contacts")}}">
                            @csrf
                            <label for="name" class="col-sm-2 col-form-label">الاسم</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-user-md"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name"
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
                                        <option value="بولية">بولية</option>
                                        <option value="أذنية">أذنية</option>
                                        <option value="أسنان">أسنان</option>
                                        <option value="أشعة">أشعة</option>
                                        <option value="أطفال">أطفال</option>
                                        <option value="عصبية">عصبية</option>
                                        <option value="نسائية">نسائية</option>
                                        <option value="أذن وأنف وحنجرة">أذن وأنف وحنجرة</option>
                                        <option value="تخدير">تخدير</option>
                                        <option value="تنظير">تنظير</option>
                                        <option value="جلدية">جلدية</option>
                                        <option value="قلبية">قلبية</option>
                                        <option value="كلية">كلية</option>
                                        <option value="اوعية دموية">اوعية دموية</option>
                                        <option value="مخبري">مخبري</option>
                                        <option value="جراحة الفم والوجه والفكين">جراحة الفم والوجه والفكين</option>
                                        <option value="جراحة تجميل">جراحة تجميل</option>
                                        <option value="جراحة عامة">جراحة عامة</option>
                                        <option value="جراحة عظمية">جراحة عظمية</option>
                                        <option value="داخلية أورام">داخلية أورام</option>
                                        <option value="داخلية باطنية">داخلية باطنية</option>
                                        <option value="صدرية">صدرية</option>
                                        <option value="طفل انبوب">طفل انبوب</option>
                                        <option value="طوارئ">طوارئ</option>
                                        <option value="عينية">عينية</option>
                                        <option value="قابلة قانونية">قابلة قانونية</option>
                                        <option value="مفاصل">مفاصل</option>
                                        <option value="ممارس عام">ممارس عام</option>
                                        <option value="غير ذلك">غير ذلك</option>
                                    </select>
                                </div>
                            </div>
                            <div id="else_spec_name">
                                <label for="else_spec" class="col-sm-8 col-form-label">يرجى ذكر التخصص</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-pen"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="else_spec" name="else_spec"/>
                                    </div>
                                </div>
                            </div>
                            <label for="phone" class="col-sm-8 col-form-label">الهاتف</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="phone" name="phone"/>
                                </div>
                            </div>

                            <label for="mobile" class="col-sm-2 col-form-label">المحمول</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-mobile"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="mobile" name="mobile"/>
                                </div>
                            </div>
                            <label for="mobile2" class="col-sm-2 col-form-label">المحمول 2</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-mobile"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="mobile2" name="mobile2"/>
                                </div>
                            </div>
                            <label for="clinic" class="col-sm-2 col-form-label">هاتف العيادة</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="clinic" name="clinic"/>
                                </div>
                            </div>
                            <label for="code" class="col-sm-2 col-form-label">الكود</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-code-branch"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="code" name="code"/>
                                </div>
                            </div>
                            <label for="address" class="col-sm-2 col-form-label">العنوان</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-map-marker-alt"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="address" name="address"/>
                                </div>
                            </div>
                            <label for="national_num" class="col-sm-2 col-form-label">الرقم الوطني</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-address-card"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="national_num" name="national_num"/>
                                </div>
                            </div>
                            <label for="notes" class="col-sm-2 col-form-label">ملاحظات</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-list"></i></div>
                                    </div>
                                    <textarea name="notes" id="notes" class="form-control" rows="2"
                                              cols="20"></textarea>
                                </div>
                            </div>
                            <br/>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-folder-plus"></i>&nbsp;إضافة
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