<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Korisnik extends Model
{
    use HasFactory;
    protected $table='korisniks';
   // protected $primaryKey = 'korisnik_id';
    //public $timestamps=false;
}
