@extends('admin.layouts.app')

@section('content')
    <div class="col-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{__('تعديل البيانات الشخصية')}}
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <form action="{{route('admin.updateProfile')}}" method="post"
                      class="m-form m-form--fit m-form--label-align-right">

                    {{csrf_field()}}
                    {{method_field('put')}}

                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    {{$subTitle}}
                                </h3>
                            </div>
                        </div>

                    </div>
                    <div class="m-portlet__body">


                        <div class="form-group m-form__group {{$errors->has('first_name')?"has-danger":''}}">
                            <label for="name">{{__('الاسم الأول')}} :</label>
                            <input type="text" required minlength="2" name="first_name" class="form-control m-input"
                                   id="first_name"
                                   aria-describedby="emailHelp" placeholder="{{__('ادخل')}} {{__('الاسم الأول')}}"
                                   value="{{auth('admin')->user()->first_name}}">
                        </div>

                        <div class="form-group m-form__group {{$errors->has('last_name')?"has-danger":''}}">
                            <label for="name">{{__('الاسم الأخير')}} :</label>
                            <input type="text" required minlength="2" name="last_name" class="form-control m-input"
                                   id="last_name"
                                   aria-describedby="emailHelp" placeholder="{{__('ادخل')}} {{__('الاسم الأول')}}"
                                   value="{{auth('admin')->user()->last_name}}">
                        </div>


                        <div class="form-group m-form__group {{$errors->has('email')?"has-danger":''}}">
                            <label for="email">{{__('البريد الإلكتروني')}} :</label>
                            <input type="email" required minlength="2" name="email" class="form-control m-input"
                                   id="email"
                                   aria-describedby="emailHelp" placeholder="{{__('ادخل')}} {{__('البريد الإلكتروني')}}"
                                   value="{{auth('admin')->user()->email}}">
                        </div>

                        <div class="form-group m-form__group {{$errors->has('password')?"has-danger":''}}">
                            <label for="password">{{__('كلمة المرور')}}:</label>
                            <input type="password" minlength="6" name="password" class="form-control m-input"
                                   id="email"
                                   aria-describedby="emailHelp" placeholder="{{__('ادخل')}} {{__('كلمة المرور')}}"
                            >
                        </div>

                        <div class="form-group m-form__group {{$errors->has('password_confirmation')?"has-danger":''}}">
                            <label for="password_confirmation">{{__('تأكيد كلمة المرور')}}:</label>
                            <input type="password" minlength="6" name="password_confirmation"
                                   class="form-control m-input"
                                   id="password_confirmation"
                                   aria-describedby="emailHelp" placeholder="{{__('ادخل')}} {{__('تأكيد كلمة المرور')}}"
                            >
                        </div>


                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <button type="submit" class="btn btn-primary">{{__('حفظ')}}</button>
                                <a href="{{url('admin')}}" type="" class="btn btn-secondary">{{__('الغاء')}}</a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
