@extends('master')

@section('content')
<div class="container">
    <div class="row" style="height: 80vh; display: flex; justify-content: center; align-items: center;">
        <div class="col-md-6">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Others Payments</h4>
                </div>
                <form action="{{ route('others_payment_store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Date Of Payment</label>
                            <input type="date" name="dateoftransaction" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Memo</label>
                            <textarea class="form-control" rows="5" name="particulars" required></textarea>
                        </div>

                        <input type="hidden" name="entries[0][credit]" value="0">

                        <div class="form-group">
                            <label>Payment Head</label>
                            <select name="entries[0][accountscode]" class="form-control select2" id="debit-account" required>
                                <option value="">Select Accounts Head</option>
                                @foreach($ac_cartofacc as $ac_cartofaccs)
                                <option value="{{ $ac_cartofaccs->accountscode }}">{{ $ac_cartofaccs->accountsheadname }}</option>
                                @endforeach
                            </select>
                            <p class="text-center">(Salary, Utility Bills, Rent, Stationary, etc.)</p>
                        </div>


                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" name="amount" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Payment Mode</label>
                            <select name="paymode" class="form-control" required>
                                <option value="">Select Mode</option>
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                            </select>
                        </div>
                        <input type="hidden" name="entries[0][naration]" id="entry0-naration">

                        <!-- Hidden cash and bank account names -->
                        <input type="hidden" name="cash_account_name" value="Main Cash Account"> <!-- set real value -->
                        <input type="hidden" name="bank_account_name" value="Bank Asia A/C 123"> <!-- set real value -->

                        <div class="form-group">
                            <label>Cheque No</label>
                            <input type="text" name="cheqno" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Make Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('#debit-account').select2({
            placeholder: 'Select Debit Account',
            allowClear: true,
            width: '100%'
        });

        $('#credit-account').select2({
            placeholder: 'Select Credit Account',
            allowClear: true,
            width: '100%'
        });

    });
</script>
@endpush