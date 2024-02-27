@extends('layouts.admintemplate')

@section('title')
DashBoard
@endsection

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 mx-auto mx-auto text-center">
            <h2>Batch Wise Search Result</h2>
        </div>
        <div>
            <h4 style="font-size: 18px; font-family: 'Kalpurush', sans-serif;"> সর্বমোট প্রাক্তণ শিক্ষার্থী:
                {{ $total_alu }} জন
            </h4>
        </div>
        <table id="example" style="font-size: 18px; font-family: 'Kalpurush', sans-serif;"
            class="table table-responsive table-light table-bordered table-hover">
            <thead>
                <tr>
                    <th>নাম</th>
                    <th>ব্যাচ নং</th>
                    <th>মোবাইল নং</th>
                    <th>ঠিকানা</th>

                </tr>

            </thead>
            <tbody>
                @forelse ($all_data as $sig)
                <tr>
                    <td>{{ $sig->name }}</td>
                    <td>{{ $sig->batch_no }}</td>
                    <td>{{ $sig->phone }}</td>
                    <td>{{ $sig->add }}</td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


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
    @endsection