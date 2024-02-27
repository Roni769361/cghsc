@extends('layouts.admintemplate')

@section('title')
DashBoard
@endsection


@section('content')
<div class="container p-4 mt-3">
    <div class="row mt-2">
        <div class="col-md-12 mx-auto mx-auto text-center">
            <h2>User Management</h2>
        </div>
        <div class="adduser text-left">
            <a href="{{ url('/user/create') }}" class="btn btn-primary shadow"><i class="fa-solid fa-user"></i>+Add User</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="myTable" class="table table-responsive table-shadow table-light table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Phone</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_user as $sing_user)
                        <tr>
                            <td>{{$sing_user->name}}</td>
                            <td>{{$sing_user->email}}</td>
                            <td>{{$sing_user->phone}}</td>
                            <td>
                                @if($sing_user->type == 0)
                                User
                                @elseif($sing_user->type == 1)
                                Sub Admin
                                @elseif($sing_user->type == 2)
                                Admin
                                @endif
                            </td>
                            <td>
                                <img style="width: 40px; height: 40px" class="img img-fluid img-thumbnail" src="{{ asset($sing_user->photo ) }}" alt="">
                            </td>
                            <td style="padding:0px">
                                <a href="{{ url('/user/edit',$sing_user->slug) }}" class="btn"><i class="fa-solid fa-pen-to-square"></i></a>

                                <a href="" slug="{{$sing_user->slug}}" id="delete_btn" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn"><i style="color:red" class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<!-- Modal -->
<form action="{{ url('/user/delete') }}" method="POST">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-circle-exclamation" style="color: red;"></i> Delete User!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="slug" id="input_slug" value="">
                    Are you sure delete this user?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var delete_btns = document.querySelectorAll('#delete_btn');
        delete_btns.forEach(function(button) {
            button.addEventListener('click', function() {
                var slug = this.getAttribute('slug');
                console.log("Slug:", slug); // Log the slug value to check if it's retrieved correctly
                document.getElementById('input_slug').value = slug;
            });
        });
    });
</script>


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