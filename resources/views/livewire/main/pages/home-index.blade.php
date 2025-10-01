<div>
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Settings</li>
        </ol>
    </nav>
    <div class="mx-n4 mx-lg-n6 px-0 py-3 mb-9 bg-body-emphasis border-y position-relative top-1">



        <div class="container">


            <!-- How It Works Section -->
            <div class="mb-4">
                <h3>How It Works</h3>
                <div class="table-responsive scrollbar ms-n1 ps-1">
                    <table class="table table-sm fs-9 mb-0">
                        <thead>
                            <tr>
                            <tr>
                                <th class="align-middle" style="width:10%; min-width:200px;">Step Title</th>
                                <th class="align-middle" style="width:50%; min-width:200px;">Step Description</th>
                                <th class="align-middle" style="width:10%;">Action</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($howItWorks as $index => $step)
                            <tr>
                                <td>
                                    <input type="text" class="form-control mb-2"
                                        wire:model="howItWorks.{{ $index }}.title" placeholder="Step Title">

                                    @error("howItWorks.$index.title")
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <textarea class="form-control mb-2" wire:model="howItWorks.{{ $index }}.description"
                                        placeholder="Step Description"></textarea>

                                    @error("howItWorks.$index.description")
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" wire:click="removeStep({{ $index }})">
                                        Remove Step
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- Image Upload for "How It Works" -->
                <input type="file" class="form-control mb-3" wire:model="howItWorksImage">
                @error('howItWorksImage')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <button type="button" class="btn btn-primary mb-3" wire:click="addStep">Add Step</button>
                <button type="button" class="btn btn-success mb-3" wire:click="saveHowItWorks">Save How It
                    Works</button>
            </div>


            <!-- Community Impact Section -->
            <div class="mb-4">
                <h3>Community Impact</h3>
                <div class="table-responsive scrollbar ms-n1 ps-1">
                    <table class="table table-sm fs-9 mb-0">
                        <thead>
                            <tr>
                                <th class="align-middle" style="width:30%; min-width:200px;">Icon</th>
                                <th class="align-middle" style="width:10%; min-width:200px;">Title</th>
                                <th class="align-middle" style="width:50%; min-width:200px;">Description</th>
                                <th class="align-middle" style="width:10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($communityImpact as $index => $item)
                            <tr>
                                <td>
                                    <input type="text" class="form-control mb-2"
                                        wire:model="communityImpact.{{ $index }}.icon"
                                        placeholder="Icon (e.g., fas fa-users)">
                                    @error("communityImpact.$index.icon")
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control mb-2"
                                        wire:model="communityImpact.{{ $index }}.title" placeholder="Title">
                                    @error("communityImpact.$index.title")
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <textarea class="form-control mb-2"
                                        wire:model="communityImpact.{{ $index }}.description"
                                        placeholder="Description"></textarea>
                                    @error("communityImpact.$index.description")
                                    <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger"
                                        wire:click="removeCommunityImpactItem({{ $index }})">Remove</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Image Uploads for "Community Impact" -->
                <div class="input-group mb-3">
                    <input type="file" class="form-control mb-2" wire:model="communityImpactImages.0">
                    @error("communityImpactImages.0")
                    <span class="text-danger small">{{ $message }}</span>
                    @enderror

                    <input type="file" class="form-control mb-2" wire:model="communityImpactImages.1">
                    @error("communityImpactImages.1")
                    <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Global error summary -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <button type="button" class="btn btn-primary mb-3" wire:click="addCommunityImpactItem">Add Item</button>
                <button type="button" class="btn btn-success mb-3" wire:click="saveCommunityImpact">Save Community
                    Impact</button>
            </div>
            <!-- Carousel Items Section -->
            <div class="mb-4">
                <h3>Carousel Items</h3>
                <div class="">
                    <div class="table-responsive scrollbar ms-n1 ps-1 mb-3">
                        <table class="table table-sm fs-9 mb-0">
                            <thead>
                                <tr>
                                    <th class="align-middle" style="width:10%; min-width:200px;">Title</th>
                                    <th class="align-middle" style="width:30%; min-width:200px;">Description</th>
                                    <th class="align-middle" style="width:20%; min-width:200px;">More</th>
                                    <th class="align-middle" style="width:30%; min-width:200px;">Image</th>
                                    <th class="align-middle" style="width:10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carouselItems as $index => $carouselItem)
                                <tr>
                                    <!-- Title -->
                                    <td>
                                        <input type="text" class="form-control mb-2"
                                            wire:model="carouselItems.{{ $index }}.title" placeholder="Title">
                                        @error("carouselItems.$index.title")
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </td>

                                    <!-- Description -->
                                    <td>
                                        <textarea class="form-control mb-2"
                                            wire:model="carouselItems.{{ $index }}.description"
                                            placeholder="Description"></textarea>
                                        @error("carouselItems.$index.description")
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </td>

                                    <!-- Button text / link / order -->
                                    <td>
                                        <input type="text" class="form-control mb-2"
                                            wire:model="carouselItems.{{ $index }}.button_text"
                                            placeholder="Button Text">
                                        @error("carouselItems.$index.button_text")
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror

                                        <input type="url" class="form-control mb-2"
                                            wire:model="carouselItems.{{ $index }}.button_link"
                                            placeholder="Button Link (https://...)">
                                        @error("carouselItems.$index.button_link")
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror

                                        <input type="number" class="form-control mb-2"
                                            wire:model="carouselItems.{{ $index }}.order" placeholder="Order">
                                        @error("carouselItems.$index.order")
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </td>

                                    <!-- Image -->
                                    <td style="max-width: 200px;">
                                        <input type="file" class="form-control mb-2"
                                            wire:model="carouselItemsImages.{{ $index }}"
                                            wire:change="$dispatch('imageSelected', {{ $index }})">
                                        @error("carouselItemsImages.$index")
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror

                                        <img src="{{ $imagePreviews[$index] ?? asset( $carouselItem['image']) }}"
                                            alt="Saved Image" style="max-width: 100%; height: auto; margin-top: 3px;">


                                        <!-- Image preview if available -->
                                        {{-- @if (isset($imagePreviews[$index]))
                                        <img src="{{ $imagePreviews[$index] }}" alt="Image Preview"
                                            style="max-width: 100%; height: auto; margin-top: 3px;">
                                        @endif --}}
                                    </td>

                                    <!-- Action -->
                                    <td>
                                        <button type="button" class="btn btn-danger"
                                            wire:click="removeCarouselItem({{ $index }})">Remove</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-primary mb-3" wire:click="addCarouselItem">Add Carousel
                        Item</button>
                    <button type="button" class="btn btn-success mb-3" wire:click="saveCarouselItems">Save Carousel
                        Items</button>
                </div>
            </div>
        </div>
    </div>
    @script
    <script>
        Livewire.on('show-edit-modal', () => {
                new bootstrap.Modal(document.getElementById('editModal')).show();
            });
            Livewire.on('hide-edit-modal', () => {
                bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
            });

            Livewire.on('show-add-modal', () => {
                new bootstrap.Modal(document.getElementById('addModal')).show();
            });
            Livewire.on('hide-add-modal', () => {
                bootstrap.Modal.getInstance(document.getElementById('addModal')).hide();
            });
    </script>
    @endscript
</div>