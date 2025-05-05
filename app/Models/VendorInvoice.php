<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorInvoice extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural form of the model name
    protected $table = 'vendor_invoices';

    // Specify the fillable fields
    protected $fillable = [
        'party_id',
        'account_holder_name',
        'account_number',
        'bank_name',
        'ifsc_code',
        'branch_name',
        'item_description',
        'total_amount',
        'declaration',
        'invoice_date',
        'invoice_number',
        'is_deleted',
        'created_at',
    ];

    // Define any relationships if necessary
    public function party()
    {
        return $this->belongsTo(Party::class);
    }
}
