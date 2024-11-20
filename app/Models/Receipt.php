<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Receipt extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'receipts';

    protected $appends = [
        'file',
    ];

    public const COMPANY_RADIO = [
        'OC'  => 'OC',
        'TGA' => 'TGA',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const IVA_RADIO = [
        'Sem IVA' => 'Sem IVA',
        'IVA 6%'  => 'IVA 6%',
        'IVA 23%' => 'IVA 23%',
    ];

    public const RETENTION_RADIO = [
        '11.50%' => '11.50%',
        '16.50%' => '16.50%',
        '20%'    => '20%',
        '25%'    => '25%',
    ];

    protected $fillable = [
        'value',
        'paid',
        'balance',
        'verified',
        'verified_value',
        'amount_transferred',
        'company',
        'iva',
        'retention',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getFileAttribute()
    {
        return $this->getMedia('file')->last();
    }
}
