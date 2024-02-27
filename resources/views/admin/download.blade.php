@extends('layouts.admintemplate')

@section('title')
Alumni Report
@endsection

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 mx-auto mx-auto text-center">
            <h2>Alumni Report</h2>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="example" class="table table-responsive table-light table-bordered table-hover">
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

                    </tr>
                </thead>
                <tbody>
                    @foreach($all_info as $single_al)
                    <tr>
                        <td>{{ $single_al->created_at }}</td>
                        <td style="font-size: 18px; font-family: 'Kalpurush', sans-serif;">{{ $single_al->name }}</td>
                        <td><img style="width: 45px; height: 45px" src="{{ asset($single_al->photo) }}" alt=""></td>
                        <td>{{ $single_al->batch_no }}</td>
                        <td style="font-size: 18px; font-family: 'Kalpurush', sans-serif;">{{ $single_al->gender }}</td>
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


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



<script>
$(document).ready(function() {
    $('#example').DataTable({
        dom: 'Bfrtip',
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