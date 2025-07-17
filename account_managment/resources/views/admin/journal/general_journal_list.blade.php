@extends('master')
@section('content')

<div class="contain">
    <div class="widget-content">
        <div class="row align-items-center g-2">

            <!-- Button Group -->
            <div class="col-lg-6 col-md-12 mb-2 d-flex flex-wrap gap-2">
                <a href="{{ route('general_journal') }}" class="btn btn-primary text-white">
                    New Account
                </a>
            </div>


            <!-- Search Form -->
            <div class="col-lg-4 col-md-6 mb-2">
                <form action="" method="GET" class="d-flex">
                    <input type="search" class="form-control me-2" name="search" placeholder="Search for..."
                        value="{{ $search ?? '' }}">
                    <button class="btn btn-secondary" type="submit">Go!</button>
                </form>
            </div>

            <!-- Export Form -->
            <div class="col-lg-2 col-md-6 mb-2">
                <form action="" method="GET" class="d-flex">
                    <select name="type" class="form-control me-2">
                        <option value="">Select Type</option>
                        <option value="xlsx">XLSX</option>
                        <option value="csv">CSV</option>
                        <option value="xls">XLS</option>
                    </select>
                    <button type="submit" class="btn btn-outline-success">Export</button>
                </form>
            </div>

        </div>
    </div>



    <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="background-color: #fff; padding: 20px; border-radius: 8px;">
            <div class="panel-heading mb-3">
                <h3 class="panel-title" style="font-size: 19px;">General Journal List</h3>
            </div>
            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead style="background-color: #e5f4f9;">
                        <tr>
                            <th style="font-size: 16px;">#</th>
                            <th style="font-size: 16px;">Date of Transaction</th>
                            <th style="font-size: 16px;">Voucher Number</th>
                            <th style="font-size: 16px;">Particulars</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($maintransition as $key => $main)
                        <tr class="clickable-row" data-href="{{ route('edit_genaral_journal', $main->id) }}" style="cursor: pointer;">
                            <td style="font-size: 14px;">{{ $key + 1 }}</td>
                            <td style="font-size: 14px;">{{ $main->dateoftransaction }}</td>
                            <td style="font-size: 14px;">{{ $main->voucherno }}</td>
                            <td style="font-size: 14px;">{{ $main->particulars }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


</div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const rows = document.querySelectorAll('.clickable-row');
        rows.forEach(row => {
            row.addEventListener('dblclick', () => {
                const url = row.getAttribute('data-href');
                if (url) {
                    window.location.href = url;
                }
            });
        });
    });
</script>