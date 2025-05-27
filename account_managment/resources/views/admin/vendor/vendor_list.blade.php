@extends('master')
@section('content')
<div class="contain">
    <div class="widget-content">
        <div class="row align-items-center g-2">

        <!-- Button Group -->
        <div class="col-lg-6 col-md-12 mb-2 d-flex flex-wrap gap-2">
            <button class="btn btn-primary" data-original-title="Refresh Chart Of Account">
                <i class="icon icon-refresh"><span class="text-white" data-toggle="modal" data-target="#addcustomer">Add</span></i>
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
                    <option value="xls">XLSs</option>
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
                    <h4 class="panel-title">Vendor Information</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead style="background-color: #e5f4f9">
                            <tr>
                                <th>#</th>
                                <th>Vendor Name</th>
                                <th>Address</th>
                                <th>Email Address</th>
                                <th>Contact No</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supplier as $key => $suppliers)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $suppliers->name }}</td>
                                <td>{{ $suppliers->address }}</td>
                                <td>{{ $suppliers->email_address }}</td>
                                <td>{{ $suppliers->contact_no }}</td>
                                <td>
                                    <a href="#account-modaledit"
                                        class="label label-success edit-btn"
                                        data-toggle="modal"
                                        data-id="{{ $suppliers->id }}"
                                        data-name="{{ $suppliers->name }}"
                                        data-email_address="{{ $suppliers->email_address }}"
                                        data-contact_no="{{ $suppliers->contact_no }}">
                                        Edit
                                    </a>

                                    <span class="label label-danger">
                                        <a href="{{ route('vendor_delete', $suppliers->id) }}"
                                            onclick="return confirm('Are you sure you want to delete this item?')">
                                            Delete
                                        </a>
                                    </span>
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
<div class="modal fade" id="addcustomer">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Vendor Information</h4>
            </div>
            <form action="{{route('vendor_store')}}" enctype="multipart/form-data" method="post">
                @csrf
                <input type="hidden" name="csrf_token_name" value="f3cbfd0f89c4a4f5cec254f9d292d092" />
                <div class="modal-body">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab_staff_profile">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lastname" class="control-label">Vendor Name</label>
                                        <input type="text" name="name" class="form-control" autofocus="1" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="control-label">Address</label>
                                    <input type="text" name="address" class="form-control" autocomplete="off" value="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="control-label">Email</label>
                                    <input type="email" name="email_address" class="form-control" autocomplete="off" value="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="control-label">Phone</label>
                                    <input type="number" name="contact_no" class="form-control" autocomplete="off" value="">
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit-->
<div class="modal fade" id="account-modaledit">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Vendor Information</h4>
            </div>
            <form action="{{route('vendor_update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id" />

                    <div class="form-group">
                        <label for="edit_name">Vendor Name</label>
                        <input type="text" name="name" id="edit_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit_email_address">Address</label>
                        <input type="text" name="address" id="edit_address" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit_email_address">Email</label>
                        <input type="email" name="email_address" id="edit_email_address" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="edit_contact_no">Phone</label>
                        <input type="number" name="contact_no" id="edit_contact_no" class="form-control">
                    </div>

                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-btn');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('edit_id').value = this.dataset.id;
                document.getElementById('edit_name').value = this.dataset.name;
                document.getElementById('edit_address').value = this.dataset.address;
                document.getElementById('edit_email_address').value = this.dataset.email_address;
                document.getElementById('edit_contact_no').value = this.dataset.contact_no;
            });
        });
    });
</script>