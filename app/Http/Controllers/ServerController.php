<?php

namespace App\Http\Controllers;
use App\Server;
use Illuminate\Http\Request;
use Image;
class ServerController extends Controller
{
public function index($id) {
  $server = Server::where('id', '=', $id)->get();
  return response()->json(['servers' => $server]);
}
public function admin_index() {
  $server = Server::all();
  $server = $server->makeVisible(['key']);
  return response()->json(['servers' => $server]);
}
public function create(Request $request) {
  if($request->file('image')) {
    $image = $request->file('image');
    $extension = $image->getClientOriginalExtension();
    $timestampName = microtime(true) . '.' . $extension;
    $url = public_path('images/');
    $url2 = '/images/';

    $image = Image::make($image);
    $image->resize(125, 125);
    $image->save($url . $timestampName . $image);

    $timestampName = $url2 . $timestampName;
    Server::create([
        'name' => $request['name'],
        'key' => $request['key'],
        'url' => $timestampName
    ]);
  }
  else {
    Server::create([
        'name' => $request['name'],
        'key' => $request['key'],
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
    $image->resize(125, 125);
    $image->save($url . $timestampName . $image);

    $timestampName = $url2 . $timestampName;
    Server::find($id)->update([
        'name' => $request['name'],
        'key' => $request['key'],
        'url' => $timestampName
    ]);
  }
  else {
    Server::find($id)->update([
        'name' => $request['name'],
        'key' => $request['key']
    ]);
  }

   return response()->json([
     'status'    => 'approved',
 ], 200);
}
public function delete($id) {
  Server::find($id)->delete();
  return response()->json([
    'status'    => 'approved',
], 200);
}
}
