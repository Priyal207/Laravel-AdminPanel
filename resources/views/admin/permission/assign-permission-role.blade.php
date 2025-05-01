@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Assign Permissions to Role</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('assignPermissions') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="role">Select Role:</label>
            <select name="role_id" id="role" class="form-control" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label>Assign Permissions:</label>
            <div class="row">
                @foreach($permissions as $permission)
                    <div class="col-md-4">
                        <label>
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                            {{ $permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Assign</button>
    </form>
</div>
@endsection
