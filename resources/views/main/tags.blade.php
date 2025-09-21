@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="mb-4">Tags</h1>
    <a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">Create Tag</a>
</div>
@endsection