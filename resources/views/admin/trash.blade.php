@extends('layouts.admintemplate')

@section('title')
Trash
@endsection


@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 mx-auto mx-auto text-center">
            <h2 class="text-danger">Trash Alumni</h2>
        </div>


    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="example" class="table table-light table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Sub_Date</th>
                        <th>Name</th>
                        <th>Picture</th>
                        <th>Batch</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>T-Shirt</th>
                        <th>Guest</th>
                        <th>TrxID</th>
                        <th>Total Taka</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_info as $single_al)
                    <tr>
                        <td>{{ $single_al->created_at }}</td>
                        <td style="font-size: 18px; font-family: 'Kalpurush', sans-serif;
;">{{ $single_al->name }}</td>
                        <td><img style="width: 45px; height: 45px" src="{{ asset($single_al->photo) }}" alt=""></td>
                        <td>{{ $single_al->batch_no }}</td>
                        <td style="font-size: 18px; font-family: 'Kalpurush', sans-serif;
;">{{ $single_al->gender }}</td>
                        <td>{{ $single_al->phone }}</td>
                        <td>{{ $single_al->shirt }}</td>
                        <td>{{ $single_al->guest }}</td>
                        <td>{{ $single_al->trxID }}</td>
                        <td>{{ $single_al->totalFee }}</td>
                        <td>@if($single_al->status == 0)
                            <span class="badge bg-danger">Unpaid</span>
                            @else
                            <span class="badge bg-success">Verifyed</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ url('/alumni/reset', $single_al->slug) }}" class="btn btn-success shadow"><i class="fa-solid fa-rotate-left"></i></a>

                        </td>


                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
<!-- 
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
</script> -->
<!-- Button trigger modal -->


<!-- Modal -->
<form action="{{url('/alumni/delete')}}" method="POST">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Alumni!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="slug" id="input_slug" value="">
                    Are you sure <span class="text-danger">Delete</span> alumni?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- delete script  -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var Delete_Data = document.querySelectorAll('#del_btn');
        Delete_Data.forEach(function(button) {
            button.addEventListener('click', function() {
                var slug = this.getAttribute('slug');
                // console.log(slug);
                document.getElementById('input_slug').value = slug;
            });
        });
    });
</script>

<!-- delete script  -->

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
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