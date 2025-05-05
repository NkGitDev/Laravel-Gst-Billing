@extends('layouts.app')

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title font-weight-bold text-uppercase"> User Profile </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- Start Form  -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('include.alert')
                    <h4 class="header-title text-uppercase"> Basic Info</h4>
                    <hr>
                    <form class="needs-validation" novalidate="" method="post" action="{{ route('user-profile.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="firstName">First Name</label>
                                    <input type="text" name="name" value="{{$user->name}}" class="form-control border-bottom" id="firstName" placeholder="Enter first name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" name="last_name" value="{{$user->last_name}}" class="form-control border-bottom" id="lastName" placeholder="Enter last name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control border-bottom" id="email" placeholder="Enter email address" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="mobileNumber">Mobile Number</label>
                                    <input type="text" name="mobile_number" value="{{$user->mobile_number}}" class="form-control border-bottom" id="mobileNumber" placeholder="Enter mobile number" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="gender">Gender</label>
                                    <select name="gender" class="form-control border-bottom" id="gender" required>
                                        <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" value="{{$user->address}}" class="form-control border-bottom" id="address" placeholder="Enter Address" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="state">State</label>
                                    <input type="text" name="state" value="{{$user->state}}" class="form-control border-bottom" id="state" placeholder="Enter State" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" value="{{$user->country}}" class="form-control border-bottom" id="country" placeholder="Enter Country" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="photo">Profile Photo</label>
                                    <input type="file" name="photo" class="form-control border-bottom" id="photo" accept="image/*">
                                    <small class="form-text text-muted">Upload a profile photo (optional).</small>
                                </div>
                            </div>
                        </div>

                        <br>

                        <button class="btn btn-primary" type="submit">Update</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection