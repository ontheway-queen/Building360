    @extends('home')
    @inject('MoneyReceipt', 'App\Models\MoneyReceipt\MoneyReceipt')
    @section('content')
        <!-- start: page toolbar -->
        <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
            <div class="container-fluid">
                <div class="row g-3 mb-3 align-items-center">
                    <div class="col">
                        <ol class="breadcrumb bg-transparent mb-0">
                            <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('') }}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a class="text-secondary" href="{{ url('money-receipt') }}">Money
                                    Receipt</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Money Receipt</li>
                        </ol>
                    </div>
                </div> <!-- .row end -->

            </div>
        </div>
        <!-- start: page body -->


        <!-- start: page body -->
        <form class="row maskking-form" id="money_receipt_form">
            @csrf

            <!--Hidden Inputs-->
            <input type="hidden" name="hidden_flat_owner_id" id="hidden_flat_owner_id" value="">

            <input type="hidden" name="type" id="type" value="ASSOCIATION">


            <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
                <div class="container-fluid">
                    <!-- Create invoice -->
                    <div class="row g-3">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">BASIC INFORMATION</h6>
                                </div>
                                <div class="card-body">

                                    <div class="row">


                                        <div class="col-lg-6 col-sm-12">
                                            <span class="float-label">
                                                <input type="text" class="form-control form-control-lg"
                                                    id="searchFlatOwner" placeholder="Search Client" name="client_name">
                                                <label class="form-label" for="TextInput">Search Flat Owner</label>
                                            </span>
                                            <input type="hidden" class="form-control form-control-lg"
                                                id="hiddenFlatOwnerID" name="invoice_flat_owner_id">
                                        </div>

                                        <div class="col-lg-6 col-sm-12">
                                            <span class="float-label">
                                                <input type="text" class="form-control form-control-lg"
                                                    id="searchInvoice" placeholder="Search Invoice" name="invoice_no">
                                                <label class="form-label" for="TextInput">Search Invoice</label>
                                            </span>
                                            <input type="hidden" class="form-control form-control-lg" id="hiddenInvoiceID"
                                                name="invoice_id">
                                        </div>




                                    </div>

                                    <div class="row mt-2">

                                        <div class="col-lg-4 col-sm-4">
                                            <label class="form-label" for="TextInput">Payment Method</label>
                                            <select class="form-control form-control-lg custom-select" name="payment_method"
                                                id="checqueId">
                                                <option value="" disabled>
                                                    Select Payment Type
                                                </option>
                                                <option value="bank" selected>Bank</option>
                                                <option value="cheque">Cheque</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 col-sm-12" id="cheque_number">
                                            <span class="float-label">
                                                <input type="text" class="form-control form-control-lg"
                                                    id="searchInvoice" placeholder="Cheque Number" name="cheque_number">
                                                <label class="form-label" for="TextInput">Cheque Number</label>
                                            </span>
                                        </div>
                                        <div class="col-lg-4 col-sm-12" id="withdraw_date">
                                            <span class="float-label">
                                                <input type="date" class="form-control form-control-lg"
                                                    id="searchInvoice" placeholder="Cheque Withdraw Date"
                                                    name="withdraw_date">
                                                <label class="form-label" for="TextInput">Cheque Withdraw Date</label>
                                            </span>
                                        </div>



                                    </div>


                                </div>
                            </div>


                            <br>
                            <hr>


                            <div class="card print_invoice">
                                <div class="card-header border-bottom fs-4">
                                    <h5 class="card-title mb-0">MONEY RECEIPT INFORMATION</h5>
                                </div>
                                <div class="card-body">
                                    <div class="card p-3">
                                        <div class="border-bottom pb-2">


                                            <div id="showClient"></div>

                                            <div class="logoInvoice">
                                                <img src="{{ asset('public') }}/frontend/assets/img/logo.png" width="530px"
                                                    alt="logo">
                                            </div>
                                        </div>
                                        <div class="customer mt-4">
                                            <table class="meta">
                                                <tbody>
                                                    <tr>
                                                        <td class="meta-head">Voucher No</td>
                                                        <td>
                                                            <textarea class="form-control" name="money_receipt_voucher_no">{{ $MoneyReceipt->generate_vouchar_no() }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="meta-head">Date</td>
                                                        <td>
                                                            <textarea class="form-control" id="invoice_date">{{ date('d-m-Y') }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="meta-head">Amount Due</td>
                                                        <td>
                                                            <div class="due" id="invoiceDue"></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div style="clear:both"></div>
                                        <table class="items">
                                            <tbody>
                                                <tr>
                                                    <th>Invoice No.</th>
                                                    <th>Select Account</th>
                                                    <th>Invoice Net Total</th>
                                                    <th style="width: 140px;">Invoice Due Amount</th>
                                                    <th style="width: 140px;">Paid Amount</th>
                                                    <th style="width: 70px;">Discount</th>
                                                    <th style="width: 140px;">Payment Date</th>
                                                </tr>
                                                <div id="billingDetailsList">
                                                    <tr class="item-row billing-details-row">
                                                        <td class="item-name">
                                                            <div class="col-12">
                                                                <textarea name="money_receipt_invoice_no" id="money_receipt_invoice_id" readonly></textarea>


                                                            </div>
                                                        </td>
                                                        <td class="description">
                                                            <select class="form-control form-control-lg custom-select"
                                                                name="money_receipt_account_id" required>
                                                                <option value="" selected>
                                                                    Select Account
                                                                </option>
                                                                @foreach ($MoneyReceipt->list_of_account() as $row)
                                                                    <option value="{{ $row->id }}">
                                                                        {{ $row->account_name . ', ' . $row->account_number }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>

                                                        <td class="description">
                                                            <textarea name="money_receipt_invoice_net_total" id="money_receipt_invoice_net_total" readonly></textarea>
                                                        </td>


                                                        <td>
                                                            <textarea class="cost" name="money_receipt_invoice_due_amount" id="money_receipt_invoice_due_amount" readonly></textarea>
                                                        </td>
                                                        <td>
                                                            <textarea class="cost " data-row="1" name="money_receipt_amount" id="money_receipt_amount"></textarea>
                                                        </td>
                                                        <td>
                                                            <textarea class="qty " name="money_receipt_discount" data-row="1" id="money_receipt_discount"></textarea>
                                                        </td>
                                                        <td><input type="date" class="qty" data-row="1"
                                                                name="money_receipt_date" id="money_receipt_date"></td>
                                                    </tr>
                                                </div>
                                            </tbody>
                                        </table>

                                        <div class="footer-note mt-5">
                                            <h5>Note</h5>
                                            <textarea name="money_receipt_note" id="money_receipt_note" class="form-control bg-light"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 text-center text-md-end">
                            <a type="button" class="btn btn-lg btn-secondary" href=""><i
                                    class="fa fa-envelope me-2"></i>SKIP</a>
                            <button type="submit" class="btn btn-lg btn-primary"><i
                                    class="fa fa-print me-2"></i>Generate Money Receipt</button>
                        </div>
        </form>





        <script type="text/javascript">
            $('#cheque_number').hide();
            $('#withdraw_date').hide();
            $('#checqueId').on('change', function() {
                var selectVal = $("#checqueId option:selected").val();

                if (selectVal == 'cheque') {

                    $('#cheque_number').show();
                    $('#withdraw_date').show();
                } else {
                    $('#cheque_number').hide();
                    $('#withdraw_date').hide();
                }
            });


            var billing_row = document.querySelectorAll('.billing-details-row').length + 1;

            $(document).on('click', '.addProductRow', function() {

                var billing_content = ' <tr class="item-row billing-details-row">' +
                    '<td class="item-name">' +
                    ' <div class="delete-wpr"><a class="delete" href="javascript:;" title="Remove row">X Remove</a></div>' +
                    '<div class="col-12">' +
                    '<select class="form-control form-control-lg custom-select" name="billing_product_' + billing_row +
                    '">' +
                    '<option value="" disabled selected>Select Product</option> ' +
                    '<option value="PASSPORT">Passport</option>' +
                    '<option value="VISA">Visa</option>' +
                    '<option value="MANPOWER">Man Power</option>' +
                    '<option value="MEDICAL_TEST">Medical Test</option>' +
                    '<option value="POLICE_CLEARENCE">Police Clearence</option>' +
                    '<option value="TRAINING_CARD">Training Card</option>' +
                    '</select>' +
                    '</div>' +
                    '</td>' +
                    '<td class="description">' +
                    ' <textarea name="billing_description_' + billing_row + '"></textarea>' +
                    ' </td>' +
                    '<td class="description">' +
                    ' <textarea name="billing_vendor_' + billing_row + '"></textarea>' +
                    '  </td>' +
                    ' <td><textarea class="cost" name="billing_cost_price_' + billing_row + ' "></textarea></td>' +
                    ' <td><textarea class="cost billing-unit-price billing-unit-price-' + billing_row + '" data-row="' +
                    billing_row + '" name="billing_unit_price_' + billing_row + ' "></textarea></td>' +
                    ' <td><textarea class="qty billing-quantity billing-quantity-' + billing_row + '" data-row="' +
                    billing_row + '" name="billing_quantity_' + billing_row + ' "></textarea></td>' +
                    '  <td><textarea class="qty billing-single-total billing-total billing-total-' + billing_row +
                    '" data-row="' + billing_row + '" name="billing_total_' + billing_row +
                    '" readonly></textarea></td>' +
                    ' </tr>' +
                    '<div style="clear:both"></div>' +
                    '<span class="remove-flight-row"><i class="fa fa-times"></i></span>' +
                    '<input type="hidden" name="flight_rows[]" value="' + billing_row + '" />' +
                    '</div>';

                $('.items tr:last').after(billing_content);

            });

            $(document).on('click', '.delete-wpr', function() {
                $(this).parent().parent().remove();
            });
        </script>


        <script type="text/javascript">
            $(document).ready(function() {

                function getInvoiceData(id) {
                    $('.loader').show();
                    $.ajax({
                        type: "GET",
                        url: "{{ url('get-invoice-full-information') }}",
                        dataType: "json",
                        data: {
                            q: id
                        },
                        success: function(data) {
                            $("#money_receipt_invoice_id").text(data.data[0].invoice_no);
                            $("#money_receipt_invoice_net_total").text(data.data[0].invoice_grand_total);
                            $("#money_receipt_invoice_due_amount").text(data.data[0].invoice_grand_total -
                                data.data[0].invoice_total_paid);
                            //                        console.log(data.content[0]);
                        }
                    });
                    $('.loader').hide();
                }



                $('#searchFlatOwner').autocomplete({
                    html: true,
                    source: function(request, response) {
                        $.ajax({
                            type: "GET",
                            url: "{{ url('flat-owner-name-search') }}",
                            dataType: "json",
                            data: {
                                q: request.term,
                            },
                            success: function(data) {
                                response(data.data);
                            }
                        });
                    },
                    select: function(event, ui) {
                        $(this).val(ui.item.label);
                        $('#hidden_flat_owner_id').val(ui.item.value);
                        return false;
                    },
                    minLength: 1,
                    open: function() {

                        $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                    },
                    close: function() {

                        if ($('#hidden_flat_owner_id').val() == '') {
                            $(this).val('');
                            $('#hidden_flat_owner_id').val('');
                        }
                        $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                    }
                });

                $('#searchInvoice').autocomplete({
                    html: true,
                    source: function(request, response) {
                        let hiddenId = $('#hidden_flat_owner_id').val();
                        //                        alert(hiddenClientId);
                        $.ajax({
                            type: "GET",
                            url: "{{ url('search-flat-owner-wise-invoice') }}/",
                            dataType: "json",
                            data: {
                                q: hiddenId,
                            },
                            success: function(data) {
                                response(data.data);
                            }
                        });
                    },
                    select: function(event, ui) {
                        $(this).val(ui.item.label);
                        $('#hiddenInvoiceID').val(ui.item.value);
                        getInvoiceData(ui.item.value);
                        return false;
                    },
                    minLength: 1,
                    open: function() {

                        $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
                    },
                    close: function() {

                        if ($('#hiddenInvoiceID').val() == '') {
                            $(this).val('');
                            $('#hiddenInvoiceID').val('');
                        }
                        $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
                    }
                });


            });


            $("#money_receipt_form").submit(function(e) {
                e.preventDefault();
                $(".error_msg").html('');
                var data = new FormData($('#money_receipt_form')[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url: "{{ url('money-receipt') }}",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, textStatus, jqXHR) {
                        window.location.href = "{{ url('money-receipt') }}/";
                    }
                }).done(function() {
                    $("#success_msg").html("Data Saved Successfully");
                    // window.location.href = "{{ url('agents') }}";
                    // location.reload();
                }).fail(function(data, textStatus, jqXHR) {
                    $(".loader").hide();
                    var json_data = JSON.parse(data.responseText);
                    $.each(json_data.errors, function(key, value) {
                        $("#" + key).after(
                            "<span class='error_msg' style='color: red;font-weigh: 600'>" + value +
                            "</span>");
                    });
                });
            });
        </script>
    @endsection
