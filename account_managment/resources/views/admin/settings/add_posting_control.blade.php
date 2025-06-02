@extends('master')
@section('content')
<div class="contain">
    <div class="row">
        <!-- Table Section (8 columns) -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Auto Posting Control</h4>
                </div>
                <div class="panel-body">
                    <form action="{{route('posting_control_store')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="hidden" name="csrf_token_name" value="f3cbfd0f89c4a4f5cec254f9d292d092" />
                        <div class="modal-body">
                            <div role="tabpanel" class="tab-pane active" id="tab_staff_profile">
                                <div class="">
                                    <h4 class=""><b>General Posting Head</b></h4>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id">
                                            <label class="control-label">Gross Sales Head</label>
                                            <select name="saleshead" id="saleshead" class="selectpicker" data-width="100%">
                                                <option value="" disabled {{ !$existing_posting ? 'selected' : '' }}>Select...</option>
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{ $account_controls->accountscode }}"
                                                    {{ $existing_posting && $existing_posting->saleshead == $account_controls->accountscode ? 'selected' : '' }}>
                                                    {{ $account_controls->accountsheadname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id">
                                            <label class="control-label">Sales Discount Head</label>
                                            <select name="salesdiscounthead" id="salesdiscounthead" class="selectpicker" data-width="100%">
                                                <option value="" disabled {{ !$existing_posting ? 'selected' : '' }}>Select...</option>
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{ $account_controls->accountscode }}"
                                                    {{ $existing_posting && $existing_posting->salesdiscounthead == $account_controls->accountscode ? 'selected' : '' }}>
                                                    {{ $account_controls->accountsheadname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id">
                                            <label class="control-label">Sales Return Head</label>
                                            <select name="salesreturnhead" id="salesreturnhead" class="selectpicker" data-width="100%">
                                                <option value="" disabled {{ !$existing_posting ? 'selected' : '' }}>Select...</option>
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{ $account_controls->accountscode }}"
                                                    {{ $existing_posting && $existing_posting->salesreturnhead == $account_controls->accountscode ? 'selected' : '' }}>
                                                    {{ $account_controls->accountsheadname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Sales Commission Payable Head:</label>
                                            <select name="salescommissionhead" id="" class="selectpicker" data-width="100%">
                                                <option value="" disabled {{ !$existing_posting ? 'selected' : '' }}>Select...</option>
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{ $account_controls->accountscode }}"
                                                    {{ $existing_posting && $existing_posting->salescommissionhead == $account_controls->accountscode ? 'selected' : '' }}>
                                                    {{ $account_controls->accountsheadname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Sales Commission Expense Head:</label>
                                            <select name="salescommission_expense" id="" class="selectpicker" data-width="100%">
                                                <option value="" disabled {{ !$existing_posting ? 'selected' : '' }}>Select...</option>
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{ $account_controls->accountscode }}"
                                                    {{ $existing_posting && $existing_posting->salescommission_expense == $account_controls->accountscode ? 'selected' : '' }}>
                                                    {{ $account_controls->accountsheadname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Cost of Sales Head:</label>
                                            <select name="cost_of_sales" id="" class="selectpicker" data-width="100%">
                                                <option value="" disabled {{ !$existing_posting ? 'selected' : '' }}>Select...</option>
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{ $account_controls->accountscode }}"
                                                    {{ $existing_posting && $existing_posting->cost_of_sales == $account_controls->accountscode ? 'selected' : '' }}>
                                                    {{ $account_controls->accountsheadname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Merchandise Inventory Head:</label>
                                            <select name="fginventoryhead" id="" class="selectpicker" data-width="100%">
                                                <option value="" disabled {{ !$existing_posting ? 'selected' : '' }}>Select...</option>
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{ $account_controls->accountscode }}"
                                                    {{ $existing_posting && $existing_posting->fginventoryhead == $account_controls->accountscode ? 'selected' : '' }}>
                                                    {{ $account_controls->accountsheadname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Default Cash Account Head:</label>
                                            <select name="cashaccounthead" id="" class="selectpicker" data-width="100%">
                                                <option value="" disabled {{ !$existing_posting ? 'selected' : '' }}>Select...</option>
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{ $account_controls->accountscode }}"
                                                    {{ $existing_posting && $existing_posting->cashaccounthead == $account_controls->accountscode ? 'selected' : '' }}>
                                                    {{ $account_controls->accountsheadname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" app-field-wrapper="account_detail_type_id">
                                            <label class="control-label">Central Store Location (HQ):</label>
                                            <select name="defaultbranch" id="" class="selectpicker" data-width="100%">
                                                <option value="" disabled {{ !$existing_posting ? 'selected' : '' }}>Select...</option>
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{ $account_controls->accountscode }}"
                                                    {{ $existing_posting && $existing_posting->defaultbranch == $account_controls->accountscode ? 'selected' : '' }}>
                                                    {{ $account_controls->accountsheadname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane active" id="tab_staff_profile">

                                <div class="panel-head">
                                    <hr>
                                    <h4 class=""><b>Reciveable/Payable</b></h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Account Receiveable Head:</label>
                                            <select name="accountsreceivablehead" id="" class="selectpicker" data-width="100%">
                                                <option value="" disabled {{ !$existing_posting ? 'selected' : '' }}>Select...</option>
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{ $account_controls->accountscode }}"
                                                    {{ $existing_posting && $existing_posting->accountsreceivablehead == $account_controls->accountscode ? 'selected' : '' }}>
                                                    {{ $account_controls->accountsheadname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Accounts Payable Head:</label>
                                            <select name="accountspayablehead" id="" class="selectpicker" data-width="100%">
                                                <option value="" disabled {{ !$existing_posting ? 'selected' : '' }}>Select...</option>
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{ $account_controls->accountscode }}"
                                                    {{ $existing_posting && $existing_posting->accountspayablehead == $account_controls->accountscode ? 'selected' : '' }}>
                                                    {{ $account_controls->accountsheadname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div role="tabpanel" class="tab-pane active" id="tab_staff_profile">
                                <div class="">
                                    <hr>
                                    <h4 class=""><b>Advance</b></h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Advance from Customer:</label>
                                             <select name="advance_from_customer" id="" class="selectpicker" data-width="100%">
                                                <option value="" disabled {{ !$existing_posting ? 'selected' : '' }}>Select...</option>
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{ $account_controls->accountscode }}"
                                                    {{ $existing_posting && $existing_posting->advance_from_customer == $account_controls->accountscode ? 'selected' : '' }}>
                                                    {{ $account_controls->accountsheadname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Advance to Vendor:</label>
                                            <select name="advance_to_vendor" id="" class="selectpicker" data-width="100%">
                                                <option value="" disabled {{ !$existing_posting ? 'selected' : '' }}>Select...</option>
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{ $account_controls->accountscode }}"
                                                    {{ $existing_posting && $existing_posting->advance_to_vendor == $account_controls->accountscode ? 'selected' : '' }}>
                                                    {{ $account_controls->accountsheadname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane active" id="tab_staff_profile">
                                <div class="">
                                    <hr>
                                    <h4 class=""><b>Price Protection Heads</b></h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Debit Head:</label>
                                            <select name="pp_claim_debit_head" id="" class="selectpicker" data-width="100%">
                                                <option value="" disabled {{ !$existing_posting ? 'selected' : '' }}>Select...</option>
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{ $account_controls->accountscode }}"
                                                    {{ $existing_posting && $existing_posting->pp_claim_debit_head == $account_controls->accountscode ? 'selected' : '' }}>
                                                    {{ $account_controls->accountsheadname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Credit Head:</label>
                                            <select name="pp_claim_credit_head" id="" class="selectpicker" data-width="100%">
                                                <option value="" disabled {{ !$existing_posting ? 'selected' : '' }}>Select...</option>
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{ $account_controls->accountscode }}"
                                                    {{ $existing_posting && $existing_posting->pp_claim_credit_head == $account_controls->accountscode ? 'selected' : '' }}>
                                                    {{ $account_controls->accountsheadname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane active" id="tab_staff_profile">
                                <div class="">
                                    <hr>
                                    <h4 class=""><b>Credit Note Heads</b></h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Debit Head:</label>
                                            <select name="credit_note_debit_head" id="" class="selectpicker" data-width="100%">
                                                <option value="" disabled {{ !$existing_posting ? 'selected' : '' }}>Select...</option>
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{ $account_controls->accountscode }}"
                                                    {{ $existing_posting && $existing_posting->credit_note_debit_head == $account_controls->accountscode ? 'selected' : '' }}>
                                                    {{ $account_controls->accountsheadname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Credit Head:</label>
                                            <select name="credit_note_credit_head" id="" class="selectpicker" data-width="100%">
                                                <option value="" disabled {{ !$existing_posting ? 'selected' : '' }}>Select...</option>
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{ $account_controls->accountscode }}"
                                                    {{ $existing_posting && $existing_posting->credit_note_credit_head == $account_controls->accountscode ? 'selected' : '' }}>
                                                    {{ $account_controls->accountsheadname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane active" id="tab_staff_profile">
                                <div class="">
                                    <hr>
                                    <h4 class=""><b>Credit Note Heads</b></h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Gross Sales Head:</label>
                                            <select name="" id="" class="selectpicker" data-width="100%">
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{$account_controls->accountscode}}">{{$account_controls->accountsheadname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Sales Discount Head:</label>
                                            <select name="" id="" class="selectpicker" data-width="100%">
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{$account_controls->accountscode}}">{{$account_controls->accountsheadname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Sales Return Head:</label>
                                            <select name="" id="" class="selectpicker" data-width="100%">
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{$account_controls->accountscode}}">{{$account_controls->accountsheadname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Sales Commission Payable Head:</label>
                                            <select name="" id="" class="selectpicker" data-width="100%">
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{$account_controls->accountscode}}">{{$account_controls->accountsheadname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Sales Commission Expense Head:</label>
                                            <select name="" id="" class="selectpicker" data-width="100%">
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{$account_controls->accountscode}}">{{$account_controls->accountsheadname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label class="control-label">Cost of Sales Head:</label>
                                            <select name="" id="" class="selectpicker" data-width="100%">
                                                @foreach ($account_control as $account_controls)
                                                <option value="{{$account_controls->accountscode}}">{{$account_controls->accountsheadname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        @endsection