<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenugasanModel extends Model
{
    use HasFactory;
    protected $table = 'penugasan';
    protected $primaryKey = 'idPenugasan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nip',
        'idEvent',
        'status'
    ];
}
