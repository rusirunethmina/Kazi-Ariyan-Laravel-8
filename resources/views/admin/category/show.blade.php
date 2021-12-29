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
                        <!-- alert on -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif
                        <!-- alert off -->
                        <div class="card-header">
                            <h2>All Category</h2>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sl No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach ($category as $data)
                                        <tr>
                                            <th scope="row">{{ $category->firstItem() + $loop->index }}</th>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>
                                                @if ($data->created_at == null)
                                                    <span class="text-danger">No Date Set</span>
                                                @else
                                                    {{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('category/edit/' . $data->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ url('category/delete/' . $data->id) }}"
                                                    class="btn btn-success">Trash</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $category->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h2>Add Category</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('StoreCategory') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter category name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div> <br>
                                <button class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <br><br>



        {{-- trash part --}}
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h2>Trash List</h2>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sl No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach ($trash as $data)
                                        <tr>
                                            <th scope="row">{{ $category->firstItem() + $loop->index }}</th>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>
                                                @if ($data->created_at == null)
                                                    <span class="text-danger">No Date Set</span>
                                                @else
                                                    {{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('category/restore/' . $data->id) }}"
                                                    class="btn btn-primary">Restore</a>
                                                <a href="{{ url('category/delete/permant/' . $data->id) }}"
                                                    class="btn btn-danger">Delete Permant</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $trash->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- trash part --}}
    </div>
</x-app-layout>
