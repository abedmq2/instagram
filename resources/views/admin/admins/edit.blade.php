@extends('admin.layouts.app')

@section('content')
    <div class="col-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{__('اضافة مشرف جديد')}}
                    </h3>
                </div>
            </div>

            <!--begin::Form-->
            <form method="post" id="validate" action="{{route('admin.admins.update',$item->id)}}">
                @csrf
                @method('put')
                @include('admin.layouts.components.alert')

                <div class="kt-portlet__body">


                    <div class="form-group m-form__group {{$errors->has('name')?"has-danger":''}}">
                        <label for="name">{{__('الاسم')}} :</label>
                        <input type="text" required minlength="2" name="name" class="form-control m-input"
                               id="name"
                               aria-describedby="emailHelp" placeholder="{{__('ادخل')}} {{__('الاسم')}} "
                               value="{{$item->name}}">
                    </div>


                    <div class="form-group m-form__group {{$errors->has('email')?"has-danger":''}}">
                        <label for="email">{{__('البريد اللإلكتروني')}} :</label>
                        <input type="email" required minlength="2" name="email" class="form-control m-input"
                               id="email"
                               aria-describedby="emailHelp" placeholder="{{__('ادخل')}} {{__('البريد الإلكتروني')}}"
                               value="{{$item->email}}">
                    </div>
                    <div class="form-group m-form__group {{$errors->has('email')?"has-danger":''}}">
                        <label for="email">{{__('الصلاحية')}} :</label>
                        <select  required name="role_id" class="form-control m-input"
                                 id="role_id">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" {{$item->hasRole($role)?"selected":""}} >{{$role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-form__group {{$errors->has('password')?"has-danger":''}}">
                        <label for="password">{{__('كلمة المرور')}}:</label>
                        <input type="password"  minlength="6" name="password" class="form-control m-input"
                               id="password"
                               aria-describedby="emailHelp" placeholder="{{__('ادخل')}} {{__('كلمة المرور')}}">
                    </div>

                    <div class="form-group m-form__group {{$errors->has('password_confirmation')?"has-danger":''}}">
                        <label for="password_confirmation">{{__('تأكيد كلمة المرور')}}:</label>
                        <input type="password"  minlength="6" name="password_confirmation"
                               class="form-control m-input"
                               id="password_confirmation"
                               aria-describedby="emailHelp" placeholder="{{__('تأكيد كلمة المرور')}} {{__('ادخل')}}">
                    </div>


                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions kt-form__actions--right">
                            <div class="row">
                                <div class="col kt-align-left">
                                    <input type="submit" class="btn btn-brand" value="حفظ" name="submit">
                                    <a href="{{route('admin.admins.index')}}" class="btn btn-secondary">الغاء</a>
                                </div>
                                <div class="col kt-align-right">
                                    {{--                                <button type="reset" class="btn btn-danger">Delete</button>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!--end::Form-->
        </div>
    </div>
@endsection

@push('scripts')

@endpush


