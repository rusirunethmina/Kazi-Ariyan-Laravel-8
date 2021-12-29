  @extends('admin.admin_master')

  @section('content')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        {{-- <!-- alert on -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif
                        <!-- alert off --> --}}
                        <div class="card-header">
                            <h2>All Brands</h2>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sl No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $data)
                                        <tr>
                                            <th scope="row">{{ $brands->firstItem() + $loop->index }}</th>
                                            <td>{{ $data->name }}</td>
                                            <td><img style="width: 60px; height:40px;" src="{{ asset($data->image) }}"
                                                    src="Logo"></td>
                                            <td>{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ url('brand/edit/' . $data->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ url('brand/delete/' . $data->id) }}"
                                                    class="btn btn-danger" onclick="return confirm('Are your sure to delete?')">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $brands->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h2>Add Brands</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('StoreBrand') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Name:</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Brand name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><br />
                                <div class="form-group">
                                    <label for="brand_img">Brand Image:</label>
                                    <input type="file" name="image" class="form-control" id="brand_img">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <button class="btn btn-primary">Add Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
