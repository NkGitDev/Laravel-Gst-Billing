<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  // For Query Builder
use App\Models\Party;
use App\Models\VendorInvoice;


class VendorInvoiceController extends Controller
{
    public function index()
    {
        // Fetch all invoices
        $invoices = VendorInvoice::all();
        return view('vendor-invoice/show', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendor-invoice/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request
        $request->validate([
            'full_name' => 'required|string',
            'mobile_number' => 'required|string',
            'address' => 'required|string|max:250',
            'account_holder_name' => 'required|string|min:2|max:30',
            'account_number' => 'required|numeric|digits_between:8,20',
            'bank_name' => 'required|string|min:2|max:30',
            'ifsc_code' => 'required|string|min:5|max:30',
            'branch_name' => 'required|string|min:2|max:50',
            'item_description' => 'required|string',
            'total_amount' => 'required|numeric',
            'declaration' => 'nullable|string', 
            'invoice_date' => 'required|date', 
            'invoice_number' => 'required|numeric'

        ]);

        // check for existing client (vendor)
        $party = DB::table('parties')
        ->where('party_type', 'vendor')
        ->where(['full_name' => $request->full_name, 'mobile_number' => $request->mobile_number])
        ->first();

        if(!empty($party))
        {
            $party_id = $party->id;
        }
        else
        {
            // Create New Party
            $param = array(
                'user_id' => auth()->id(),
                'party_type' => 'vendor',
                'full_name' => $request->full_name,
                'mobile_number' => $request->mobile_number,
                'address' => $request->address,
                'account_holder_name' => $request->account_holder_name,
                'account_number' => $request->account_number,
                'bank_name' => $request->bank_name,
                'ifsc_code' => $request->ifsc_code,
                'branch_name' => $request->branch_name
            );
            $party_id = DB::table('parties')->insertGetId($param);
        }

            // Create Vendor invoice
            $param = array(
                'party_id' => $party_id,
                'account_holder_name' => $request->account_holder_name,
                'account_number' => $request->account_number,
                'bank_name' => $request->bank_name,
                'ifsc_code' => $request->ifsc_code,
                'branch_name' => $request->branch_name,
                'item_description' => $request->item_description,
                'total_amount' => $request->total_amount,
                'declaration' => $request->declaration,
                'invoice_date' => $request->invoice_date,
                'invoice_number' => $request->invoice_number,
                'created_at' => date('Y-m-d H:i:s')
            );
        $invoice_id = DB::table('vendor_invoices')->insertGetId($param);

        if($invoice_id)
        {
            return redirect()->route('vendor-invoice.show', ['vendor_invoice' => $invoice_id]);
        }
        else
        {
            return redirect()->back()->withError('Something went wrong, Please try again...!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Attempt to fetch the invoice using the VendorInvoice model
        $invoice = VendorInvoice::find($id); // Use find instead of first

        // Check if the invoice was found
        if (!$invoice) {
            \Log::error("Invoice not found for ID: " . $id);
            return redirect()->back()->withErrors(['message' => 'Invoice not found.']);
        }

        return view('vendor-invoice/print', compact('invoice', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
