@extends('layouts.main')
@section('content')
<div class="">
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('pages.index')}}">Pages</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
    <h2 class="mb-4">Create a Page</h2>
    <div class="row">
        <div class="col-xl-9">
            <form class="row g-3 mb-6" action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="col-md-8">
                    <div class="form-floating">
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid border-danger @enderror"
                            placeholder="Page Title" value="{{ old('title') }}">
                        <label for="title">Title Title</label>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Slug -->
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" name="slug" id="slug"
                            class="form-control @error('slug') is-invalid border-danger @enderror" placeholder="Slug"
                            value="{{ old('slug') }}">
                        <label for="slug">Slug</label>
                        @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <!-- Content -->
                <div class="col-12">
                    <strong><label for="content">Content</label></strong>
                    <textarea name="content" id="content"
                        class="form-control @error('content') is-invalid border-danger @enderror" placeholder="content"
                        style="height: 150px">{{ old('content') }}</textarea>

                    @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <!-- Status -->
                <div class="col-md-6">
                    <div class="form-floating">
                        <select name="type" id="type"
                            class="form-select @error('type') is-invalid border-danger @enderror">
                            <option value="" disabled {{ old('type') ? '' : 'selected' }}>Select type</option>
                            <option value="terms" {{ old('type')=='terms' ? 'selected' : '' }}>Terms</option>
                            <option value="privacy" {{ old('type')=='privacy' ? 'selected' : '' }}>Privacy</option>
                            <option value="page" {{ old('type')=='page' ? 'selected' : '' }}>Page
                            </option>
                        </select>
                        <label for="type">type</label>
                        @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Active -->
                <div class="col-md-6">
                    <div class="form-check">
                        <input type="checkbox" name="is_active" id="is_active" value="1"
                            class="form-check-input @error('is_active') is-invalid border-danger @enderror" {{
                            old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                        @error('is_active')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Buttons -->
                <div class="col-12 mt-4">
                    <div class="row g-3 justify-content-end">
                        <div class="col-auto">
                            <button type="button" onclick="window.history.back();" class="btn btn-phoenix-primary px-5">
                                Cancel
                            </button>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary px-5 px-sm-15">Create Project</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#content').summernote({
        placeholder: 'Enter project over view..',
        tabsize: 2,
        height: 300,
        toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link']],
        ['view', ['fullscreen', 'codeview', 'help']]
        ]
        });
    });

</script>
@endsection