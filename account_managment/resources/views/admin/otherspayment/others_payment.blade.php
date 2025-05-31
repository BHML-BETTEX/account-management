@extends('master')

@section('content')
<div class="contain">
    <div class="widget-content" style="margin: auto;">
        <div class="col-md-6">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Others Payments</h4>
                </div>
                <form action="{{route('others_payment_store')}}" method="post" accept-charset="utf-8">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group" app-field-wrapper="account_detail_type_id">
                            <label for="form-label" class="control-label">Date Of Payments</label>
                            <input type="date" id="name" name="dateoftransaction" class="form-control" value="">
                        </div>

                        <div class="form-group" app-field-wrapper="account_detail_type_id">
                            <label for="form-label" class="control-label">Memo</label>
                            <textarea class="form-control" rows="5" id="comment" name="particulars"></textarea>
                        </div>

                        {{-- Debit Entry --}}
                        <h5>Debit Entry</h5>
                        <input type="hidden" name="entries[0][credit]" value="0">
                        <div class="form-group">
                            <label>Payment Head</label>
                            <select name="entries[0][accountscode]" class="form-control">
                                @foreach($ac_cartofacc as $ac_cartofaccs)
                                <option value="{{ $ac_cartofaccs->accountscode }}">{{ $ac_cartofaccs->accountsheadname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Debit Amount</label>
                            <input type="text" name="entries[0][debit]" class="form-control">
                        </div>

                        {{-- Credit Entry --}}
                        <h5>Credit Entry</h5>
                        <input type="hidden" name="entries[1][debit]" value="0">
                        <div class="form-group">
                            <label>Deduct from</label>
                            <select name="entries[1][accountscode]" class="form-control">
                                @foreach($ac_cartofacc as $ac_cartofaccs)
                                <option value="{{ $ac_cartofaccs->accountscode }}">{{ $ac_cartofaccs->accountsheadname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label for="account_detail_type_id" class="control-label">Payment Mode</label>
                            <select name="" id="" class="selectpicker" data-width="100%">
                                <option value="">Cash</option>
                                <option value="">Bank</option>
                                <option value="">Check</option>
                                <option value="">Others</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Credit Amount</label>
                            <input type="text" name="entries[1][credit]" class="form-control">
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