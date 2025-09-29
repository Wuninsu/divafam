<?php

namespace App\Livewire\Main;

use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminte\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Livewire\Attributes\On;

class ProfileIndex extends Component
{
    use WithFileUploads;
    public $user;
    public $name, $username, $email, $phone, $tiktok, $facebook, $twitter, $instagram, $biography, $designation, $avatar;
    public $password, $new_password;


    public string $current_password = '';
    public $permissions;
    public $password_confirmation;
    public function mount()
    {
        $user = Auth::user();
        $this->user = $user;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->phone = $user->phone;

        // Load metas
        $this->facebook = $user->getMeta('facebook');
        $this->twitter = $user->getMeta('twitter');
        $this->biography = $user->getMeta('biography');
        $this->instagram = $user->getMeta('instagram');
        $this->tiktok = $user->getMeta('tiktok');
        $this->designation = $user->getMeta('designation');
    }


    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();

        // Handle avatar upload
        if ($this->avatar) {
            if ($user->avatar_url) {
                deleteImage($user, 'avatar_url');
            }
            $user->avatar_url = uploadFile($this->avatar, 'avatars');
        }

        // Update base user
        $user->update([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            'avatar_url' => $user->avatar_url,
        ]);

        // Save metas
        $this->updateMeta($user, 'facebook', $this->facebook);
        $this->updateMeta($user, 'tiktok', $this->tiktok);
        $this->updateMeta($user, 'twitter', $this->twitter);
        $this->updateMeta($user, 'instagram', $this->instagram);
        $this->updateMeta($user, 'biography', $this->biography);
        $this->updateMeta($user, 'designation', $this->designation);

        flash('Profile updated successfully!', 'success');
    }

    private function updateMeta(User $user, $key, $value)
    {
        if ($value === null)
            return;

        UserMeta::updateOrCreate(
            ['user_id' => $user->id, 'meta_key' => $key],
            ['meta_value' => $value]
        );
    }

    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', RulesPassword::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');
        flash()->success('Password Updated');
        $this->dispatch('password-updated');
    }


    public function deleteConfirm()
    {
        $this->dispatch('open-delete-modal');
    }

    public $confirm_password;
    public function deleteAccount()
    {
        $this->validate([
            'confirm_password' => ['required', 'string', 'current_password'],
        ]);

        $user = Auth::user();


        // Delete avatar if exists
        if ($user->avatar_url) {
            deleteImage($user, 'avatar_url');
        }

        // Delete user metas
        UserMeta::where('user_id', $user->id)->delete();

        // Finally delete user
        $user->delete();
        Auth::logout();
    }
    public function render()
    {
        return view('livewire.main.profile-index');
    }
}
