@extends('layouts.admintemplate')

@section('title')
{{$user_single->name}} Profile
@endsection


@section('content')
<div class="container p-4 mt-3">
    <div class="row">
        <div class="col-md-12 mx-auto mx-auto text-center">
            <h2>Update User</h2>
            <p>Hello! {{$user_single->name}}</p>
        </div>
        <div class="backbtn text-left">
            <a href="{{ url('/user/index') }}" class="btn btn-primary shadow">User List</a>
        </div>
        <form action="{{url('/user/update',$user_single->slug)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" value="{{$user_single->name}}" name="name" placeholder="User Name" class="form-control my-3">
            <input type="email" value="{{$user_single->email}}" name="email" placeholder="User Email" class="form-control my-3">
            <input type="text" value="{{$user_single->phone}}" name="phone" placeholder="User Phone Number" class="form-control my-3">
            <select name="type" class="form-control my-3" id="">
                <option value="">Select User Type</option>
                <option value="0" {{$user_single->type == 0 ? 'selected' : ''}}>User</option>
                <option value="1" {{$user_single->type == 1 ? 'selected' : ''}}>Sub Admin</option>
                <option value="2" {{$user_single->type == 2 ? 'selected' : ''}}>Admin</option>
            </select>
            <input type="file" name="photo" class="form-control my-3">
            @if($user_single->photo)
            <img style="width: 120px; height: 120px" class="img img-fluid img-thumbnail" src="{{ asset($user_single->photo ) }}" alt="">
            @else
            <img style="width: 120px; height: 120px" class="img img-fluid img-thumbnail" src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG-HD-Image.png" alt="">
            @endif
            <button type="submit" class="btn btn-success shadow">Update</button>
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

@endsection