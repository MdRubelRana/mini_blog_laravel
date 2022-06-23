<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $at_guarded = ['created_at', 'updated_at', 'deleted_at'];
    // use HasFactory;
}
