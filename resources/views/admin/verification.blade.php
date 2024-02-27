@extends('layouts.admintemplate')

@section('title')
Payment Verification
@endsection


@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 mx-auto mx-auto text-center">
            <h2>Payment Verification</h2>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="myTable" class="table table-responsive table-light table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Sub_Date</th>
                        <th>Name</th>
                        <th>Guest</th>
                        <th>TrxID</th>
                        <th>Total Taka</th>
                        <th>Status</th>
                        <th>Comment</th>

                    </tr>
                </thead>

                <!-- backup  -->
                <!-- backup  -->
                <tbody>
                    @foreach($all_info as $single_al)
                    <tr>
                        <td>{{ $single_al->created_at }}</td>
                        <td style="font-size: 18px; font-family: 'Kalpurush', sans-serif;">{{ $single_al->name }}</td>

                        <td>{{ $single_al->guest }}</td>
                        <td>{{ $single_al->trxID }}</td>
                        <td>{{ $single_al->totalFee }}</td>
                        <td>
                            <form action="{{ route('updateVerificationStatus', ['id' => $single_al->id]) }}" method="post">
                                @csrf
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="verification_status" id="verification_yes_{{ $single_al->id }}" value="1" {{ $single_al->status == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="verification_yes_{{ $single_al->id }}">Yes</label>
                                </div>

                                @if(auth()->check() && auth()->user()->isAdmin())
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="verification_status" id="verification_no_{{ $single_al->id }}" value="0" {{ $single_al->status == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="verification_no_{{ $single_al->id }}">No</label>
                                </div>
                                @endif

                                <!-- Add a hidden input field to store the name of the authenticated user -->
                                <input type="hidden" name="updated_by" value="{{ auth()->user()->name }}">

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </td>
                        <td>
                            @if($single_al->status == 0)
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