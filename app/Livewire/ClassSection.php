<?php

namespace App\Livewire;


use App\Models\Section;
use App\Models\StudentClass;use Livewire\Component;

class ClassSection extends Component
{
    public $selectedClass;
    public $sections = [];

    public function render()
    {
        $classes = StudentClass::all();
        return view('livewire.dynamic-dropdowns', compact('classes'));
    }

    public function updatedSelectedClass()
    {
        if ($this->selectedClass) {
            $class = StudentClass::with('sections')->find($this->selectedClass);
            $this->sections = $class ? $class->sections : [];
        } else {
            $this->sections = [];
        }
    }

}
