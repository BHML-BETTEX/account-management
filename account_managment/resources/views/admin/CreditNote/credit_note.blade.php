@extends('master')

@section('content')
<div class="container">
    <div class="row" style="height: 70vh; display: flex; justify-content: center; align-items: center;">
        <div class="col-md-6 col-lg-6 col-sm-12">
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
                            <select name="partycode" class="form-control select2" id="partycode" required>
                                @foreach($supplier_info as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Credit Notes -->
                        <div class="form-group">
                            <label>Credit Note No</label>
                            <input type="text" name="credit_note_no" class="form-control" required>
                        </div>
                        <!-- Amount -->
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" name="amount" class="form-control" required>
                        </div>

                        <!-- Narration -->
                        <div class="form-group">
                            <label>Memo</label>
                            <textarea name="particulars" class="form-control" rows="3"></textarea>
                        </div>

                    </div>

                    <!-- Submit -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Save Credit Note</button>
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
        $('#partycode').select2({
            placeholder: 'Select Debit Account',
            allowClear: true,
            width: '100%'
        });

    });
</script>

@endpush