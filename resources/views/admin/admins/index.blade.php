@extends('admin.layouts.app')

@section('content')
    <div class="col-12">
        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <form action="" id="kt_search">
                    <div class="row kt-margin-b-20">
                        <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                            <input type="text" name="search" id="search_abedmq" class="form-control kt-input"
                                   placeholder="بحث ..">
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
                            <a href="{{route('admin.admins.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                اضافة
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="kt-portlet__body">

                <form action="{{url()->current()}}" class="confirmForm" method="get">
                    <table class="table table-striped- table-bordered table-hover responsive table-checkable "
                           id="kt_table_1">
                        <thead>
                        <tr>
                            <th width="50px">
                                #
                            </th>
                            <th>الاسم</th>
                            <th class="none">البريد الإلكتروني</th>
                            <th>الصلاحية</th>
                            <th>اذن النشر</th>
                            <th>الحالة</th>
                            <th width="150px">تاريخ الانشاء</th>
                            <th width="160px"></th>
                        </tr>
                        </thead>
                    </table>

                </form>

                <!--end: Datatable -->
            </div>
        </div>
    </div>
@endsection

@push('headerjs')
    <script>
        var url = '{{url()->current()}}';
        var search = false;
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'first_name'},
            {data: 'email', name: 'email'},
            {data: 'role.name', name: 'role'},
            {data: 'automatic_add', name: 'automatic_add'},
            {data: 'is_blocked', name: 'is_blocked'},

            {data: 'created_at', name: 'created_at'},
            {data: 'Action'},
        ];

        var columnDefs = [
            {
                targets: -1,
                // title: 'خيارات',
                orderable: false,
                render: function (data, type, full, meta) {
                    if (full.id !== '1') {
                        let action = '';
                        if (full.role.name == 'User') {
                            action = `<a href="admin/admins/` + full.id + `/edit?action=` + (full.automatic_add ? "downgrade" : "upgrade") + `" class="mr-1 btn btn-sm  btn-clean  btn-icon btn-icon-sm confirm " title="` + (full.automatic_add ? "الغاء الترقية" : "ترقية") + `">
                        <i class="la ` + (full.automatic_add ? "la-eye-slash" : "la-eye") + `"></i></a>`;

                        }
                        return action +
                            `
                        <a href="admin/admins/` + full.id + `/edit" class="mr-1 btn btn-sm  btn-clean  btn-icon btn-icon-sm " title="edit">
                          <i class="la la-edit"></i></a>

                        <a href="admin/admins/` + full.id + `" class="btn btn-sm btn-clean destroy btn-icon btn-icon-md" title="delete">
                          <i class="la la-times"></i>
                        </a>`;
                    } else
                        return ``;
                },
            },
            {
                targets: -3,

                render: function (data, type, full, meta) {
                    if (full.id !== '1')

                        return `
                            <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--danger">
                                <label>
                                    <input type="checkbox" data-id=` + full.id + ` class="changeStatus"  ` + (data == '1' ? "checked" : "") + `>
                                    <span></span>
                                </label>
                            </span>
                            `;
                    return '';
                }
            },
            {
                targets: 4,

                render: function (data, type, full, meta) {

                    return `
                            <span class="kt-badge "` + (data ? "kt-badge--success" : "kt-badge--danger") + `>
                              ` + (data ? "لا يحتاج" : "يحتاج") + `
                            </span>
                            `;
                }
            }


        ];
    </script>
    <script src="panel/assets/app/custom/general/crud/datatables/data-sources/ajax-server-side.js"
            type="text/javascript"></script>

@endpush
