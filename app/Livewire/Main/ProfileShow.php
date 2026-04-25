<?php

namespace App\Livewire\Main;

use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules\Password as RulesPassword;

class ProfileShow extends Component
{
    use WithFileUploads;
    public $user;
    public $name, $username, $email, $phone, $tiktok, $facebook, $twitter, $instagram, $biography, $designation, $avatar;
    public $password, $new_password;


    public string $current_password = '';
    public $permissions;
    public $password_confirmation;
    public function mount($userData)
    {
        $user = $userData;
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
            'username' => 'required|string|max:255|unique:users,username,' . $this->user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $this->user->id,
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $user = $this->user;

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
                'password' => [
                    'required',
                    'string',
                    'confirmed',
                    'different:current_password',
                    RulesPassword::min(12)->letters()->mixedCase()->numbers()
                        ->symbols()->uncompromised(),
                ],
            ]);

            $this->user->update([
                'password' => Hash::make($validated['password']),
            ]);

            $this->reset('current_password', 'password', 'password_confirmation');
            flash()->success('Password Updated');
            $this->dispatch('password-updated');
        } catch (ValidationException $e) {

            throw $e;
        }
    }




    public function render()
    {
        return view('livewire.main.profile-show');
    }
}
