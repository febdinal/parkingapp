<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKendaraan extends Model
{
    use HasFactory;
    
    protected $guarded  = [''];

    public function Parkir(){
        return $this->hasMany(Parkir::class);
    }
}
