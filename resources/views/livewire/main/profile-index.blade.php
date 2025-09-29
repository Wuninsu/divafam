<div>
    <div class="">
        <div class="mb-9">
            <div class="row g-6">
                <div class="col-12 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-header hover-actions-trigger position-relative mb-6"
                            style="min-height: 130px; ">
                            <div class="bg-holder rounded-top"
                                style="background-image: linear-gradient(0deg, #000000 -3%, rgba(0, 0, 0, 0) 83%), url({{asset(setup_data('other_image') ?? NO_IMAGE)}})">
                                <input class="d-none" id="upload-settings-cover-image" type="file"><label
                                    class="cover-image-file-input" for="upload-settings-cover-image"></label>
                                <div class="hover-actions end-0 bottom-0 pe-1 pb-2 text-white dark__text-gray-1100">
                                    <span class="fa-solid fa-camera me-2"></span>
                                </div>
                            </div><input class="d-none" id="upload-settings-porfile-picture" type="file"><label
                                class="avatar avatar-4xl status-online feed-avatar-profile cursor-pointer"
                                for="upload-settings-porfile-picture"><img
                                    class="rounded-circle img-thumbnail shadow-sm border-0"
                                    src="{{asset( $avatar ? $avatar->temporaryUrl() : $this->user->avatar_url ?? NO_IMAGE)}}"
                                    width="200" alt=""></label>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    {{-- User Name + Role --}}
                                    <div class="d-flex flex-wrap mb-2 align-items-center">
                                        <h3 class="me-2">{{ $user->name ?? 'Unknown' }}</h3>
                                        <span class="badge bg-primary text-capitalize">
                                            {{ $user->roles->pluck('name')->first() ?? 'Member' }}
                                        </span>
                                    </div>

                                    {{-- Extra User Details --}}
                                    <div class="mt-3">
                                        <p class="mb-1"><i class="fa-solid fa-envelope me-2 text-muted"></i> {{
                                            $user->email }}</p>
                                        <p class="mb-1"><i class="fa-solid fa-phone me-2 text-muted"></i> {{
                                            $user->phone ?? 'N/A' }}</p>
                                        <p class="mb-0"><i class="fa-solid fa-location-dot me-2 text-muted"></i> {{
                                            $user->location ?? 'Not
                                            specified' }}</p>
                                    </div>

                                    {{-- Stats (if connected to projects) --}}
                                    <div class="mt-3 d-flex gap-3">
                                        <span>Since: <strong>{{ $user->created_at->format('jS M, Y h:i A')
                                                }}</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom border-translucent border-dashed pb-3 mb-4">
                        <h5 class="text-body mb-3">Who will be able to see your profile?</h5>
                        <div class="form-check"><input class="form-check-input" id="onlyMe" type="radio"
                                checked="checked" name="profiileVisibility"><label class="form-check-label fs-8"
                                for="onlyMe">Only me</label>
                        </div>
                        <div class="form-check"><input class="form-check-input" id="myFollowers" type="radio"
                                name="profiileVisibility"><label class="form-check-label fs-8" for="myFollowers">My
                                followers</label></div>
                        <div class="form-check"><input class="form-check-input" id="everyone" type="radio"
                                name="profiileVisibility"><label class="form-check-label fs-8"
                                for="everyone">Everyone</label></div>
                    </div>
                    <div class="border-bottom border-translucent border-dashed pb-3 mb-4">
                        <h5 class="text-body mb-3">Who can tag you?</h5>
                        <div class="form-check"><input class="form-check-input" id="tagGroupMembers" type="radio"
                                checked="checked" name="tagPermission"><label class="form-check-label fs-8"
                                for="tagGroupMembers">Group Members</label></div>
                        <div class="form-check"><input class="form-check-input" id="tagEveryone" type="radio"
                                name="tagPermission"><label class="form-check-label fs-8"
                                for="tagEveryone">Everyone</label>
                        </div>
                    </div>
                    <div class="border-bottom border-translucent border-dashed pb-3 mb-4">
                        <div class="form-check"><input class="form-check-input" id="showEmail" type="checkbox"
                                name="showEmail"><label class="form-check-label fs-8" for="showEmail">Allow users to
                                show
                                your email</label></div>
                        <div class="form-check"><input class="form-check-input" id="showExperiences" type="checkbox"
                                name="showExperiences"><label class="form-check-label fs-8" for="showExperiences">Allow
                                users to show your experiences</label></div>
                        <div class="form-check"><input class="form-check-input" id="showFollowers" type="checkbox"
                                checked="checked" name="showFollowers"><label class="form-check-label fs-8"
                                for="showFollowers">Allow users to show your followers</label></div>
                    </div>
                    <div class="mb-4">
                        <div class="form-check form-switch"><input class="form-check-input" id="showPhone"
                                type="checkbox" checked="checked" name="showPhone"><label class="form-check-label fs-8"
                                for="showPhone">Show
                                your phone number</label></div>
                        <div class="form-check form-switch"><input class="form-check-input" id="permitFollow"
                                type="checkbox" checked="checked" name="permitFollow"><label
                                class="form-check-label fs-8" for="permitFollow">Permit users to follow you.</label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="border-bottom mb-4">
                        <form wire:submit='updateProfile'>
                            <div class="mb-3">
                                <h4 class="mb-4">Personal Information</h4>
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-icon-container">
                                            <div class="form-floating">
                                                <input class="form-control form-icon-input" id="userName" type="text"
                                                    wire:model='username' placeholder="Username"><label
                                                    class="text-body-tertiary form-icon-label"
                                                    for="userName">USERNAME</label>
                                            </div><span class="fa-solid fa-user text-body fs-9 form-icon"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-icon-container">
                                            <div class="form-floating"><input class="form-control form-icon-input"
                                                    id="fullName" type="text" wire:model='name'
                                                    placeholder="Full Name"><label
                                                    class="text-body-tertiary form-icon-label" for="fullName">Full
                                                    Name</label>
                                            </div><span class="fa-solid fa-user text-body fs-9 form-icon"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-icon-container">
                                            <div class="form-floating"><input class="form-control form-icon-input"
                                                    id="emailSocial" wire:model='email' type="email"
                                                    placeholder="Email"><label
                                                    class="text-body-tertiary form-icon-label" for="emailSocial">ENTER
                                                    YOUR
                                                    EMAIL</label></div><span
                                                class="fa-solid fa-envelope text-body fs-9 form-icon"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-icon-container">
                                            <div class="form-floating"><input class="form-control form-icon-input"
                                                    id="phone" type="tel" wire:model='phone' placeholder="Phone"><label
                                                    class="text-body-tertiary form-icon-label" for="phone">ENTER YOUR
                                                    PHONE</label></div> <span
                                                class="fa-solid fa-phone text-body fs-9 form-icon"></span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-icon-container">
                                            <div class="form-floating"><textarea wire:model='biography'
                                                    class="form-control form-icon-input" id="info"
                                                    style="height: 115px;" placeholder="Info"></textarea><label
                                                    class="text-body-tertiary form-icon-label" for="info">Info</label>
                                            </div>
                                            <span class="fa-solid fa-circle-info text-body fs-9 form-icon"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-0">
                                        <label class="form-label" for="designation">Designation</label>
                                        <input class="form-control" wire:model.live='designation' id="designation"
                                            type="text" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="avatar">Profile picture</label>
                                        <input class="form-control" wire:model.live='avatar' id="avatar" type="file" />
                                    </div>
                                    <div class="mb-3">
                                        <h4 class="mb-2">Social</h4>
                                        <div class="row g-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="form-icon-container">
                                                    <div class="form-floating"><input
                                                            class="form-control form-icon-input" id="facebook"
                                                            type="text" wire:model='facebook'
                                                            placeholder="Facebook"><label
                                                            class="text-body-tertiary form-icon-label"
                                                            for="facebook">Facebook</label>
                                                    </div><span
                                                        class="fa-brands fa-facebook text-body fs-9 form-icon"></span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-icon-container">
                                                    <div class="form-floating"><input
                                                            class="form-control form-icon-input" id="twitter"
                                                            type="text" wire:model='twitter'
                                                            placeholder="Twitter"><label
                                                            class="text-body-tertiary form-icon-label"
                                                            for="twitter">Twitter</label>
                                                    </div><span
                                                        class="fa-brands fa-twitter text-body fs-9 form-icon"></span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-icon-container">
                                                    <div class="form-floating"><input
                                                            class="form-control form-icon-input" id="instagram"
                                                            type="text" wire:model='instagram'
                                                            placeholder="instagram"><label
                                                            class="text-body-tertiary form-icon-label"
                                                            for="instagram">Instagram</label>
                                                    </div><span
                                                        class="fa-brands fa-instagram text-body fs-9 form-icon"></span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-icon-container">
                                                    <div class="form-floating"><input
                                                            class="form-control form-icon-input" id="tiktok" type="text"
                                                            wire:model='tiktok' placeholder="tiktok"><label
                                                            class="text-body-tertiary form-icon-label"
                                                            for="tiktok">Tiktok</label>
                                                    </div>
                                                    <span class="fa-brands fa-tiktok text-body fs-9 form-icon"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end mb-6">
                                    <button class="btn btn-phoenix-primary">Save Information</button>
                                </div>
                            </div>
                        </form>
                        <form wire:submit.prevent="updatePassword">
                            <div class="row gx-3 mb-6 gy-6 gy-sm-3">
                                <div class="col-12">
                                    <h4 class="mb-2">Change Password</h4>
                                    <div class="form-icon-container mb-3">
                                        <div class="form-floating"><input class="form-control form-icon-input @error('current_password') is-invalid border-danger
                                        @enderror" id="oldPassword" type="password" wire:model='current_password'
                                                placeholder="Current password"><label
                                                class="text-body-tertiary form-icon-label" for="oldPassword">Current
                                                Password</label></div><span
                                            class="fa-solid fa-lock text-body fs-9 form-icon"></span>
                                        @error('current_password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-icon-container mb-3">
                                        <div class="form-floating"><input class="form-control form-icon-input @error('password') is-invalid border-danger
                                        @enderror" id="newPassword" type="password" wire:model='password'
                                                placeholder="New password"><label
                                                class="text-body-tertiary form-icon-label" for="newPassword">New
                                                Password</label></div><span
                                            class="fa-solid fa-key text-body fs-9 form-icon"></span>
                                        @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-icon-container">
                                        <div class="form-floating"><input class="form-control form-icon-input @error('password_confirmation') is-invalid border-danger
                                        @enderror" id="newPassword2" type="password" wire:model='password_confirmation'
                                                placeholder="Confirm New password"><label
                                                class="text-body-tertiary form-icon-label" for="newPassword2">Confirm
                                                New
                                                Password</label></div><span
                                            class="fa-solid fa-key text-body fs-9 form-icon"></span>
                                        @error('password_confirmation')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mb-6">
                                <button class="btn btn-phoenix-primary">Update Password</button>
                            </div>
                        </form>
                    </div>
                    <div class="row gy-5">
                        {{-- <div class="col-12 col-md-6">
                            <h4 class="text-body-emphasis">Transfer Ownership</h4>
                            <p class="text-body-tertiary">Transfer this account to another person or to a company
                                repository.</p><button class="btn btn-phoenix-warning">Transfer</button>
                        </div> --}}
                        <div class="col-12 col-md-6">
                            <h4 class="text-body-emphasis">Account Deletion</h4>
                            <p class="text-body-tertiary">Transfer this account to another person or to a company
                                repository.</p>
                            <button class="btn btn-phoenix-danger" wire:click="deleteConfirm">Delete account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="deleteModal" class="modal fade" tabindex="-1"
        aria-labelledby="editRoleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoleModalLabel">Delete Account</h5><button class="btn btn-close p-1"
                        type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form wire:submit.prevent="deleteAccount" class="row g-5">
                        <div class="col-12">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="confirm_password" wire:model='confirm_password' class="form-control @error('confirm_password') is-invalid border-danger
                                    @enderror" placeholder="Password">
                                <label for="confirm_password">Confirm Password</label>
                            </div>
                            @error('confirm_password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" wire:click="deleteAccount" type="button">Delete Account</button>
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    @script
    <script>
        $wire.on('open-delete-modal', (event) => {
                        $('#deleteModal').modal('hide');
                    });
                    $wire.on('open-delete-modal', (event) => {
                        $('#deleteModal').modal('show');
                    });
    </script>
    @endscript
</div>