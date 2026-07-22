@extends('layouts.app')

@section('content')
@include('include/alert')

<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                @if(Auth::check())
                <h1 class="text-info">Welcome, {{ $user->name ?? 'New User' }}!</h1>
                @endif
                <h4 class="page-title font-weight-bold">DASHBOARD</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                            <i class="fe-users font-28 avatar-title text-primary"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            @if($user)
                                {{-- User is logged in --}} 
                                <h3 class="mt-1">
                                    <span data-plugin="counterup">{{ $totalClients ?? 0}}</span>
                                </h3>
                                <p class="text-muted mb-1 text-truncate">
                                    Total Clients
                                </p>
                            @else
                                {{-- User is not logged in --}}
                                <h3 class="text-dark mt-1 text-justify">
                                    <span class="text-muted">No Clients</span>
                                </h3>   
                            @endif
                        </div>
                    </div>
                </div>
                <!-- end row-->
            </div>
            <!-- end widget-rounded-circle-->
        </div>
        <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                            <i class="mdi mdi-account-multiple-outline font-28 avatar-title text-success"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            @if($user)
                                {{-- User is logged in --}} 
                                <h3 class="text-dark mt-1">
                                    <span data-plugin="counterup">{{ $totalVendors ?? 0 }}</span>
                                </h3>
                                <p class="text-muted mb-1 text-truncate">
                                    Total Vendors
                                </p>
                            @else
                                {{-- User is not logged in --}}
                                <h3 class="text-dark mt-1 text-justify">
                                    <span class="text-muted">No Vendors</span>
                                </h3>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- end row-->
            </div>
            <!-- end widget-rounded-circle-->
        </div>
        <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                            <i class="mdi mdi-account-group font-28 avatar-title text-info"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            @if($user)
                                {{-- User is logged in --}} 
                                <h3 class="text-dark mt-1">
                                    <span data-plugin="counterup">{{ $totalEmployees ?? 0 }}</span>
                                </h3>
                                <p class="text-muted mb-1 text-truncate">Total Employees</p>
                            @else
                                {{-- User is not logged in --}}
                                <h3 class="text-dark mt-1 text-justify">
                                    <span class="text-muted">No Employee</span>
                                </h3>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- end row-->
            </div>
            <!-- end widget-rounded-circle-->
        </div>
        <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                            <i class="fe-file-text font-28 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            @if($user)
                                {{-- User is logged in --}}
                                <h3 class="text-dark mt-1">
                                    <span data-plugin="counterup">{{ $totalGstBills ?? 0 }}</span>
                                </h3>
                                <p class="text-muted mb-1 text-truncate">
                                    Total Gst Bills
                                </p>
                            @else
                                {{-- User is not logged in --}}
                                <h3 class="text-dark mt-1 text-justify">
                                    <span class="text-muted">No Gst Bills</span>
                                </h3>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- end row-->
            </div>
            <!-- end widget-rounded-circle-->
        </div>
        <!-- end col-->
    </div>

    @if(!$user)
    <div class="text-center">
        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-info rounded-lg" data-bs-toggle="modal" data-bs-target="#loginModal" onclick="$('#loginModal').modal('show')">Please Login....</button>
    </div>
    @endif
</div>




<!-- AI Insight Section -->
<div class="card my-4 border-primary">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">✨ Smart AI Sales Insights</h5>
        <button id="aiBtn" onclick="fetchAIInsight()" class="btn btn-light btn-sm">Generate AI Insights</button>
    </div>
    <div class="card-body">
        <div id="aiLoading" style="display: none;" class="text-muted">
            <em>🤖 Analyzing sales & invoice data with AI... Please wait...</em>
        </div>
        <div id="aiResult" class="card-text">
            Click the button above to get smart recommendations for your business!
        </div>
    </div>
</div>

<script>
function fetchAIInsight() {
    document.getElementById('aiLoading').style.display = 'block';
    document.getElementById('aiResult').innerHTML = '';
    
    fetch("{{ route('ai.insight') }}")
        .then(response => response.json())
        .then(data => {
            document.getElementById('aiLoading').style.display = 'none';
            if(data.success) {
                document.getElementById('aiResult').innerText = data.insight;
            } else {
                // Yahan exact message display hoga
                document.getElementById('aiResult').innerText = 'Error: ' + data.message;
            }
        })
        .catch(error => {
            document.getElementById('aiLoading').style.display = 'none';
            document.getElementById('aiResult').innerText = 'Error connecting to server: ' + error;
        });
}
</script>






@include('include/login-popup')
@include('include/register-popup')

@endsection