<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = "portofolio";
    protected $primaryKey = "id_portofolio";
    public $timestamps = false;
}
