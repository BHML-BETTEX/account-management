@extends('master')
@section('content')
<div class="contain">
    <div class="row align-items-center g-2">

        <!-- Button Group -->
        <div class="col-lg-6 col-md-12 mb-2 d-flex flex-wrap gap-2">
            <button class="btn btn-primary" >
                <a class="color-white" href="{{route('add_customer')}}">Add Customer</a>
            </button>
        </div>

        <!-- Search Form -->
        <div class="col-lg-4 col-md-6 mb-2">
            <form action="" method="GET" class="d-flex">
                <input type="search" class="form-control me-2" name="search" placeholder="Search for..."
                    value="{{$search}}">
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
    <!-- Table Section (8 columns) -->
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Customer</h4>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead style="background-color: #e5f4f9">
                        <tr>
                            <th>#</th>
                            <th>Customer Type</th>
                            <th>Customer Code</th>
                            <th>Customer Name</th>
                            <th>Resignation No</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Trade License</th>
                            <th>Bill No</th>
                            <th>Propritor NID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_customer as $key=>$all_customer)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$all_customer->customer_type_ci}}</td>
                            <td>{{$all_customer->customer_code}}</td>
                            <td>{{$all_customer->customer_name}}</td>
                            <td>{{$all_customer->registration_no}}</td>
                            <td>{{$all_customer->address}}</td>
                            <td>{{$all_customer->phone}}</td>
                            <td>{{$all_customer->mobile}}</td>
                            <td>{{$all_customer->email}}</td>
                            <td>{{$all_customer->trade_licence}}</td>
                            <td>{{$all_customer->billing_address}}</td>
                            <td>{{$all_customer->propritor_nid}}</td>
                            <td><span class="label label-success"><a href="{{route('customer_edit', $all_customer->id)}}">Edit</a></span>
                                <span class="label label-danger"><a href="{{route('customer_delete', $all_customer->id)}}" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a></span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Add Account Modal  -->


@endsection