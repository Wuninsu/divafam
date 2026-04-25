<?php

namespace App\Livewire\Guest;

use App\Models\Document;
use Livewire\Component;

class Impact extends Component
{
    public $perPage = 10;
    public function mount()
    {
        $this->perPage = 10;
    }
    public function loadMore()
    {
        $this->perPage += 10;
    }
    public function render()
    {
        return view('livewire.guest.impact', [
            'documents' => Document::latest()->paginate($this->perPage),
        ]);
    }
}
