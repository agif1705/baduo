<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'office_name',
        'jadwal_longitude',
        'jadwal_latitude',
        'jadwal_start_time',
        'jadwal_end_time',
        'start_latitude',
        'start_longitude',
        'end_latitude',
        'end_longitude',
        'start_time',
        'end_time',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function isLate()
    {

        $jadwal_start_time = Carbon::parse($this->jadwal_start_time);
        $start_time = Carbon::parse($this->start_time);
        return $start_time->greaterThan($jadwal_start_time);
        return $start_time . ' - ' . $jadwal_start_time;
    }
    public function durasiKerja()
    {
        $start_time = Carbon::parse($this->start_time);
        $end_time = Carbon::parse($this->end_time);
        return $end_time->diffInRealHours($start_time);
    }
    public function overTime()
    {
        $start_time = Carbon::parse($this->start_time);
        $end_time = Carbon::parse($this->end_time);
        $over_time = $end_time->diffInRealHours($start_time) - 8;
        if ($over_time > 0) {
            return $over_time;
        }
        // return $end_time->diffInRealHours($start_time);
    }
}
