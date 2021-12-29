<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h2>Edit Category</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('category/update/'.$data->id )}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Name</label>
                                    <input type="text" name="name" value="{{ $data->name }}" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter category name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div> <br>
                                <button class="btn btn-primary">Edit Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
