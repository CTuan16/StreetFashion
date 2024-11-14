<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\product_meta;
use App\Models\Color; // Nếu có model Color
use App\Models\Size; // Nếu có model Size

class productAd extends Controller
{
    // Phương thức hiển thị danh sách sản phẩm
    public function showProductadmin(Request $request)
    {
        // Lấy tất cả các sản phẩm
        $result_product = Product::paginate(8);
        // Tạo mảng rỗng cho meta, color và size
        $result_product_meta = [];
        $result_color = [];
        $result_size = [];

        // Duyệt qua từng sản phẩm và lấy thông tin meta, color, size
        foreach ($result_product as $product) {
            // Lấy thông tin meta dựa trên product_id
            $result_product_meta[$product->id] = Product_Meta::where('id_product', $product->id)->get();

            // Duyệt qua các meta của từng sản phẩm
            foreach ($result_product_meta[$product->id] as $meta) {
                $result_color[$meta->id] = Color::where('id_product', $meta->id_product)->get();
                $result_size[$meta->id] = Size::where('id_product', $meta->id_product)->get();
            }
        }

        return view('admin.qlsanpham', compact('result_product', 'result_product_meta', 'result_color', 'result_size'))->with('i',(request()->input('page',1)-1)*5);
    }

    // Phương thức hiển thị form thêm sản phẩm
    public function create()
    {
        return view('admin.products.create');
    }

    // Phương thức lưu sản phẩm
    public function store(Request $request)
    {
        // Xác thực dữ liệu nhập vào
        $request->validate([

            'name' => 'required|string|max:255',
            // 'primary_image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'quantity' => 'required|integer',
            'size' => 'required|string',
            'price_sale' => 'required|numeric',
        ]);

        // Lưu sản phẩm chính
        $product = Product::create([
            // 'id_category_parent'=>$id_category_parent, 
            'name' => $request->name,
            // 'primary_image' => $request->file('primary_image')->store('products', 'public'), // Lưu hình ảnh vào thư mục 'public/products'
        ]);

        // Lưu thông tin meta cho sản phẩm
        Product_Meta::create([
            'id_product' => $product->id,
            'quantity' => $request->quantity,
            'size' => $request->size,
            'price_sale' => $request->price_sale,
        ]);

        return redirect()->route('admin.qlsanpham')->with('success', 'Sản phẩm đã được thêm thành công.');
    }

    public function destroyProduct($id)
    {
        $user = Product::findOrFail($id); // Tìm sản phẩm theo ID
        $user->delete(); // Xóa sản phẩm

        return redirect()->back()->with('success', 'Xóa sản phẩm thành công.');
    }
}

