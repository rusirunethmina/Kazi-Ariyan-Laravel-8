@extends('admin.admin_master')

@section('content')

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
                          <h2>All Sliders</h2>
                      </div>
                      <div class="card-body">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">Sl No</th>
                                      <th scope="col">Title</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Slider Image</th>
                                      <th scope="col">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($slider as $data)
                                      <tr>
                                          <th scope="row">{{ $data->id }}</th>
                                          <td>{{ $data->title }}</td>
                                          <td>{{ $data->descripition }}</td>
                                          <td><img style="width: 60px; height:40px;" src="{{ asset($data->image) }}"
                                                  src="Logo"></td>
                                          <td>
                                              <a href="{{ url('slider/edit/' . $data->id) }}"
                                                  class="btn btn-info">Edit</a>
                                              <a href="{{ url('slider/delete/' . $data->id) }}"
                                                  class="btn btn-danger" onclick="return confirm('Are your sure to delete?')">Delete</a>
                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <div class="col-4">
                  <div class="card">
                      <div class="card-header">
                          <h2>Add Slider</h2>
                      </div>
                      <div class="card-body">
                          <form action="{{ route('StoreSlider') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Title:</label>
                                  <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                      placeholder="Enter title">
                                  @error('title')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div><br />
                              <div class="form-group">
                                <label for="exampleInputEmail1">Description:</label>
                                <input type="text" name="desc" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter Description">
                                @error('desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br />
                              <div class="form-group">
                                  <label for="brand_img">Slider Image:</label>
                                  <input type="file" name="image" class="form-control" id="brand_img">
                                  @error('image')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <br>
                              <button class="btn btn-primary">Add Slider</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  @endsection
