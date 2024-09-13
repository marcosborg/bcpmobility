<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class VehicleDocument extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'vehicle_documents';

    protected $appends = [
        'documents',
    ];

    protected $dates = [
        'carta_verde',
        'condicoes_particulares',
        'dua',
        'dav',
        'tvde_license',
        'inspecao_tecnica_periodica',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'car_item_id',
        'carta_verde',
        'condicoes_particulares',
        'dua',
        'dav',
        'tvde_license',
        'inspecao_tecnica_periodica',
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

    public function car_item()
    {
        return $this->belongsTo(CarItem::class, 'car_item_id');
    }

    public function getDocumentsAttribute()
    {
        return $this->getMedia('documents');
    }

    public function getCartaVerdeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCartaVerdeAttribute($value)
    {
        $this->attributes['carta_verde'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCondicoesParticularesAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCondicoesParticularesAttribute($value)
    {
        $this->attributes['condicoes_particulares'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDuaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDuaAttribute($value)
    {
        $this->attributes['dua'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDavAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDavAttribute($value)
    {
        $this->attributes['dav'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTvdeLicenseAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTvdeLicenseAttribute($value)
    {
        $this->attributes['tvde_license'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getInspecaoTecnicaPeriodicaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInspecaoTecnicaPeriodicaAttribute($value)
    {
        $this->attributes['inspecao_tecnica_periodica'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}