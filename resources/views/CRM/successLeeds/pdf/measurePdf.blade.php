<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        @page { margin: 33px 25px; }
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
            width:100%;
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
            width:100%;
        }
        .thirdPortion{
            width:100%;
            display:inline-block;
            height: 2px;
            font-family: Arial, Helvetica, sans-serif;
            margin-bottom: 3rem;
        }
        .fourthPortion{
            font-family: Arial, Helvetica, sans-serif;
            margin:auto;
            width:100%;
        }
        .line{
            line-height: 12px;
        }
        table {
            /*font-family: arial, sans-serif;*/
            border-collapse: collapse;
            width: 100%;
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
            width:80%;
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
            position: fixed;
            bottom: -1px;
            left: 0px;
            right: 0px;
            height: 50px;
            width:80%;
            margin:auto;
            text-align: center;
            /*line-height: 4px;*/
            font-size: 15px;
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
            margin-right: 13rem;

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
</head>
<body>
<div class="container all">
    <div class="row">
        <div class="header-1" style="height:130px;">
            <div class="pad-logo" style="float:left;width: 80%;margin-left: 1%;height: 100px"><img class="firstImage" src="{{base_path()}}/public/orchid.png"></div>
            <div style="float:right;width: 50%;margin-right: 9%;">
                <p style="font-style: italic;font-size: 2rem;color:#008000;font-weight: 500;margin-bottom: 0px;float:right;">Orchid Architect's <p>
                <p style="font-style: italic;font-size: 2rem;color:#008000;font-weight: 900;margin-bottom: 0px;float:right;"><p>
                <p style="font-style: italic;font-size: 2rem;color:#008000;font-weight: 900;margin-bottom: 0px;float:right;"><p>
                <p style="font-size: 13px;float:right;">Architect,Engineering,Landscape,Interior & Exterior Consultancy. <p>
            </div>
        </div>
        <div class="secondItem">
            <hr  style = 'background-color:#32CD32; opacity:1 !important; border-width:0; color:#000000; height:2px; lineheight:0; width:100%; margin-bottom:0px !important;'>
            <hr  style = 'background-color:#000000; opacity:1 !important; margin-top:1.5px !important; border-width:0; color:#000000; height:2px; lineheight:0; display: inline-block; text-align: left; width:100%;'>
        </div>
{{--        <div class="thirdPortion" >--}}
{{--            <span class="x">--}}
{{--                Ref:--}}
{{--            </span>--}}
{{--            <span class="y">--}}
{{--                         Date:--}}
{{--            </span>--}}


{{--        </div>--}}
        <div class="fourthPortion">
            <div class="line">
                <p>Date: {!! date('d M y', strtotime($measure->created_at)) !!}</p>
                <p>To</p>
                <p ><b>Company/Client Name: {{$leed->clientName}}</b></p>
                <p>Address: {{$leed->address}}</p>
                <p>Email: {{$leed->email}}</p>
                <p><b>Mobile: {{$leed->phoneNo}}</b></p>
            </div>
        </div>
        <table>
            <tbody >
            <tr class="table-secondary" >
                <th>#</th>
                <th  style="text-align: center">Description</th>
                <th>StructureNos</th>
                <th>Length(ft)</th>
                <th>Width(ft)</th>
                <th>Height(ft)</th>
                <th>Qty</th>
                <th>Total</th>
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
                    <th class="text-danger r1">{{$measureType->measurementTypeName}}</th>
                    <td></td>
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
                        <th scope="row">{{$loop->iteration}}</th>
                        <td class="text-center">{{$measureStruct->measurementStructureName}}</td>
                        <td>{{$info->selectedStructNo}}</td>
                        <td>{{$info->selectedLength}}</td>
                        <td>{{$info->selectedWidth}}</td>
                        <td>{{$info->selectedHeight}}</td>
                        <td>{{$info->selectedQty}}</td>
                        <td>{{$info->line_total}}</td>
                    </tr>
                @endforeach
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <td>Total</td>
                    <td>{{$mc->totalQty}}</td>
                    <td></td>
                </tr>
            @endforeach
            <tr>
                <th colspan="8" class="bill">Bill Sheet</th>
            </tr>
            <tr>
                <th>#</th>
                <th>Item Description</th>
                <th>Unit</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Amount</th>
                <th colspan="2">Remarks</th>
            </tr>
            @foreach($measureCarts as $mc)
                <?php
                $cartInfo = json_decode($mc['measurementCartInfo']);
                $measureType = \App\Models\CRM\Measurement\MeasurementType::find($mc->measurementTypeId);
                ?>
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$measureType->measurementTypeName}}</td>
                    <td>{{$measureType->unit}}</td>
                    <td>{{$mc->totalQty}}</td>
                    <td>{{$measureType->rate}}</td>
                    <td>{{$mc->totalAmount}}</td>
                    <td colspan="2"></td>
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
                        <td colspan="2"></td>
                    </tr>
                @endif
            @endforeach
            <tr>
                <th></th>
                <th colspan="4"  class="total ">Total Amount</th>
                <td colspan="3"class="total ">{{$measure->totalAmount}}</td>
            </tr>
            <tr>
                <th></th>
                <th colspan="4"  class="total ">Vat</th>
                <td colspan="3" class="total ">{{$measure->vat}}</td>
            </tr>
            <tr>
                <th></th>
                <th colspan="4"  class="total ">Discount</th>
                <td colspan="3" class="total ">{{$measure->discount}}</td>
            </tr>
            <tr>
                <th></th>
                <th colspan="4"  class="total ">Grand Total Amount</th>
                <td colspan="3" class="total ">{{$measure->grandTotal}}</td>
            </tr>
            <tr>
                <th></th>
                <th colspan="4"  class="total ">Advanced</th>
                <td colspan="3" class="total ">{{$measure->advanced}}</td>

            </tr>
            <tr>
                <th></th>
                <th colspan="4"  class="total ">Total Payable Amount</th>
                <td colspan="3" class="total ">{{$measure->totalPayableAmount}}</td>
            </tr>
            </tbody>
        </table>
        <div class="bottom">
            <div class="new2">
                <?php
                $f = new NumberFormatter("en_EN", NumberFormatter::SPELLOUT);
                ?>
                <p style="font-weight: 900;font-size: 15px;" class="page-break"><b>In word: {{ucwords(trans($f->format($measure->totalPayableAmount)))}} Taka Only</b></p>
                <div class="bottomCenter">
                    <p style="font-weight: 900;font-size: 19px;margin-bottom: 0px;"><b>Terms and conditions for payment schedule:</b></p>
                    <p style="margin-left: 4rem;font-size: 15px;width:550px">>> 50% payment to be made along with confirmed word order<br>
                        >> 40% payment will be paid as 1<sup>st</sup> running bill after completion of 60% works<br>
                        >> 10% payment will be paid as final bill after completion of 100% works</p>
                    <p style="margin-bottom: 0px;font-size: 15px;margin-top: 65px"> Duration of word completion: .....working days<br>
                        Please call us for any sort of inquires<br>
                        Thanks and best ragards</p>
                </div>
            </div>
            <div class=" orchid">
                    <span class="c">
                        <p style=""></p>
                        <p style="border-top: 2px solid black; width:11.4rem;" ></p>
                        <p style="margin-left: 1rem;width:15rem">Orchid Architect's<br>
                            Chief Executive Officer</p>
                    </span>
                <span class="d" >
                        <p style=""></p>
                        <p style="margin-right: 5rem;border-bottom: 2px solid black; width:120px;" ></p>
                        <p style="margin-left: 2.5rem;">Client</p>
                    </span>
            </div>
        </div>
        <div class="footer">
            <hr  style = 'background-color:#32CD32; opacity:1 !important; border-width:0; color:#000000; height:2px; lineheight:0; width:100%; margin-bottom:0px !important;'>
            <hr  style = 'background-color:#000000; opacity:1 !important; margin-top:1px !important; border-width:0; color:#000000; height:2px; lineheight:0;  width:100%;'>

            <p style="margin: 0px">House # 252/1/A, West Monipur Barek Mollar Mor,60'Road,Mirpur-2 Dhaka-121 <br>
                Cell:01738-573747,01748-747651,Phone:02-55077910 E-mail:orchidarch.bd@gmail.com<br>
                <span style="letter-spacing: 3px"> www.orchidarchitect.com</span>
        </div>
    </div>
</div>
</div>
</body>
</html>





