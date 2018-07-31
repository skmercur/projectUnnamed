<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fileupload extends Model
{
  public $table = 'files';
  protected $fillable = [
      'filename','author','title', 'description', 'location','downloads','size',
  ];
}
