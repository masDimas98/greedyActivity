<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SertifikatModel extends Model
{
    use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'sertifikat';
    protected $primaryKey = 'idSertifikat';
    protected $casts = ['tanggalKeluaran' => 'date:Y-m-d'];
    protected $appends = ['date_for_editing'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'namaSertifikat',
        'tanggalKeluaran',
        'lamaSertifikat',
        'levelSertifikat',
    ];

    public function scopeSearch($query, $value)
    {
        $query->where('namaSertifikat', 'like', "%{$value}%")
            ->orWhere('lamaSertifikat', 'like', "%{$value}%")
            ->orWhere('levelSertifikat', 'like', "%{$value}%");
    }

    public function getDateForHumansAttribute()
    {
        return $this->tanggalKeluaran->format('M, d Y');
    }

    public function getDateForEditingAttribute()
    {
        return (!$this->tanggalKeluaran) ? date('m/d/Y') : $this->tanggalKeluaran->format('m/d/Y');
    }

    public function setDateForEditingAttribute($value)
    {
        $this->tanggalKeluaran = Carbon::parse($value)->toDateString('Y-m-d');
    }
}
