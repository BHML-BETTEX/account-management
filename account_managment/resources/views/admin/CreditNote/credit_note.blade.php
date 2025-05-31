@extends('master')

@section('content')
<div class="contain">
    <div class="widget-content">
        <div class="col-md-6">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Credit Note Entry</h4>
                </div>
                <form action="" method="post" accept-charset="utf-8">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group" app-field-wrapper="account_detail_type_id">
                            <label for="form-label" class="control-label">Date</label>
                            <input type="date" id="name" name="accountsheadname" class="form-control" value="">
                        </div>

                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label for="account_detail_type_id" class="control-label">Payment Head</label>
                            <select name="category" id="edit_category" class="selectpicker" data-width="100%">

                            </select>
                        </div>

                        <div class="form-group" app-field-wrapper="account_detail_type_id">
                            <label for="form-label" class="control-label">Amount</label>
                            <input type="text" id="name" name="accountsheadname" class="form-control" value="">
                        </div>

                        <div class="form-group" app-field-wrapper="account_detail_type_id">
                            <label for="form-label" class="control-label">Amount</label>
                            <input type="text" id="name" name="accountsheadname" class="form-control" value="">
                        </div>

                        <div class="form-group" app-field-wrapper="account_detail_type_id">
                            <label for="form-label" class="control-label">Memo</label>
                            <textarea rows="5" id="name" name="accountsheadname" class="form-control" value=""></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info btn-submit">Make Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection