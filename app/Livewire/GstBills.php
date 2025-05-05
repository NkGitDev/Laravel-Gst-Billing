<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Party;
use App\Models\GstBill;
use Illuminate\Support\Facades\Auth;
use App\Traits\Highlightable;


class GstBills extends Component
{
    /* default*/ 

    use WithPagination;
    use Highlightable;  // for search text highlight

    protected $paginationTheme = 'bootstrap';
    public $searchTerm = '';
    public $perPage = 5; // Default items per page
    public $currentPage = 'gstbill';

    public function render()
    {
        $bills = GstBill::query()
            ->join('parties', 'gst_bills.party_id', '=', 'parties.id')
            ->where('gst_bills.is_deleted', 0)
            ->where('user_id', Auth::user()->id)
            ->when($this->searchTerm, function ($query) {
                $query->where('parties.full_name', 'like', '%' . $this->searchTerm . '%')
                      ->orWhere('gst_bills.invoice_number', 'like', '%' . $this->searchTerm . '%');
            })->paginate($this->perPage);

          
        return view('livewire.gstbills', [
        'bills' => $bills,
        'searchTerm' => $this->searchTerm,
        'currentPage' => $this->currentPage,
    ]);
    }


    public function updatingSearchTerm()
    {
        $this->resetPage(); // Reset pagination when the search term changes
    }
    public function updatedPerPage()
    {
        $this->resetPage(); // Reset pagination when the perPage value changes
    }

    // for delete popup modal
    public $party_id;
    public $party_name;
    public function deleteBillPopup($party_id)
    {
        $bill = GstBill::where('party_id', $party_id)->first();
        if ($bill) {
            $this->party_id = $party_id; 
            $this->party_name = $bill->party->full_name;
        }        
        $this->dispatch('popupshow');
    }

    // for soft delete gstbill
    public function deleteBill()
    {
        $bill = GstBill::where('party_id', $this->party_id)->first();
        if ($bill) {
            $bill->is_deleted = 1;
            $bill->save();
            
            // Set the deleted_party_id session variable
            session()->put('deleted_gstbill_id', $this->party_id);
            
            if ($bill->is_deleted == 1) {
                session()->flash('success', 'Bill deleted successfully');
            } else {
                session()->flash('error', 'Failed to delete bill');
            }
        } else {
            session()->flash('error', 'Bill not found');
        }
        return view('livewire.gstbills');
    }
    
       
    public function undoDeleteGstBill()
    {
        $gstBillId = session('deleted_gstbill_id');

        if ($gstBillId) {
            $gstBill = GstBill::where('party_id', $gstBillId)->first();
            //dd($gstBill);
            if ($gstBill) {
                $gstBill->is_deleted = 0;
                $gstBill->save();

                session()->forget('deleted_gstbill_id'); // Remove the deleted_party_id session variable

                session()->flash('success', 'GST Bill restored successfully');
            } else {
                session()->flash('error', 'GST Bill not found');
            }
        } else {
            session()->flash('error', 'No GST Bill ID found to restore');
        }
    }

}
