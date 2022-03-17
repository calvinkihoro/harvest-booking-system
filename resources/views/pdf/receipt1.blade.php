<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print The Receipt</title>
</head>
<body style="margin:0px; padding:0px;">
        <p style="padding:0; margin-bottom:3px; margin-top:0px; text-align:center; white-space: nowrap; font-size:10px; font-weight: bold;">*** START OF THE RECEIPT ***</p>
        <p style=" margin:3px; text-align:center; white-space: nowrap; font-size:10px;">ROOM BOOKING RECEIPT</p>
        <p style="margin:1px; text-align:center; font-size:10px;">Harvest Hotel</p>
        <p style="margin:2px; text-align:center; font-size:10px;">GEITA - TANZANIA</p>
        <p style="white-space:nowrap; margin:2px; font-size:10px; text-align:center;">CUSTOMER NAME:  {{$user->fname." ".$user->lname}}</p>

        <p style="text-align:center; margin:2px; white-space: nowrap; font-size:12px;">Room Number: {{\App\Models\room::find(\App\Models\RoomAllocation::where('customer_id',$cid->id)->get()[0]->room_id)->room_no}}</p>
        <p style="text-align:center; margin:2px; white-space: nowrap; font-size:12px;">End Date: {{\App\Models\RoomAllocation::where('customer_id',$cid->id)->get()[0]->toDate}}</p>

        <hr>
        <p style="margin:2px; text-align:center; white-space: nowrap; font-size:12px;">Amount To Paid: {{number_format($cid->numberOfDays * \App\Models\room::find(\App\Models\RoomAllocation::where('customer_id',$cid->id)->get()[0]->room_id)->price)}}</p>

        <hr>
        <p style="margin:3px; text-align:center; white-space: nowrap; font-size:12px;">Receipt Date: {{date('d-m-y')}}</p>
        <p style="margin:3px; text-align:right; white-space: nowrap; font-size:12px;">Thank you for visit</p>


</body>

</html>
