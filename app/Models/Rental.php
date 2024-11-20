<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rental extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'rentals';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'weekly_rental',
        'extra_km',
        'driver_id',
        'week_id',
        'rental_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const RENTAL_TYPE_RADIO = [
        'Viatura própria'     => 'Viatura própria',
        'Locação operacional' => 'Locação operacional (renting)',
        'Locação financeira'  => 'Locação financeira (leasing)',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function week()
    {
        return $this->belongsTo(Week::class, 'week_id');
    }
}
