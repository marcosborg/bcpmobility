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

class VehicleExpense extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    protected $appends = [
        'files',
    ];

    public $table = 'vehicle_expenses';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'car_item_id',
        'expense_type',
        'date',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const EXPENSE_TYPE_RADIO = [
        'Seguro'                                               => 'Seguro',
        'Valor de entrada Inicial (pago à empresa financeira)' => 'Valor de entrada Inicial (pago à empresa financeira)',
        'Valor renda mensal'                                   => 'Valor renda mensal',
        'Pneus'                                                => 'Pneus',
        'Manutenção Preventiva'                                => 'Manutenção Preventiva',
        'Manutenção Corretiva'                                 => 'Manutenção Corretiva',
        'Reparação Sinistros'                                  => 'Reparação Sinistros',
        'Recondicionamento'                                    => 'Recondicionamento',
        'IUC'                                                  => 'IUC',
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

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFilesAttribute()
    {
        return $this->getMedia('files');
    }
}
