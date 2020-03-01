"use strict";
var KTDatatablesDataSourceAjaxServer = function () {
    var initTable1 = function () {
        var table = $('#kt_table_1');

        // begin first table
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var buttons = [];
        if (typeof buttons_local !== 'undefined')
            buttons = buttons_local;

        console.log(buttons);
        var defaultColumnsDef = [];
        select_option = false;
        if (typeof selected !== 'undefined') {
            defaultColumnsDef.push([
                {
                    targets: 0,
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return `
                        <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid kt-checkbox--brand">
                            <input type="checkbox" name="ids[]" value="` + data + `" class="m-checkable">
                            <span></span>
                        </label>`;
                    },
                },
            ]);
            var select_option = {
                style: 'multi',
                selector: 'td:first-child .kt-checkable',
            }
        }

        if(typeof createdRow == 'undefined')
            var createdRow=function () {

            };

        var table2 = table = table.DataTable({
            createdRow:createdRow,
            responsive: {
                details: {
                    type: 'column',
                    target: 0,
                    renderer: function (api, rowIdx, columns) {
                        var data = $.map(columns, function (col, i) {
                            return col.hidden ?
                                '<tr data-dt-row="' + col.rowIndex + '" data-dt-column="' + col.columnIndex + '">' +
                                '<td>' + col.title + '</td> ' +
                                '<td>' + col.data + '</td>' +
                                '</tr>' :
                                '';
                        }).join('');

                        return data ?
                            $('<table/>').append(data) :
                            false;
                    }
                }
            },
            lengthMenu: [10, 25, 50, 100, 1000],
            pageLength: 10,
            search: false,
            buttons: buttons,

            // <'toolbar'f>
            dom: `
			<'row'<'col-sm-12'Btr>>
			<'row'<'col-sm-12 col-md-5'li><'col-sm-12 col-md-7 dataTables_pager'p>>`,
            // read more: https://datatables.net/examples/basic_init/dom.html

            select: select_option,
            headerCallback: function (thead, data, start, end, display) {
                if (typeof selected !== 'undefined')
                    thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid kt-checkbox--brand">
                        <input type="checkbox" value="" class="m-group-checkable">
                        <span></span>
                    </label>`;
                $('#loader').attr('class', 'la la-search');
                // $('#kt_table_1_wrapper').show();
                $('#kt_table_1').show();
                $('#table-loader').hide();
            },
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: url,
                type: 'GET',
                data: function (d) {

                    // parameters for custom backend script demo

                    d.search_abedmq = $('#search_abedmq').val();
                    d.category_id = $('#category_id').val();
                    d.account_id = $('#account_id').val();
                    d.gender = $('#gender').val();
                    d.analysis_gender = $('#analysis_gender').val();
                    d.addinfo = $('#addinfo').val();
                    d.status = $('#status').val();
                    d.analysis = $('#analysis').val();
                },
            },

            columns: columns,
            columnDefs: columnDefs.concat(defaultColumnsDef),
            language: {
                "sProcessing": "<img src='./loader.gif' height='25px'  id='loader-datatable'/>",
                "sLengthMenu": "اظهار _MENU_ ",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "ابحث:",
                "sUrl": "",
                "select": {
                    "rows": "%d عناصر مختارة"
                },
                "oPaginate": {
                    "sFirst": "الأول",
                    "sPrevious": "السابق",
                    "sNext": "التالي",
                    "sLast": "الأخير"
                },
                buttons: {
                    excel: "تصدير اكسل " + "<i style='margin-right: 5px' class='fa fa-file-excel'></i>",
                    pdf: "تصدير pdf"
                }
            }
        });
        $('#kt_table_1').show();

        table.on('change', '.m-group-checkable', function () {
            var set = $(this).closest('table').find('td:first-child .m-checkable');
            var checked = $(this).is(':checked');

            $(set).each(function () {
                if (checked) {
                    $(this).prop('checked', true);
                    table.rows($(this).closest('tr')).select();
                } else {
                    $(this).prop('checked', false);
                    table.rows($(this).closest('tr')).deselect();
                }
            });
        });

        table.on('change', '.m-checkable', function () {
            var checked = $(this).is(':checked');
            if (checked)
                table.rows($(this).closest('tr')).select();
            else
                table.rows($(this).closest('tr')).deselect();

        });

        $('#kt_search').submit(function (e) {
            e.preventDefault();
            $(this).find('#loader').attr('class', 'fa fa-spinner fa-spin');
            table2.ajax.reload(null, false);
        });

        return table;

    };


    return {

        //main function to initiate the module
        init: function () {
            var rs=  initTable1();
            if(!$('.dt-buttons').children().length){
                $('.dt-buttons').css('display','none');
            }
            return rs;
        },
        initTable1: initTable1,
    };

}();

// jQuery(document).ready(function () {
var datatable_table = KTDatatablesDataSourceAjaxServer.init();
// });
