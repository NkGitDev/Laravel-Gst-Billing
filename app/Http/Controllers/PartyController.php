<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Party;
use Illuminate\Support\Facades\DB;

class PartyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    // function to load parties
    public function manageParties(Request $request)
    {       
        // Get all parties data with specific column and apply search if provided
        $parties = Party::where('user_id', auth()->user()->id)
        ->with('user')
        ->select(
            'id',
            'user_id',
            'party_type',
            'full_name',
            'mobile_number',
            'address',
            'account_holder_name',
            'account_number',
            'bank_name',
            'ifsc_code',
            'zip_code',
            'state',
            'branch_name',
            'is_deleted',
            'created_at'
        );


        return view('party/manage');

    }

    // function to load add party view
    public function addParty()
    {
        return view('party/add');
    }

    // function to create/store party in database
    public function createParty(Request $request)
    {
        // Validations
        $request->validate([
            'party_type' => 'required',
            'full_name' => 'required|string|min:2|max:30',
            'mobile_number' => 'required|numeric|digits:10',
            'address' => 'required|max:250',
            
            'account_holder_name' => 'required|string|min:2|max:30',
            'account_number' => 'required|numeric|digits_between:8,20',
            'bank_name' => 'required|string|min:2|max:30',
            'ifsc_code' => 'required|min:5|max:30',
            'zip_code' => 'required|numeric|digits_between:4,10',
            'state' => 'required|string|min:2|max:30',
            'branch_name' => 'required|string|min:2|max:50',
            
        ]);
        
        // Create a new party for the authenticated user
        Party::create(array_merge($request->all(), ['user_id' => auth()->user()->id]));
        
        // Redirect after inserting party data - with status
        return redirect()->route('add-party')->withStatus('Party created successfully');

        // Redirect after inserting party data - without status (key, value pair)
        //return redirect()->route('add-party')->with('success', 'Party created successfully');
    }


    // function to load edit party view
    public function editParty($party_id)
    {
        
        $party = Party::where('id', $party_id)->where('user_id', auth()->id())->firstOrFail(); // Ensure the party belongs to the authenticated user
        return view('party/edit', compact('party'));

    }

    // function to update party data
    public function updateParty($id, Request $request)
    {
        // Validations
        $request->validate([
            'party_type' => 'required',
            'full_name' => 'required|string|min:2|max:30',
            'mobile_number' => 'required|numeric|digits:10',
            'address' => 'required|max:250',
            
            'account_holder_name' => 'required|string|min:2|max:30',
            'account_number' => 'required|numeric|digits_between:8,20',
            'bank_name' => 'required|string|min:2|max:30',
            'ifsc_code' => 'required|min:5|max:30',
            'zip_code' => 'required|numeric|digits_between:4,10',
            'state' => 'required|string|min:2|max:30',
            'branch_name' => 'required|string|min:2|max:50',
            
        ]);

        // Update party record in the database
        $party = Party::where('id', $id)->where('user_id', auth()->id())->firstOrFail(); // Ensure the party belongs to the authenticated user

        // Update the party with the validated data
        $party->update($request->all());
        return redirect()->route('manage-parties')->withStatus('Party updated successfully');
        
    }
    
}
