@extends('layouts.main')
@section('content')
<div class="">
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('programs.index')}}">Projects</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
    <h2 class="mb-4">Create a project</h2>
    <div class="row">
        <div class="col-xl-9">
            <form class="row g-3 mb-6" action="{{ route('programs.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="col-md-8">
                    <div class="form-floating">
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid border-danger @enderror"
                            placeholder="Project Title" value="{{ old('title') }}">
                        <label for="title">Project Title</label>
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

                <!-- Short Description -->
                <div class="col-12">
                    <div class="form-floating">
                        <textarea name="short_description" id="short_description"
                            class="form-control @error('short_description') is-invalid border-danger @enderror"
                            placeholder="Short description"
                            style="height: 80px">{{ old('short_description') }}</textarea>
                        <label for="short_description">Short Description</label>
                        @error('short_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div class="col-12">
                    <strong><label for="description">Description</label></strong>
                    <textarea name="description" id="description"
                        class="form-control @error('description') is-invalid border-danger @enderror"
                        placeholder="Description" style="height: 150px">{{ old('description') }}</textarea>
                   
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Cover Image -->
                <div class="col-md-6">
                    <label for="cover_image" class="form-label">Cover Image</label>
                    <input type="file" name="cover_image" id="cover_image"
                        class="form-control @error('cover_image') is-invalid border-danger @enderror">
                    @error('cover_image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="col-md-6">
                    <div class="form-floating">
                        <select name="status" id="status"
                            class="form-select @error('status') is-invalid border-danger @enderror">
                            <option value="" disabled {{ old('status') ? '' : 'selected' }}>Select status</option>
                            <option value="draft" {{ old('status')=='draft' ? 'selected' : '' }}>Draft</option>
                            <option value="ongoing" {{ old('status')=='ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="completed" {{ old('status')=='completed' ? 'selected' : '' }}>Completed
                            </option>
                        </select>
                        <label for="status">Status</label>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Start Date -->
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" name="start_date" id="start_date"
                            class="form-control datetimepicker @error('start_date') is-invalid border-danger @enderror"
                            placeholder="Start Date" value="{{ old('start_date') }}">
                        <label for="start_date">Start Date</label>
                        @error('start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- End Date -->
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" name="end_date" id="end_date"
                            class="form-control datetimepicker @error('end_date') is-invalid border-danger @enderror"
                            placeholder="End Date" value="{{ old('end_date') }}">
                        <label for="end_date">End Date</label>
                        @error('end_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Location -->
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" name="location" id="location"
                            class="form-control @error('location') is-invalid border-danger @enderror"
                            placeholder="Location" value="{{ old('location') }}">
                        <label for="location">Location</label>
                        @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Budget -->
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="number" name="budget" id="budget"
                            class="form-control @error('budget') is-invalid border-danger @enderror"
                            placeholder="Budget" value="{{ old('budget') }}">
                        <label for="budget">Budget</label>
                        @error('budget')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Amount Spent -->
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="number" name="amount_spent" id="amount_spent"
                            class="form-control @error('amount_spent') is-invalid border-danger @enderror"
                            placeholder="Amount Spent" value="{{ old('amount_spent') }}">
                        <label for="amount_spent">Amount Spent</label>
                        @error('amount_spent')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Featured -->
                <div class="col-md-6">
                    <div class="form-check">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1"
                            class="form-check-input @error('is_featured') is-invalid border-danger @enderror" {{
                            old('is_featured') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">Featured</label>
                        @error('is_featured')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
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

                <!-- Tags -->
                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" name="tags" id="tags"
                            class="form-control @error('tags') is-invalid border-danger @enderror"
                            placeholder="Tags (comma separated)" value="{{ old('tags') }}">
                        <label for="tags">Tags</label>
                        @error('tags')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

        
                <!-- Buttons -->
                <div class="col-12 mt-4">
                    <div class="row g-3 justify-content-end">
                        <div class="col-auto">
                            <button type="reset" class="btn btn-phoenix-primary px-5">Cancel</button>
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
        $('#description').summernote({
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