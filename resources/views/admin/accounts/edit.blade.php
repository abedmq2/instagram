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
            <form method="post" id="validate" action="{{route('admin.accounts.update',$item->id)}}">
                @csrf
                @method('put')
                @include('admin.layouts.components.alert')

                <div class="kt-portlet__body">


                    <div class="form-group m-form__group {{$errors->has('name')?"has-danger":''}}">
                        <label for="name">{{__('الاسم ')}} :</label>
                        <input type="text" required minlength="2" name="name" class="form-control m-input"
                               id="name"
                               aria-describedby="emailHelp" placeholder="{{__('ادخل')}} {{__('الاسم ')}} "
                               value="{{$item->name}}">
                    </div>


                    <div class="form-group m-form__group {{$errors->has('category_id')?"has-danger":''}}">
                        <label for="category_id">{{__('التصنيف')}} :</label>
                        <select required name="category_id" class="form-control m-input"
                                id="role_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$item->category_id==$category->id?"selected":""}}>{{$category->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions kt-form__actions--right">
                            <div class="row">
                                <div class="col kt-align-left">
                                    <input type="submit" class="btn btn-brand" value="حفظ" name="submit">
                                    <a href="{{route('admin.accounts.index')}}" class="btn btn-secondary">الغاء</a>
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


