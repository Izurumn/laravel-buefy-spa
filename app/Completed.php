<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Completed extends Model
{
  protected $table='completes';
  protected $fillable = ['mc_username', 'utas', 'email', 'shopbyserver_id', 'price', 'command', 'created_at'];
}
