@extends('layouts.admintemplate')

@section('title')
Alumni List
@endsection


@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 mx-auto mx-auto text-center">
            <h2>Alumni</h2>
        </div>
        <div class="tras text-end">
            <a href="{{ url('/alumni/trash') }}" class="btn btn-danger shadow">Trash</a>
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
                        <td style="font-size: 18px; font-family: 'Kalpurush', sans-serif;">{{ $single_al->name }}</td>
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

                        <td style="padding: 0;">
                            <a href="{{ url('/admin/edit', $single_al->slug) }}" class="btn btn-success shadow"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="" id="del_btn" status="{{$single_al->status}}" slug="{{$single_al->slug}}" class="btn btn-danger shadow" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash"></i></a>
                        </td>


                    </tr>
                    @endforeach
                </tbody>
                <tfoot>

                    <tr>
                        <td colspan="8"></td>
                        <td colspan="1"><strong>Total Transaction Amount:</strong></td>
                        <td id="totalFeeSum"></td>
                        <td colspan="3"></td>
                    </tr>
                </tfoot>
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
                    <input type="hidden" name="status" id="input_status" value="">
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
                var status = this.getAttribute('status');
                // console.log(slug);
                document.getElementById('input_slug').value = slug;
                document.getElementById('input_status').value = status;
            });
        });
    });
</script>

<!-- delete script  -->

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api();
                var total = api.column(9, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return parseFloat(a) + parseFloat(b);
                }, 0);
                $('#totalFeeSum').html(total);
            }
        });

        // Recalculate total fee sum when the table is filtered or searched
        table.on('search.dt', function() {
            var total = table.column(9, {
                page: 'current'
            }).data().reduce(function(a, b) {
                return parseFloat(a) + parseFloat(b);
            }, 0);
            $('#totalFeeSum').html(total);
        });

        table.on('draw.dt', function() {
            var total = table.column(9, {
                page: 'current'
            }).data().reduce(function(a, b) {
                return parseFloat(a) + parseFloat(b);
            }, 0);
            $('#totalFeeSum').html(total);
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