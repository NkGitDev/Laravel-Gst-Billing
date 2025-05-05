<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    // Table name
    protected $table = "parties";

    // Primary key
    protected $primaryKey = "id";

    // Fillable columns Option - 1
    //protected $fillable = array("full_name"); // not mendetory to pass all fields with 'Insert Option -1'

    // Fillable columns Option - 2 
    protected $fillable = array('user_id', 'party_type', 'full_name', 'mobile_number', 'address', 'account_holder_name', 'account_number', 'bank_name', 'ifsc_code', 'zip_code', 'state', 'branch_name');   // mendatory to pass all the fields with 'Insert Option -2'

    protected $casts = [
        'user_id' => 'integer',
    ];

    public function gstBills()
    {
        return $this->hasMany(GstBills::class, 'party_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
