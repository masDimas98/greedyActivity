<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'pegawai';
    protected $primaryKey = 'nip';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'tanggalLahir' => 'date:Y-m-d'
    ];

    protected $appends = [
        'tgl_lahir_for_editing',
    ];

    const AGAMAS = [
        'islam' => 'Islam',
        'kristen' => 'Kristen',
        'katolik' => 'Katolik',
        'hindu' => 'Hindu',
        'buddha' => 'Buddha',
        'khonghucu' => 'Khonghucu'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nip',
        'ktp',
        'foto',
        'namaPegawai',
        'namaPanggilan',
        'bagian',
        'posisiSekarang',
        'tempatLahir',
        'tanggalLahir',
        'agamaKepercayaan',
    ];

    function scopeSearch($query, $value)
    {
        $query->where('NIP', 'like', "%{$value}%")
            ->orWhere('ktp', 'like', "%{$value}%")
            ->orWhere('namaPegawai', 'like', "%{$value}%")
            ->orWhere('namaPanggilan', 'like', "%{$value}%")
            ->orWhere('bagian', 'like', "%{$value}%")
            ->orWhere('posisiSekarang', 'like', "%{$value}%")
            ->orWhere('tempatLahir', 'like', "%{$value}%")
            ->orWhere('agamaKepercayaan', 'like', "%{$value}%");
    }

    public function getTglLahirForHumansAttribute()
    {
        return $this->tanggalLahir->format('M, d Y');
    }

    public function getTglLahirForEditingAttribute()
    {
        return (!$this->tanggalLahir) ? date('m/d/Y') : $this->tanggalLahir->format('m/d/Y');
    }

    public function setTglLahirForEditingAttribute($value)
    {
        $this->tanggalLahir = Carbon::parse($value)->toDateString('Y-m-d');
    }
}
