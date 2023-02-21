<div class="container p-5">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            @if (session()->has('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
            {{-- <input wire:model.lazy="message" type="text" class="form-control"> --}}
            <input type="text" class="form-control" value="{{$count}}" readonly>
            <button class="btn btn-success mt-2" wire:click="increment">Counter +</button>
            <button class="btn btn-danger mt-2" wire:click="decrement">Counter -</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <table class="table caption-top">
                <caption>List of users</caption>
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($students as $key => $student)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$student->name}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="text-center fw-bold">Belum ada data</td>    
                    </tr>  
                    @endforelse
                </tbody>
              </table>
        </div>
    </div>
</div>
