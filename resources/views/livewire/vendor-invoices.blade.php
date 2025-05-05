<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h2 class="page-title font-weight-bold text-uppercase">Search Vendor Invoices</h2>
                </div>
                @include('include/alert')
                @include('livewire/alert')
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4 text-uppercase">Manage Vendor Invoices</h4>
                    <div class="row">
                        <div class="col-sm-12 col-md-10">
                            <div class="dataTables_length" id="alternative-page-datatable_length">
                                <label>Show Invoices
                                    <select wire:model.live="perPage" aria-controls="alternative-page-datatable" class="custom-select custom-select-sm form-control form-control-sm">
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
                                <label>Search:<input type="text" wire:model.live.debounce.250ms="searchTerm" placeholder="Search invoices..." class="form-control form-control-sm" aria-controls="alternative-page-datatable"></label>
                            </div>
                        </div>
                    </div>
                    <div style="overflow-y: auto; height: 400px;">
                        <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered" id="tickets-table">
                            <thead class="thead-dark" style="position: sticky; top: 0; background-color: #fff; z-index: 1;">
                                <tr>
                                    <th>S.No.</th>
                                    <th>Invoice No</th>
                                    <th>Client's Info</th>
                                    <th>Total Amount</th>
                                    <th>Date</th>
                                    <th class="hidden-sm">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($invoices->count())
                                    @foreach($invoices as $index => $invoice)
                                        <tr>
                                            <td><b>{{ ($invoices->currentPage() - 1) * $invoices->perPage() + $loop->iteration }}</b></td>
                                            <td>{!! $this->highlight($invoice->invoice_number) !!}</td>
                                            <td>{!! $this->highlight($invoice->party->full_name) !!}</td>
                                            <td>{{ $invoice->total_amount }}</td>
                                            <td>{{ date("d-m-Y", strtotime($invoice->invoice_date)) }}</td>
                                            <td>
                                                                                               
                                                <div class="d-flex justify-content-center">
                                                    <button type="button" class="btn px-1" data-toggle="modal" data-bs-target="#deleteModal" wire:click="deleteInvoicePopup({{ $invoice->id }})" style="width: auto;">
                                                        <i class="mdi mdi-delete text-danger font-18"></i>
                                                    </button>
                                                    <a class="btn px-1" href="{{ route('vendor-invoice.show', $invoice->id) }}" style="width: auto;">
                                                        <i class="mdi mdi-printer text-success font-18"></i>
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>

                                        @include('livewire.delete-invoice-modal')

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
                    {{ $invoices->links() }}
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>

    <!-- for popup modal -->
    @script
    <script>
        $wire.on('invoicepopupshow', () => {
            $('#deleteInvoiceModal').modal('show');
        });
    </script>
    @endscript
</div>