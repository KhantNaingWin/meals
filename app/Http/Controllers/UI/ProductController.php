<?php

namespace App\Http\Controllers\UI;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('cart');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        // dd($cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function checkout(){
        $data=session()->get('cart');
        // dd($data);
        $todayDate=Carbon::now()->format('d/m/Y');
       $order=new Order();
       $order->user_id = Auth::user()->id;
       $order->date=$todayDate;
       $order->save();

        foreach($data as $id => $detail){
            // dd($detail);
            $orderDetails=new OrderDetails();
            $orderDetails->order_id = $order->id;
            $orderDetails->product_id = $id;
            $orderDetails->name = $detail['name'];
            $orderDetails->quantity = $detail['quantity'];
            $orderDetails->price = $detail['price'];
            $orderDetails->image=$detail['image'];
            $orderDetails->save();



        }
        session()->forget('cart');

        return redirect('admin/ui/product');


    }

}
