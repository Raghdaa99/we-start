<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['user_name',
        'user_email',
        'user_mobile',
        'invoice_number'];

    public function invoice_details()
    {
        return $this->hasMany(InvoiceDetails::class, 'invoice_id', 'id');
    }

}
