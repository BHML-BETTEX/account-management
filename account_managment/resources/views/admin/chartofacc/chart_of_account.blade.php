@extends('master')
@section('content')
<div class="contain">
    <div class="widget-content">
        <div class="row align-items-center g-2">

            <!-- Button Group -->
            <div class="col-lg-6 col-md-12 mb-2 d-flex flex-wrap gap-2">
                <button class="btn btn-success">
                    Print Chart Of Account
                </button>

                <button class="btn btn-primary" data-toggle="modal" data-target="#account-modal">
                    New Account
                </button>
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
        <!-- Table Section (8 columns) -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Data Table</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead style="background-color: #e5f4f9">
                            <tr>
                                <th>#</th>
                                <th>Main Head</th>
                                <th>Account Code</th>
                                <th>Account Head Name</th>
                                <th>Category</th>
                                <th>Current Balance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ac_cartofacc as $key=>$ac_cartofaccs)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$ac_cartofaccs->mainheadname}}</td>
                                <td>{{$ac_cartofaccs->accountscode}}</td>
                                <td>{{$ac_cartofaccs->accountsheadname}}</td>
                                <td>{{$ac_cartofaccs->rel_to_AcCategory->long_name}}</td>
                                <td></td>
                                <td>
                                    <span class="label label-success"><a href="" data-toggle="modal" data-target="#account-modaledit">
                                            <a href="#"
                                                class="edit-btn"
                                                data-toggle="modal"
                                                data-target="#account-modaledit"
                                                data-id="{{$ac_cartofaccs->coa_id}}"
                                                data-mainheadid="{{$ac_cartofaccs->mainhead_id}}"
                                                data-mainheadcode="{{$ac_cartofaccs->mainheadcode}}"
                                                data-accountsheadname="{{$ac_cartofaccs->accountsheadname}}"
                                                data-category="{{$ac_cartofaccs->category}}">
                                                Edit
                                            </a>
                                        </a></span>
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
<div class="modal fade" id="account-modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Account</h4>
            </div>
            <form action="{{route('chart_of_account_store')}}" method="post" accept-charset="utf-8">
                @csrf
                <div class="modal-body">

                    <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label for="account_detail_type_id" class="control-label">Main Head </label>
                        <select id="mainhead_id" name="mainhead_id" class="selectpicker" data-width="100%">
                            @foreach($main_head as $key=>$main_heads){
                            <option value="{{$main_heads->mainhead_id}}">{{$main_heads->mainheadname}}</option>
                            }
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" app-field-wrapper="name"><input type="hidden" id="name" name="mainheadcode" class="form-control" value=""></div>

                    <div class="form-group" app-field-wrapper="name"><label for="name" class="control-label">Account Head:</label><input type="text" id="name" name="accountsheadname" class="form-control" value=""></div>

                    <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label for="account_detail_type_id" class="control-label">Category</label>
                        <select name="category" class="selectpicker" data-width="100%">
                            @foreach($ac_category as $key=>$ac_categorys){
                            <option value="{{$ac_categorys->id}}">{{$ac_categorys->long_name}}</option>
                            }
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info btn-submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Account Modal  -->
<div class="modal fade" id="account-modaledit">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Account</h4>
            </div>
            <form action="{{ route('chart_of_account_update') }}" method="post">
                @csrf

                <div class="modal-body">
                    <input type="hidden" name="coa_id" id="edit_coa_id">
                    <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label for="account_detail_type_id" class="control-label">Main Head</label>
                        <select id="edit_mainhead_id" name="mainhead_id" class="selectpicker" data-width="100%">
                            @foreach($main_head as $main_heads)
                            <option value="{{$main_heads->mainhead_id}}">{{$main_heads->mainheadname}}</option>
                            @endforeach
                        </select>

                        <input type="hidden" name="mainheadcode" id="edit_mainheadcode" class="form-control">

                        <div class="form-group" app-field-wrapper="name"><label for="name" class="control-label">Account Head:</label>
                            <input type="text" name="accountsheadname" id="edit_accountsheadname" class="form-control">

                            <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label for="account_detail_type_id" class="control-label">Category</label>
                                <select name="category" id="edit_category" class="selectpicker" data-width="100%">
                                    @foreach($ac_category as $ac_categorys)
                                    <option value="{{$ac_categorys->id}}">{{$ac_categorys->long_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info btn-submit">Update</button>
                        </div>
            </form>

        </div>
    </div>
</div>

<!-- Add MainHead -->

<div class="modal fade" id="mainhead">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Account</h4>
            </div>
            <form action="{{ route('chart_of_account_update') }}" method="post">
                @csrf

                <div class="modal-body">
                    <input type="hidden" name="coa_id" id="edit_coa_id">
                    <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label for="account_detail_type_id" class="control-label">Main Head</label>
                        <select id="edit_mainhead_id" name="mainhead_id" class="selectpicker" data-width="100%">
                            @foreach($main_head as $main_heads)
                            <option value="{{$main_heads->mainhead_id}}">{{$main_heads->mainheadname}}</option>
                            @endforeach
                        </select>

                        <input type="hidden" name="mainheadcode" id="edit_mainheadcode" class="form-control">

                        <div class="form-group" app-field-wrapper="name"><label for="name" class="control-label">Account Head:</label>
                            <input type="text" name="accountsheadname" id="edit_accountsheadname" class="form-control">

                            <div class="select-placeholder form-group" app-field-wrapper="account_detail_type_id"><label for="account_detail_type_id" class="control-label">Category</label>
                                <select name="category" id="edit_category" class="selectpicker" data-width="100%">
                                    @foreach($ac_category as $ac_categorys)
                                    <option value="{{$ac_categorys->id}}">{{$ac_categorys->long_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info btn-submit">Update</button>
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
                document.getElementById('edit_coa_id').value = this.dataset.id;
                document.getElementById('edit_mainhead_id').value = this.dataset.mainheadid;
                document.getElementById('edit_mainheadcode').value = this.dataset.mainheadcode;
                document.getElementById('edit_accountsheadname').value = this.dataset.accountsheadname;
                document.getElementById('edit_category').value = this.dataset.category;

                // Refresh selectpicker if you're using Bootstrap-select
                $('.selectpicker').selectpicker('refresh');
            });
        });
    });
</script>