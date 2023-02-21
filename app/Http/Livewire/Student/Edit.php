<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class Edit extends Component
{
    public $studentid, $studentname;
    protected $listeners = ['showEdit'];

    public function mount($studentid, $studentname = 0)
    {
        $this->studentid = $studentid;
        $this->studentname = $studentname;
    }

    private function resetInputFields()
    {
        $this->studentid = '';
        $this->studentname = '';
    }

    public function cancel()
    {
        $this->resetInputFields();
        $this->emit('cancelForm');
    }

    public function showEdit($studentid)
    {
        $student = Student::find($studentid);
        $this->studentid = $student->id;
        $this->studentname = $student->name;
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'studentname' => 'required',
        ]);

        $student = Student::find($this->studentid);
        $student->update(['name' => $this->studentname]);

        $this->resetInputFields();
        $this->emit('reRenderParentUpdate');
    }

    public function render()
    {
        return view('livewire.student.edit');
    }
}
