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
                            <th>Short Name</th>
                            <th>Full Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($account_category as $key=>$category)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$category->short_name}}</td>
                            <td>{{$category->long_name}}</td>
                            <td><span class="label label-success"><a href="{{route('acc_category_edit', $category->id)}}">Edit</a></span>
                                <span class="label label-danger"><a href="{{route('acc_category_delete', $category->id)}}">Delete</a></span>
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
                <h4 class="no-margin">Account Category</h4>
                <hr class="hr-panel-heading" />
                <form action="{{isset($edit_type) ? route('acc_category_update', $edit_type->id) : route('acc_category_store')}}" method="post" accept-charset="utf-8">
                    @csrf
                    @if(isset($edit_type))
                    <input type="hidden" name="id" value="{{ $edit_type->id }}">
                    @endif
                    <div class="form-group">
                        <label for="form-label" class="control-label">Short Name</label>
                        <input type="text" id="short_name" name="short_name" class="form-control" autocomplete="off" value="{{ old('short_name', $edit_type->short_name ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="form-label" class="control-label">Long Name</label>
                        <input type="text" id="long_name" name="long_name" class="form-control" autocomplete="off" value="{{ old('long_name', $edit_type->long_name ?? '') }}">
                    </div>

                    <button class=" btn btn-info" type="submit">{{ isset($edit_type) ? 'Update' : 'Submit' }}</button>
                    @if (isset($edit_type))
                    <button class="btn  btn-success ">
                        <a class="text-white" href="{{ route('acc_category') }}">Back</a>
                    </button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

@endsection