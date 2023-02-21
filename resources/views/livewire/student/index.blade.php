<div class="container p-5">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
             @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card shadow">
                <div class="card-body">
                    @if (!$updateMode)
                        <livewire:student.create/>
                    @else
                        <livewire:student.edit :studentid='0'/>
                    @endif
                </div>
            </div>
           
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <p class="fw-bold fs-5 text">List of students</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <input type="text" class="form-control" id="search" name="search" wire:model="search" placeholder="Search by name...">
                        </div>
                    </div>
                    <table class="table caption-top">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $key => $student)
                            <tr>
                                <th scope="row">{{$key + 1}}</th>
                                <td>{{ucwords($student->name)}}</td>
                                <td>
                                    <button class="btn btn-warning fw-bold text-white shadow" wire:click="edit({{$student->id}})">Edit</button>
                                    <button class="btn btn-danger fw-bold shadow" wire:click.prevent="delete({{$student->id}})">Delete</button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center fw-bold">Belum ada data</td>    
                            </tr>  
                            @endforelse
                        </tbody>
                      </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
