@extends('layouts.app')

@section('content')

 <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="container-fluid">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title font-weight-bold"> CREATE GST BILL </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title text-uppercase">Invoice Basic Info</h4>
                                    <hr>
                                    <form method="post" action="{{ route('create-gst-bill') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group mb-3">
                                                    <label>Type</label>
                                                    <select class="form-control border-bottom" name="party_id" id="validationCustom01">
                                                        <option>Select Client</option>
                                                        @foreach($parties as $party)
                                                            @if($party->user_id == auth()->id())
                                                                <option value=" {{ $party->id}} ">{{$party->full_name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group mb-3">
                                                    <label>Invoice Date</label>
                                                    <input type="date" class="form-control border-bottom" name="invoice_date"
                                                        id="validationCustom02">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group mb-3">
                                                    <label>Invoice Number</label>
                                                    <input type="text" class="form-control border-bottom" name="invoice_number"
                                                        id="validationCustom03" placeholder="Enter Invoice NUmber">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="header-title text-uppercase">Item Details</h4>
                                                <hr>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8 border p-1 text-center">
                                                <b>DESCRIPTIONS</b>
                                            </div>
                                            <div class="col-md-4 border p-1 text-center">
                                                <b>TOTAL AMOUNT</b>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-8 border p-2">
                                                <input class="form-control" name="item_description" />
                                            </div>
                                            <div class="col-md-4 border p-2">
                                                <input class="form-control" type="text" name="total_amount" id="totalAmountInput"
                                                    oninput="calculateNetAmount()">
                                            </div>
                                        </div>

                                        <div class="row mt-0">
                                            <div class="col-md-3">
                                                <label>CGST (%)</label>
                                                <input type="text" class="form-control border-bottom"
                                                    placeholder="CGST Rate" name="cgst_rate" id="cgst" oninput="calculateNetAmount()">
                                                <span class="float-right gststyle" id="cgstDisplay">0</span>
                                                <input type="hidden" id="cgstAmount" name="cgst_amount" value="0">
                                            </div>

                                            <div class="col-md-3">
                                                <label>SGST (%)</label>
                                                <input type="text" class="form-control border-bottom"
                                                    placeholder="SGST Rate" name="sgst_rate" id="sgst" oninput="calculateNetAmount()">
                                                <span class="float-right gststyle" id="sgstDisplay">0</span>
                                                <input type="hidden" id="sgstAmount" name="sgst_amount" value="0">
                                            </div>

                                            <div class="col-md-3">
                                                <label>IGST (%)</label>
                                                <input type="text" class="form-control border-bottom"
                                                    placeholder="IGST Rate" name="igst_rate" id="igst" oninput="calculateNetAmount()">
                                                <span class="float-right gststyle" id="igstDisplay">0</span>
                                                <input type="hidden" id="igstAmount" name="igst_amount" value="0">
                                            </div>

                                            <div class="col-md-3">
                                                <ul style="list-style: none;float: right;">
                                                    <li>
                                                        <b>Total Amount:</b> ₹ <span type="text" name="total_amount"
                                                            id="totalAmountDisplay">0</span>
                                                    </li>
                                                    <li>
                                                        <b>Tax:</b> ₹ <span type="text" id="taxDisplay">0</span>
                                                        <input type="hidden" value="0" name="tax_amount"
                                                            id="taxAmount">
                                                    </li>
                                                    <li>
                                                        <b>Net Amount:</b> ₹ <span type="text"
                                                            id="netAmountDisplay" oninput="calculateNetAmount()">0</span>
                                                        <input type="hidden" value="0" name="net_amount" id="netAmount">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control border-bottom" name="declaration"
                                                        id="validationCustom04" placeholder="Declaration">
                                                </div>

                                                    <button type="submit"
                                                        class="btn btn-primary float-right mb-2">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <!-- ============================================================== -->

        <!-- End Page content -->
        <!-- ============================================================== -->
    <script>
        var totalamount = document.getElementById('totalAmountInput');
        
        totalamount.onkeyup = totalamount.onkeypress = function(){
            document.getElementById('totalAmountDisplay').innerHTML = this.value || 0;
        }
        
        function calculateNetAmount(){
            var totalamountvalue = document.getElementById('totalAmountInput').value || 0;

            var cgsttaxratevalue = document.getElementById('cgst').value || 0;
            var cgsttaxamount = parseFloat(totalamountvalue) * parseFloat(cgsttaxratevalue) / 100;

            // to display content in span
            var cgsttax = document.getElementById('cgstDisplay').textContent = cgsttaxamount;
            var cgsttaxinp = document.getElementById('cgstAmount').value = cgsttaxamount;

            // for sgst tax
            var sgsttaxratevalue = document.getElementById('sgst').value || 0;
            var sgsttaxamount = parseFloat(totalamountvalue) * parseFloat(sgsttaxratevalue) / 100;

            // to display content in span
            var sgsttax = document.getElementById('sgstDisplay').textContent = sgsttaxamount;
            var sgsttaxinp = document.getElementById('sgstAmount').value = sgsttaxamount;

            // for igst tax
            var igsttaxratevalue = document.getElementById('igst').value || 0;
            var igsttaxamount = parseFloat(totalamountvalue) * parseFloat(igsttaxratevalue) / 100;

            // to display content in span
            var igsttax = document.getElementById('igstDisplay').textContent = igsttaxamount;
            var igsttaxinp = document.getElementById('igstAmount').value = igsttaxamount;

            // Total tax
            var totaltax = parseFloat(cgsttax) + parseFloat(sgsttax) + parseFloat(igsttax);
            document.getElementById('taxDisplay').textContent = totaltax;
            document.getElementById('taxAmount').value = totaltax;

            // Net Amount
            var netamount = parseFloat(totalamountvalue) + parseFloat(totaltax);
            document.getElementById('netAmountDisplay').textContent = netamount;
            document.getElementById('netAmount').value = netamount;
        }
        
    </script>

@endsection