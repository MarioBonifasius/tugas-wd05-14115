<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function PHPSTORM_META\map;

class Detail_periksa extends Model
{
    protected $table = 'detail_periksas';
    protected $fillable = [
        'id_periksa',
        'id_obat',
    ];

    public function id_periksa(){
        return $this->belongsTo(Periksa::class, 'id_periksa');
    }
    public function id_obat(){
        return $this->belongsTo(Obat::class, 'id_periksa');
    }
    
}
