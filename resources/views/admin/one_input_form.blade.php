<div class="col-12">
    <div class="kt-portlet  kt-portlet--mobile kt-portlet--collapsed" data-ktportlet="true" id="kt_portlet_tools_1">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                <h3 class="kt-portlet__head-title">
                    {{$title}}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{isset($route_create)?"javascript:;":get_constant_route('create')}}" id="btn-inline-form" data-ktportlet-tool="toggle"
                           class="btn btn-brand btn-elevate btn-icon-sm" aria-describedby="tooltip_j4i4r4nv3p">
                            <i class="la la-plus"></i>
                            اضافة
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin::Form-->
            <form method="POST" class="ajaxForm" id="validate" action="{{isset($route_create)?$route_create:get_constant_route('store')}}">
                @csrf

                <input type="hidden" id="id-inline-form" value="" name="id" class="">
                <div class="form-group row m-form__group {{$errors->any('name')?"has-danger":''}}">
                    <label for="name" class="col-md-2 text-right col-form-label">{{__('الاسم')}} :</label>
                    <div class="col-md-6">
                        <input type="text" required  name="name" class="form-control m-input"
                               id="name-inline-form"
                               aria-describedby="emailHelp" placeholder="{{__('ادخل')}} {{__('الاسم')}}" value="{{old('name')}}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">{{__('حفظ')}}
                            <i class="fa fa-spin fa-spinner loader"  style="display: none;"></i>
                        </button>
                        <a  type=""
                            class="btn btn-secondary">{{__('الغاء')}}</a>
                    </div>
                </div>


            </form>

        </div>
    </div>
</div>
