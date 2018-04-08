<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laureat extends Model
{
    protected $table = 'laureats';
    protected $fillable = ['nom','prenom','email','cne','cin','telephone','promo','filiere','nationalite','pays','ville','image'];
}
