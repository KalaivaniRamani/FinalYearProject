<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Booking extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = 'bookings';
    protected $fillable = [
        'user_id',
        'house_id',
        'email',
        'booking_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function house()
    {
        return $this->belongsTo(House::class,'house_id', 'id');
    }

    // protected $fillable=[
    //     'owner_id',
    //     'owner_name',
    //     'name',
    //     'email',
    //     'location',
    //     'booking_date'
    // ];

    // public function owner(){
    //     return $this->belongsTo(Ownerauth::class);
    // }

    // public function student(){
    //     return $this->belongsTo(User::class);
    // }

    // public function house(){
    //     return $this->belongsTo(House::class);
    // }
    
}
