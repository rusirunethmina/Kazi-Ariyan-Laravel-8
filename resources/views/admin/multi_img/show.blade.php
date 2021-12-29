<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Multi Images') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <!-- alert on -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                <!-- alert off -->
                <div class="col-8">
                    <div class="card-group">
                        @foreach ($multiImages as $data)
                            <div class="col-md-4 mt-2">
                                <div class="card">
                                  <img src="{{ asset($data->image) }}" alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h2>Add Multi Images</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('storeMultiImages') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="brand_img">Multi Image:</label>
                                    <input type="file" name="image[]" class="form-control" id="brand_img" multiple="">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <button class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
