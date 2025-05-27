@extends('master')

@section('content')

<div class="row">
    <!-- Table Section (8 columns) -->
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Data Table</h4>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead style="background-color: #e5f4f9">
                        <tr>
                            <th>#</th>
                            <th>Account Type</th>
                            <th>Control Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($account_control as $key=>$account_controls)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$account_controls->rel_to_ac_type->typename}}</td>
                            <td>{{$account_controls->controlname}}</td>
                            <td><span class="label label-success"><a href="">Edit</a></span>
                                <span class="label label-danger"><a class="text-danger" href="{{route('acc_control_delete',$account_controls->controlcode )}}">Delete</a></span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Form Section (4 columns) -->
    <div class="col-md-4">
        <div class="panel panel-default panel_s">
            <div class="panel-body">
                <h4 class="no-margin">Account Control</h4>
                <hr class="hr-panel-heading" />
                <form action="{{route('acc_control_store')}}" method="post" accept-charset="utf-8">
                    @csrf

                    <div class="form-group select-placeholder">
                        <label for="export_type">Account Type</label>
                        <select name="typecode" id="export_type" class="selectpicker form-control" data-width="100%" data-none-selected-text="None selected">
                            @foreach ($account_type as $account_types)
                            <option value="{{$account_types->id}}">
                                {{$account_types->typename}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="form-label" class="control-label">Control Name</label>
                        <input type="text" id="controlname" name="controlname" class="form-control" autocomplete="off">
                    </div>

                    <button class="btn btn-info" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection