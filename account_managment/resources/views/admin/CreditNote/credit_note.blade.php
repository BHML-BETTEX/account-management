@extends('master')

@section('content')
<div class="contain">
    <div class="widget-content">
        <div class="col-md-6">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Credit Note Entry</h4>
                </div>

                <form action="{{ route('credit_note_store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Date -->
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="dateoftransaction" class="form-control" required>
                        </div>

                        <!-- Hidden Fields -->
                        <input type="hidden" name="selfid" value="1">
                        <input type="hidden" name="partytype" value="Supplier">

                        <!-- Supplier / Party -->
                        <div class="form-group">
                            <label>Account Head</label>
                            <select name="partycode" class="form-control" required>
                                @foreach($supplier_info as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Account Codes -->
                        <div class="form-group">
                            <label>Accounts Code</label>
                            <input type="text" name="accountscode" class="form-control" required>
                        </div>

                        <!-- Amount -->
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="number" step="0.01" name="entries[0][debit] entries[1][credit]" class="form-control" required>
                        </div>


                        <div class="form-group">
                            <label>Amount</label>
                            <input type="number" step="0.01" name="amount" class="form-control" required>
                        </div>

                        <!-- Narration -->
                        <div class="form-group">
                            <label>Narration</label>
                            <textarea name="naration" class="form-control" rows="3"></textarea>
                        </div>

                        <!-- Particulars -->
                        <div class="form-group">
                            <label>Particulars</label>
                            <input type="text" name="particulars" class="form-control">
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Save Credit Note</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection