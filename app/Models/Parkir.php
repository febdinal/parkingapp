<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Parkir extends Model
{
    use HasFactory;

    protected $guarded  = [''];

    public $timestamps = false;

    protected $appends = ['total_harga', 'keuntungan'];

    public function kendaraan()
    {
        return $this->belongsTo(KategoriKendaraan::class, 'type_kendaraan', 'nama');
    }

    public function getTotalHargaAttribute() 
    {
        if (! $this->waktu_keluar) {
            return;
        }
        
        $waktu_masuk    = Carbon::parse($this->waktu_masuk);

        $waktu_keluar   = Carbon::parse($this->waktu_keluar);

        $durasi_parkir  = $waktu_masuk->diffInMinutes($waktu_keluar);

        $durasi_parkir = $this->getParkingDurationOnHours($durasi_parkir);

        return $this->kendaraan->harga * $durasi_parkir;
    }

    public function getKeuntunganAttribute()
    {
        return ($this->total_harga * $this->kendaraan->keuntungan) / 100;
    }

    public function getParkingDurationOnHours($parkingDurationOnMinute)
    {
        if (! ($parkingDurationOnMinute > 60)) {
            return 1;
        } 
        
        return $this->minusSixty($parkingDurationOnMinute, 0);
        
    }

    public function minusSixty($minute, $currentCount = 0)
    {
        $minute -= 60;

        $currentCount += 1;

        if ($minute > 0) {
            $this->minusSixty($minute, $currentCount);
        }

        return $currentCount;
    }
}