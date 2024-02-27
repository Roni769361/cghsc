<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">

    <style>
        @import url('https://fonts.maateen.me/kalpurush/font.css');

        @page {
            size: A4;
            margin: 2.5in 1in 1.5in;
        }

        body {
            margin: 0;
            font-family: "Calibri", sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: none;
        }

        td {
            padding: 8px;
            vertical-align: top;
        }

        p {
            margin: 0;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container">
        <table style="margin-left:49.2pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width: 10%;">
                        <img style="width: 10%;" src="https://chakoriagirls.edu.bd/template/institute_logo/1_logo4.png" alt="">
                    </td>
                    <td style="text-align: center;" colspan="2">
                        <p style="font-size: 27px; font-family: 'Kalpurush', sans-serif;"><strong>চকরিয়া সরকারী উচ্চ বিদ্যাপীঠ, এলুমানাই</strong></p>
                        <p style="font-size: 21px; font-family: 'Kalpurush', sans-serif;">চকরিয়া, কক্সবাজার</p>
                    </td>
                </tr>
            </tbody>

        </table>

        <table style="margin-left:76.85pt;border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td>
                        <p><img class="img img-fluid img-thumbnail" style="width: 80px; height: 80px" src="{{$result->photo}}" alt=""></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 149pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">নাম</span></p>
                    </td>
                    <td style="width: 14.55pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">:</span></p>
                    </td>
                    <td style="width: 207.05pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">{{$result->name}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 149pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">ব্যাচ নং</span></p>
                    </td>
                    <td style="width: 14.55pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">:</span></p>
                    </td>
                    <td style="width: 207.05pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">{{$result->batch_no}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 149pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">রক্তের গ্রুপ</span></p>
                    </td>
                    <td style="width: 14.55pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">:</span></p>
                    </td>
                    <td style="width: 207.05pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">{{$result->blood_group}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 149pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">অতিথি সংখ্যা</span></p>
                    </td>
                    <td style="width: 14.55pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">:</span></p>
                    </td>
                    <td style="width: 207.05pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">@if($result->guset == "")
                                আপনার সাথে কোন অতিথি নেই
                                @else
                                {{$result->guest}}
                                @endif</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 149pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">মোবাইল নং</span></p>
                    </td>
                    <td style="width: 14.55pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">:</span></p>
                    </td>
                    <td style="width: 207.05pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">{{$result->phone}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 149pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">টি-শার্ট সাইজ</span></p>
                    </td>
                    <td style="width: 14.55pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">:</span></p>
                    </td>
                    <td style="width: 207.05pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">{{$result->shirt}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 149pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">ট্রানজেকশন আইডি</span></p>
                    </td>
                    <td style="width: 14.55pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">:</span></p>
                    </td>
                    <td style="width: 207.05pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">{{$result->trxID}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 149pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">ঠিকানা</span></p>
                    </td>
                    <td style="width: 14.55pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">:</span></p>
                    </td>
                    <td style="width: 207.05pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";line-height:  normal;'><span style="font-size:19px;">{{$result->add}}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <img style="width: 30%;" src="https://t4.ftcdn.net/jpg/00/49/06/49/240_F_49064979_nbrrNFtMOFCT5YJrW5LCs8Qgtr0XM6Tz.jpg" alt="">

                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="width: 370.6pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";text-align:center;line-height:normal;'><span style="font-size:19px;">&nbsp;</span></p>
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";text-align:center;line-height:normal;'><span style="font-size:19px;">বিজ্ঞপ্তি: আপনাদের আইডি কার্ড আপনাদের ব্যাচ প্রতিনিধির নিকট হতে বুঝে নিন।</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;font-size:11.0pt;font-family: "Kalpurush", "sans-serif";'><span style="font-size:16px;">&nbsp;</span></p>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>