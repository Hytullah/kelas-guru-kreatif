<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawab extends Model
{
    use HasFactory;

    protected $table = "jawab";
    protected $primaryKey = "id";
    protected $guarded = [
        'id'
    ];
}
