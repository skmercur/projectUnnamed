<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class groups extends Model
{
  protected $fillable = ['name','groupid','admin','members','pmembers','type','chat','key',];
}
