<?php

namespace App\Livewire\Main;

use App\Models\Media;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class MediaManagement extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $images = [];
    public $type = 'image'; // Default to 'image'
    public $alt_text; // Alt text will be auto-generated
    public $project_id;

    public $collectionId;

    // Validation rules
    protected $rules = [
        'images.*' => 'required|file|mimes:jpeg,png,jpg,gif|max:10240',
        'project_id' => 'required|exists:projects,id',
    ];


    public function submitMedia()
    {
        if (empty($this->images)) {
            flash()->error('Please select at least one image.');
            return;
        }

        // Validate the form fields
        $this->validate();

        // Start the database transaction
        DB::beginTransaction();

        try {
            // Loop through the files and store them
            foreach ($this->images as $key => $file) {
                // Generate a unique filename
                $file_name = rand(1, 9999999999) . $this->project_id . $key;

                // Store the file in the 'public/media/{project_id}' directory
                $filePath = uploadFile($file, 'media/' . $this->project_id, $file_name);


                // Auto-generate alt text based on the filename (you can modify this)
                $altText = $this->alt_text ?? "image_$file_name";

                // Create a new media record
                Media::create([
                    'filename' => $file_name,
                    'type' => $this->type,
                    'path' => $filePath,
                    'alt_text' => $altText,
                    'uploaded_by' => auth('web')->id(), // Logged-in user
                    'project_id' => $this->project_id,
                ]);
            }

            // Commit the transaction if all is good
            DB::commit();

            // Reset form fields after submission
            $this->reset('images', 'project_id');

            // Trigger an event to close the modal
            $this->dispatch('close-modal');

            // Flash success message
            flash()->success('Images uploaded successfully.');

        } catch (\Exception $e) {
            // Rollback the transaction if any error occurs
            DB::rollBack();

            // Log the error for debugging
            Log::error('Error while uploading images: ' . $e->getMessage());

            // Optionally, flash error message to the user
            flash()->error('An error occurred while uploading the images. Please try again.');
        }
    }


    public function getLoadMediaImagesProperty()
    {
        // First, get the paginated data
        $mediaPaginator = Media::with('project')
            ->latest()
            ->paginate(1); // You can change 1 to your desired number of items per page

        // Group the media by project_id after fetching the data
        $mediaPaginator->getCollection()->transform(function ($media) {
            return $media->groupBy('project_id');
        });

        return $mediaPaginator;
    }


    public function deleteCollection($id)
    {
        $this->collectionId = $id;
        sweetalert()
            ->showConfirmButton(true, 'Yes, Delete it!', 'red')
            ->showDenyButton(true, 'Cancel', 'blue')
            ->info('Are you sure you want to delete this media collection? This will delete all image related to the named project.');
    }



    #[On('sweetalert:confirmed')]
    public function onConfirmed(array $payload): void
    {
        $collection = Media::where('project_id', $this->collectionId)->get();

        if ($collection) {
            foreach ($collection as $img) {
                deleteImage($img, 'path');
                $img->delete();
            }
            flash()->success('Collection deleted successfully.');
        } else {
            flash()->warning('Collection not found.');
        }
    }

    #[On('sweetalert:denied')]
    public function onDeny(array $payload): void
    {
        flash()->info('Deletion cancelled.');
    }

    public function render()
    {
        $projects = Project::where('is_active', true)->get();
        $allMedia = Media::with('project')->get()
            ->groupBy('project_id');
        return view('livewire.main.media-management', compact('projects', 'allMedia'));
    }
}
