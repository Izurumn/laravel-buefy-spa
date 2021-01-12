<?php

namespace App\Http\Controllers;
use App\Server;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Completed;
use App\Rank;
use App\Post;
use Auth;
use App\User;
class ShopController extends Controller
{
  public function kke() {
     return response()->json(['Status' => 'OK',
      'Runtime-Mode' => 'productionMode',
      'Application-Author' => 'Mojang Web Force',
      'Application-Description' => 'Mojang Authentication Server.',
      'Specification-Version' => '4.12.0',
      'Application-Name' => 'yggdrasil.auth.restlet.server',
      'Implementation-Version' => '4.12.0_build244',
      'Application-Owner' => 'Mojang' ]);
  }
  public function psps($id) {

    $user = User::where('hash', $id)->first();
    return response()->json([
  "id" => md5($user->id),
  "name" => $user->name,
  "properties" => [[
    "name" => "textures",
    "value" => "ewogICJ0aW1lc3RhbXAiIDogMTYwOTk4ODE5NzcwMSwKICAicHJvZmlsZUlkIiA6ICJkM2JmOGVlOTZlYmU0NzE2ODBjZDU2YjgzZDVhYTIyMyIsCiAgInByb2ZpbGVOYW1lIiA6ICJTREEiLAogICJ0ZXh0dXJlcyIgOiB7CiAgICAiU0tJTiIgOiB7CiAgICAgICJ1cmwiIDogImh0dHA6Ly90ZXh0dXJlcy5taW5lY3JhZnQubmV0L3RleHR1cmUvZWI1MTk1MjUwOGZmMTE5NmJlM2Q5Njk1MTAxNTZmNDk4ZGRjMGYxNmMxYjk2OTZkZmI1NTA5NTA5ZTQyY2UwIgogICAgfQogIH0KfQ=="
   ]]], 200);
}


public function lalar2(Request $request)
{
  $id = $request['username'];
  $user = User::where('name', $id)->first();

  return response()->json([
    "id" => md5($user->id),
    "name" => $user->name,
      "properties" =>  [
          [
            'name' => 'textures',
            "value" => "ewogICJ0aW1lc3RhbXAiIDogMTYwOTk5NjkwNjY4NCwKICAicHJvZmlsZUlkIiA6ICIwMTZkOTU3YmQ1ODk0N2Q3OWFlZWQzZDIyOWRmZmM2YiIsCiAgInByb2ZpbGVOYW1lIiA6ICJPZG5vbyIsCiAgInNpZ25hdHVyZVJlcXVpcmVkIiA6IHRydWUsCiAgInRleHR1cmVzIiA6IHsKICAgICJTS0lOIiA6IHsKICAgICAgInVybCIgOiAiaHR0cDovL3RleHR1cmVzLm1pbmVjcmFmdC5uZXQvdGV4dHVyZS9iMDc1OTQ0NjU1YTI4ZGYwYWJlNzA3ZGMxY2I2ZjZhODVjNDRjODVkYjAwNjYwMmI3NTRmMTc1YTU5NTQzYzRmIiwKICAgICAgIm1ldGFkYXRhIiA6IHsKICAgICAgICAibW9kZWwiIDogInNsaW0iCiAgICAgIH0KICAgIH0KICB9Cn0=",
            "signature" => "eHV5qYwVF+z5yEa/3OvD2OzSfl9SbIxCyA7FYab+OBlEswvfEWIpncn024oNYxT2Nnq3VKETuV3+sDh4AkLKOnTKcN7Q8tUM2iK3Cs+H2ob3I3Es2wIGrRkMc0AKnbhLxLqAN5M/4Cl4H2mQwDgkuYkOSchxN5ztztQtWwN84aO+ZB4YybxV0txXZEbR8CIshJtZtWzrxpUmXzRcrlHx9WbHkH8v681PSFuvdJRvuMajHxKA0nCkJPcKVEbQx17C16F03Ihuzzjim8ltShARXnGCkjuLu5WL+4S6EbV6FRR+9G4bRY02wLTqL/RQJ1epkxiWcktBwsL04a2ALEclNERabmOJhB/E+cUQjoC6QWibfbMc/biVw9BpQtpWkbqa1zNquFdDY7Yq0tX9H0ecLVTeUzYUoAngikqa3IMWpobyTwvDbBHmbKfPuV2VGsRj1Qr3t55rIkyD1cZ4W8o/LphQPiiZqD8CHqLTJdUoNGvB+9FGZAqgMQSc7qDy7DyZ02MlvkHfotrHaX6iUUnAp/CwcVQG678nv8Z9DnxQLkYgzYqqyyVDskxlrmUyU3SOVxavGK+hnUd8YgGLdKYy+O0gs9/GuCLmhIt/KPY+nNMw616PO/IX9ur5J6aI4Xu3nfXvytBnJK6I6V8J5dK3Ozqbzs9SUSQczXgNMKL3dcM="
          ]
      ]

], 200);
}
  public function lalar(Request $request)
  {
    return response()->json([], 204);
  }
  public function serverlist($id)
  {
    $server = DB::table('servers')
->join('shopbyserver','servers.id','shopbyserver.servers_id')
->where('servers.id','=',$id)
->get()->toArray();

    return response()->json([
      'server'    => $server,
  ], 200);
  }
  public function ranks()
  {
    $server = DB::table('servers')
->join('shopbyserver','servers.id','shopbyserver.servers_id')
->get(['shopbyserver.id','title', 'price', 'command', 'name', 'description', 'servers_id'])->toArray();

    return response()->json([
      'server'    => $server,
  ], 200);
  }
  public function rankupdate(Request $request, $id)
  {
    Rank::find($id)->update([
      'shopbyserver_id' => $request['shopbyserver_id'],
        'title' => $request['title'],
        'description' => $request['description'],
        'price' => $request['price'],
        'command' => $request['command'],
        'servers_id' => $request['servers_id'],
    ]);
    return response()->json([
      'server'    => 'approved',
  ], 200);
  }
  public function serverupdate(Request $request, $id)
  {
    Server::find($id)->update([

        'name' => $request['name'],
        'skey' => $request['skey'],

    ]);
    return response()->json([
      'server'    => 'approved',
  ], 200);
  }
  public function postsupdate(Request $request, $id)
  {
    Post::find($id)->update([

        'title' => $request['title'],
        'body' => $request['body'],

    ]);
    return response()->json([
      'server'    => 'approved',
  ], 200);
  }
  public function servercreate(Request $request)
  {
    Server::create([

        'name' => $request['name'],
        'skey' => $request['skey'],

    ]);
    return response()->json([
      'server'    => 'approved',
  ], 200);
  }
  public function postscreate(Request $request)
  {
    Post::create([

      'title' => $request['title'],
      'body' => $request['body'],

    ]);
    return response()->json([
      'server'    => 'approved',
  ], 200);
  }
  public function rankcreate(Request $request)
  {
    Rank::create([
        'shopbyserver_id' => $request['shopbyserver_id'],
        'title' => $request['title'],
        'price' => $request['price'],
        'command' => $request['command'],
        'servers_id' => $request['servers_id'],
        'description' => $request['description']

    ]);
    return response()->json([
      'server'    => 'approved',
  ], 200);
  }
  public function serverdelete($id)
  {
    Server::find($id)->delete();
    return response()->json([
      'server'    => 'approved',
  ], 200);
  }
  public function postsdelete($id)
  {
    Post::find($id)->delete();
    return response()->json([
      'server'    => 'approved',
  ], 200);
  }
  public function rankdelete($id)
  {
    Rank::find($id)->delete();
    return response()->json([
      'server'    => 'approved',
  ], 200);
  }
  public function servers()
  {
    $server = Server::all();
    return response()->json([
      'server'    => $server,
  ], 200);
  }
  public function serverswithkey()
  {
    $server = Server::all();
    $server = $server->makeVisible('skey')->toArray();
    return response()->json([
      'server'    => $server,
  ], 200);
  }
  public function items($id)
  {
    $server = DB::table('servers')
->join('shopbyserver','servers.id','shopbyserver.servers_id')
->where('shopbyserver.id','=',$id)
->get()->toArray();

    return response()->json([
      'server'    => $server,
  ], 200);
  }
  public function Order(Request $request) {

    if(!empty($request['mc_username'] && $request['utas'] && $request['email'] && $request['shopbyserver']))
    {
      return Order::create([
          'mc_username' => $request['mc_username'],
          'utas' => $request['utas'],
          'email' => $request['email'],
          'shopbyserver_id' => $request['shopbyserver'],
      ]);
    }
    return response()->json(['message' => 'error'], 422);
}
public function orders()
{
  $server = DB::table('orders')
->join('shopbyserver','shopbyserver.id','orders.shopbyserver_id')
->join('servers','servers.id','shopbyserver.id')
->get(['orders.id', 'mc_username', 'utas', 'email', 'orders.created_at'])->toArray();
// $server = DB::table('shopbyserver')
// ->join('servers','servers.id','shopbyserver.id')
// ->join('orders','orders.shopbyserver_id','shopbyserver.id')
//
// ->get(['shopbyserver_id', 'title', 'price', 'servers_id', 'description'])->toArray();

  return response()->json([
    'server'    => $server,
], 200);
}
public function completes()
{
//   $server = DB::table('orders')
// ->join('shopbyserver','shopbyserver.id','orders.shopbyserver_id')
// ->join('servers','servers.id','shopbyserver.id')
// ->get()->toArray();
$server = Completed::all();

  return response()->json([
    'server'    => $server,
], 200);
}
public function deleteorder(Request $request, $id)
{
    $order = Order::where('id', $id)->first();
      $order->delete();

    return Completed::create([
        'mc_username' => $request['mc_username'],
        'utas' => $request['utas'],
        'email' => $request['email'],
        'shopbyserver_id' => $request['shopbyserver_id'],
        'price' => $request['price'],
        'command' => $request['command'],
    ]);



}
public function posts() {
  $posts = Post::all();
  return response()->json([
    'posts' => $posts
  ], 200);
}
public function server()
{
  $data = file_get_contents('https://mcapi.us/server/status?ip=mc.animax.mn');
  $obj = json_decode($data);
  return response()->json([
    'status'    => $obj->status,
    'players_max'   => $obj->players->max,
    'players_now'   => $obj->players->now,
    'name'          => $obj->server->name,
], 200);

}
}
