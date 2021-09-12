<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
  ///  protected $fillable = ['id', 'anime_id'];
  protected $table='servers';
  protected $fillable = ['name', 'key', 'url'];
  protected $hidden = ["key"];
}
