@extends('layouts.main')
@section('content')
<div class="">

    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>

    <h2 class="mb-4">Edit Post</h2>

    <div class="row">
        <div class="col-xl-9">
            <form class="row g-3 mb-6" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="col-md-8">
                    <div class="form-floating">
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid border-danger @enderror"
                            placeholder="Post Title" value="{{ old('title') }}">
                        <label for="title">Post Title</label>
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

                <!-- Category -->
                <div class="col-md-6">
                    <div class="form-floating">

                        <select name="category_id" id="category_id"
                            class="form-select form-select-lg @error('category_id') is-invalid border-danger @enderror">
                            <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Select category
                            </option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : ''
                                }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        <label for="category_id">Category</label>
                        @error('category_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- Published At -->
                <div class="col-md-6">
                    <input type="file" name="cover_image" id="cover_image"
                        class="form-control form-control-lg @error('cover_image') is-invalid border-danger @enderror">

                    @error('cover_image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Summary -->
                <div class="col-12">
                    <div class="form-floating">
                        <textarea name="summary" id="summary"
                            class="form-control @error('summary') is-invalid border-danger @enderror"
                            placeholder="Short Summary" style="height: 100px">{{ old('summary') }}</textarea>
                        <label for="summary">Summary</label>
                        @error('summary')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Content -->
                <div class="col-12">
                    <strong><label for="content">Content</label></strong>
                    <textarea name="content" id="content"
                        class="form-control @error('content') is-invalid border-danger @enderror"
                        style="height: 180px">{{ old('content') }}</textarea>
                    @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <!-- Status -->
                <div class="col-md-6">
                    <div class="form-floating">
                        <select name="status" id="status"
                            class="form-select @error('status') is-invalid border-danger @enderror">
                            <option value="" disabled {{ old('status') ? '' : 'selected' }}>Select status</option>
                            <option value="draft" {{ old('status')=='draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status')=='published' ? 'selected' : '' }}>Published
                            </option>
                            <option value="archived" {{ old('status')=='archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                        <label for="status">Status</label>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Is Approved -->
                <div class="col-md-2">
                    <div class="form-check mt-4">
                        <input type="checkbox" name="is_approved" id="is_approved" value="1"
                            class="form-check-input @error('is_approved') is-invalid border-danger @enderror" {{
                            old('is_approved') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_approved">Approved</label>
                        @error('is_approved')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Is Active -->
                <div class="col-md-2">
                    <div class="form-check mt-4">
                        <input type="checkbox" name="is_active" id="is_active" value="1"
                            class="form-check-input @error('is_active') is-invalid border-danger @enderror" {{
                            old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                        @error('is_active')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Is Featured -->
                <div class="col-md-2">
                    <div class="form-check mt-4">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1"
                            class="form-check-input @error('is_featured') is-invalid border-danger @enderror" {{
                            old('is_featured') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">Featured</label>
                        @error('is_featured')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <!-- Tags -->
                <div class="col-12">
                    <label for="tags" class="form-label fw-bold">Tags</label>
                    <select name="tags[]" id="tags"
                        class="form-select select2 form-select-lg @error('tags') is-invalid border-danger @enderror"
                        multiple style="min-height: 58px; padding: 0.375rem 0.75rem; border-radius: 0.375rem;">
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('tags')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Author ID (Hidden or dynamic based on auth) -->
                <input type="hidden" name="author_id" value="{{ auth()->id() }}">

                <!-- Submit -->
                <div class="col-12 mt-4">
                    <div class="row g-3 justify-content-end">
                        <div class="col-auto">
                            <button type="reset" class="btn btn-phoenix-primary px-5">Cancel</button>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary px-5 px-sm-15">Create Post</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#tags').select2({
            placeholder: 'Select tags',
            allowClear: true
        });
        $('#categories').select2({
        placeholder: 'Select category',
        allowClear: true
        });
    });
</script>
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
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
</script>
@endsection