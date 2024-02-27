@extends('layouts.admintemplate')

@section('title')
Batch Wise ID Generate
@endsection

@section('content')
<div class="container mt-3 p-5">
    <div class="row">
        <div class="col-md-12 mx-auto mx-auto text-center">
            <h2>Batch Wise ID Card Genaret</h2>
        </div>
        <form action="{{url('/admin/batch-id-card-gen')}}" method="POST">
            @csrf
            <div class="input-group">
                <!-- <input type="text" name="batch_no" class="form-control" placeholder="Enter Batch Number"> -->
                <select style="font-size: 18px; font-family: 'Kalpurush', sans-serif;" name="batch_no" id="" class="form-control">

                    <option style="font-size: 18px; font-family: 'Kalpurush', sans-serif;" value="">ব্যাচ নং সিলেক্ট
                        করুন</option>
                    @foreach( $batch as $oneBatch)
                    <option style="font-size: 18px; font-family: 'Kalpurush', sans-serif;" value="{{$oneBatch->batch_no}}">{{$oneBatch->batch_no}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Generate</button>
            </div>
        </form>


    </div>

    @endsection