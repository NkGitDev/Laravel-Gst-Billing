@extends('layouts/app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Create Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

    <!-- Plugins css -->
    <!-- <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" /> -->

    <!-- App css -->
    <link href="{{ asset('assets/css2/bootstrap-creative.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{ asset('assets/css2/app-creative.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{ asset('assets/css2/bootstrap-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet"
        disabled />
    <link href="{{ asset('assets/css2/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"
        disabled />

    <!-- icons -->
    <link href="{{ asset('assets/css2/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="style.css">

</head>

<body data-layout-mode="detached"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <!-- start page title -->
        <div class="content-page m-0 p-0">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title font-weight-bold text-uppercase"> Create Invoice </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="needs-validation pb-2" method="post" action="{{ route('vendor-invoice.store') }}">
                                    @csrf    
                                    <input type="hidden" name="party_id" />
                                    <h6 class="text-right"><b>Date : </b><Span>{{ date('d-m-Y H:i:s') }}</Span></h6>
                                        <h4 class="page-title "><i data-feather="edit-3"
                                                class="pr-0 mr-1 text-uppercase"></i>Enter Your
                                            Details</h4>
                                        <hr>
                                        <div class="row my-3">
                                            <div class="form-group col-md-4">
                                                <label for="">Name</label>
                                                <input type="text" name="full_name" class="form-control border-bottom"
                                                    id="validationCustom01" placeholder="Enter Name" required="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Phone No.</label>
                                                <input type="text" name="mobile_number" class="form-control border-bottom"
                                                    id="validationCustom01" placeholder="Phone/Mobile no." required="">
                                            </div>
                                            
                                            <div class="form-group col-md-4">
                                                <label for="">Address</label>
                                                <input type="text" name="address" class="form-control border-bottom"
                                                id="validationCustom02" placeholder="Destination/Address"
                                                required="">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="">Invoice Number *</label>
                                                <input required type="text" name="invoice_number" class="form-control border-bottom">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Invoice Date</label>
                                                <input type="date" value="{{ date('Y-m-d') }}" name="invoice_date" class="form-control border-bottom"
                                                    id="validationCustom02" placeholder="" required="">
                                            </div>
                                        </div>
                                        <h4 class="page-title pt-2"><i data-feather="edit-3" class="pr-0 mr-1"></i>ENTER
                                            YOUR BANK
                                            DETAIL</h4>
                                        <hr>
                                        <div class="row my-3">
                                            <div class="form-group col-md-4">
                                                <label for="">Account Holder Name</label>
                                                <input type="text" name="account_holder_name" class="form-control border-bottom"
                                                    id="validationCustom01" placeholder="Enter Account Holder Name"
                                                    required="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Account Number</label>
                                                <input type="text" name="account_number" class="form-control border-bottom"
                                                    id="validationCustom01" placeholder="Enter Account Number"
                                                    required="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Bank Name</label>
                                                <input type="text" name="bank_name" class="form-control border-bottom"
                                                    id="validationCustom02" placeholder="Enter Bank Name" required="">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="">IFSC Code</label>
                                                <input type="text" name="ifsc_code" class="form-control border-bottom"
                                                    id="validationCustom01" placeholder="IFSC Code" required="">

                                            </div>
                                            <div class="form-group col-md-9">
                                                <label for="">Branch Name</label>
                                                <input type="text" name="branch_name" class="form-control border-bottom"
                                                    id="validationCustom01" placeholder="Destination/Address"
                                                    required="">
                                            </div>
                                        </div>
                                        <h4 class="page-title "><i data-feather="edit-3" class="pr-0 mr-1"></i>ENTER
                                            PRODUCT/ITEM DETAIL
                                        </h4>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-8 border p-1">
                                                <span>DESCRIPTIONS</span>
                                            </div>
                                            <div class="col-md-4 border p-1">
                                                TOTAL AMOUNT
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-8 border p-2">
                                                <textarea class="form-control" name="item_description" placeholder="Enter work details (hit enter for new line)" rows="5">{{ old('item_description') }}</textarea>
                                            </div>
                                            <div class="col-md-4 border p-2">
                                                <input class="form-control" type="text" value="{{ old('total_amount') }}" name="total_amount" id="totalInput" oninput="calculateTotalAmount()">
                                            </div>
                                        </div>

                                </div>
                                <div class="row mt-3 px-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="declaration" class="form-control border-bottom"
                                                id="validationCustom05" placeholder="Declaration">
                                        </div>

                                        <a href="vendor-invoice.show">
                                            <button type="submit" class="btn btn-success float-right mb-2">SUBMIT <i
                                                    data-feather="arrow-right" class="ml-1 fw-bold"></i></button>
                                        </a>
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

    <!-- End Form  -->

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="{{ asset('assets/js2/vendor.min.js') }}"></script>

    <!-- Plugins js-->
    <script src="{{ asset('assets/libs2/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/libs2/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Dashboar 1 init js-->
    <script src="{{ asset('assets/js2/pages/dashboard-1.init.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('assets/js2/app.min.js') }}"></script>

    <!-- Script JS File -->
    <script src="script.js"></script>

</body>

</html>
@endsection