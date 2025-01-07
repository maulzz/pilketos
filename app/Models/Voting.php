<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voting extends Model
{
    protected $table = 'voting';

    use HasFactory;

    protected $fillable = ['kandidat_id', 'user_id'];
}
