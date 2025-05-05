<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Party;
use App\Models\GstBill;

class HomeController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth');
        // Apply middleware to specific methods
        $this->middleware('auth')->except('index');
    }
    */
    

    public function index()
    {
        // Ensure the user is authenticated
        $user = Auth::user(); // Get the authenticated user

        if ($user) {
            // Fetch counts only for the authenticated user
            $totalClients = Party::where('user_id', $user->id)
                ->where('party_type', 'client')
                ->where('is_deleted', 0)
                ->count();

            $totalVendors = Party::where('user_id', $user->id)
                ->where('party_type', 'vendor')
                ->where('is_deleted', 0)
                ->count();

            $totalEmployees = Party::where('user_id', $user->id)
                ->where('party_type', 'employee')
                ->where('is_deleted', 0)
                ->count();

             // Get the IDs of the parties associated with the authenticated user
            $partyIds = Party::where('user_id', $user->id)
                ->pluck('id'); // Get the IDs of the parties

            // Count the GST bills associated with those party IDs
            $totalGstBills = GstBill::whereIn('party_id', $partyIds)
                ->where('is_deleted', 0)
                ->count();
            } else {
                // Default values when no user is logged in
                $totalClients = 0;
                $totalVendors = 0;
                $totalEmployees = 0;
                $totalGstBills = 0;
            }

        return view('dashboard', compact('user', 'totalClients', 'totalVendors', 'totalEmployees', 'totalGstBills'));
                
    
    }

}
