<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'event';
    protected $primaryKey = 'idEvent';

    protected $casts = [
        'tanggalMulai' => 'date:Y-m-d',
        'tanggalSelesai' => 'date:Y-m-d'
    ];
    protected $appends = [
        'tgl_mulai_for_editing',
        'tgl_selesai_for_editing',
        'tgl_mulai_for_activity',
        'tgl_selesai_for_activity',
    ];

    const STATUSES = [
        'open' => 'Open',
        'ready' => 'Ready',
        'process' => 'Processing',
        'finish' => 'Finished',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'namaEvent',
        'jumlahOrang',
        'tanggalMulai',
        'tanggalSelesai',
        'status'
    ];

    function scopeSearch($query, $value)
    {
        $query->where('namaEvent', 'like', "%{$value}%")
            ->orWhere('jumlahOrang', 'like', "%{$value}%")
            ->orWhere('status', 'like', "%{$value}%");
    }

    public function getTglMulaiForHumansAttribute()
    {
        return $this->tanggalMulai->format('M, d Y');
    }

    public function getTglSelesaiForHumansAttribute()
    {
        return $this->tanggalSelesai->format('M, d Y');
    }

    public function getTglMulaiForEditingAttribute()
    {
        return (!$this->tanggalMulai) ? date('m/d/Y') : $this->tanggalMulai->format('m/d/Y');
    }

    public function getTglSelesaiForEditingAttribute()
    {
        return (!$this->tanggalSelesai) ? date('m/d/Y') : $this->tanggalSelesai->format('m/d/Y');
    }

    public function setTglMulaiForEditingAttribute($value)
    {
        $this->tanggalMulai = Carbon::parse($value)->toDateString('Y-m-d');
    }

    public function setTglSelesaiForEditingAttribute($value)
    {
        $this->tanggalSelesai = Carbon::parse($value)->toDateString('Y-m-d');
    }

    public function getTglMulaiForActivityAttribute()
    {
        return strtotime((!$this->tanggalMulai) ? '' : $this->tanggalMulai->format('Y-m-d'));
    }

    public function getTglSelesaiForActivityAttribute()
    {
        return strtotime((!$this->tanggalSelesai) ? '' : $this->tanggalSelesai->format('Y-m-d'));
    }
}
