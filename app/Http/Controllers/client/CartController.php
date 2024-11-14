<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\ProductMeta;
use App\Models\SearchKeyword;

class CartController extends Controller
{
    public function Cart()
    {
        $userId = auth()->id();
        $cart = session()->get('cart.' . $userId, []);
        
        $total = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        
        return view('client.cart.cart', compact('cart', 'total'));
    }

    public function AddToCart(Request $request, $id)
    {
        $product = Product::with(['product_meta', 'color', 'size'])->find($id);

        $userId = auth()->id();
        $cart = session()->get('cart.' . $userId, []);

        $color = $request->input('color');
        $size = $request->input('size');
        
        $colorObj = Color::where('name_color', $color)->first();
        $sizeObj = Size::where('name_size', $size)->first();
        
        if (!$colorObj || !$sizeObj) {
            return redirect()->back()->with('error', 'Vui lòng chọn màu sắc và kích thước cho sản phẩm!');
        }

        // Tạo unique key cho sản phẩm dựa trên ID, màu và size
        $cartKey = $id . '_' . $color . '_' . $size;

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity']++;
        } else {
            $product_meta = $product->product_meta()->first();
            
            $price = $product_meta->product_sale == 'sale' ? $product_meta->price_sale : $product_meta->price;
            
            $cart[$cartKey] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $price,
                "color" => $colorObj->name_color,
                "size" => $sizeObj->name_size,
                "image" => $product->primary_image,
            ];
        }

        session()->put('cart.' . $userId, $cart);
        return redirect()->route('cart')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
    //update cart
    public function updateCart(Request $request)
    {

   
            $userId = auth()->id();
            $cart = session()->get('cart.' . $userId, []);
            $quantities = $request->input('quantities', []);

     

            foreach ($quantities as $id => $quantity) {
                if (!isset($cart[$id])) {
                    throw new \Exception('Sản phẩm không tồn tại trong giỏ hàng');
                }

                $cart[$id]['quantity'] = (int)$quantity;
            }
       
    session()->put('cart.' . $userId, $cart);

    return redirect()->route('payment')->with('success', 'Giỏ hàng đã được cập nhật');
}

    public function RemoveCart($id)
    {
        $userId = auth()->id();
        $cart = session()->get('cart.' . $userId);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart.' . $userId, $cart);
        }

        return redirect()->route('cart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }

    public function Payment()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thanh toán!');
        }
        return view('client.cart.payment');
    }

    public function Order()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để xem đơn hàng!');
        }
        return view('client.cart.order_successfully');
    }

    public function Order_Information()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để xem thông tin đơn hàng!');
        }
        return view('client.cart.order_information');
    }

    public function PurchaseHistory()
    {
        return view('client.cart.purchase_history');
    }
    public function Order_Successfully()
    {
        return view('client.cart.order_successfully');
    }
}
