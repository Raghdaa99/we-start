<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_id',
        'item_name',
        'item_price',
        'quantity',
        'sub_total_price'];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');

    }

}
