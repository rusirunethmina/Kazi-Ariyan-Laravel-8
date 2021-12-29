@extends('admin.admin_master')

@section('content')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <!-- alert on -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    <!-- alert off -->
                    <div class="card">
                        <div class="card-header">
                            <h2>Edit Brand</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('brand/update/' . $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $data->image }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Name</label>
                                    <input type="text" name="name" value="{{ $data->name }}" class="form-control"
                                        id="exampleInputEmail1" placeholder="Enter Brand name">
                                    @error('name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Image</label>
                                    <input type="file" name="image" value="{{ $data->image }}" class="form-control"
                                        id="exampleInputEmail1">
                                </div><br />
                                @error('image')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror

                                <div class="form-group">
                                    <img src="{{ asset($data->image) }}" style="width: 400px; height:200px;"
                                        alt="no image">
                                </div><br>
                                <button class="btn btn-primary">Edit Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
