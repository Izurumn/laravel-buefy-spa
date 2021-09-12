<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finish extends Model
{
  protected $table='finishes';
  protected $fillable = ['access_token', 'refresh_token'];
}
