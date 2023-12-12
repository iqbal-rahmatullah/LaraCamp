<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Checkout extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['camp_id', 'user_id', 'card_number', 'expired_date', 'cvv', 'is_paid'];

    public function setExpiredDateAttribute($value)
    {
        $this->attributes['expired_date'] =  Carbon::parse($value);;
    }

    /**
     * Get the user that owns the Checkout
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Camp()
    {
        return $this->belongsTo(Camp::class, 'camp_id', 'id');
    }
}
