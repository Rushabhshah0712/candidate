<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Maatwebsite\Excel\Concerns\ToModel;

class candidate extends Model
{
    use SoftDeletes;

    protected $table = 'candidates';

    protected $fillable = array('full_name', 'email', 'contect_number','gender','address','city','higher_aducation');

}
