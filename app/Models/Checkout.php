<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkout extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['camp_id', 'user_id', 'card_number', 'expired_date', 'cvv', 'is_paid'];
}
