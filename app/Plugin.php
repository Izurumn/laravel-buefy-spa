<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plugin extends Model
{
  protected $table='plugins';
  protected $fillable = ['command', 'servers_id'];
}
