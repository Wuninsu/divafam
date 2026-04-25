<div>
    <div class="">
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>

        <h2 class="mb-4">Create Post</h2>

        <div class="row">
            <div class="col-12">
                <form class="row g-3 mb-6" wire:submit.prevent="savePost">
                    <!-- Title -->
                    <div class="col-md-8">
                        <div class="form-floating">
                            <input type="text" wire:model="title" id="title"
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
                            <input type="text" wire:model="slug" id="slug"
                                class="form-control @error('slug') is-invalid border-danger @enderror"
                                placeholder="Slug" value="{{ old('slug') }}">
                            <label for="slug">Slug</label>
                            @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="col-md-6">
                        <div class="form-floating">

                            <select wire:model="category_id" id="category_id"
                                class="form-select form-select-lg @error('category_id') is-invalid border-danger @enderror">
                                <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Select category
                                </option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' :
                                    ''
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
                        <input type="file" wire:model="cover_image" id="cover_image"
                            class="form-control form-control-lg @error('cover_image') is-invalid border-danger @enderror">

                        @error('cover_image')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Summary -->
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea wire:model="summary" id="summary"
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
                        <strong><label for="editor">Content</label></strong>
                        <div class="">
                            <textarea wire:model="content" id="editor"
                                class="@error('content') is-invalid border-danger @enderror"
                                style="height: 180px; width:100%">{{ old('content') }}</textarea>
                        </div>
                        @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Status -->
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select wire:model="status" id="status"
                                class="form-select @error('status') is-invalid border-danger @enderror">
                                <option value="" disabled {{ old('status') ? '' : 'selected' }}>Select status</option>
                                <option value="draft" {{ old('status')=='draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status')=='published' ? 'selected' : '' }}>Published
                                </option>
                                <option value="archived" {{ old('status')=='archived' ? 'selected' : '' }}>Archived
                                </option>
                            </select>
                            <label for="status">Status</label>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Is Approved -->
                    @can('approve posts')
                    <div class="col-md-2">
                        <div class="form-check mt-4">
                            <input type="checkbox" wire:model="is_approved" id="is_approved" value="1"
                                class="form-check-input @error('is_approved') is-invalid border-danger @enderror" {{
                                old('is_approved') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_approved">Approved</label>
                            @error('is_approved')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @endcan

                    <!-- Is Active -->
                    <div class="col-md-2">
                        <div class="form-check mt-4">
                            <input type="checkbox" wire:model="is_active" id="is_active" value="1"
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
                            <input type="checkbox" wire:model="is_featured" id="is_featured" value="1"
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
                        <select wire:model="tags[]" id="tags"
                            class="form-select select2 form-select-lg @error('tags') is-invalid border-danger @enderror"
                            multiple style="min-height: 58px; padding: 0.375rem 0.75rem; border-radius: 0.375rem;">
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ collect(old('tags'))->contains($tag->id) ? 'selected' : ''
                                }}>
                                {{ $tag->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('tags')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Author ID (Hidden or dynamic based on auth) -->
                    <input type="hidden" wire:model="author_id" value="{{ auth()->id() }}">

                    <!-- Submit -->
                    <div class="col-12 mt-4">
                        <div class="row g-3 justify-content-end">
                            <div class="col-auto">
                                <button type="button" onclick="window.history.back();"
                                    class="btn btn-phoenix-primary px-5">
                                    Cancel
                                </button>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary px-5 px-sm-15">Create Post</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
        <script>
            let quill; 
            document.addEventListener('livewire:navigated', () => {
                const toolbarOptions = [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                    ['link', 'image', 'video', 'formula'],

                    [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent

                    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                    [{ 'font': [] }],
                    [{ 'align': [] }],
                    ['blockquote', 'code-block'],

                    // ['clean']                                         // remove formatting button
                ];

                quill = new Quill('#editor', {
                    modules: {
                        toolbar: toolbarOptions
                    },
                    theme: 'snow'
                });

                quill.on('text-change', function(){
                    @this.set('content', quill.root.innerHTML);
                });
            })
        </script>
    </div>

</div>