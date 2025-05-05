<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
            <div class="modal-header bg-info text-white" style="border-radius: 20px 20px 0 0;">
                <h5 class="modal-title text-white text-center" id="registerModalLabel" style="font-size:25px">Register</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close" onclick="$('#registerModal').modal('hide')">
                    <span aria-hidden="true" style="font-size:25px">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <!-- Register Form -->
                <form method="POST" action="{{ route('register') }}" style="border-radius: 20px; background-color: #f9f9f9; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    @csrf
                    <!-- Name field -->
                    <div class="form-group">
                        <label for="name" class="text-center">Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                            <div class="input-group-append">
                                <span class="input-group-text" id="name-addon">
                                    <i class="fe-user"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Email field -->
                    <div class="form-group">
                        <label for="email" class="text-center">Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            <div class="input-group-append">
                                <span class="input-group-text" id="email-addon">
                                    <i class="fe-mail"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Password field -->
                    <div class="form-group">
                        <label for="password" class="text-center">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            <div class="input-group-append" data-password="false">
                                <span class="input-group-text" id="password-addon">
                                    <i class="password-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Confirm Password field -->
                    <div class="form-group">
                        <label for="password_confirmation" class="text-center">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password">
                            <div class="input-group-append" data-password="false">
                                <span class="input-group-text" id="password-addon">
                                    <i class="password-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-info rounded-pill btn-block text-white">Register</button>
                    <p class="text-center mt-2">Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" onclick="$('#registerModal').modal('hide'); $('#loginModal').modal('show')">Login</a> <i class="fe-log-in"></i></p>
                </form>
            </div>
        </div>
    </div>
</div>
