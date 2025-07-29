@extends('master')
@section ('content')

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class=" col-lg-6 col-md-6 col-sm-12">
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

                    <input type="hidden" name="entries[0][credit]" value="0">
                    <div class="form-group">
                        <label for="debit-account">Debit Account</label>
                        <select name="entries[0][accountscode]" class="form-control select2" id="debit-account" required>
                            <option value="">Select Debit Account</option>
                            @foreach($ac_cartofacc as $ac)
                            <option value="{{ $ac->accountscode }}">{{ $ac->accountsheadname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="hidden" name="entries[1][debit]" value="0">
                    <div class="form-group">
                        <label for="credit-account">Credit Account</label>
                        <select name="entries[1][accountscode]" class="form-control select2" id="credit-account" required>
                            <option value="">Select Credit Account</option>
                            @foreach($ac_cartofacc as $ac)
                            <option value="{{ $ac->accountscode }}">{{ $ac->accountsheadname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" class="form-control" id="amount" required>
                    </div>

                    <div class="form-group">
                        <label for="narration">Memo on Adjustment</label>
                        <textarea name="particulars" class="form-control" rows="3" id="particulars" required></textarea>
                    </div>
                    <!-- Hidden narration for both entries -->
                    <input type="hidden" name="entries[0][naration]" id="entry0-naration">
                    <input type="hidden" name="entries[1][naration]" id="entry1-naration">

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </div>
            </form>
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

        // Sync narration to hidden fields
        $('#particulars').on('input', function() {
            const value = $(this).val();
            $('#entry0-naration').val(value);
            $('#entry1-naration').val(value);
        });


    });
</script>

</script>
@if (session('success'))

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            showClass: {
                popup: 'swal2-noanimation', // disables bounce
                backdrop: 'swal2-noanimation'
            },
            hideClass: {
                popup: '', // fade out by default
            }
        });

        Toast.fire({
            icon: 'success',
            title: `{!! session('success') !!}`
        });
    });
</script>
@endif
@endpush