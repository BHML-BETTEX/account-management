@extends('master')

@section('content')
<div class="contain">
    <div class="widget-content">
        <div>
            <button class="btn btn-primary" data-original-title="Refresh Chart Of Account">
                <i class="icon icon-refresh"><a class="text-white" href="{{route('add_posting_control')}}">add</a></i>
            </button>
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
                        <thead style="background-color: #e5f4f9">
                            <tr>
                                <th>#</th>
                                <th>Sales Head</th>
                                <th>Sales Return Head</th>
                                <th>Sales Discoun Head</th>
                                <th>Sales Commission Head</th>
                                <th>Sales Commission Expense</th>
                                <th>Fgpurchase Head</th>
                                <th>Fginventory Head</th>
                                <th>Account Sreceivable Head</th>
                                <th>Accounts Payable Head</th>
                                <th>Cash Account Head</th>
                                <th>Bank Account Head</th>
                                <th>Default Branch</th>
                                <th>Cost Of Sales</th>
                                <th>Advance To Vendor</th>
                                <th>Advance From Customer</th>
                                <th>Pp Claim Debit Head</th>
                                <th>Pp Claim Credit Head</th>
                                <th>Credit Note Debit Head</th>
                                <th>Credit Note Credit Head</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posting_control as $posting_controls)
                                <tr>
                                    <td></td>
                                    <td>{{$posting_controls->saleshead}}</td>
                                    <td>{{$posting_controls->salesreturnhead}}</td>
                                    <td>{{$posting_controls->salesdiscounthead}}</td>
                                    <td>{{$posting_controls->salescommissionhead}}</td>
                                    <td>{{$posting_controls->salescommission_expense}}</td>
                                    <td>{{$posting_controls->fgpurchasehead}}</td>
                                    <td>{{$posting_controls->fginventoryhead}}</td>
                                    <td>{{$posting_controls->accountsreceivablehead}}</td>
                                    <td>{{$posting_controls->accountspayablehead}}</td>
                                    <td>{{$posting_controls->cashaccounthead}}</td>
                                    <td>{{$posting_controls->bankaccounthead}}</td>
                                    <td>{{$posting_controls->defaultbranch}}</td>
                                    <td>{{$posting_controls->cost_of_sales}}</td>
                                    <td>{{$posting_controls->advance_to_vendor}}</td>
                                    <td>{{$posting_controls->advance_from_customer}}</td>
                                    <td>{{$posting_controls->pp_claim_debit_head}}</td>
                                    <td>{{$posting_controls->pp_claim_credit_head}}</td>
                                    <td>{{$posting_controls->credit_note_debit_head}}</td>
                                    <td>{{$posting_controls->credit_note_credit_head}}</td>
                                    <td>
                                        <span class="label label-info">Edit</span>
                                        <span class="label label-danger">Delete</span>
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