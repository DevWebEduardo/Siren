<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdType extends Model
{
    use HasFactory;

    protected $table = "ad_types";

    public function ad()
    {
        return $this->belongsToMany(Ad::class);
    }
}
