<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    public function categories() {
        return $this->belongsTo('App\Models\Category');
    }
}
