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
                            <th>SL</th>
                            <th>Type Name</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($account_types as $key=>$account_type)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$account_type->typename}}</td>
                            <td>
                                <span class="label label-success"><a href="{{route('acc_type_edit', $account_type->id )}}">Edit</a></span>
                                <span class="label label-danger"><a href="{{route('acc_type_delete', $account_type->id)}}" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a></span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- account type input and update -->
    <div class="col-md-4">
        <div class="panel panel-default panel_s">
            <div class="panel-body">
                <h4 class="no-margin">Account Type</h4>
                <hr class="hr-panel-heading" />
                <form action="{{ isset($edit_type) ? route('acc_type_update', $edit_type->id) : route('acc_type_store') }}" method="post" accept-charset="utf-8">
                    @csrf
                    @if(isset($edit_type))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $edit_type->id }}">
                    @endif

                    <div class="form-group">
                        <label for="form-label" class="control-label">typename</label>
                        <input type="text" id="" name="typename" class="form-control" autocomplete="off" value="{{ old('typename', $edit_type->typename ?? '') }}">

                    </div>

                    <button class=" btn btn-info" type="submit">{{ isset($edit_type) ? 'Update' : 'Submit' }}</button>

                    @if (isset($edit_type))
                    <span class="label label-success">
                        <a href="{{ route('acc_type') }}">Back</a>
                    </span>
                    @endif
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