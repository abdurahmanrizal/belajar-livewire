<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class Index extends Component
{
    public $students, $updateMode = false, $student_id, $search;

    protected $listeners = ['reRenderParent', 'cancelForm', 'reRenderParentUpdate'];
    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);

        if (!$this->search) {
            $data = Student::all();
        } else {
            $data = Student::where('name', 'like', '%' . $this->search . '%')->get();
        }
        $this->students = $data;
    }

    public function reRenderParent()
    {
        $this->mount();
        $this->render();
    }

    public function reRenderParentUpdate()
    {
        $this->updateMode = false;
        $this->mount();
        $this->render();
    }


    public function cancelForm()
    {
        $this->updateMode = false;
    }

    public function render()
    {
        $this->mount();
        return view('livewire.student.index');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $this->student_id = $id;
        $this->emit('showEdit', $id);
    }

    public function delete($id)
    {
        Student::find($id)->delete();
        $this->mount();
    }
}
