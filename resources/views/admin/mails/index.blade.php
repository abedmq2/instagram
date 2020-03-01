@extends('admin.layouts.app')

@section('content')
    {{--    <div class="alert alert-light alert-elevate" role="alert">--}}
    {{--        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>--}}
    {{--        <div class="alert-text">--}}
    {{--            With server-side processing enabled, all paging, searching, ordering actions that DataTables performs are handed off to a server where an SQL engine (or similar) can perform these actions on the large data set.--}}
    {{--            See official documentation <a class="kt-link kt-font-bold" href="https://datatables.net/examples/data_sources/server_side.html" target="_blank">here</a>.--}}
    {{--        </div>--}}
    {{--    </div>--}}
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

        </div>
        <div class="kt-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable responsive " id="kt_table_1">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>تاريخ الاشتراك</th>
                </tr>
                </thead>
            </table>

            <!--end: Datatable -->
        </div>
    </div>
    </div>
@endsection

@push('headerjs')
    <script>
        var export_btn = true;
        var url='{{url()->current()}}';
        var columns=  [
            {data: 'id',name:'id'},
            {data: 'name',name:'username'},
            {data: 'email',name:'email'},
            {data: 'created_at',name:'created_at'},
        ];

        var columnDefs=[
            {
                targets: 1,
                // title: 'خيارات',
                orderable: false,
                render: function(data, type, full, meta) {
                    return data;
                },
            },

        ];
        var buttons_local= [
            {
                extend: 'excel',
                className: 'btn-green'
            }
        ];
    </script>
    <style>
        .btn-green{
            color: #fff!important;
            background-color: #0abb87 !important;
            border-color: #0abb87!important;
        }
        .btn-green:hover {
            color: #fff!important;
            background-color: #08976d!important;
            border-color: #078b64!important;
        }
    </style>
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.css">
    <script src="//cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
    <script src="panel/assets/app/custom/general/crud/datatables/data-sources/ajax-server-side.js" type="text/javascript"></script>

@endpush
