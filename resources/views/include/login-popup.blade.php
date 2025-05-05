<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
            <div class="modal-header bg-info text-white" style="border-radius: 20px 20px 0 0;">
                <h5 class="modal-title text-white text-center" id="loginModalLabel" style="font-size:25px">Login</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close" onclick="$('#loginModal').modal('hide')">
                    <span aria-hidden="true" style="font-size:25px">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" style="border-radius: 20px; background-color: #f9f9f9; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    @csrf
                    <!-- Email and Password fields -->
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
                    <button type="submit" class="btn btn-lg btn-info rounded-pill btn-block text-white">Login</button>
                    <p class="text-center mt-2">Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" onclick="$('#loginModal').modal('hide'); $('#registerModal').modal('show')">Register</a> <i class="fe-user-plus"></i></p>
                </form>
            </div>
        </div>
    </div>
</div>