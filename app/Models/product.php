<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'color_code',
        'fabric_id',
        'color_hex',
        'capacity',
        'price',
    ];
    public function fabric(){
        return $this->belongsTo(Fabric::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
