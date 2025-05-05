
@include('include/login-popup')
@include('include/register-popup')

<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
      <div class="h-100" data-simplebar>
        <!-- User box -->
        <div class="user-box text-center">          
          @if(Auth::check())
                @php $user = Auth::user(); @endphp
                @if($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}'s Image" style="width: 100px; height: 100px;" class="rounded-circle avatar-md">
                @else
                    <img src="{{ asset('assets/images/users/Guest-user.png') }}" alt="Default Avatar" style="width: 100px; height: 100px;" class="rounded-circle avatar-md">
                @endif
                <p class="text-muted mt-2">{{ $user->name }}</p>
            @else
                <img src="{{ asset('assets/images/users/Guest-user.png') }}" alt="Default Avatar" style="width: 100px; height: 100px;" class="rounded-circle avatar-md">
                <p class="text-muted mt-2">Guest</p>
          @endif
        </div>
        <!--- Sidemenu -->
        <div id="sidebar-menu">
          <ul id="side-menu">
          <li>
              <a href="{{ url('/') }}">
                <span> DASHBORAD </span>
              </a>
            </li>

            <li>
              <a href="#sidebarEcommerce" data-toggle="collapse">
                <i data-feather="users"></i>
                <span> Parties </span>
                <span class="menu-arrow"></span>
              </a>
              <div class="collapse" id="sidebarEcommerce">
                <ul class="nav-second-level">
                  <li>
                    @if(Auth::check())
                      <a href="{{ route('add-party') }}"><i data-feather="plus" class="pr-0 mr-1"></i>Add New</a>
                    @else
                      <a type="button" data-bs-toggle="modal" data-bs-target="#loginModal" onclick="$('#loginModal').modal('show')"><i data-feather="plus" class="pr-0 mr-1"></i>Add New</a>
                    @endif
                  </li>
                  <li>
                    @if(Auth::check())
                      <a href="{{ route('manage-parties') }}"><i data-feather="list" class="pr-0 mr-1"></i>Manage Parties</a>
                    @else
                      <a type="button" data-bs-toggle="modal" data-bs-target="#loginModal" onclick="$('#loginModal').modal('show')"><i data-feather="list" class="pr-0 mr-1"></i>Manage Parties</a>
                    @endif
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a href="#sidebarCrm" data-toggle="collapse">
                <i data-feather="edit"></i>
                <span> GST Billing </span>
                <span class="menu-arrow"></span>
              </a>
              <div class="collapse" id="sidebarCrm">
                <ul class="nav-second-level">
                  <li>
                    @if(Auth::check())
                      <a href="{{ route('add-gst-bill') }}"><i data-feather="plus" class="pr-0 mr-1"></i>Create bill</a>
                    @else
                      <a type="button" data-bs-toggle="modal" data-bs-target="#loginModal" onclick="$('#loginModal').modal('show')"><i data-feather="plus" class="pr-0 mr-1"></i>Create bill</a>
                    @endif
                    </li>
                  <li>
                    @if(Auth::check())
                    <a href="{{ route('manage-gst-bills') }}"><i data-feather="list" class="pr-0 mr-1"></i>Manage all bills</a>
                    @else
                    <a type="button" data-bs-toggle="modal" data-bs-target="#loginModal" onclick="$('#loginModal').modal('show')"><i data-feather="list" class="pr-0 mr-1"></i>Manage all bills</a>
                    @endif
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a href="#sidebarInv" data-toggle="collapse">
                <i data-feather="file"></i>
                <span> Vendor Invoices </span>
                <span class="menu-arrow"></span>
              </a>
              <div class="collapse" id="sidebarInv">
                <ul class="nav-second-level">
                  <li>
                    @if(Auth::check())
                      <a href="{{ route('vendor-invoice.create') }}"><i data-feather="plus" class="pr-0 mr-1"></i>Create Invoice</a>
                    @else
                      <a type="button" data-bs-toggle="modal" data-bs-target="#loginModal" onclick="$('#loginModal').modal('show')"><i data-feather="plus" class="pr-0 mr-1"></i>Create bill</a>
                    @endif
                    </li>
                  <li>
                    @if(Auth::check())
                    <a href="{{ route('vendor-invoice.index') }}"><i data-feather="list" class="pr-0 mr-1"></i>Manage invoices</a>
                    @else
                    <a type="button" data-bs-toggle="modal" data-bs-target="#loginModal" onclick="$('#loginModal').modal('show')"><i data-feather="list" class="pr-0 mr-1"></i>Manage all bills</a>
                    @endif
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
      </div>
      <!-- Sidebar -left -->
    </div>
    <!-- Left Sidebar End -->
    