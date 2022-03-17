<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Receipt</title>
</head>
<body>
<p style="padding:0; margin-bottom:3px; margin-top:0px; text-align:center; white-space: nowrap; font-size:10px; font-weight: bold;">*** START OF THE RECEIPT ***</p>
<p style=" margin:3px; text-align:center; white-space: nowrap; font-size:10px;">BILL RECEIPT</p>
<p style="margin:1px; text-align:center; font-size:10px;">Harvest Hotel</p>
<p style="margin:2px; text-align:center; font-size:10px;">GEITA - TANZANIA</p>
@if(count($order)>0)
    @php
        $total=0;
    @endphp
    @foreach($order as $oda)
        <p style="margin:1px; text-align:center; white-space: nowrap; font-size:10px;">{{\App\Models\Item::find($oda->item_id)->itemName}}: {{\App\Models\Item::find($oda->item_id)->amount}} * {{$oda->quantity}} ={{$oda->quantity*\App\Models\Item::find($oda->item_id)->amount}}/=</p>

                                                 @php
                                                     $total=$total +($oda->quantity*\App\Models\Item::find($oda->item_id)->amount);
                                                 @endphp

    @endforeach
    <hr>
    <h1 style="margin:1px; text-align:center; white-space: nowrap; font-size:10px;"> Total To Pay: {{number_format($total)}}/=</h1>
    <p style="margin:3px; text-align:center; white-space: nowrap; font-size:12px;">Receipt Date: {{date('d-m-y')}}</p>
    <p style="margin:3px; text-align:right; white-space: nowrap; font-size:12px;">Thank you for visit</p>
@else
    <p>No Item In order List</p>
@endif

</body>
</html>
