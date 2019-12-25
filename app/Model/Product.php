<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Timestamps can be nullable
    public $timestamps = true;

    // Mass assignment protection (Only the fields defined here can be modified by the user)
    protected $fillable = ['name', 'description', 'price'];
}
