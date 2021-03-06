@extends('admin.layouts.app')

@section('content')
    <div class="col-12">
        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <form action="" id="kt_search">
                    <div class="row kt-margin-b-20">
                        <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                            <input type="text" name="search_abedmq" value="{{request('search_abedmq')}}" id="search_abedmq" class="form-control kt-input"
                                   placeholder="بحث ..">
                        </div>
                        <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                            <select required name="category_id" class="form-control m-input"
                                    id="category_id">
                                <option value="">اختر التصنيف</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{request('category_id')==$category->id?"checked":""}}>{{$category->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                            <button class="btn btn-primary btn-brand--icon" type="submit">
                        <span>
                            <i class="la la-search"></i>
                            <span>بحث</span>
                        </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="kt-portlet kt-portlet--mobile">
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
                            <a href="{{route('admin.accounts.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                اضافة
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('الاسم')}}</th>
                        <th>{{__('التصنيف')}}</th>
                        <th>{{__('تاريخ الانشاء')}}</th>
                        <th class="desktop tablet-l tablet-p">{{__('خيارات')}}</th>
                    </tr>
                    </thead>
                </table>


                <!--end: Datatable -->
            </div>

        </div>
        <img src='./loader.gif' width='150px' height='70px' id='loader-datatable' style="opacity: 0"/>
    </div>

@endsection

@push('headerjs')
    <script>
        var url = '{{url()->current()}}';
        var columns = [
            {data: 'id'},
            {data: 'name', name: 'name'},
            {data: 'category.name', name: 'name'},

            {data: 'created_at', name: 'created_at'},
            {data: 'Action'},
        ];

        var columnDefs = [


            {
                targets: -1,
                // title: 'خيارات',
                orderable: false,
                render: function (data, type, full, meta) {

                    let action = '';

                    return action+`
                         <a href="admin/accounts/` + full.id + `/edit"  class="mr-1 btn btn-sm btn-clean  btn-icon btn-icon-md" title="edit">
                          <i class="la la-edit"></i>

                        </a>

                        <a href="admin/accounts/` + full.id + `" class="mr-1 btn btn-sm btn-clean destroy  btn-icon btn-icon-md" title="edit">
                             <i class="la la-times"></i>
                        </a>


`;
                },
            },

        ];
    </script>
    <script src="panel/assets/app/custom/general/crud/datatables/data-sources/ajax-server-side.js"
            type="text/javascript"></script>

@endpush
