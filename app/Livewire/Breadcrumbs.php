<?php

namespace App\Livewire;

use Livewire\Component;

class Breadcrumbs extends Component
{
    public $breadcrumbs;
    public $currentPage;
    public function render()
    {
        return view('livewire.breadcrumbs');
    }
}
