<?php

namespace App\Livewire\Main\Pages;

use App\Models\HomeContent;
use App\Models\SetupMeta;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class HomeIndex extends Component
{
    use WithFileUploads;

    public $howItWorks = [];
    public $howItWorksImage;

    public $communityImpact = [];

    public $communityImpactImages = []; // for uploads
    public $existingCommunityImpactImages = []; // for stored paths

    public $carouselItems = [];
    public $carouselItemsImages = [];
    public $imagePreviews = [];

    public function mount()
    {
        // How It Works
        $how = HomeContent::where('type', 'how_it_works')->first();
        if ($how) {
            $this->howItWorks = $how->steps ?? [];
            $this->howItWorksImage = $how->image_1 ?? null;
        }

        // Community Impact
        $impact = HomeContent::where('type', 'community_impact')->first();
        if ($impact) {
            $this->communityImpact = $impact->community_impact ?? [];
            // Stored images (strings)
            $this->existingCommunityImpactImages = [
                $impact->image_1 ?? null,
                $impact->image_2 ?? null,
            ];
            // Upload inputs (start empty)
            $this->communityImpactImages = [null, null];
        }

        // Carousel (multiple records)

        $carousel = HomeContent::where('type', 'carousel')->first();
        if ($carousel) {
            $this->carouselItems = $carousel->carousel_items ?? [];
        }
    }

    /* ---------------- HOW IT WORKS ---------------- */
    public function addStep()
    {
        $this->howItWorks[] = ['title' => '', 'description' => ''];
    }

    public function removeStep($index)
    {
        unset($this->howItWorks[$index]);
        $this->howItWorks = array_values($this->howItWorks);


        // If no more how_it_works items left delete record + images
        if (empty($this->howItWorks)) {
            $existing = HomeContent::where('type', 'how_it_works')->first();
            if ($existing) {
                // Delete stored images
                foreach (['image_1', 'image_2'] as $field) {
                    if (!empty($existing->$field) && Storage::disk('public')->exists($existing->$field)) {
                        Storage::disk('public')->delete($existing->$field);
                    }
                }
                $existing->delete();
            }
        }

        // Update the DB JSON field
        HomeContent::where('type', 'how_it_works')->update([
            'steps' => $this->howItWorks
        ]);
        flash('Steps removed!', 'success');
    }

    public function saveHowItWorks()
    {
        $this->validate(
            [
                'communityImpact.*.title' => 'required|string',
                'communityImpact.*.description' => 'required|string',
                'communityImpactImages' => 'nullable|array',
                'communityImpactImages.*' => 'nullable|image|max:2048',
            ],
            [
                'communityImpact.*.title.required' => 'Each impact item must have a title.',
                'communityImpact.*.description.required' => 'Each impact item must have a description.',

                'communityImpactImages.*.image' => 'Please upload a valid image file (JPG, PNG, etc).',
                'communityImpactImages.*.max' => 'Each image must not be larger than 2MB.',
            ]
        );

        $existing = HomeContent::where('type', 'how_it_works')->first();

        // If steps are empty, delete record + image
        if (empty($this->howItWorks)) {
            if ($existing) {
                if (!empty($existing->image_1) && Storage::disk('public')->exists($existing->image_1)) {
                    deleteImage($existing, $existing->image_1);
                }
                $existing->delete();
            }
            flash('How It Works removed!', 'success');
            return;
        }

        $data = [
            'title' => 'How It Works',
            'steps' => $this->howItWorks,
            'type' => 'how_it_works',
        ];

        if ($this->howItWorksImage && !is_string($this->howItWorksImage)) {
            // Delete old image if exists
            if ($existing && !empty($existing->image_1) && Storage::disk('public')->exists($existing->image_1)) {
                deleteImage($existing, $existing->image_1);
            }
            $data['image_1'] = uploadFile($this->howItWorksImage, 'uploads/how-it-works');
        } elseif ($existing) {
            // Keep old one if no new upload
            $data['image_1'] = $existing->image_1;
        }

        HomeContent::updateOrCreate(
            ['type' => 'how_it_works'],
            $data
        );

        flash('How It Works saved!', 'success');
    }


    /* ---------------- COMMUNITY IMPACT ---------------- */
    public function addCommunityImpactItem()
    {
        $this->communityImpact[] = ['icon' => '', 'title' => '', 'description' => ''];
    }

    public function removeCommunityImpactItem($index)
    {
        unset($this->communityImpact[$index]);
        $this->communityImpact = array_values($this->communityImpact);

        // If no more community impact items left → delete record + images
        if (empty($this->communityImpact)) {
            $existing = HomeContent::where('type', 'community_impact')->first();
            if ($existing) {
                // Delete stored images
                foreach (['image_1', 'image_2'] as $field) {
                    if (!empty($existing->$field) && Storage::disk('public')->exists($existing->$field)) {
                        Storage::disk('public')->delete($existing->$field);
                    }
                }
                $existing->delete();
            }
        }

        // Update the DB JSON field
        HomeContent::where('type', 'community_impact')->update([
            'community_impact' => $this->communityImpact
        ]);

        flash('Community Impact item removed!', 'success');
    }

    public function saveCommunityImpact()
    {
        $this->validate([
            'communityImpact.*.title' => 'required|string',
            'communityImpact.*.description' => 'required|string',
            'communityImpactImages.*' => 'nullable|image|max:2048',
        ]);

        $existing = HomeContent::where('type', 'community_impact')->first();

        $data = [
            'title' => 'Community Impact',
            'community_impact' => $this->communityImpact,
            'type' => 'community_impact',
        ];

        foreach ($this->communityImpactImages as $index => $file) {
            if ($file && !is_string($file)) {
                // Delete old image if exists
                $oldField = "image_" . ($index + 1);
                if ($existing && !empty($existing->$oldField) && Storage::disk('public')->exists($existing->$oldField)) {
                    Storage::disk('public')->delete($existing->$oldField);
                    deleteImage($existing, $existing->$oldField);
                }
                // Save new one
                $data[$oldField] = uploadFile($file, 'uploads/impact');
            } elseif ($existing) {
                // Preserve old image if no new one uploaded
                $data["image_" . ($index + 1)] = $existing->{"image_" . ($index + 1)};
            }
        }

        foreach ([1, 2] as $i) {
            $field = "image_$i";

            // Default to existing image
            $data[$field] = $this->existingCommunityImpactImages[$i - 1] ?? null;

            // If new file uploaded → replace
            if (
                !empty($this->communityImpactImages[$i - 1]) &&
                !is_string($this->communityImpactImages[$i - 1])
            ) {

                if (!empty($data[$field])) {
                    // Storage::disk('public')->delete($data[$field]);
                    deleteImage($data, $data[$field]);
                }

                $data[$field] = uploadFile($this->communityImpactImages[$i - 1], 'uploads/impact');
            }
        }
        HomeContent::updateOrCreate(
            ['type' => 'community_impact'],
            $data
        );

        flash('Community Impact saved!', 'success');
    }


    /* ---------------- CAROUSEL ---------------- */
    public function updatedCarouselItemsImages($value, $index)
    {
        // Generate a URL for the uploaded image
        $this->imagePreviews[$index] = $value->temporaryUrl(); // Show temporary image preview
    }
    public function addCarouselItem()
    {
        $this->carouselItems[] = [
            'id' => null,
            'title' => '',
            'description' => '',
            'image_1' => '',
            'button_text' => '',
            'button_link' => '',
            'order' => 0,
        ];
    }

    public function removeCarouselItem($index)
    {
        $item = $this->carouselItems[$index] ?? null;

        if (!$item)
            return;

        // Delete image if exists on disk
        if (!empty($item['image']) && Storage::disk('public')->exists($item['image'])) {
            Storage::disk('public')->delete($item['image']);
        }

        // Remove from array
        unset($this->carouselItems[$index]);
        $this->carouselItems = array_values($this->carouselItems);

        if (empty($this->carouselItems)) {
            // Delete parent if no items left
            $carousel = HomeContent::where('type', 'carousel')->first();
            if ($carousel) {
                $carousel->delete();
            }
        } else {
            // Update the DB JSON field
            HomeContent::where('type', 'carousel')->update([
                'carousel_items' => $this->carouselItems
            ]);
        }

        flash('Carousel item removed!', 'success');
    }



    public function saveCarouselItems()
    {
        $validated = $this->validate([
            'carouselItems.*.title' => 'required|string',
            'carouselItems.*.description' => 'required|string',
            'carouselItems.*.button_text' => 'nullable|string',
            'carouselItems.*.button_link' => 'nullable|url',
            'carouselItems.*.order' => 'nullable|integer',
            'carouselItemsImages.*' => 'nullable|image|max:2048',
        ]);

        foreach ($validated['carouselItems'] as $index => &$item) {
            // If new image uploaded, store it
            if (!empty($this->carouselItemsImages[$index]) && !is_string($this->carouselItemsImages[$index])) {
                $path = uploadFile($this->carouselItemsImages[$index], 'uploads/slides');
                $item['image'] = $path;
            } else {
                // Preserve the old image if available
                $item['image'] = $this->carouselItems[$index]['image'] ?? null;
            }
        }

        // Save everything at once
        HomeContent::updateOrCreate(
            ['type' => 'carousel'],
            [
                'title' => 'Carousel',
                'carousel_items' => $validated['carouselItems'],
            ]
        );

        flash('Carousel updated!', 'success');
    }


    public function render()
    {
        return view('livewire.main.pages.home-index');
    }
}
