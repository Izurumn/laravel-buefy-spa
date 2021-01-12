<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
  protected $table='shopbyserver';
  protected $fillable = ['title', 'description', 'price', 'command', 'servers_id'];
}
