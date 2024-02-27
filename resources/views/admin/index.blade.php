@extends('layouts.admintemplate')

@section('title')
DashBoard
@endsection


@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Welcome CGHS Alumni Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-4 ">
                <div style="background-color: #474F7A;" class="card text-white mb-4 text-center shadow">
                    <div class="card-body shadow"><span>
                            <h3> Applicants</h3>
                        </span><span><i style="font-size: 25px; color: white" class="fa-solid fa-users"></i></span>
                    </div>
                    <h4><a style="text-decoration: none; color:aliceblue;" href="">{{ $Total_Alumni}}</a></h4>
                </div>
            </div>
            <div class="col-xl-3 col-md-4 ">
                <div style="background-color: #474F7A;" class="card text-white mb-4 text-center shadow">
                    <div class="card-body shadow"><span>
                            <h3>Guest</h3>
                        </span><span><i style="font-size: 25px; color: white" class="fa-solid fa-person-circle-question"></i></span></div>
                    <h4><a style="text-decoration: none; color:aliceblue;" href="">{{ $totalGuests}}</a></h4>

                </div>
            </div>
            <div class="col-xl-3 col-md-4">
                <div style="background-color: #474F7A;" class="card text-white mb-4 text-center">
                    <div class="card-body shadow"><span>
                            <h3>Payment Status</h3>
                        </span><span><i style="font-size: 25px; color: white" class="fa-solid fa-bangladeshi-taka-sign"></i></span></div>
                    <h4><a href=""><span class="badge bg-success">Paid: {{$Paid}}</span></a> <a href=""><span class="badge bg-danger">Unpaid: {{$Not_Paid}}</span></a> </h4>
                    </h4>
                </div>
            </div>
            <div class="col-xl-3 col-md-4">
                <div style="background-color: #474F7A;" class="card text-white mb-4 text-center">
                    <div class="card-body shadow"><span>
                            <h3>Found</h3>
                        </span><span><i style="font-size: 25px; color: white" class="fa-solid fa-bangladeshi-taka-sign"></i></span></div>
                    <h6><a href=""><span class="badge bg-success">Paid: {{$total_paid_Amount}}</span></a> <a href=""><span class="badge bg-danger">Due: {{$total_due_Amount}}</span></a> </h6>
                    </h4>
                </div>
            </div>
            <div class="col-xl-3 col-md-4">
                <div style="background-color: #474F7A;" class="card text-white mb-4 text-center">
                    <div class="card-body shadow"><span>
                            <h3>Gender</h3>
                        </span><span><i style="font-size: 25px; color: white" class="fa-solid fa-person-half-dress"></i></i></span></div>
                    <h4><a href=""><span class="badge bg-success">Male
                                {{$male}}</span></a> <a href=""><span class="badge bg-danger">Female
                                {{$female}}</span></a> </h4>
                    </h4>
                </div>
            </div>
            <!-- <div class="col-xl-3 col-md-4 ">
                <div style="background-color: #474F7A;" class="card text-white mb-4 text-center shadow">
                    <div class="card-body shadow"><span>
                            <h3>Card Generate </h3>
                        </span><span><i style="font-size: 25px; color: white" class="fa-solid fa-id-card"></i></span></div>
                    <h4><a target="_blank" style="text-decoration: none; color:aliceblue;" href="{{ url('/pdf_gen') }}"> {{$Paid}} Alumni</a></h4>

                </div>
            </div> -->

            <!-- <div class="col-xl-3 col-md-4 ">
                <div style="background-color: #474F7A;" class="card text-white mb-4 text-center shadow">
                    <div class="card-body shadow"><span>
                            <h4>Batch Wise Data </h4>
                        </span><span><i style="font-size: 25px; color: white" class="fa-solid fa-group-arrows-rotate"></i></span></div>
                    <h4><a target="_blank" style="text-decoration: none; color:aliceblue;" href="{{ url('/admin/batch-search') }}"> Click</a></h4>

                </div>
            </div> -->


            <!-- <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Total Registration Batch {{$Batch}} </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a target="_blank" class="small text-white stretched-link" href="{{ url('/admin/batch-search') }}">Click Only
                        </a>

                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div> -->


            <div class="col-xl-3 col-md-6">
                <div style="background-color: #474F7A;" class="p-2 rounded text-white card-body">
                    <h5 class="card-title">Shirt Counts</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered text-white">
                            <thead>
                                <tr>
                                    <th>Shirt Size</th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $totalCount = 0;
                                @endphp
                                @foreach($shirtCounts as $size => $count)
                                <tr>
                                    <td>{{ $size }}</td>
                                    <td>{{ $count }}</td>
                                    @php
                                    $totalCount += $count;
                                    @endphp
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total:</th>
                                    <td>{{ $totalCount }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card p-2 shadow">
                    <table class="table table-light table-hover">
                        <thead>
                            <tr>
                                <th colspan="3" class="text-center">User Wise Data</th>
                            </tr>
                            <tr>
                                <th>User Name</th>
                                <th>Amount</th>
                                <th>Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dashboardData as $data)
                            <tr>
                                <td>
                                    @if($data['username'] == 'auth')
                                    Waiting Alumni
                                    @else
                                    {{$data['username']}}
                                    @endif
                                </td>
                                <td>{{ $data['total_fee_amount'] }}</td>
                                <td>{{ $data['paid_count'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <!-- <div class="card-body">
                    <h5 class="card-title">Batch Wise Alumn ({{ count($alumnBatch_wise) }} Batches)</h5>
                    <div class="table-responsive">
                 
                    </div>
                </div> -->
                <h5 class="card-title">Batch Wise Alumn ({{ count($alumnBatch_wise) }} Batches)</h5>
                <table id="example" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Batch</th>
                            <th>Alumni</th>
                            <th>Total Fee</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $totalCount = 0;
                        @endphp
                        @foreach($alumnBatch_wise as $batch => $data)
                        <tr>
                            <td>{{ $batch }}</td>
                            <td>{{ $data['count'] }}</td>
                            <td>{{ $data['totalFee'] }}</td>
                            @php
                            $totalCount += $data['count'];
                            @endphp
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <!-- <tr>
                            <th>Total:</th>
                            <td colspan="2">{{ $totalCount }}</td>
                        </tr> -->
                        <tr>

                            <td colspan="1"><strong>Total</strong></td>
                            <td>{{ $totalCount }} </td>
                            <td id="totalFeeSum"></td>
                            <td colspan="3"></td>
                        </tr>
                    </tfoot>
                </table>

            </div>

        </div>

    </div>
</main>
<!-- <script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'lBfrtip',
            pageLength: 5, // Show only 5 rows
            lengthMenu: [2, 5, 10, 20, 50, 75, 100, 200], // Specify page length menu options
            buttons: []
        });
    });
</script> -->

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            dom: 'lBfrtip',
            buttons: [
                'excel'
            ],
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api();
                var total = api.column(2, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return parseFloat(a) + parseFloat(b);
                }, 0);
                $('#totalFeeSum').html(total);
            }
        });

        // Recalculate total fee sum when the table is filtered or searched
        table.on('search.dt', function() {
            var total = table.column(2, {
                page: 'current'
            }).data().reduce(function(a, b) {
                return parseFloat(a) + parseFloat(b);
            }, 0);
            $('#totalFeeSum').html(total);
        });

        table.on('draw.dt', function() {
            var total = table.column(2, {
                page: 'current'
            }).data().reduce(function(a, b) {
                return parseFloat(a) + parseFloat(b);
            }, 0);
            $('#totalFeeSum').html(total);
        });
    });
</script>
@endsection