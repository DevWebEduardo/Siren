<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProType extends Model
{
    use HasFactory;

    protected $table = "pro_types";

    public function ad()
    {
        return $this->belongsToMany(Ad::class);
    }
}
