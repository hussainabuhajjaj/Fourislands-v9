<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $table = 'quote_requests';

    protected $fillable = [
        'company_name', 'contact_person', 'email', 'phone',
        'service_id', 'product_id', 'message', 'status'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeFilter($q, $search)
    {
        return $q->where('contact_person', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->orWhere('company_name', 'like', '%' . $search . '%');
    }
}
