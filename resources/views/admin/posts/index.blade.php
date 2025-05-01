@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Posts</h2>
            </div>
            <div class="pull-right">
                {{-- @can('posts-create') --}}
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Posts</a>
                {{-- @endcan --}}
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>{{ $post->image }}</td>
            <td>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                    {{-- @can('product-edit') --}}
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                    {{-- @endcan --}}
                    @csrf
                    @method('DELETE')
                    {{-- @can('post-delete') --}}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    {{-- @endcan --}}
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{-- {!! $posts->links() !!} --}}
</div>
@endsection