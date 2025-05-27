@extends('master')
@section ('content')
<div class="contain">
    <div class="widget-content">
        <div>
            <button class="btn btn-primary" data-original-title="Create New Account">
                <span class="text-white" data-toggle="modal" data-target="#account-modal">Add Adjustment</span>
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
                    <table class="table table-bordered table-striped table-hover" style="background-color: #e5f4f9">
                        <thead>
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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="account-modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Adjustment Jurnal Entry</h4>
            </div>
            <form action="" method="post" accept-charset="utf-8">
                @csrf
                <div class="modal-body">

                    <div class="form-group" app-field-wrapper="name"><label for="name" class="control-label">Adjustment Account</label>
                        <input type="date" name="accountsheadname" id="edit_accountsheadname" class="form-control">
                    </div>

                    <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label for="account_detail_type_id" class="control-label">Debit Account</label>
                        <select name="category" id="edit_category" class="selectpicker" data-width="100%">
                            @foreach($ac_cartofacc as $ac_cartofaccs)
                            <option value="{{$ac_cartofaccs->id}}">{{$ac_cartofaccs->accountsheadname}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label for="account_detail_type_id" class="control-label">Credit Account</label>
                        <select name="category" id="edit_category" class="selectpicker" data-width="100%">
                            @foreach($ac_cartofacc as $ac_cartofaccs)
                            <option value="{{$ac_cartofaccs->id}}">{{$ac_cartofaccs->accountsheadname}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" app-field-wrapper="name"><label for="name" class="control-label">Adjustment Amount</label><input type="text" id="name" name="accountsheadname" class="form-control" value=""></div>

                    <div class="form-group" app-field-wrapper="name"><label for="name" class="control-label">Memo On Adjustment</label>
                        <textarea class="form-control" rows="5" id="comment"></textarea>
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

@endsection