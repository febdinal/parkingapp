<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    use HasFactory;

    protected $guarded  = [''];

    public $timestamps = false;

    protected $appends = ['total_harga'];

    public function kendaraan(){
        return $this->belongsTo(KategoriKendaraan::class, 'type_kendaraan', 'nama');
    }

    function dateIntervalToSeconds($interval)
    {
        $seconds = $interval->days*86400 + $interval->h*3600 
        + $interval->i*60 + $interval->s;
        return $interval->invert == 1 ? $seconds*(-1) : $seconds;
    }

    public function getTotalHargaAttribute() {
        if($this->waktu_keluar !== null) {
            $waktu_masuk    = new \DateTime($this->waktu_masuk);
            $waktu_keluar   = new \DateTime($this->waktu_keluar);
            $durasi_parkir  = $waktu_masuk->diff($waktu_keluar);
            // dd($durasi_parkir->format('%h'));
            // return $durasi_parkir->format('%h');
            if($this->dateIntervalToSeconds($durasi_parkir) > 1000) {
                return "1";
            } else {
                return $this->kendaraan->harga;
            }
        } else {
            return "";
        }
    }
}