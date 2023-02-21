<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class Create extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.student.create');
    }

    private function resetInputFields()
    {
        $this->name = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
        ]);

        Student::create($validatedDate);

        session()->flash('message', 'Student Created Successfully.');

        $this->resetInputFields();
        $this->emit('reRenderParent');
    }
}
