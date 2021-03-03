<!doctype html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @import url('public/assets/fonts/arialuni.ttf');

        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
            font-family: DejaVu Sans, sans-serif;
        }


        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        h3 {
            margin-left: 15px;
            font-size: 40px;
        }
        .information {
            background-color: #d3d3d369;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }

        tr th {
            background-color: grey;
            color: white;
            padding: 5px;
            height: 20px;
            font-size: 15px;
        }

        .invoice tbody tr {
            text-align: center;
            min-height: 20px;
            height: 40px;
            font-size: 15px;
            padding: 5px;
            background-color: lightgray;
        }
    </style>

</head>
<body>
<img src="{{env('APP_URL')}}/header.png"  style="width: 100%;height: auto">


<div class="information" style="padding: 10px">
    <p style="width: 100%;padding: 10px;font-size: 15px;color: black;margin-left: 20%">
        <strong>Name:</strong> {{$model->full_name}}
    </p>
    <p style="width: 100%;padding: 10px;font-size: 15px;color: black;margin-left: 20%">
        <strong>Sex:</strong> {{$model->sex}}
    </p>
    <p style="width: 100%;padding: 10px;font-size: 15px;color: black;margin-left: 20%">
        <strong>Date of birth:</strong> {{$model->birth_day->format('d.m.Y')}}
    </p>
    <p style="width: 100%;padding: 10px;font-size: 15px;color: black;margin-left: 20%">
        <strong>Passport number:</strong> {{$model->passport_number}}
    </p>
</div>


<br/>

<div class="invoice">
    <table width="100%">
        <thead>
        <tr>
            <th>Test name</th>
            <th>Method and equipment</th>
            <th>Date and time of sample collection</th>
            <th>Date and time of result report</th>
            <th>Result</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Coronavirus COVID-19 (SARS-CoV-2, RNA)</td>
            <td>Coronavirus COVID-19 (SARS-CoV-2, RNA)</td>
            <td>{{$model->date_and_time_of_sample_collection->format('d.m.Y H:m')}}</td>
            <td>{{$model->date_and_time_of_result_report->format('d.m.Y H:m')}}</td>
            <td>Negative</td>

        </tr>

        </tbody>


    </table>
    <p style="width: 100%;padding: 20px;font-size: 15px">
        <strong>This test was performed by using a test system by DNA-Technology (Russia) (sensitivity>97%, specicity>98%)</strong><br>
        Helix is a reference laboratories for coronavirus (COVID-19) testing results, according to the Decision of Rospatrennadzor Directorate of 2020.04.28
    </p>
</div>

<div style="padding: 20px;position: relative">
    <img src="{{url($model->qrCode)}}"  style="height: auto;margin-top: 5px">
    <p style="position: absolute;top: 110px;left: 20px;font-size: 10px">
        Scan the QR-code to verify <br>
        The certificate validity on <br>
        Laboratory Director  {{env('APP_URL')}}
    </p>
    <img src="{{env('APP_URL')}}/shtamb.png"  style="height: auto;float: right">
</div>


</body>
</html>
