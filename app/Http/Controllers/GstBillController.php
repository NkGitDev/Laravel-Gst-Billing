<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\GstBill;

class GstBillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // function to load add gst bill view
    public function addGstBill()
    {
        $data['parties'] = Party::where('party_type', 'client')
                                    ->where('is_deleted', 0)
                                    ->orderBy('full_name')->get();
        return view('gst-bill.add', $data);
    }

    // function to load manage gst bill view
    public function manageGstBills()
    {
        $bills = GstBill::where('is_deleted', 0)->with('party')->get();
        return view('gst-bill.manage', compact('bills'));
    }

    // function to create gst bill
    public function createGstBill(Request $request)
    {
        // Validation
        $request->validate([
            'party_id' => 'required|exists:parties,id',
            'invoice_date' => 'required|date',
            'invoice_number' => 'required|string|max:150',
            'item_description' => 'required|string|max:250',
            'total_amount' => 'required|numeric',
            'cgst_rate' => 'nullable|digits_between:0,100',
            'cgst_amount' => 'numeric|min:0',
            'sgst_rate' => 'nullable|digits_between:0,100',
            'sgst_amount' => 'numeric|min:0',
            'igst_rate' => 'nullable|digits_between:0,100',
            'igst_amount' => 'numeric|min:0',
            'tax_amount' => 'numeric|min:0',
            'net_amount' => 'required|numeric|min:0'
        ]);

        $param = $request->all();
        unset($param['_token']);
        GstBill::create($param);
        
        return redirect()->route('manage-gst-bills')->withStatus('Bill created successfully');
    }

    
    public $party_id;
    // function to load print gst bill view
    public function printGstBill($party_id)
    {

        $bills = GstBill::where('party_id', $party_id)->where('is_deleted', 0)->with('party')->get();
        return view('gst-bill.print', compact('bills'));

    }
}


