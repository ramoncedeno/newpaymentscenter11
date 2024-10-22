<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Frequency extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

     // Defines attributes that can be mass assigned.
     protected $fillable = [

        'frecuency_temporality_name',
        'frecuency_day',
        'frecuency_alert_n1',
        'frecuency_alert_n2',
        'frecuency_alert_n3',
        'frecuency_alert_n4',


     ];



     //Hide attributes when the model is converted to an array or JSON.
     protected $hidden = [



     ];

     //Converts attributes to a specific data type.
     protected $casts = [


     ];

}
