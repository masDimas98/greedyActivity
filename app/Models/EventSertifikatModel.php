<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventSertifikatModel extends Model
{
    use HasFactory;

    protected $table = 'event_sertifikat';
    protected $primaryKey = 'idEventSertifikat';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idEvent',
        'idSertifikat'
    ];

    /**
     * Get the Pegawai associated with the Sertifikasi.
     */
    public function pegawaiRelation(): HasMany
    {
        return $this->hasMany(EventModel::class, 'idEvent');
    }

    /**
     * Get the Sertifikat associated with the Sertifikasi.
     */
    public function sertifikatRelation(): HasMany
    {
        return $this->hasMany(SertifikatModel::class, 'idSertifikat');
    }
}
