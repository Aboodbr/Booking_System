<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Room
 * @package App\Models
 *
 * @property int $id
 * @property int $hotel_id
 * @property string $name
 * @property string $img
 * @property string $num_person
 * @property string $size
 * @property string $view
 * @property string $num_bed
 * @property string $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Hotel $hotel
 */
class Room extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'hotel_id',
        'name',
        'img',
        'num_person',
        'size',
        'view',
        'num_bed',
        'price',
    ];

    /**
     * @return BelongsTo
     */
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }
}
