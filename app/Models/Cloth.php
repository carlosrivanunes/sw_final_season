<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cloth extends Model
{
    use HasFactory;

    protected $table = 'clothes'; // <--- Adicione esta linha

    protected $fillable = [
        'brand', 'type', 'size', 'color', 'price', 'quantity', 'image'
    ];
}