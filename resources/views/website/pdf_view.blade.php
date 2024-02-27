<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>ID Card</title>
    <style>
        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 46%;
            padding: 10px;
            height: 300px;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .box {
            border: 1px solid green;
            border-radius: 5px;
            background-image: url('https://img.freepik.com/premium-photo/abstract-colorful-oblique-lines-background-colorful-background_613001-1132.jpg?w=360');
            /* background-size: cover; */
            padding: 12px;
            color: white;
            width: 2.125in;
            /* Approximated to pixels */
            height: 3.375in;
            /* Approximated to pixels */
            margin: auto;
            /* Center the box horizontally */
        }

        .row {
            display: flex;
            justify-content: center;
            /* Center the box horizontally */
            align-items: center;
            /* Center the box vertically */
        }

        h1 {
            font-size: 20px;
            color: black;
        }

        h3 {
            font-size: 20px;
            color: grey;
        }


        table {
            font-size: 20px;
            margin: auto;
            /* Center the table horizontally */
        }

        th {
            text-align: center;
            /* Center the text within the table cell */
        }

        img {
            border-radius: 5PX;
            border: 2px solid black;
            width: 80px;
            height: 80px;
            object-fit: cover;
            /* Ensure the image fills the rounded shape */
        }
    </style>
</head>

<body>


    <div class="row">

        @foreach($alumni->chunk(10) as $batch)
        @foreach($batch as $single_alumni)
        <div class="column" style="border: 1px solid black; text-align: center">
            <div class="box">
                <h1>চকরিয়া সরকারী উচ্চ বিদ্যালয়</h1>
                <h3>এলুমনাই আইডি কার্ড</h3>
                <img src="{{ $single_alumni->photo }}" alt="">
                <br>
                <table>
                    <thead>
                        <tr>
                            <th style="font-size: 30px;">{{ $single_alumni->name }}</th>
                        </tr>
                        <tr>
                            <th>ব্যাচ নং- {{ $single_alumni->batch_no }}</th>
                        </tr>
                        <tr>
                            <th>অতিথি সংখ্যা- {{ $single_alumni->guest }}</th>
                        </tr>
                        <tr>
                            <th>TrxID: {{ $single_alumni->trxID }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        @endforeach
        @endforeach


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>