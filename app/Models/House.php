<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class House extends Model
{
    use HasFactory;

    protected $fillable=[
        'owner_name',
        'owner_id',
        'owner_status',
        'distance',
        'rental_price',
        'house_type',
        'location',
        'house_picture'
    ];

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function owner(){
        return $this->belongsTo(Ownerauth::class);
    }

}