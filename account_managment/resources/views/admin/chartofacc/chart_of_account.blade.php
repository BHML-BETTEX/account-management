@extends('master')
@section('content')

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

    table tr:hover {
        background-color: #f1faff;
    }

    .table th,
    .table td {
        vertical-align: middle;
    }

    .btn-sm {
        padding: 4px 10px;
        font-size: 13px;
    }
</style>


<div class="contain">
    <div class="widget-content">
        <div class="row align-items-center g-2">

            <!-- Button Group -->
            <div class="col-lg-6 col-md-12 mb-3 d-flex flex-wrap gap-2">
                <div class="row">
                    <div class="col-lg-5">
                        <button type="button" class="btn btn-primary px-4 py-2" data-toggle="modal" data-target="#printview">
                            Print View
                        </button>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-primary px-4 py-2" data-toggle="modal" data-target="#account-modal">
                            New Account
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="background-color: #fff; padding: 20px; border-radius: 8px;">
                <div class="panel-heading">
                    <h4 class="panel-title" style="display: inline-block; margin-right: 15px; vertical-align: middle;">Data Table</h4>
                    <div id="datatable-header-controls" class="panel-heading-controls">
                        <input type="text" id="customSearchInput" class="form-control" placeholder="Search...">
                        <button id="customSearchButton" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                    <div style="clear: both;"></div> {{-- Added to clear floats within the panel-heading --}}
                </div>
                <div class="panel-body table-responsive">
                    <table id="mainHeadTable" class="table table-accounts table-striped table-bordered" style="width:100%">
                        <thead style="background-color: #e5f4f9;">
                            <tr>
                                <th>#</th>
                                <th>Main Head</th>
                                <th>Account Code</th>
                                <th>Account Head Name</th>
                                <th>Category</th>
                                <th>Current Balance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ac_cartofacc as $key => $ac_cartofaccs)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $ac_cartofaccs->mainheadcode }}</td>
                                <td>{{ $ac_cartofaccs->accountscode }}</td>
                                <td>{{ $ac_cartofaccs->accountsheadname }}</td>
                                <td>
                                    @php $cat = strtoupper($ac_cartofaccs->category); @endphp
                                    @if($cat === 'C')
                                    Cash
                                    @elseif($cat === 'B')
                                    Bank
                                    @else
                                    GL
                                    @endif
                                </td>
                                <td>{{$ac_cartofaccs->balance}}</td>
                                <td>
                                    <button
                                        type="button"
                                        class="label label-success edit-btn"
                                        data-toggle="modal"
                                        data-target="#account-modaledit"
                                        data-id="{{ $ac_cartofaccs->coa_id }}"
                                        data-mainheadid="{{ $ac_cartofaccs->mainhead_id }}"
                                        data-mainheadcode="{{ $ac_cartofaccs->mainheadcode }}"
                                        data-accountsheadname="{{ $ac_cartofaccs->accountsheadname }}"
                                        data-category="{{ $ac_cartofaccs->category }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
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

<!-- Add Account Modal  -->
<div class="modal fade" id="account-modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Account</h4>
            </div>
            <form action="{{route('chart_of_account_store')}}" method="post" accept-charset="utf-8">
                @csrf
                <div class="modal-body">

                    <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label for="account_detail_type_id" class="control-label">Main Head </label>
                        <select id="mainheadcode" name="mainheadcode" class="selectpicker" data-width="100%">
                            <option value="">Select</option>
                            @foreach($main_head as $key=>$main_heads){
                            <option value="{{$main_heads->mainheadcode}}">{{$main_heads->mainheadname}}</option>
                            }
                            @endforeach
                        </select>
                    </div>

                    <!--<div class="form-group" app-field-wrapper="name"><input type="hidden" id="name" name="mainhead_id" class="form-control" value=""></div>-->

                    <div class="form-group" app-field-wrapper="name"><label for="name" class="control-label">Account Head:</label><input type="text" id="name" name="accountsheadname" class="form-control" value=""></div>

                    <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label for="account_detail_type_id" class="control-label">Category</label>
                        <select name="category" class="selectpicker" data-width="100%">
                            <option value="">Select</option>
                            @foreach($ac_category as $key=>$ac_categorys){
                            <option value="{{$ac_categorys->short_name}}">{{$ac_categorys->long_name}}</option>
                            }
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info btn-submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--printview-->
<div class="modal fade" id="printview">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chart of Accounts - Print View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="font-size: 1.5rem;">&times;</button>
            </div>
            <div class="modal-body">
                @foreach($grouped as $typeName => $controls)
                <h5>{{ $typeName }}</h5>
                @foreach($controls as $controlName => $mainheads)
                <h6>{{ $controlName }}</h6>
                @foreach($mainheads as $mainheadName => $accounts)
                <h6>{{ $mainheadName }}</h6>
                <table class="table table-bordered table-sm" style="width: 100%; border-collapse: collapse; page-break-inside: auto;">
                    <thead style="background-color: #f8f9fa;">
                        <tr>
                            <th style="width: 20%; padding: 6px;">Account Code</th>
                            <th style="padding: 6px;">Account Name</th>
                            <th style="width: 15%; text-align: right; padding: 6px;">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $subtotal = 0; @endphp
                        @foreach($accounts as $account)
                        <tr style="page-break-inside: avoid;">
                            <td style="padding: 6px;">{{ $account->accountscode }}</td>
                            <td style="padding: 6px;">{{ $account->accountsheadname }}</td>
                            <td style="padding: 6px; text-align: right;">{{ number_format($account->balance, 2) }}</td>
                        </tr>
                        @php $subtotal += $account->balance; @endphp
                        @endforeach
                        <tr style="font-weight: bold; background-color: #f1f1f1;">
                            <td colspan="2" style="text-align: right; padding: 6px;">Total: {{ $mainheadName }}</td>
                            <td style="padding: 6px; text-align: right;">{{ number_format($subtotal, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
                @endforeach
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>



<!-- Edit Account Modal  -->
<div class="modal fade" id="account-modaledit">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Account</h4>
            </div>
            <form action="{{ route('chart_of_account_update') }}" method="post">
                @csrf

                <div class="modal-body">
                    <input type="hidden" name="coa_id" id="edit_coa_id">
                    <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label for="account_detail_type_id" class="control-label">Main Head</label>
                        <select id="edit_mainhead_id" name="mainhead_id" class="selectpicker" data-width="100%">
                            @foreach($main_head as $main_heads)
                            <option value="{{$main_heads->mainhead_id}}">{{$main_heads->mainheadname}}</option>
                            @endforeach
                        </select>

                        <input type="hidden" name="mainheadcode" id="edit_mainheadcode" class="form-control">

                        <div class="form-group" app-field-wrapper="name"><label for="name" class="control-label">Account Head:</label>
                            <input type="text" name="accountsheadname" id="edit_accountsheadname" class="form-control">

                            <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label for="account_detail_type_id" class="control-label">Category</label>
                                <select name="category" id="edit_category" class="selectpicker" data-width="100%">
                                    @foreach($ac_category as $ac_categorys)
                                    <option value="{{$ac_categorys->id}}">{{$ac_categorys->long_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info btn-submit">Update</button>
                        </div>
                    </div>

            </form>

        </div>
    </div>
</div>

<!-- Add MainHead -->
<div class="modal fade" id="mainhead">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Account</h4>
            </div>
            <form action="{{ route('chart_of_account_update') }}" method="post">
                @csrf

                <div class="modal-body">
                    <input type="hidden" name="coa_id" id="edit_coa_id">
                    <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label for="account_detail_type_id" class="control-label">Main Head</label>
                        <select id="edit_mainhead_id" name="mainhead_id" class="selectpicker" data-width="100%">
                            @foreach($main_head as $main_heads)
                            <option value="{{$main_heads->mainhead_id}}">{{$main_heads->mainheadname}}</option>
                            @endforeach
                        </select>

                        <input type="hidden" name="mainheadcode" id="edit_mainheadcode" class="form-control">

                        <div class="form-group" app-field-wrapper="name"><label for="name" class="control-label">Account Head:</label>
                            <input type="text" name="accountsheadname" id="edit_accountsheadname" class="form-control">

                            <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label for="account_detail_type_id" class="control-label">Category</label>
                                <select name="category" id="edit_category" class="selectpicker" data-width="100%">
                                    @foreach($ac_category as $ac_categorys)
                                    <option value="{{$ac_categorys->id}}">{{$ac_categorys->long_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info btn-submit">Update</button>
                        </div>
                    </div>

            </form>

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
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-btn');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('edit_coa_id').value = this.dataset.id;
                document.getElementById('edit_mainhead_id').value = this.dataset.mainheadid;
                document.getElementById('edit_mainheadcode').value = this.dataset.mainheadcode;
                document.getElementById('edit_accountsheadname').value = this.dataset.accountsheadname;
                document.getElementById('edit_category').value = this.dataset.category;

                // Refresh selectpicker if you're using Bootstrap-select
                $('.selectpicker').selectpicker('refresh');
            });
        });
    });
</script>
@endpush