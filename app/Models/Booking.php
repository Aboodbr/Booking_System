<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bookings'; // Explicitly define the table name if it's not 'bookings'

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hotel_id',
        'room_id',
        'user_id',
        'name',
        'email',
        'phone',
        'check_in',
        'check_out',
        'duration_days',
        'price',
        'status',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true; // Set to false if your table lacks created_at and updated_at columns

    /**
     * Get the hotel that owns the booking.
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    /**
     * Get the room that owns the booking.
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Get the user that owns the booking.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}