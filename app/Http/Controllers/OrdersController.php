<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Finish;
use DB;
use App\Plugin;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Crypt;

class OrdersController extends Controller
{
      public function orders() {
        $orders = DB::table('orders')->orderBy('orders.created_at', 'desc')
        ->join('items', 'items.id', 'orders.items_id')
        ->join('servers', 'servers.id', 'items.servers_id')
        ->get(['orders.id', 'orders.username', 'items.price', 'orders.number', 'items.name', 'items.command', 'orders.status', 'servers.name as servername', 'orders.created_at'])
        ->toArray();
        return response()->json(['orders' => $orders]);
      }
      public function orders_status() {
        $orders = DB::table('orders')->orderBy('orders.created_at', 'desc')
        ->join('items', 'items.id', 'orders.items_id')
        ->join('servers', 'servers.id', 'items.servers_id')
        ->get(['orders.id', 'orders.username', 'orders.number', 'items.price', 'items.name', 'items.command', 'orders.status', 'servers.name as servername', 'orders.created_at'])
        ->toArray();
        $http = new Client;
        $response = $http->request('GET', 'http://localhost/low.php');
        $data = json_decode($response->getBody()->getContents());
        $finishes = [];
        foreach ($orders as $order) {
          if($data->items[0]->orlogo==$order->price && $data->items[0]->tuhai==$order->username) {
          $finishes = $order;
          }
        }

        return response()->json($finishes);
      }
      public function changestatus($id) {
        Order::where('id', '=', $id)->update([
          'status' => 'complete'
        ]);
        return response()->json(['completed'], 200);
      }
      public function create(Request $request) {
      $webhookurl = "https://discord.com/api/webhooks/824627731756613652/Oq11lpU3PauCZmQUxKX1J_Dyfd0LV-qqY-cPO6MVEh-sxgR2YWgAttpC4Z3JEgepHXeC";
      $timestamp = date("c", strtotime("now"));
      $json_data = json_encode([
      "content" => "Шинээр захиалга орж ирлээ <@220165623651500042>",
      "username" => "mc.nexus.mn",
      "tts" => false,
      ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
      $ch = curl_init( $webhookurl );
      curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
      curl_setopt( $ch, CURLOPT_POST, 1);
      curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
      curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt( $ch, CURLOPT_HEADER, 0);
      curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
      $response = curl_exec( $ch );
      curl_close( $ch );
      $ip = $request->ip();
        Order::create([
            'price' => $request['price'],
            'username' => $request['username'],
            'number' => $request['number'],
            'items_id' => $request['items_id'],
            'ip' => $ip
        ]);

        $username = $request['username'];

        $order = Order::where('username', $username)->orderBy('created_at', 'DESC')->first();
        Finish::create([
          'items_id' => $request['items_id'],
          'orders_id' => $order->id
        ]);
        $hash = Crypt::encrypt($order->id);
        return response()->json($hash, 200);

      }
      public function order_here($id) {
        $hash = Crypt::decrypt($id);
        $order = Order::where('id', '=', $hash)->first();
        return response()->json(['order' => $order], 200);
      }
      public function take_give(Request $request) {
        $finish = Finish::all();
        return response()->json(['finish' => $finish], 200);
      }
      public function transfer(Request $request) {
          $item_id = $request['item_id'];
          $order_id = $request['order_id'];
          $item = DB::table('finishes')
          ->join('orders', 'finishes.orders_id', 'orders.id')
          ->join('items', 'finishes.items_id', 'items.id')
          ->where('orders_id', '=', $order_id)
          ->where('items.id', '=', $item_id)
          ->get()
          ->first();
          return response()->json(['success' => 'success'], 200);
      }
      public function giving_it(Request $request)
      {
        Finish::create([
          'access_token' => $request['access_token'],
          'refresh_token' => $request['refresh_token']
        ]);
          return response()->json(['success' => 'success'], 200);
      }
      public function take_out(Request $request)
      {
        $finish = Finish::orderBy('created_at', 'DESC')->first();
          return response()->json($finish);
      }
}
