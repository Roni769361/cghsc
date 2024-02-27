@extends('layouts.admintemplate')

@section('title')
DashBoard
@endsection


@section('content')
<div class="container p-4 mt-3">
    <div class="row">
        <div class="col-md-12 mx-auto mx-auto text-center">
            <h2>Update Your Profile</h2>
        </div>

        <div class="row">
            <div class="col-md-5 mx-auto">
                <form action="{{ url('/user/update', auth()->user()->slug )}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" disabled value="{{auth()->user()->name}}" name="name" placeholder="User Name" class="form-control my-3">
                    <input type="email" disabled value="{{auth()->user()->email}}" name="email" placeholder="User Email" class="form-control my-3">
                    <input type="text" readonly value="{{auth()->user()->phone}}" name="phone" placeholder="User Phone Number" class="form-control my-3">

                    <input type="file" name="photo" class="form-control my-3">
                    <img class="img img-fluid shadow img-thumbnail w-75" src="{{asset(auth()->user()->photo)}}" alt="">
                    <button type="submit" class="btn btn-success shadow">Update Profile</button>
                </form>
            </div>
        </div>
    </div>

</div>


<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "pageLength": 5,
            "lengthMenu": [5, 10, 20, 30, 40, 50, 100],
            "order": [
                [0, "desc"], //desc or asc
            ],
        });
    });
</script>

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