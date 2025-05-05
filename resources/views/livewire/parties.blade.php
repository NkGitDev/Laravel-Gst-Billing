 
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<!-- start page title -->
<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="page-title-box">
                    <h2 class="page-title font-weight-bold text-uppercase">Manage Clients</h2>
                </div>
                @include('include.alert')
                @include('livewire/alert')
            </div>
        </div>
                <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <a href=" {{ route('add-party') }} " class="btn btn-sm btn-blue waves-effect waves-light float-right">
                        <i class="mdi mdi-plus-circle"></i> Add Client
                    </a>
                    <h4 class="header-title mb-4 text-uppercase">Manage Clients</h4>
                                    

                    <!-- Manage Party -->

                    <div class="row">
                        <div class="col-sm-12 col-md-10">
                            <div class="dataTables_length" id="alternative-page-datatable_length">
                                <label>Show entries
                                    <select wire:model.live.debounce.300ms="perPage" aria-controls="alternative-page-datatable" class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> 
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2">
                            <div id="alternative-page-datatable_filter" class="dataTables_filter">
                                <label>Search:
                                    <input type="text" wire:model.live.debounce.250ms="searchTerm" placeholder="Search..." class="form-control" />

                                </label>
                            </div>
                        </div>
                        @if($parties !== null && $parties->isEmpty())
                            <h3>No results found.</h3>
                        @else
            
                        <div style="overflow-y: auto; height: 400px;" class='table-responsive'> <!-- Set a fixed height and enable scrolling -->
                            <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered"
                                id="tickets-table">
                                <thead class="thead-dark"  style="position: sticky; top: 0; background-color: #fff; z-index: 1;">
                                    <tr>
                                        <th>
                                            S.No.
                                        </th>
                                        <th>Client Type</th>
                                        <th>Client Info</th>
                                        <th>Bank Details</th>
                                        <th>Created At</th>
                                        <th class="hidden-sm">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($parties as $party)
                                    <tr>
                                        <td><b>{{ ($parties->currentPage() - 1) * $parties->perPage() + $loop->iteration }}</b></td>                                        
                                        <td>
                                            @if($party->party_type == 'client')
                                            <span class="alert alert-warning" style="position: relative; z-index: 0;">{{ $party->party_type }}</span>
                                            @elseif($party->party_type == 'vendor')
                                            <span class="alert alert-info">{{ $party->party_type }}</span>
                                            
                                            @elseif($party->party_type == 'employee')
                                            <span class="alert alert-danger">{{ $party->party_type }}</span>

                                            @endif

                                        </td>

                                        <td>
                                            <ul class="list-unstyled">
                                                <li><b>Name :</b><span> {!! $this->highlight($party->full_name) !!}</span></li>
                                                <li><b>Mobile No. :</b> <span>{!! $this->highlight($party->mobile_number) !!}</span></li>
                                                <li><b>Address :</b> <span>{!! $this->highlight($party->address) !!}</span></li>
                                            
                                            </ul>
                                        </td>

                                        <td>
                                            <ul class="list-unstyled">
                                                <li><b>Account Holder Name :</b><span> {{ $party->account_holder_name }}</span></li>
                                                <li><b>Account No. :</b> <span>{{ $party->account_number }}</span></li>
                                                <li><b>Bank Name :</b> <span>{{ $party->bank_name }}</span></li>
                                                <li><b>IFSC Code :</b> <span>{{ $party->ifsc_code }}</span></li>
                                                <li><b>Zip Code :</b> <span>{{ $party->zip_code }}</span></li>
                                                <li><b>State :</b> <span>{{ $party->state }}</span></li>
                                                <li><b>Branch Name :</b> <span>{{ $party->branch_name }}</span></li>

                                            </ul>
                                        </td>

                                        <td>
                                            {{ $party->created_at}}
                                        </td>

                                        <td>
                                            
                                                <div  class="d-flex justify-content-center">
                                                    <a class="btn px-1" href="{{ route('edit-party', ['id' => $party->id]) }}"><i
                                                            class="mdi mdi-pencil text-info font-18 vertical-middle"></i></a>
                                                   
                                                        <button type="button" class="btn px-1" data-toggle="modal" data-bs-target="#deletePartyModal" wire:click="deletePartyPopup({{ $party->id }})"><i
                                                                class="mdi mdi-delete text-danger font-18 vertical-middle"></i></button>
                                                    

                                                </div>
                                            
                                        </td>
                                    </tr>
                                    @include('livewire/delete-party-modal')

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif   
                        
                    </div>
                    
                    <!-- Manage Party -->
                    
                </div><!-- end col -->
                <div>
                    {{ $parties->links() }} <!-- Pagination links -->
                </div>
            </div>
        </div>
            <!-- end row -->

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

    </div>

    
<!-- for popup modal -->
@script
<script>
    $wire.on('partypopupshow', () => {
        $('#deletePartyModal').modal('show');
    });
</script>
@endscript

</div>

