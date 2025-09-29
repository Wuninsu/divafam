<div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.5/js/lightbox.min.js"
        integrity="sha512-KbRFbjA5bwNan6DvPl1ODUolvTTZ/vckssnFhka5cG80JVa5zSlRPCr055xSgU/q6oMIGhZWLhcbgIC0fyw3RQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.5/css/lightbox.css"
        integrity="sha512-DKdRaC0QGJ/kjx0U0TtJNCamKnN4l+wsMdION3GG0WVK6hIoJ1UPHRHeXNiGsXdrmq19JJxgIubb/Z7Og2qJww=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('media.index') }}">Media</a></li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>
        <div class="mb-3">
            <h2 class="mb-0 fs-5">{{ $mediaItems->first()->project->title }} Images</h2>
            <div class="row gallery mt-4">
                @forelse($mediaItems as $image)
                <div class="col-lg-3 col-md-4 col-xs-6 thumb text-center">
                    <div class="card p-0">
                        <div class="card-body p-0 mb-2">
                            <a href="{{ asset($image->path ?? NO_IMAGE) }}" data-lightbox="gallery"
                                data-title="Image Preview">
                                <img class="img-fluid img-thumbnail" src="{{ asset($image->path) }}" alt="Image"
                                    style="height: 200px; object-fit: cover; width: 100%;">
                            </a>
                            <div class="mt-2">
                                <button wire:click="delete({{ $image->id }})"
                                    class="btn btn-danger btn-sm">Delete</button>
                                <button wire:click="selectImageForUpdate({{ $image->id }})"
                                    class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#updateImageModal">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="card border-danger text-center mx-auto mt-3 w-100">
                    <div class="card-body">
                        <i class="fa fa-exclamation-circle fa-2x text-danger fs-3"></i>
                        <h5 class="card-title text-danger mt-2">No media items Found</h5>
                    </div>
                </div>
                @endforelse


                <div class="d-flex justify-content-center mt-4">
                    {{ $mediaItems->links() }}
                </div>

                <!-- Update Image Modal -->
                <div wire:ignore.self class="modal fade" id="updateImageModal" tabindex="-1"
                    aria-bs-labelledby="updateImageModalLabel" aria-bs-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateImageModalLabel">Update Image</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if ($selectedImage)
                                <img src="{{ asset($newImage ? $newImage->temporaryUrl() : $selectedImage->path) }}"
                                    class="img-fluid mb-2" style="height: 350px; object-fit: cover; width: 100%;">
                                @endif
                                <input type="file" wire:model="newImage" class="form-control mb-2">
                                @error('newImage')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">Close</button>
                                <button wire:click="updateImage" class="btn btn-success">Update Image</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @script
    <script>
        $wire.on('show-update-modal', (event) => {
                $('#updateImageModal').modal('show');
            });
            $wire.on('close-update-modal', (event) => {
                $('#updateImageModal').modal('hide');
            });
    </script>
    @endscript
</div>