<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $table='items';
  protected $fillable = ['name', 'price', 'desc', 'sale', 'servers_id', 'categories_id', 'command', 'url'];
}
