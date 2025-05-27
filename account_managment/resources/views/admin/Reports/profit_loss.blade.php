@extends ('master')
@section('content')
<div class="panel_s">
    <div class="panel-body">
        <h4 class="no-margin font-bold">Profit And Loss Accounts</h4>
        <hr />
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <form action="https://democrm.i2technologies.net/admin/accounting/view_report" id="filter-form" method="post" accept-charset="utf-8">
                        <input type="hidden" name="csrf_token_name" value="f253e31a81c9f81708226e5c3185c4a7" />
                        <div class="col-md-3">
                            <div class="form-group" app-field-wrapper="from_date"><label for="from_date" class="control-label">Statment Date</label>
                                <div class="input-group date"><input type="text" id="from_date" name="from_date" class="form-control datepicker" value="2025-01-01" autocomplete="off">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar calendar-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">

                            <input type="hidden" name="type" value="balance_sheet_comparison" />
                            <button type="submit" class="btn btn-info btn-submit mtop25">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right mtop25">
                    <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-print"></i> <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="#" onclick="printDiv(); return false;">
                                Export to PDF </a>
                        </li>
                        <li>
                            <a href="#" onclick="printExcel(); return false;">
                                Export to Excel </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection