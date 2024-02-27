@extends('layouts.admintemplate')

@section('title')
DashBoard
@endsection

@section('content')
<div class="container p-4 mt-3">
    <div class="row">
        <div class="col-md-12 mx-auto text-center">
            <h2>Change Password</h2>
        </div>

        <form action="{{ url('/change/pass/up', $slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="password" name="current_password" placeholder="Enter Your Current Password" class="form-control my-3">
                @error('current_password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Enter Your New Password" class="form-control my-3">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Confirm Your New Password" class="form-control my-3">
            </div>

            <button type="submit" class="btn btn-success shadow">Change Password</button>
        </form>
    </div>
</div>

@if(Session::has('message'))
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
    };

    toastr.success("<strong>{{ Session::get('message') }}</strong>")
</script>
@endif


@if(Session::has('error'))
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
    };

    toastr.error("<strong>{{ Session::get('error') }}</strong>")
</script>
@endif

@endsection