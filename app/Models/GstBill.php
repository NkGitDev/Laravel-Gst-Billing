<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GstBill extends Model
{
    // Table name
    protected $table = "gst_bills";

    // Primary key
    protected $primaryKey = "id";

    // Fillable columns
    protected $fillable = array('party_id', 'invoice_date', 'invoice_number', 'item_description', 'total_amount',
    'cgst_rate', 'cgst_amount', 'sgst_rate', 'sgst_amount', 'igst_rate', 'igst_amount', 'tax_amount', 'net_amount', 'declaration', 'is_deleted'
    );

    public function party()
    {
        return $this->belongsTo(Party::class, 'party_id');
    }
}
