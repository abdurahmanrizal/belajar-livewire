<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class Post extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }
    public function decrement()
    {
        if ($this->count <= 0) {
            $this->count = 0;
            session()->flash('message', 'Angka tidak boleh kurang dari 0');
        } else {
            $this->count--;
        }
    }


    public function render()
    {
        $students = Student::all();
        return view('livewire.post', compact('students'));
    }
}
