<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
class CategoriesController extends Controller
{
  public function index() {
    $server = Category::all();
    return response()->json(['categories' => $server]);
  }
  public function admin_index($id) {
    if(!$id) {
      $id = 1;
    }
    $categories = DB::table('categories')
    ->join('servers', 'categories.servers_id', 'servers.id')
    ->where('servers.id', '=', $id)
    ->get(['categories.id', 'categories.name', 'servers.name as serversname', 'categories.servers_id'])->toArray();
    return response()->json([
      'categories'    => $categories
    ], 200);
  }
  public function create(Request $request) {
     Category::create([
         'name' => $request['name'],
         'servers_id' => $request['servers_id'],
     ]);
     return response()->json([
       'status'    => 'approved',
   ], 200);
  }
  public function update(Request $request) {
    $id = $request['id'];
      Category::find($id)->update([
        'name' => $request['name'],
        'servers_id' => $request['servers_id'],
      ]);
     return response()->json([
       'status'    => 'approved',
   ], 200);
  }
  public function delete($id) {
    Category::find($id)->delete();
    return response()->json([
      'status'    => 'approved',
  ], 200);
  }


}
