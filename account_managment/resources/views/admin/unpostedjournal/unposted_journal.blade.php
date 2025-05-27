@extends('master')
@section ('content')
<div class="contain">
    <div class="widget-content">
        <div class="bg-white p-3 rounded shadow-sm">
            <div class="d-flex align-items-center flex-nowrap justify-content-between">

                <!-- Left Side: Date filters and Filter button -->
                <div class="d-flex align-items-center gap-2 flex-nowrap">
                    <input type="date" id="start-date" class="form-control" name="start_date" style="width: 160px;">
                    <input type="date" id="end-date" class="form-control" name="end_date" style="width: 160px;">
                    <button class="btn btn-info text-white form-control" style="width: 100px;">
                        Filter
                    </button>
                </div>

                <!-- Spacer (Optional, if needed manually) -->
                <div style="width: 20px;"></div>

                <!-- Right Side: Action buttons -->
                <div class="d-flex align-items-center gap-2 flex-nowrap ms-3">
                    <button class="btn btn-primary text-white form-control" style="width: 140px;" data-toggle="modal" data-target="#account-modal">
                        Add Adjustment
                    </button>
                    <button class="btn btn-success text-white form-control" style="width: 140px;" data-toggle="modal" data-target="#account-modal">
                        Post Selected
                    </button>
                    <button class="btn btn-primary text-white form-control" style="width: 160px;" data-toggle="modal" data-target="#account-modal">
                        Post All Selected
                    </button>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <!-- Table Section (8 columns) -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Data Table</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Voucher No</th>
                                <th>Date Of Entry</th>
                                <th>Narations</th>
                                <th>Posted</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection