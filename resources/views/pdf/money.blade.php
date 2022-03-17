<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Money Receipt</title>
</head>
<body>
<p style="padding:0; margin-bottom:3px; text-align:center; font-size:16px; color:darkblue; margin-top:0px; text-align:center; white-space: nowrap; font-weight: bold;">HARVEST HOTELS {{$tittle}} REPORT FROM <span style="color: #1f2937;">{{$from}} <span style="color: darkblue;"> TO</span> {{$to}}</span></p>
@if(count($account)>0)
    @php
        $total=0;
$sno=1;
    @endphp
    <table width="100%" border="1px solid black" cellspacing="0" cellpadding="5px">
        <tr style="background-color:#d7d7d7;">
            <th style="padding:2px;">Sno</th>
            <th>Payment Type</th>
            <th>Description</th>
            <th>Authorized By</th>
            <th>Amount</th>
        </tr>
    @foreach($account as $oda)
            <tr style="padding:4px;">
                <td>{{"  ".$sno}}</td>
                <td>{{"  ".$oda->payment}}</td>
                <td>{{"  ".$oda->description}}</td>
                <td>{{"  ".$oda->authorizeBy}}</td>
                <td>{{"  ".$oda->amount}}</td>
            </tr>
            @php
                $sno++;
            @endphp
       @php
            $total=$total +($oda->amount);
        @endphp

    @endforeach
        <tr style="background-color:#d7d7d7;">
            <td colspan="4">Total::</td>
            <td>{{number_format($total)}}/=</td>
        </tr>
    </table>
@else
    <p style="border-radius:20px; padding-top:5px; font-weight:bold; padding-bottom:5px; margin-top:40px; background-color:darkgrey; text-align:center;">No Report for this day interval try again....</p>
@endif


</body>
</html>
