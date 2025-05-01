@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Manage Permission</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('permission.create') }}"> Create New Role</a>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Permission Name</th>
                <th width="280px">Action</th>
            </tr>

            @foreach ($permissions as $permission)
            <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
                <td>
                {{-- <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                </form> --}}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection