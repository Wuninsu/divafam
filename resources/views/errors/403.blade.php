@extends('layouts.error', ['title' => '403 Forbidden'])
@section('content')
<div class="error-code">403</div>
<div class="error-message">Access Denied</div>
<p class="text-muted mb-4">
    You don’t have permission to access this resource.
</p>
@endsection