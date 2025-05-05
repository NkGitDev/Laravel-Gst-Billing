<div>
    @if(session()->has('success'))
            <div class="alert alert-success d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <span>{{ session()->get('success') }}</span>
                </div>
                <div class="d-flex align-items-center">
                    @if(session('deleted_party_id') && $currentPage == 'party')
                        <button type="button" class="btn btn-secondary mr-2 rounded" wire:click="undoDeleteParty()">Undo Delete Party</button>
                    @endif
                    @if(session('deleted_gstbill_id') && $currentPage == 'gstbill')
                        <button type="button" class="btn btn-secondary mr-2 rounded" wire:click="undoDeleteGstBill()">Undo Delete Gst Bill</button>
                    @endif
                    @if(session('deleted_vendorinvoice_id') && $currentPage == 'vendorinvoice')
                        <button type="button" class="btn btn-secondary mr-2 rounded" wire:click="undoDeleteVendorInvoice()">Undo Delete Vendor Invoice</button>
                    @endif
                    <button type="button" class="close ml-3" data-dismiss="alert" aria-label="Close">
                        <i class="mdi mdi-close-circle font-26"></i>
                    </button>
                </div>
            </div>
        @endif


    @if(session()->has('error'))
        <div class="alert alert-danger">
            <button type="button" class="close ml-3" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('error') }}
        </div>
    @endif
</div>
