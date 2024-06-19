<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SertifikasiModel extends Model
{
    use HasFactory;
    protected $table = 'sertifikasi';
    protected $primaryKey = 'idSertifikasi';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nip',
        'idSertifikat'
    ];

    /**
     * Get the Pegawai associated with the Sertifikasi.
     */
    public function pegawaiRelation(): HasMany
    {
        return $this->hasMany(PegawaiModel::class, 'nip');
    }

    /**
     * Get the Sertifikat associated with the Sertifikasi.
     */
    public function sertifikatRelation(): HasMany
    {
        return $this->hasMany(SertifikatModel::class, 'idSertifikat');
    }
}
