@extends('admin.layouts.app')

@section('content')
    <div class="col-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        {{__('اضافة حساب جديد')}}
                    </h3>
                </div>
            </div>

            <!--begin::Form-->
            <form method="post" id="validate" action="{{route('admin.categories.store')}}"  enctype="multipart/form-data">
                @csrf
                @include('admin.layouts.components.alert')

                <div class="kt-portlet__body">


                    <div class="form-group m-form__group {{$errors->has('name')?"has-danger":''}}">
                        <label for="name">{{__('الاسم ')}} :</label>
                        <input type="text" required minlength="2" name="name" class="form-control m-input"
                               id="name"
                               aria-describedby="emailHelp" placeholder="{{__('ادخل')}} {{__('الاسم ')}} "
                               value="{{old('name')}}">
                    </div>

                    <div class="form-group m-form__group {{$errors->any('image')?"has-danger":''}}">
                        <label for="image">صورة :</label>
                        <input type="file" name="image"
                               class="form-control m-input"
                               id="image"
                               aria-describedby="emailHelp" placeholder="{{__('اختر الصورة')}}">

                        <img class="blah" src="" width="150px"
                             alt="">


                    </div>

                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions kt-form__actions--right">
                            <div class="row">
                                <div class="col kt-align-left">
                                    <input type="submit" class="btn btn-brand" value="حفظ" name="submit">
                                    <a href="{{route('admin.categories.index')}}" class="btn btn-secondary">الغاء</a>
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


