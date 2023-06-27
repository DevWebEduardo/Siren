<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceTimeType extends Model
{
    use HasFactory;

    protected $table = "pri_types";

    public function ad()
    {
        return $this->belongsToMany(Ad::class);
    }
}
