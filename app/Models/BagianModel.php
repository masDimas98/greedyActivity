<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BagianModel extends Model
{
    use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'bagian';
    protected $primaryKey = 'idBagian';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'namaBagian',
        'ketarangan',
    ];

    public function scopeSearch($query, $value)
    {
        $query->where('namaBagian', 'like', "%{$value}%")
            ->orWhere('keterangan', 'like', "%{$value}%");
    }
}
