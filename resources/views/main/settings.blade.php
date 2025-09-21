@extends('layouts.main')

@section('content')
<div class="">
    <h1 class="mb-4">Settings</h1>

    <form action="{{ route('settings.update', 1) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="site_name" class="form-label">Site Name</label>
            <input type="text" name="site_name" id="site_name" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection