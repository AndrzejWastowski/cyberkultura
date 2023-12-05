<?php
namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = $this->getCartItems();

        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cartItem = $this->getCartItem($productId);

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            $cartItem = new Cart();
            $cartItem->user_id = Auth::id();
            $cartItem->products_id = $productId;
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }

        return redirect()->route('cart.index')->with('success', 'Produkt dodany do koszyka.');
    }

    public function update(Request $request)
    {
 
        $productId = $request->input('products_id');
        $quantity = $request->input('quantity');
        
        $cartItem = $this->getCartItem($productId);

        if ($cartItem) {
            if ($quantity > 0) {
                $cartItem->quantity = $quantity;
                $cartItem->save();
            } else {
                $cartItem->delete();
            }
        }

        return redirect()->route('cart.index')->with('success', 'Koszyk zaktualizowany .');
    }

    public function remove($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Produkt usunięty z koszyka.');
    }

    private function getCartItems()
    {
        $userId = Auth::id();
        $sessionCartItems = Session::get('cart', []);

        if (Auth::check()) {
            $cartIds = Cart::where('id', $sessionCartItems)->pluck('id')->toArray();
            Cart::where('id', $cartIds)->update(['user_id' => $userId]);
            Session::forget('cart');
            $cartItems = Cart::where('user_id', $userId)->with('products')->get();
        } else {
            $cartItems = Cart::where('id', $sessionCartItems)->with('products')->get();
        }

        return $cartItems;
    }

    private function getCartItem($productId)
    {
        $userId = Auth::id();
        $sessionCartItems = Session::get('cart', []);

        if (Auth::check()) {
            $cartIds = Cart::whereIn('id', $sessionCartItems)->pluck('id')->toArray();
            Cart::whereIn('id', $cartIds)->update(['user_id' => $userId]);
            Session::forget('cart');
            $cartItem = Cart::where('user_id', $userId)->where('products_id', $productId)->first();
        } else {
            $cartItem = Cart::where('user_id', null)->whereIn('id', $sessionCartItems)->where('products_id', $productId)->first();
        }

        return $cartItem;
    }
}
