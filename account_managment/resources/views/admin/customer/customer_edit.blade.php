@extends('master')
@section('content')
<div class="contain">
    <div class="row">
        <!-- Table Section (8 columns) -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Edit Customer Information</h4>
                </div>
                <div class="panel-body">
                    <form action="{{route('customer_update')}}" enctype="multipart/form-data" method="post" >
                        @csrf
                        <input type="hidden" name="csrf_token_name" value="f3cbfd0f89c4a4f5cec254f9d292d092" />
                        <div class="modal-body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="tab_staff_profile">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" >
                                                <label class="control-label">Customer Name</label>
                                                <input type="text" name="customer_name" class="form-control" autofocus="1" value="{{ old('customer_name', $customer_info->customer_name) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Address</label>
                                            <input id="address" name="address" class="form-control" autocomplete="off" value="{{ old('address', $customer_info->address) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email" class="control-label">Email</label>
                                            <input name="email" class="form-control" autocomplete="off" value="{{ old('email', $customer_info->email) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Phone</label>
                                            <input name="phone" class="form-control" autocomplete="off" value="{{ old('phone', $customer_info->phone) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Mobile</label>
                                            <input name="mobile" class="form-control" autocomplete="off" value="{{ old('mobile', $customer_info->mobile) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Treade License</label>
                                            <input name="trade_licence" class="form-control" autocomplete="off" value="{{ old('trade_licence', $customer_info->trade_licence) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!--teamanage -->
                                        <div class="form-group">
                                            <label class="control-label">Bill No</label>
                                            <input name="billing_address" class="form-control" autocomplete="off" value="{{ old('billing_address', $customer_info->billing_address) }}">
                                        </div> <!--teamanage -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Propritor NID</label>
                                            <input name="propritor_nid" class="form-control" autocomplete="off" value="{{ old('propritor_nid', $customer_info->propritor_nid) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!--teamanage -->
                                        <div class="form-group">
                                            <label class="control-label">Remarks/Note</label>
                                            <input name="note" class="form-control" autocomplete="off" value="{{ old('note', $customer_info->note) }}">
                                        </div> <!--teamanage -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Openning Balance</label>
                                            <input name="opening_balance" class="form-control" autocomplete="off" value="{{ old('opening_balance', $customer_info->opening_balance) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!--teamanage -->
                                        <div class="form-group">
                                            <label class="control-label">Security Deposit Amount</label>
                                            <input name="security_deposite_amount" class="form-control" autocomplete="off" value="{{ old('security_deposite_amount', $customer_info->security_deposite_amount) }}">
                                        </div> <!--teamanage -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Agreement Copy</label>
                                            <input name="agreement" class="form-control" autocomplete="off" value="{{ old('agreement', $customer_info->agreement) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!--teamanage -->
                                        <div class="form-group">
                                            <label class="control-label">Price Group</label>
                                            <input type="number" name="price_group_name" class="form-control" autocomplete="off" value="{{ old('price_group_name', $customer_info->price_group_name) }}">
                                        </div> <!--teamanage -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label for="account_detail_type_id" class="control-label">Relegion</label>
                                            <select name="region_id" class="selectpicker" data-width="100%" value="{{ old('region_id', $customer_info->region_id) }}">
                                                <option value="">Dhaka</option>
                                                <option value="">CTG</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!--teamanage -->
                                        <div class="form-group">
                                            <label class="control-label">Devision</label>
                                            <input type="text" name="district" class="form-control" autocomplete="off" value="{{ old('district', $customer_info->district) }}">
                                        </div> <!--teamanage -->
                                    </div>
                                </div>
                                <div class="border border-primary">
                                    <h4 class="text-center">Contact Person 1</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <labe class="control-label">Name</labe>
                                                <input name="contract_person_name_1" class="form-control" autocomplete="off" value="{{ old('contract_person_name_1', $customer_info->contract_person_name_1) }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <!--teamanage -->
                                            <div class="form-group">
                                                <label class="control-label">Phone</label>
                                                <input name="contract_person_phone_1" class="form-control" autocomplete="off" value="{{ old('contract_person_phone_1', $customer_info->contract_person_phone_1) }}">
                                            </div> <!--teamanage -->
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email" class="control-label">Email</label>
                                                <input type="email" name="email" class="form-control" autocomplete="off" value="{{ old('email', $customer_info->email) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="text-center">Contact Person 2</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email" class="control-label">Name</label>
                                            <input type="text" name="contract_person_name_2" class="form-control" autocomplete="off" value="{{ old('contract_person_name_2', $customer_info->contract_person_name_2) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <!--teamanage -->
                                        <div class="form-group">
                                            <label for="email" class="control-label">Phone</label>
                                            <input type="text" name="contract_person_phone_2" class="form-control" autocomplete="off" value="{{ old('contract_person_phone_2', $customer_info->contract_person_phone_2) }}">
                                        </div> <!--teamanage -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email" class="control-label">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" autocomplete="off" value="{{ old('email', $customer_info->email) }}">
                                        </div>
                                    </div>
                                </div>

                                <h4 class="text-center">Bank Details</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email" class="control-label">Bank Name</label>
                                            <input type="text" name="bank_name" class="form-control" autocomplete="off" value="{{ old('bank_name', $customer_info->bank_name) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <!--teamanage -->
                                        <div class="form-group">
                                            <label for="email" class="control-label">Account Name</label>
                                            <input type="text" name="account_name" class="form-control" autocomplete="off" value="{{ old('account_name', $customer_info->account_name) }}">
                                        </div> <!--teamanage -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email" class="control-label">Account Number</label>
                                            <input type="text" name="account_no" class="form-control" autocomplete="off" value="{{ old('account_no', $customer_info->account_no) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email" class="control-label">Bank Address</label>
                                            <input type="text" name="bank_address" class="form-control" autocomplete="off" value="{{ old('bank_address', $customer_info->bank_address) }}">
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection