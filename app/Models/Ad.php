<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $table = 'ads';

    protected $fillable = [
        'user',
        'slug',
        'title',
        'description',
        'site',
        'tel',
        'email',
        'location',
        'ad_type',
        'pro_type',
        'pri_type',
        'price',
        'images',
        'bedrooms',
        'bathrooms',
    ];

    public function user(){
        return $this->belongsTo(User::class);        
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location');
    }
    
    public function ad_type() {
        return $this->belongsTo(AdType::class);
    }
    
    public function pro_Type() {
        return $this->belongsTo(ProType::class);
    }
    
    public function pri_Type() {
        return $this->belongsTo(PriceTimeType::class);
    }
}
