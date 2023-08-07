<!DOCTYPE html>
<html lang="en">

@include('layouts.admin.headerlink')

@yield('content')

<?php
$company = \Illuminate\Support\Facades\DB::table('company_infos')->first();
$staff = \Illuminate\Support\Facades\DB::table('staff')
    ->where('staff_id', Auth::user()->id)
    ->first();

//print_r($pos_sale);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div id="printableArea">
                <div class="logo text-center">
                    <br>
                    <img src="{{ asset('public/assets/logo.png') }}" alt="Your Company Logo">
                    <p>{{ $company->company_address }}</p>
                </div>
                <br>
                <h2 class="text-info text-center">

                    @if ($pos_sale->invoice_type == 'FLAT_OWNER')
                        <strong>FLAT OWNER INVOICE</strong>
                    @else
                        <strong>RENTREE INVOICE</strong>
                    @endif
                </h2>
                <div class="info text-center">
                    <h4>{{ $company->company_name }}</h4>
                    <b>Cell: {{ $company->company_phone }}</b>
                    <p><b>BIN: 002256834-0201 Mushak-2.3</b></p>
                    <pre>Invoice: {{ $pos_sale->invoice_no }}</pre>
                </div>
                <div class="row">
                    <div class="col-6">
                        {{-- <ul style="list-style:none">
                            <li>Date: {{ $pos_sale->sales_date }}</li>
                            <li>Client Name: {{ $client->client_name }}</li>
                            <li>Client Phone: {{ $client->client_phone_number }}</li>
                            <li>Sale by: {{ $staff->staff_name }}</li>
                        </ul> --}}
                    </div>
                    <div class="col-6"></div>
                </div>
                <br>
                <div class="row">
                    <table class="table table-striped table-condensed content_table">

                        <tbody>
                            <tr>
                                <th width="5%">SL</th>
                                <!--<th width="15%">PO</th>-->
                                <th width="20%">Billing Item</th>
                                <!--<th width="20%">Color</th>-->
                                <!--<th width="20%">Size</th>-->
                                <th width="14%">Billing Charge</th>
                                <th width="14%">Discount(%)</th>
                                <th width="10%">Billing Quantity</th>
                                <th width="14%">Subtotal</th>
                            </tr>

                            @foreach ($pos as $pos)
                                <tr class="item-row">
                                    <td class="item-name">

                                        {{ $loop->index + 1 }}

                                    </td>
                                    <td class="description">
                                        {{ $pos->billing_item_name }}
                                    <td>
                                        {{ $pos->billing_item_charge }}
                                    </td>
                                    <td>
                                        {{ $pos->invoice_overall_discount }}
                                    </td>
                                    <td><span class="price">{{ $pos->billing_quantity }}</span></td>
                                    <td><span class="price">{{ $pos->invoice_subtotal }}</span></td>
                                </tr>
                            @endforeach

                            <!-- <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> -->
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right"><b>Sub Total </b></td>
                                <td class="text-right"><b>{{ $pos_sale->invoice_subtotal }}</b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right"><b>Vat </b></td>
                                <td class="text-right"><b>{{ $pos_sale->invoice_vat_amount }}</b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right"><b>Grand Total </b></td>
                                <td class="text-right"><b>{{ $pos_sale->subTotal + $pos_sale->vat_amount }}</b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right"><b>Discount</b></td>
                                <td class="text-right"><b>{{ $pos_sale->invoice_overall_discount }}</b></td>
                            </tr>


                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right"><b>Net Total </b></td>
                                <td class="text-right"><b><u>{{ $pos_sale->invoice_grand_total }}</u></b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped">
                        <tbody>
                            {{-- <tr>
                                <td style="text-align: left;">Paid by {{ getPaymentType($pos_sale->account) }}</td>
                                <td style="text-align: center;">Pay Amount {{ $pos_sale->total_paying }}</td>
                                <td style="text-align: right;">Change {{ $pos_sale->change }}</td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                <p class="text-center" style="font-size: 10px "> The goods can be exchange within next 7 days( Refund
                    within
                    3 days ).
                </p>
                <div class="order_barcodes text-center">
                    <span style="font-size:9px;"> <b>Software Developed By M360 ICT</b></span>
                </div>
            </div>
            <div class="row">
                <button class="btn btn-larage btn-info mb-2" onclick="printDiv('printableArea')">Print</button>

                <a class="btn btn-larage btn-primary mb-2" href="{{ url('invoice') }}">Back to Pos</a>
            </div>



        </div>
        <div class="col-4"></div>
    </div>
</div>

<script>
    function printDiv(elementId) {
        var divContents = document.getElementById(elementId).innerHTML;
        var a = window.open('', '', 'height=1200, width=1200');
        a.document.write('<html>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>
<!-- Jquery Page Js -->
@include('layouts.admin.footerlink')
