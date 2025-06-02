@extends('master')
@section ('content')
<div class="widget-content" style="margin: auto;">
    <div class="col-md-6">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Adjusting Entries</h4>
            </div>
            <form action="{{ route('adjustment_journal_store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dateoftransaction">Adjustment Date</label>
                        <input type="date" name="dateoftransaction" id="dateoftransaction" class="form-control" required>
                    </div>

                    {{-- Debit Entry --}}
                    <h5>Debit Entry</h5>
                    <input type="hidden" name="entries[0][credit]" value="0">
                    <div class="form-group">
                        <label for="debit-account">Debit Account</label>
                        <select name="entries[0][accountscode]" class="form-control" id="debit-account" required>
                            @foreach($ac_cartofacc as $ac)
                            <option value="{{ $ac->accountscode }}">{{ $ac->accountsheadname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="debit-amount">Debit Amount</label>
                        <input type="text" name="entries[0][debit]" class="form-control" id="debit-amount" required>
                    </div>

                    {{-- Credit Entry --}}
                    <h5>Credit Entry</h5>
                    <input type="hidden" name="entries[1][debit]" value="0">
                    <div class="form-group">
                        <label for="credit-account">Credit Account</label>
                        <select name="entries[1][accountscode]" class="form-control" id="credit-account" required>
                            @foreach($ac_cartofacc as $ac)
                            <option value="{{ $ac->accountscode }}">{{ $ac->accountsheadname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="credit-amount">Credit Amount</label>
                        <input type="text" name="entries[1][credit]" class="form-control" id="credit-amount" required>
                    </div>

                    {{-- Narration --}}
                    <div class="form-group">
                        <label for="narration">Memo on Adjustment</label>
                        <textarea name="entries[0][naration]" class="form-control" rows="3" id="narration" required></textarea>
                    </div>
                    <input type="hidden" name="entries[1][naration]" value="Adjustment Credit">

                    {{-- Submit --}}
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-info">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>






@endsection