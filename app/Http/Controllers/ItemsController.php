<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use DB;
use Image;
class ItemsController extends Controller
{
  public function item_id($id) {

    $item = DB::table('items')
    ->join('servers', 'items.servers_id', 'servers.id')
    ->where('items.id', '=', $id)
    ->get(['items.id', 'items.name', 'items.price', 'items.url', 'servers.name as servername'])
    ->first();
    return response()->json(['item' => $item]);
  }
  public function shop_category() {
    $item = DB::table('categories')
    ->get()
    ->toArray();
    return response()->json(['items' => $item]);
  }
  public function shop_servers() {
    $item = DB::table('servers')
    ->get(['servers.id', 'servers.name', 'servers.url', 'servers.make'])
    ->toArray();
    return response()->json(['items' => $item]);
  }
  public function index($id) {
    $item = DB::table('items')
    ->where('items.categories_id', '=', $id)
    ->get()
    ->toArray();
    return response()->json(['items' => $item]);
  }
  public function admin_index(Request $request) {
    $id = $request->input('id');
    $c_id = $request->input('c_id');
    $item = DB::table('items')
    ->join('servers', 'items.servers_id', 'servers.id')
    ->join('categories', 'items.categories_id', 'categories.id')
    ->where('servers.id', 'like', "%".$id."%")
    ->where('categories.id', 'like', "%".$c_id."%")
    ->get(['items.id', 'items.name', 'items.price', 'items.sale', 'items.desc', 'items.categories_id', 'items.command', 'items.servers_id', 'servers.name as serversname', 'categories.name as categoryname'])
    ->toArray();
    return response()->json(['items' => $item]);
  }
  public function categories($id) {
    $item = DB::table('categories')
    ->join('servers', 'categories.servers_id', 'servers.id')
    ->where('servers.id', '=', $id)
    ->get(['categories.id', 'categories.name'])
    ->toArray();
    return response()->json(['categories' => $categories]);
  }
  public function create(Request $request) {
    if($request->file('image')) {
      $image = $request->file('image');
      $extension = $image->getClientOriginalExtension();
      $timestampName = microtime(true) . '.' . $extension;
      $url = public_path('images/');
      $url2 = '/images/';

      $image = Image::make($image);
      $image->save($url . $timestampName . $image);

      $timestampName = $url2 . $timestampName;
      Item::create([
          'name' => $request['name'],
          'price' => $request['price'],
          'sale' => $request['sale'],
          'desc' => $request['desc'],
          'servers_id' => $request['servers_id'],
          'categories_id' => $request['categories_id'],
          'command' => $request['command'],
          'url' => $timestampName
      ]);
    }
    else {
      Item::create([
        'name' => $request['name'],
        'price' => $request['price'],
        'sale' => $request['sale'],
        'desc' => $request['desc'],
        'servers_id' => $request['servers_id'],
        'categories_id' => $request['categories_id'],
        'command' => $request['command'],
      ]);
    }
     return response()->json([
       'status'    => 'approved',
   ], 200);
  }
  public function update(Request $request) {
    $id = $request['id'];
    if($request->file('image')) {
      $image = $request->file('image');
      $extension = $image->getClientOriginalExtension();
      $timestampName = microtime(true) . '.' . $extension;
      $url = public_path('images/');
      $url2 = '/images/';

      $image = Image::make($image);
      $image->save($url . $timestampName . $image);

      $timestampName = $url2 . $timestampName;
      Item::find($id)->update([
        'name' => $request['name'],
        'price' => $request['price'],
        'sale' => $request['sale'],
        'desc' => $request['desc'],
        'servers_id' => $request['servers_id'],
        'categories_id' => $request['categories_id'],
        'command' => $request['command'],
        'url' => $timestampName
      ]);
    }
    else {
      Item::find($id)->update([
        'name' => $request['name'],
        'price' => $request['price'],
        'sale' => $request['sale'],
        'desc' => $request['desc'],
        'servers_id' => $request['servers_id'],
        'categories_id' => $request['categories_id'],
        'command' => $request['command'],
      ]);
    }

     return response()->json([
       'status'    => 'approved',
   ], 200);
  }
  public function delete($id) {
    Item::find($id)->delete();
    return response()->json([
      'status'    => 'approved',
  ], 200);


}
}
