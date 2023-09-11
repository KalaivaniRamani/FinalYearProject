<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\House;

class Image extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'house_id',
    ];

    public function houses(){
        return $this->belongsTo(House::class);
    }
}
