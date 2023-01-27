<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>A simple, clean, and responsive HTML invoice template</title>
    <style type="text/css">
        *{margin:0;padding:0}
        .firstImage{
            width:30%;
            margin-left: 4rem;
            margin-top:8%;
        }
        .first{
            font-style: italic;
            font-size: 2rem;
            color:#008000;
            font-weight: 900;
            margin-bottom: 0px;
            display:inline;
        }
        .header{
            width:80%;
            display:inline-block;
            height:17%;
            /*display:flex;*/
            /*align-items: center;*/
            /*margin:auto;*/
            /*justify-content: space-between;*/
        }
        .all{
        }
        .second{
            font-size: 40%;
        }
        .secondItem{
            margin-top:30px;
            margin:auto;
            width:80%;
        }
        .thirdPortion{
            width:80%;
            display:inline-block;
            height: 2px;
            font-family: Arial, Helvetica, sans-serif;
            margin-bottom: 3rem;
        }
        .fourthPortion{
            font-family: Arial, Helvetica, sans-serif;
            margin:auto;
            width:80%;
        }
        .line{
            line-height: 12px;
        }
        table {
            /*font-family: arial, sans-serif;*/
            border-collapse: collapse;
            width: 500px;
            margin:auto;
            text-align: left;
            /*border:1px solid #000000 !important;*/
        }
        .table-text{
            text-align: center !important;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            text-align: left;
            border:1px solid #000000 !important;
        }

        .table-secondary{
            background-color: 	#808080;
        }
        .bottom{
            font-family: arial, sans-serif;
            width: 80%;
            margin:auto;
            height: 580px;
        }
        .bottomCenter{
            width:95%;
            height:480px;
            margin:auto;
            display:inline-block;
            margin-bottom: 5px;
        }
        .orchid{
            width:800px;
            display:inline-block;
            height:150px;
        }
        .footer{
            font-family: arial, sans-serif;
            width:80%;
            margin:auto;
            text-align: center;
            /*line-height: 4px;*/
            font-size: 15px;
            font-weight: 500;
        }
        th td{
            text-align: center;
        }
        .th1 {
            border: 1px solid #dddddd;
            background-color: grey;
            padding: 8px;
        }
        .red{
            color:red;
        }
        span.a {
            display: inline; /* the default for span */
            width: 400px;
            height: 10px;
            /*padding: 5px;*/
            margin-right: 90px;
        }
        span.b {
            width: 100px;
            height: 1rem;
            float:right;
            margin-right: 6rem;
        }
        .bill{
            text-align: center;
            background-color: grey;
        }
        .total{
            text-align: center;
        }
        span.c {
            display: inline; /* the default for span */
            width: 600px;
            height: 10px;
            float:left;
            /*padding: 5px;*/
            /*margin-right: 2px;*/
        }
        span.d {
            width: 200px;
            height: 200px;
            float:right;
            margin-right: 7rem;
            margin-top:46px;
        }
        span.x {
            display: inline; /* the default for span */
            width: 10px;
            height: 2px;
            float:left;
            margin-left: 4.5rem;
            /*padding: 5px;*/
            /*margin-right: 2px;*/
        }
        span.y {
            width: 10px;
            height: 3px;
            float:right;
            margin-right: 4.5rem;
        }
        .r1{
            color:red;
        }
        .s2{
            margin-bottom: 2px !important;
        }
        .new2{
            height: 335px;
            display:inline-block;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
    <style>
        .table-secondary{
            background-color: 	#808080;
        }
        span.x {
            display: inline; /* the default for span */
            width: 10px;
            height: 2px;
            float:left;
            margin-left: 4.5rem;
            /*padding: 5px;*/
            /*margin-right: 2px;*/
        }
        span.y {
            width: 10px;
            height: 3px;
            float:right;
            margin-right: 4.5rem;
        }
        .secondItem{
            margin-top:30px;
            margin:auto;
            width:80%;
        }
        .thirdPortion{
            width:80%;
            display:inline-block;
            height: 2px;
            font-family: Arial, Helvetica, sans-serif;
            margin-bottom: 3rem;
        }
        .invoice-box {
            max-width: 800px;
            margin: 0;
            padding: 15px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="{{base_path()}}/public/orchid.png" style="width: 50%; max-width: 250px" />
                        </td>

                        <td>
                            <b style="font-style: italic;font-size: 30px;color:#008000;font-weight: 900;">Orchid Architect's</b><br />
                            <div style="font-size: 11px;max-width: 400px">Architect,Engineering,Landscape,Interior & Exterior Consultancy</div><br />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

{{--        <tr>--}}
{{--            <div class="secondItem">--}}
{{--                <hr  style = 'background-color:#32CD32; opacity:1 !important; border-width:0; color:#000000; height:2px; lineheight:0; width:100%; margin-bottom:0px !important;'>--}}
{{--                <hr  style = 'background-color:#000000; opacity:1 !important; margin-top:1.5px !important; border-width:0; color:#000000; height:2px; lineheight:0; display: inline-block; text-align: left; width:100%;'>--}}
{{--            </div>--}}
{{--            <div class="thirdPortion" >--}}
{{--            <span class="x">--}}
{{--                Ref:--}}
{{--            </span>--}}
{{--                <span class="y">--}}
{{--                         Date:--}}
{{--            </span>--}}


{{--            </div>--}}
{{--        </tr>--}}

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            <div style="margin-left: 4.5rem;">ref:</div><br />
                            12345 Sunny Road<br />
                            Sunnyville, CA 12345
                        </td>

                        <td>
                            <div style="margin-right: 5rem;">date:</div><br />
                            John Doe<br />
                            john@example.com
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table>
        <tbody >
        <tr class="" >
            <th>#</th>
            <th colspan="2"  style="text-align: center">Description</th>
            <th>S.Nos</th>
            <th>Length</th>
            <th>Width</th>
            <th>Height</th>
            <th>Qty</th>
        </tr>
        </tbody>
        <tbody>
        @foreach($measureCarts as $mc)
            <?php
            $cartInfo = json_decode($mc['measurementCartInfo']);
            $measureType = \App\Models\CRM\Measurement\MeasurementType::find($mc->measurementTypeId);
            ?>
            <tr >
                <td></td>
                <th colspan="2" class="text-danger ">{{$measureType->measurementTypeName}}</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @foreach($cartInfo as $info)
                <?php
                $measureStruct = \App\Models\CRM\Measurement\MeasurementStructureType::find($info->selectedStructure);
                ?>
                <tr>
                    <th scope="">{{$loop->iteration}}</th>
                    <td colspan="2" class="text-center">{{$measureStruct->measurementStructureName}}</td>
                    <td>{{$info->selectedStructNo}}</td>
                    <td>{{$info->selectedLength}}</td>
                    <td>{{$info->selectedWidth}}</td>
                    <td>{{$info->selectedHeight}}</td>
                    <td>{{$info->selectedQty}}</td>
                </tr>
            @endforeach
            <tr>
                <th></th>
                <th colspan="2"></th>
                <th></th>
                <th></th>
                <th></th>
                <td>Total</td>
                <td>{{$mc->totalQty}}</td>
            </tr>
        @endforeach
        <tr>
            <th colspan="7" class="">Bill Sheet</th>
        </tr>
        <tr>
            <th>#</th>
            <th>Item Description</th>
            <th>Unit</th>
            <th>Quantity</th>
            <th>Rate</th>
            <th>Amount</th>
            <th>Remarks</th>
        </tr>
        @foreach($measureCarts as $mc)
            <?php
            $cartInfo = json_decode($mc['measurementCartInfo']);
            $measureType = \App\Models\CRM\Measurement\MeasurementType::find($mc->measurementTypeId);
            ?>
            <tr>
                <th scope="">{{$loop->iteration}}</th>
                <td>{{$measureType->measurementTypeName}}</td>
                <td>{{$measureType->unit}}</td>
                <td>{{$mc->totalQty}}</td>
                <td>{{$measureType->rate}}</td>
                <td>{{$mc->totalAmount}}</td>
                <td>Remarks</td>
            </tr>
        @endforeach
        @foreach($childless as $cl)
            <?php
            $cartInfo = json_decode($cl['measurementCartInfo']);
            if (!is_null($cl->measurementTypeId) && $cl->measurementTypeId!=0 ){
                $measureType = \App\Models\CRM\Measurement\MeasurementType::find($cl->measurementTypeId);
            }
            ?>
            @if(!is_null($cl->measurementTypeId) && $cl->measurementTypeId!=0)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$measureType->measurementTypeName}}</td>
                    <td>{{$measureType->unit}}</td>
                    <td>{{$cartInfo->selectedQty}}</td>
                    <td>{{$measureType->rate}}</td>
                    <td>{{$cl->totalAmount}}</td>
                    <td>Remarks</td>
                </tr>
            @endif
        @endforeach
        <tr>
            <th></th>
            <th>Total Amount</th>
            <th></th>
            <td></td>
            <td></td>
            <td>{{$measure->totalAmount}}</td>
            <td></td>
        </tr>
        <tr>
            <th></th>
            <th>Vat</th>
            <th></th>
            <td></td>
            <td></td>
            <td>{{$measure->vat}}</td>
            <td></td>
        </tr>
        <tr>
            <th></th>
            <th>Discount</th>
            <th></th>
            <td></td>
            <td></td>
            <td>{{$measure->discount}}</td>
            <td></td>
        </tr>
        <tr>
            <th></th>
            <th class="text-bold">Grand Total amount</th>
            <th></th>
            <td></td>
            <td></td>
            <td>{{$measure->grandTotal}}</td>
            <td></td>
        </tr>
        <tr>
            <th></th>
            <th>Advanced</th>
            <th></th>
            <td></td>
            <td></td>
            <td>{{$measure->advanced}}</td>
            <td></td>
        </tr>
        <tr>
            <th></th>
            <th colspan="4"  class=" ">Total Payable Amount</th>
            <td colspan="2" style="background-color: grey;">{{$measure->totalPayableAmount}}</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
