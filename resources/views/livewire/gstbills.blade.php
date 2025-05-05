
<div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h2 class="page-title font-weight-bold text-uppercase">Manage Bills</h2>
            </div>
            @include('include/alert')
            @include('livewire/alert')
        </div>
    </div>
    <!-- end page title -->
        <div class="row">
        <div class="col-12">
            <div class="card-box">
                <a href="{{ route('add-gst-bill') }}" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                    <i class="mdi mdi-plus-circle"></i> Create New Bill
                </a>
                <h4 class="header-title mb-4 text-uppercase">Manage Bills</h4>
                <div class="row">
                    <div class="col-sm-12 col-md-10">
                        <div class="dataTables_length" id="alternative-page-datatable_length">
                            <label>Show Bills
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
                            <label>Search:<input type="text" wire:model.live.debounce.250ms="searchTerm" placeholder="Search parties..." class="form-control form-control-sm"
                                    placeholder="" aria-controls="alternative-page-datatable"></label>

                        </div>
                    </div>
                </div>
                <div style="overflow-y: auto; height: 400px;" >
                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered"
                        id="tickets-table">
                        <thead class="thead-dark"  style="position: sticky; top: 0; background-color: #fff; z-index: 1;">
                            <tr>
                                <th>
                                    S.No.
                                </th>
                                <th>Invoice No</th>
                                <th>Cielnt's Info</th>
                                <th>Billing Info</th>
                                <th>Date</th>
                                <th class="hidden-sm">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @if($bills !== null && count($bills))
                            @foreach($bills as $index => $bill)
                            <tr>
                                <td><b>{{ ($bills->currentPage() - 1) * $bills->perPage() + $loop->iteration }}</b></td>                                        
                                <td>
                                    {!! $this->highlight($bill->invoice_number, $searchTerm) !!}
                                </td>

                                <td>
                                    {!! $this->highlight($bill->party->full_name, $searchTerm) !!}
                                </td>
                                <td>
                                    <ul class="list-unstyled">
                                        <li><b>Total Amount :</b><span> {{ $bill->total_amount}}</span></li>
                                        <li><b>TAX :</b><span> {{  $bill->tax_amount}}</span></li>
                                        <li><b>Net Amount :</b><span> {{ $bill->net_amount }}</span></li>
                                    </ul>
                                </td>

                                <td>
                                    {{ date("d-m-Y", strtotime($bill->invoice_date)) }}
                                </td>
                                <td>
                                    
                                    <div class="d-flex justify-content-center">
                                                    
                                        <!-- delete button -->
                                        <button class="btn px-1" type="button" data-toggle="modal" data-bs-target="#deleteModal" wire:click="deleteBillPopup({{ $bill->party_id }})">
                                            <i class="mdi mdi-delete text-danger font-18 vertical-middle"></i></button>
                                        
                                            {{-- Print button --}}
                                        <a class="btn px-1" href="{{ route('print-gst-bill', $bill->party_id) }}"><i
                                                class="mdi mdi-printer text-success font-18 vertical-middle"></i>
                                            </a>
                                    </div>
                                    
                                </td>
                            </tr>
                            
                            @include('livewire/delete-gstbills-modal')
                            
                            @endforeach

                            @else
                            <tr>
                                <td colspan="6">No record found!</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div><!-- end col -->
            <div>
                {{ $bills->links() }}
            </div>
        </div>
    </div>
    <!-- end row -->
</div>

<!-- for popup modal -->
@script
<script>
    $wire.on('popupshow', () => {
        $('#deleteModal').modal('show');
    });
</script>
@endscript

</div>
