<?php

namespace App\Livewire\Main;

use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class MediaShow extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $projectId;
    public $selectedImage;
    public $newImage;

    public function mount($projectId)
    {
        $this->projectId = $projectId;
    }
    // Get media images related to the project
    public function getLoadMediaImagesProperty()
    {
        return Media::where('project_id', $this->projectId)
            ->latest()
            ->paginate(paginationLimit());
    }

    public function delete($id)
    {
        $image = Media::findOrFail($id);

        deleteImage($image, 'path');
        // Delete from database
        $image->delete();
        session()->flash('success', 'Image deleted successfully.');
    }

    public function selectImageForUpdate($id)
    {
        $this->selectedImage = Media::findOrFail($id);
        $this->dispatch('show-update-modal');
    }

    public function updateImage()
    {
        if ($this->newImage) {
            $this->validate([
                'newImage' => 'image|max:2048',
            ]);

            // Delete old image from storage
            deleteImage($this->selectedImage, 'path');

            $file_name = rand(1, 9999999999) . $this->projectId;
            // Save new image
            $filePath = uploadFile($this->newImage, 'media/' . $this->projectId, $file_name);
            if ($this->selectedImage->path) {
                if ($filePath) {
                    if (Storage::disk('public')->exists($this->selectedImage->path)) {
                        deleteImage($this->selectedImage, 'path');
                    }
                }
            }

            // Update database record
            $this->selectedImage->update([
                'filename' => $file_name,
                'path' => $filePath,
                'alt_text' => 'image_' . $file_name,
            ]);
            flash()->success('Image updated successfully.');
        }
        $this->reset(['newImage','selectedImage']);

        $this->dispatch('close-update-modal');
    }


    // Render the component view
    public function render()
    {
        return view('livewire.main.media-show', [
            'mediaItems' => $this->loadMediaImages
        ]);
    }
}
