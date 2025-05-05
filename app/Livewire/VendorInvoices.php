<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\VendorInvoice;
use App\Models\Party;
use Illuminate\Support\Facades\Auth;
use App\Traits\Highlightable;


class VendorInvoices extends Component
{
    use WithPagination; 
    use Highlightable;  // for search text highlight

    protected $paginationTheme = 'bootstrap';
    public $searchTerm = '';
    public $perPage = 5; // Default items per page
    public $currentPage = 'vendorinvoice';

    public function render()
    {
            
        $invoices = VendorInvoice::query()
                    ->where('vendor_invoices.is_deleted', 0)
                    ->when($this->searchTerm, function ($query) {
                        $query->where(function ($subQuery) {
                            $subQuery->where('vendor_invoices.invoice_number', 'like', '%' . $this->searchTerm . '%')
                                    ->orWhere('vendor_invoices.account_holder_name', 'like', '%' . $this->searchTerm . '%');
                        });
                    })
                    ->paginate($this->perPage);
                

        return view('livewire.vendor-invoices', [
            'invoices' => $invoices,
            'currentPage' => $this->currentPage,
        ]);
    }


    // for delete popup modal
    public $invoice_party_id;
    public $invoice_party_name;
    public function deleteInvoicePopup($id)
    {
        $invoice = VendorInvoice::where('id', $id)->first();
        if ($invoice) {
            $this->invoice_party_id = $id;
            $this->invoice_party_name = $invoice->party->full_name;
        }        
        $this->dispatch('invoicepopupshow');
    }

    // for soft delete Invoice
    public function deleteInvoiceBill()
    {
        $invoice_party = VendorInvoice::where('id', $this->invoice_party_id)->first();
        if ($invoice_party) {
            $invoice_party->is_deleted = 1;
            $invoice_party->save();

            // Set the deleted_party_id session variable
            session()->put('deleted_vendorinvoice_id', $this->invoice_party_id);
            
            if ($invoice_party->is_deleted == 1) {
                session()->flash('success', 'invoice party deleted successfully');
            } else {
                session()->flash('error', 'Failed to delete invoice party');
            }
        } else {
            session()->flash('error', 'invoice party not found');
        }
        return view('livewire.vendor-invoices');
    }


    public function undoDeleteVendorInvoice()
    {
        $vendorInvoiceId = session('deleted_vendorinvoice_id');

        if ($vendorInvoiceId) {
            $vendorInvoice = VendorInvoice::find($vendorInvoiceId);

            if ($vendorInvoice) {
                $vendorInvoice->is_deleted = 0;
                $vendorInvoice->save();

                session()->forget('deleted_vendorinvoice_id'); // Remove the deleted_party_id session variable

                session()->flash('success', 'Vendor Invoice restored successfully');
            } else {
                session()->flash('error', 'Vendor Invoice not found');
            }
        } else {
            session()->flash('error', 'No Vendor Invoice ID found to restore');
        }
    }
    
}
