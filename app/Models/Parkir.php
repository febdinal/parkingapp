<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    use HasFactory;

    protected $guarded  = [''];

    public $timestamps = false;

    public function kendaraan(){
        return $this->belongsTo(KategoriKendaraan::class);
    }
}
 