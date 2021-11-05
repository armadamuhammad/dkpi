<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JasaKeuangan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'jasa_keuangans';
    protected $guarded = ['id'];
}
