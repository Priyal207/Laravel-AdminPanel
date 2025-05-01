@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <h1>Create Role</h1>
        <form action="{{ route('permission.store') }}" method="POST">
            @csrf
            <label for="name">Permission Name</label>
            <input type="text" name="name" id="name" required>
            <button type="submit">Create</button>
        </form>
    </div>
@endsection
