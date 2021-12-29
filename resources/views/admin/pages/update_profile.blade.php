@extends('admin.admin_master')

@section('content')
    <div class="card card-default">
        <!-- alert on -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        <!-- alert off -->
        <div class="card-header card-header-border-bottom">
            <h2>User Update Profile</h2>
        </div>
        <div class="card-body">
            <form class="form-pill" action="{{ route('profile.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlPassword3">User Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user['name'] }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlPassword3">E-mail</label>
                    <input type="email" class="form-control" name="email" value="{{ $user['email'] }}">
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </div>

@endsection
