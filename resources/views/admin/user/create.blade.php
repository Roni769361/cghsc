@extends('layouts.admintemplate')

@section('title')
DashBoard
@endsection


@section('content')
<div class="container p-4 mt-3">
    <div class="row">
        <div class="col-md-12 mx-auto mx-auto text-center">
            <h2>Create User</h2>
        </div>
        <div class="backbtn text-left">
            <a href="{{ url('/user/index') }}" class="btn btn-primary shadow">User List</a>
        </div>
        <form action="{{ url('/user/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="User Name" class="form-control my-3">
            <input type="email" name="email" placeholder="User Email" class="form-control my-3">
            <input type="text" name="phone" placeholder="User Phone Number" class="form-control my-3">
            <input type="password" name="password" placeholder="Password" class="form-control my-3">
            <select name="type" class="form-control my-3" id="">
                <option value="">Select User Type</option>
                <option value="0">User</option>
                <option value="1">Sub Admin</option>
                <option value="2">Admin</option>

            </select>
            <input type="file" name="photo" class="form-control my-3">
            <button type="submit" class="btn btn-success shadow">Save</button>
        </form>
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