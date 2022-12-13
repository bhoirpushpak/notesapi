<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Note extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'notes';

    

}
