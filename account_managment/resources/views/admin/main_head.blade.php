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
                            <th>Account Control</th>
                            <th>Main Head Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($main_head as $key=>$main_heads)
                       <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$main_heads->controlcode}}</td>
                            <td>{{$main_heads->mainheadname}}</td>
                            <td><span class="label label-success"><a href="">Edit</a></span>
                                <span class="label label-danger"><a href="{{route('main_head_delete', $main_heads->mainhead_id)}}" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a></span>
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
                <h4 class="no-margin">Main Head</h4>
                <hr class="hr-panel-heading" />
                <form action="{{route('main_head_store')}}" method="post" accept-charset="utf-8">
                    @csrf

                    <div class="form-group select-placeholder">
                        <label for="export_type">Account Control</label>
                        <select name="controlcode" id="controlcode" class="selectpicker form-control" data-width="100%" data-none-selected-text="None selected">
                            @foreach ($account_control as $account_controls)
                                <option value="{{$account_controls->controlcode}}">
                                    {{$account_controls->controlname}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="form-label" class="control-label">Main Head Name</label>
                            <input type="text" id="" name="mainheadname" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <button class="btn btn-info" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    window.onload = function() {
        document.querySelector('input[name="typename"]').focus();
    };
</script>