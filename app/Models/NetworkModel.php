<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NetworkModel extends Model
{
    use HasFactory;

    protected $table = 'networks'; // Specify the correct table name
    protected $fillable = ['referral_code', 'user_id', 'parent_user_id'];
}