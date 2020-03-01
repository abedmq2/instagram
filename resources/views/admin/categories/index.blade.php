@extends('admin.layouts.app')

@section('content')
{{--    @include('admin.one_input_form')--}}
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
                            <a href="{{route('admin.categories.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
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
                        <th>{{__('العنوان')}}</th>
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
                         <a href="admin/categories/` + full.id + `/edit" data-id=`+full.id+` data-name="`+full.name+`" class="mr-1 btn btn-sm btn-clean  btn-icon btn-icon-md" title="edit">
                          <i class="la la-edit"></i>

                        </a>

                        <a href="admin/categories/` + full.id + `" class="mr-1 btn btn-sm btn-clean destroy  btn-icon btn-icon-md" title="edit">
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
