<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;

class UpdateProfileInformationForm extends Component
{
    use WithFileUploads;

    public $photo;
    public $state = [];

    /**
     * Prepare the component.
     */
    public function mount()
    {
        $user = Auth::user();
        $this->state = [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'profile_photo_path' => $user->profile_photo_path,
        ];
    }

    /**
     * Update the user's profile information.
     */
    public function updateProfileInformation(UpdatesUserProfileInformation $updater)
    {
        $this->resetErrorBag();

        if (isset($this->photo)) {
            $path = $this->photo->store('profile-photos', 'public');
            $this->state['profile_photo_path'] = $path;
        }

        $updater->update(
            Auth::user(),
            $this->state
        );

        if (isset($this->photo)) {
            return redirect()->route('profile.show');
        }

        $this->emit('saved');
        $this->photo = null;
    }

    /**
     * Delete user's profile photo.
     */
    public function deleteProfilePhoto()
    {
        $user = Auth::user();
        if ($user->profile_photo_path) {
            Storage::delete($user->profile_photo_path);
            User::where('id', $user->id)->update([
                'profile_photo_path' => null
            ]);
        }
    }

    /**
     * Render the component.
     */
    public function render()
    {
        return view('profile.update-profile-information-form');
    }
}