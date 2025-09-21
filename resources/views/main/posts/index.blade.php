@extends('layouts.main')

@section('content')
<div class="">
    <h1 class="mb-4">Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create Post</a>

    {{-- Example listing --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($posts as $post) --}}
            <tr>
                <td>Sample Post</td>
                <td>Published</td>
                <td>Admin</td>
                <td>
                    <a href="#" class="btn btn-sm btn-info">View</a>
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                    <form action="#" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
@endsection