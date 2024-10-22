<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Employee extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

     // Defines attributes that can be mass assigned.
     protected $fillable = [

        'employee_name',
        'employee_role_id',
        'employee_number',
        'employee_sunnel_js_user',
        'employee_sunnel_arca_user',
        'employee_status_employee_id',
        'employee_category_id',

     ];



     //Hide attributes when the model is converted to an array or JSON.
     protected $hidden = [




     ];

     //Converts attributes to a specific data type.
     protected $casts = [

        'employee_name'=>'encrypted',
        'employee_role_id'=>'encrypted',
        'employee_number'=>'encrypted',



     ];

}
