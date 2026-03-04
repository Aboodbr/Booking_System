<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Booking
 * @package App\Models
 *
 * @property int $id
 * @property int $hotel_id
 * @property int $room_id
 * @property int $user_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property \Illuminate\Support\Carbon $check_in
 * @property \Illuminate\Support\Carbon $check_out
 * @property int $duration_days
 * @property float $price
 * @property string $status
 * @property string|null $payment_method
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Hotel $hotel
 * @property-read \App\Models\Room $room
 * @property-read \App\Models\User $user
 */
class Booking extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bookings';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
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
        'payment_method',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'check_in' => 'datetime',
            'check_out' => 'datetime',
            'price' => 'decimal:2',
            'duration_days' => 'integer',
        ];
    }

    /**
     * Get the hotel that owns the booking.
     * @return BelongsTo
     */
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    /**
     * Get the room that owns the booking.
     * @return BelongsTo
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Get the user that owns the booking.
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}