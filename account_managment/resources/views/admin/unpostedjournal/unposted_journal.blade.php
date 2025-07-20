@extends('master')
@section ('content')

{{-- Custom CSS for alignment within the panel-heading --}}
<style>
    /* Float the DataTables controls to the right within the panel-heading */
    .panel-heading-controls {
        float: right;
        display: inline-block;
        vertical-align: middle;
        /* Aligns them vertically with the title */
    }

    /* Clearfix for the panel-heading to properly contain floated elements */
    .panel-heading::after {
        content: "";
        display: table;
        clear: both;
    }

    /* Style the custom search input field */
    #customSearchInput {
        width: 150px;
        /* Adjust width as needed */
        padding: 6px 12px;
        /* Bootstrap default input padding */
        border: 1px solid #ccc;
        /* Bootstrap default input border */
        border-radius: 4px;
        /* Bootstrap default border-radius */
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        /* Bootstrap default shadow */
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        /* Bootstrap default transition */
        display: inline-block;
        /* Keep it inline with the button */
        vertical-align: middle;
        /* Align with button */
    }

    /* Style the custom search button */
    #customSearchButton {
        margin-left: 5px;
        /* Space between input and button */
        vertical-align: middle;
        /* Align with input */
    }

    /* Style the DataTables buttons container */
    .dt-buttons {
        margin: 0 0 0 10px !important;
        /* Remove default margins, add left margin for spacing */
        display: inline-block;
        /* Ensure it stays inline */
        vertical-align: middle;
    }

    /* Ensure dropdowns align to the right of their button */
    .dt-buttons .dropdown-menu {
        left: auto;
        right: 0;
        min-width: 160px;
        /* Ensure dropdown has a reasonable width */
    }
</style>

<div class="contain">
    <div class="widget-content">
        <div class="bg-white p-3 rounded shadow-sm">
            <div class="d-flex align-items-center flex-nowrap justify-content-between">


            </div>
        </div>
    </div>


    <div class="row">
        <!-- Table Section (8 columns) -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title" style="display: inline-block; margin-right: 15px; vertical-align: middle;">Data Table</h4>
                    <div id="datatable-header-controls" class="panel-heading-controls">
                        <input type="text" id="customSearchInput" class="form-control" placeholder="Search...">
                        <button id="customSearchButton" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="mainHeadTable" class="table table-accounts table-striped table-bordered" style="width:100%">
                        <thead style="background-color: #e5f4f9">
                            <tr>
                                <th>Voucher No</th>
                                <th>Date Of Entry</th>
                                <th>Narations</th>
                                <th>Posted</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=>$datamain)
                            <tr>
                                <td>{{$datamain->voucherno}}</td>
                                <td>{{$datamain -> dateoftransaction}}</td>
                                <td>{{$datamain->particulars}}</td>
                                <td>
                                    <label class="onoffswitch">
                                        <input type="checkbox" class="onoffswitch-checkbox toggle-posted"
                                            id="acc_enable_account_numbers_{{ $datamain->id }}"
                                            data-id="{{ $datamain->id }}"
                                            {{ $datamain->posted ? 'checked' : '' }}>
                                        <span class="onoffswitch-label" data-on="ON" data-off="OFF"></span>
                                    </label>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('script')
{{-- jQuery (REQUIRED by Bootstrap JS and DataTables) --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

{{-- Bootstrap JS (REQUIRED by Bootstrap CSS and DataTables Bootstrap integration) --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJgSSz5+0eU1b25j5K5T0yX7z7o0yJ1z0W3P7J5X9C3L7N9N7H5K7G7L7H5S0J1Z" crossorigin="anonymous"></script>

{{-- DataTables Core JS --}}
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.25/datatables.min.js"></script>

{{-- DataTables Buttons Extension JS and its dependencies --}}
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> {{-- For Excel --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> {{-- For PDF --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> {{-- For PDF --}}
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script> {{-- For CSV, Excel, PDF --}}
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script> {{-- For Print --}}
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script> {{-- For Column Visibility --}}


<script>
    $(document).ready(function() {
        // Initialize Tooltips
        $('[data-toggle="tooltip"]').tooltip();

        // Initialize DataTables
        var table = $('#mainHeadTable').DataTable({
            retrieve: true, // Prevents reinitialization error

            // 'dom' no longer includes 'f' (filter) because we have a custom search input
            dom: 'rt<"bottom"lip><"clear">',
            pageLength: 10,
            lengthChange: true,
            searching: true, // Keep 'searching: true' to allow the .search() method to work
            paging: true,
            info: true,

            // Customize language strings
            language: {
                info: "Showing _START_ to _END_ of _TOTAL_ items", // Renamed 'entries' to 'items' here
                infoEmpty: "Showing 0 to 0 of 0 items",
                infoFiltered: "(filtered from _MAX_ total items)",
                lengthMenu: "_MENU_", // Changed to _MENU_ only to remove "Show X entries" text
                search: "", // Keep empty if you only want the icon in your custom search input
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous"
                }
            },

            buttons: [{
                    extend: 'collection',
                    // Use icon only for export, keep caret for dropdown
                    text: '<i class="fa fa-download"></i> <span class="caret"></span>',
                    className: 'btn btn-default buttons-collection dropdown-toggle',
                    buttons: [{
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-text-o"></i> CSV',
                            titleAttr: 'CSV',
                            exportOptions: {
                                columns: ':not(:last-child)' // Exclude the last column (Action)
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            text: '<i class="fa fa-file-excel-o"></i> Excel',
                            titleAttr: 'Excel',
                            exportOptions: {
                                columns: ':not(:last-child)' // Exclude the last column (Action)
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf-o"></i> PDF',
                            titleAttr: 'PDF',
                            exportOptions: {
                                columns: ':not(:last-child)' // Exclude the last column (Action)
                            }
                        },
                        {
                            extend: 'print',
                            text: '<i class="fa fa-print"></i> Print',
                            titleAttr: 'Print',
                            exportOptions: {
                                columns: ':not(:last-child)' // Exclude the last column (Action)
                            }
                        },
                        {
                            extend: 'copyHtml5',
                            text: '<i class="fa fa-files-o"></i> Copy',
                            titleAttr: 'Copy',
                            exportOptions: {
                                columns: ':not(:last-child)' // Exclude the last column (Action)
                            }
                        }
                    ]
                },
                {
                    // Use icon only for refresh
                    text: '<i class="fa fa-refresh"></i>',
                    className: 'btn btn-default',
                    action: function(e, dt, node, config) {
                        // Clear the custom search input value on refresh
                        $('#customSearchInput').val('');
                        dt.search('').draw(); // Clear DataTables search and redraw
                    }
                }
            ],
            // Append DataTables generated buttons to your custom header controls div
            initComplete: function() {
                var api = this.api();
                api.buttons().container().appendTo('#datatable-header-controls');
            }
        });

        // Event listener for the custom search button
        $('#customSearchButton').on('click', function() {
            var searchValue = $('#customSearchInput').val();
            table.search(searchValue).draw(); // Apply the search to the DataTable
        });

        // Optional: Trigger search when 'Enter' key is pressed in the custom search input
        $('#customSearchInput').on('keyup', function(e) {
            if (e.key === 'Enter' || e.keyCode === 13) {
                $('#customSearchButton').click(); // Simulate a click on the search button
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('.toggle-posted').change(function () {
            var checkbox = $(this);
            var id = checkbox.data('id');
            var posted = checkbox.is(':checked') ? 1 : 0;

            $.ajax({
                url: '{{ route("update.posted.status") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    posted: posted
                },
                success: function (response) {
                    if (posted === 1) {
                        // Remove the table row if posted
                        checkbox.closest('tr').fadeOut(300, function () {
                            $(this).remove();
                        });
                    }
                },
                error: function () {
                    alert('Failed to update status');
                    // Revert checkbox state on failure
                    checkbox.prop('checked', !posted);
                }
            });
        });
    });
</script>


@endpush