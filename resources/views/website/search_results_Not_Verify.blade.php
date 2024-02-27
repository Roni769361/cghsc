<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>CGHS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- form cdn start-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.8.1/css/all.css"></script>
    <!-- form cdn end-->

    <!-- font cdn start  -->
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet" />

    <!-- font cdn end -->
    <!-- swite alart start  -->

    <!-- toastr cdn start  -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- toastr cdn end  -->

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            overflow-x: hidden;
            background: #000000;
            font-family: "Kalpurush", sans-serif;
        }

        #bg-div {
            margin: 0;
            margin-top: 100px;
            margin-bottom: 100px;
        }

        #border-btm {
            padding-bottom: 20px;
            margin-bottom: 0px;
            box-shadow: 0px 35px 2px -35px lightgray;
        }

        #test {
            margin-top: 0px;
            margin-bottom: 40px;
            border: 1px solid #ffe082;
            border-radius: 0.25rem;
            width: 60px;
            height: 30px;
            background-color: #ffecb3;
        }

        .active1 {
            color: #00c853 !important;
            font-weight: bold;
        }

        .bar4 {
            width: 35px;
            height: 5px;
            background-color: #ffffff;
            margin: 6px 0;
        }

        .list-group .tabs {
            color: #000000;
        }

        #menu-toggle {
            height: 50px;
        }

        #new-label {
            padding: 2px;
            font-size: 10px;
            font-weight: bold;
            background-color: red;
            color: #ffffff;
            border-radius: 5px;
            margin-left: 5px;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            -webkit-transition: margin 0.25s ease-out;
            -moz-transition: margin 0.25s ease-out;
            -o-transition: margin 0.25s ease-out;
            transition: margin 0.25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
            width: 15rem;
        }

        #page-content-wrapper {
            min-width: 100vw;
            padding-left: 20px;
            padding-right: 20px;
            padding-bottom: 20px;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: 0;
        }

        .list-group-item.active {
            z-index: 2;
            color: #fff;
            background-color: #fff !important;
            border-color: #fff !important;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: -15rem;
                display: none;
            }
        }

        .card0 {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .top-highlight {
            color: #00c853;
            font-weight: bold;
            font-size: 20px;
        }

        .form-card input,
        .form-card textarea {
            padding: 10px 15px 5px 15px;
            border: none;
            border: 1px solid lightgrey;
            border-radius: 6px;
            margin-bottom: 10px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: arial;
            color: #2c3e50;
            font-size: 14px;
            letter-spacing: 1px;
        }

        .form-card input:focus,
        .form-card textarea:focus {
            -moz-box-shadow: 0px 0px 0px 1.5px skyblue !important;
            -webkit-box-shadow: 0px 0px 0px 1.5px skyblue !important;
            box-shadow: 0px 0px 0px 1.5px skyblue !important;
            font-weight: bold;
            border: 1px solid skyblue;
            outline-width: 0;
        }

        input.btn-success {
            height: 50px;
            color: #ffffff;
            opacity: 0.9;
        }

        #below-btn a {
            font-weight: bold;
            color: #000000;
        }

        .input-group {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .input-group input {
            position: relative;
            height: 90px;
            margin-left: 1px;
            margin-right: 1px;
            border-radius: 6px;
            padding-top: 30px;
            padding-left: 25px;
        }

        .input-group label {
            position: absolute;
            height: 24px;
            background: none;
            border-radius: 6px;
            line-height: 48px;
            font-size: 15px;
            color: gray;
            width: 100%;
            font-weight: 100;
            padding-left: 25px;
        }

        input:focus+label {
            color: #1e88e5;
        }

        #qr {
            margin-bottom: 150px;
            margin-top: 50px;
        }

        @import url("https://fonts.maateen.me/kalpurush/font.css");
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
                <div class="card card0">
                    <div class="d-flex" id="wrapper">
                        <!-- Sidebar -->
                        <div class="bg-light border-right" id="sidebar-wrapper">
                            <div class="sidebar-heading pt-5 pb-4">
                                <strong>চসউবি এলামনাই</strong>
                            </div>
                            <div class="list-group list-group-flush">
                                <a data-toggle="tab" href="{{url('/web/invitation')}}" id="tab1" class="tabs list-group-item bg-light">
                                    <div class="list-div my-2">
                                        <div class="fa fa-home"></div>
                                        &nbsp;&nbsp; তথ্য যাচাই
                                    </div>
                                </a>
                                <a data-toggle="tab" href="{{ url('/') }}" id="tab2" class="tabs list-group-item active1">
                                    <div class="list-div my-2">
                                        <div class="fa fa-credit-card"></div>
                                        &nbsp;&nbsp; আবেদন
                                    </div>
                                </a>
                                <a data-toggle="tab" href="#menu3" id="tab3" class="tabs list-group-item bg-light">
                                    <div class="list-div my-2">
                                        <div class="fa fa-qrcode"></div>
                                        &nbsp;&nbsp;&nbsp; আমাদের সম্পর্কে
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- Page Content -->
                        <div id="page-content-wrapper">
                            <div class="row pt-3" id="border-btm">
                                <div class="col-2">
                                    <button class="btn btn-success mt-4 ml-3 mb-3" id="menu-toggle">
                                        <div class="bar4"></div>
                                        <div class="bar4"></div>
                                        <div class="bar4"></div>
                                    </button>
                                </div>
                                <div class="col-8 mx-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <p class="mb-0 mr-0 mt-0 text-center" style="font-weight: 700">
                                                চকরিয়া সরকারি উচ্চ বিদ্যালয় এলামনাই
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <p class="mb-0 mr-4 text-center">
                                                চকরিয়া, কক্সবাজার
                                                <span class="top-highlight"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content">
                                <div id="menu1" class="">
                                    <div class="container">
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-2 col-md-2 text-end">
                                                        <img class="img img-fluid img-thumbnail rounded-circle w-75" src="https://chakoriagirls.edu.bd/template/institute_logo/1_logo4.png" alt="">
                                                    </div>
                                                    <div class="col-10 col-md-10 text-center">
                                                        <h2>চকরিয়া সরকারী উচ্চ বিদ্যালয় এলুমনাই</h2>
                                                        <address class="text-center">চকরিয়া পৌরসভা, চকরিয়া, কক্সবাজার
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-6 col-md-6 text-end">
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <h1> <span class="badge bg-info">TrxID is: SXDA101ADA</span>
                                                        </h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row border-1">
                                                    <div class="col-2 col-md-2">
                                                        <img class="shadow img img-fluid img-thumbnail rounded-circle w-100" src="{{ asset($result->photo) }}" alt="">
                                                    </div>
                                                    <div class="col-10 col-md-10">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>

                                                                    <th><i style="color: #198754; font-size: 30px;" class="fa-solid fa-user-tie"></i>
                                                                    </th>
                                                                    <td style="font-size: 35px;">{{$result->name}}</td>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <h2 style="text-align: justify;">দুঃখিত, আপনার পেমেন্ট ভেরিফাই করা হয়নি, দয়া করে আপনার ব্যাচ প্রতিনিধির সাথে যোগাযোগ করুন। অথবা কল করুন: ০১৮১৪৫৫৪৪৮৮</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <!-- Your scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Additional scripts -->

    @if(Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ Session::get('error') }}"
        });
    </script>
    @endif

    <script>
        $(document).ready(function() {
            //Menu Toggle Script
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

            // For highlighting activated tabs
            $("#tab1").click(function() {
                $(".tabs").removeClass("active1");
                $(".tabs").addClass("bg-light");
                $("#tab1").addClass("active1");
                $("#tab1").removeClass("bg-light");
            });
            $("#tab2").click(function() {
                $(".tabs").removeClass("active1");
                $(".tabs").addClass("bg-light");
                $("#tab2").addClass("active1");
                $("#tab2").removeClass("bg-light");
            });
            $("#tab3").click(function() {
                $(".tabs").removeClass("active1");
                $(".tabs").addClass("bg-light");
                $("#tab3").addClass("active1");
                $("#tab3").removeClass("bg-light");
            });
        });
    </script>
</body>

</html>