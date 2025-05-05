<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Party;
use Illuminate\Support\Facades\Auth;
use App\Traits\Highlightable;


class Parties extends Component
{    
    use WithPagination;
    use Highlightable;  // for search text highlight

    protected $paginationTheme = 'bootstrap';
    public $searchTerm = '';
    public $serialNumber;
    public $perPage = 5;
    public $currentPage = 'party';

    public function render()
    {
        $parties = Party::query()
                ->where('user_id', Auth::user()->id)
                ->where('parties.is_deleted', 0)
                ->when($this->searchTerm, function ($query) {
                    $query->where(function ($query) {
                        $query->where('full_name', 'like', '%' . $this->searchTerm . '%')
                            ->orWhere('mobile_number', 'like', '%' . $this->searchTerm . '%')
                            ->orWhere('address', 'like', '%' . $this->searchTerm . '%');
                    });
                })->paginate($this->perPage);

        return view('livewire.parties', [
        'parties' => $parties,
        'serialNumber' => $this->serialNumber,
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
    public $id;
    public $party_name;
    public function deletePartyPopup($id)
    {
        $party = Party::where('id', $id)->first();
        if ($party) {
            $this->id = $id;
            $this->party_name = $party->full_name;
        } 
        $this->dispatch('partypopupshow');
    }

    // for soft delete Party
    public function deleteParty()
    {
        $party = Party::where('id', $this->id)->first();

        if ($party) {
            $party->is_deleted = 1;
            $party->save();
            
            // Set the deleted_party_id session variable
            session()->put('deleted_party_id', $this->id);
            
            if ($party->is_deleted == 1) {
                session()->flash('success', 'Party deleted successfully');
            } else {
                session()->flash('error', 'Failed to delete party');
            }
        } else {
            session()->flash('error', 'Party not found');
        }
        return view('livewire.parties');
    }
    

    public function undoDeleteParty()
    {
        $deletedPartyId = session('deleted_party_id'); // Retrieve the deleted party ID from the session
        if ($deletedPartyId) {
            $party = Party::find($deletedPartyId); // Find the party by ID

            if ($party) {
                $party->is_deleted = 0; // Restore the party by setting is_deleted to 0
                $party->save(); // Save the changes

                session()->forget('deleted_party_id'); // Remove the deleted_party_id session variable

                session()->flash('success', 'Party restored successfully');
            } else {
                session()->flash('error', 'Party not found');
            }
        } else {
            session()->flash('error', 'No party ID found to restore');
        }
    }
   
}
