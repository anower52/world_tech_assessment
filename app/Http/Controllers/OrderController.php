<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function orderStore(Request $request)
    {
        $order_id = Order::max('order_id');
        $order_id += 1;
        for ($i=0 ; $i<count($request->quantity); $i++)
        {
            $order = new Order();
            $order->order_id = $order_id;
            $order->quantity = $request->quantity[$i];
            $order->unit_price = $request->unit_price[$i];
            $order->total_price = $request->total_price[$i];
            $order->save();
        }

        Session::flash('message', 'Successfully Saved!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function problem2Operation(Request $request)
    {

        $values = explode(',',$request->input_array);
        $found = array();
        foreach ($values as $key => $value)
        {
            if ($value == $request->find_in_array)
            {
                $found[]=$key;
            }
        }
        if (!empty($found)){
            $first = reset($found);
            $last = end($found);
            $output = '['.$first.','.$last.']';
        }else{
            $output = '[-1,-1]';
        }

        Session::flash('output', $output);
        Session::flash('alert-class', '');
        return redirect()->back();
    }
}
