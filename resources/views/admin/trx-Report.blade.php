@extends('layouts.admintemplate')

@section('title')
Trx Report
@endsection


@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 mx-auto mx-auto text-center">
            <h2>Transection Report</h2>
        </div>
        <div class="tras text-end">
            <form action="{{ url('/alumni/trx-Report') }}" method="get">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date">

                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date">

                <button type="submit" class="btn btn-info">Search</button>
            </form>

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
                        <th>Guest</th>
                        <th>Total Taka</th>
                        <th>TrxID</th>
                        <th>Aproved by</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($all_info as $single_al)
                    <tr>
                        <td>{{ $single_al->updated_at }}</td>
                        <td style="font-size: 18px; font-family: 'Kalpurush', sans-serif;">{{ $single_al->name }}</td>
                        <td><img style="width: 45px; height: 45px" src="{{ asset($single_al->photo) }}" alt=""></td>
                        <td>{{ $single_al->batch_no }}</td>
                        <td style="font-size: 18px; font-family: 'Kalpurush', sans-serif;
;">{{ $single_al->gender }}</td>
                        <td>{{ $single_al->guest }}</td>
                        <td>{{ $single_al->totalFee }}</td>
                        <td>{{ $single_al->trxID }}</td>
                        <td>{{$single_al->auth}}</td>
                        <td>@if($single_al->status == 0)
                            <span class="badge bg-danger">Unpaid</span>
                            @else
                            <span class="badge bg-success">Verifyed</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5"></td>
                        <td colspan="1"><strong>Total Transaction Amount:</strong></td>
                        <td id="totalFeeSum"></td>
                        <td colspan="3"></td>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api();
                var total = api.column(6, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return parseFloat(a) + parseFloat(b);
                }, 0);
                $('#totalFeeSum').html(total);
            }
        });

        // Recalculate total fee sum when the table is filtered or searched
        table.on('search.dt', function() {
            var total = table.column(6, {
                page: 'current'
            }).data().reduce(function(a, b) {
                return parseFloat(a) + parseFloat(b);
            }, 0);
            $('#totalFeeSum').html(total);
        });

        table.on('draw.dt', function() {
            var total = table.column(6, {
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