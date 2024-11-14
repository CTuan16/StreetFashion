{{-- @extends('layout.layoutClient')

@section('title')
    Giỏ Hàng
@endsection

@section('body')
<div class="container mx-auto p-8 max-w-7xl rounded-lg shadow-lg mt-8 mb-8" style="border: solid #EAD99E 1px;">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-10">Giỏ Hàng Của Bạn</h1>

    @if(session('cart') && count(session('cart')) > 0)
        <!-- Bảng giỏ hàng -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray mx-auto">
                <thead>
                    <tr class="border-b text-xs font-semibold text-gray-600 uppercase tracking-wide text-0xl">
                        <th class="py-3 px-4 text-center">Sản phẩm</th>
                        <th class="py-3 px-4 text-center">Màu sắc</th>
                        <th class="py-3 px-4 text-center">Số lượng</th>
                        <th class="py-3 px-4 text-center">Giá</th>
                        <th class="py-3 px-4 text-center">Tổng cộng</th>
                        <th class="py-3 px-4 text-center">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $id => $item)
                        @php
                            $itemTotal = $item['price'] * $item['quantity'];
                            $total += $itemTotal;
                        @endphp
                        <tr class="hover:bg-gray-100 transition-colors">
                            <td class="py-5 px-4 flex items-center space-x-4">
                                <img src="/img/products/{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-20 h-20 object-cover rounded-md shadow-md">
                                <div>
                                    <p class="font-semibold text-gray-900 text-base">{{ $item['name'] }}</p>
                                    <p class="text-sm text-gray-500">Size: {{ $item['size'] }}</p>
                                </div>
                            </td>
                            <td class="py-5 px-4 text-center">
                                <span class="inline-block px-3 py-1 text-gray-700 bg-gray-200 rounded-full text-sm">{{ $item['color'] }}</span>
                            </td>
                            <td class="py-5 px-4 text-center">
                                <input type="number" class="quantity w-14 text-center border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ $item['quantity'] }}" min="1">
                            </td>
                            <td class="py-5 px-4 text-center">
                                <span class="inline-block px-3 py-1 text-gray-700 text-sm">{{ number_format($item['price'], 0, ',', '.') }} VND</span>
                            </td>
                            <td class="py-5 px-4 text-center">
                                <span class="inline-block px-3 py-1 text-gray-700 text-sm">{{ number_format($itemTotal, 0, ',', '.') }} VND</span>
                            </td>
                            <td class="py-5 px-4 text-center">
                               
                                    
                                  <a href="{{ route('cart.remove', $id) }}">
                                    <button type="submit" class="bg-transparent text-gray-500 hover:text-gray-600">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                  </a>
                              
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tổng kết đơn hàng -->
        <div class="mt-10 flex justify-between items-center border-t pt-6">
            <div class="text-lg">
                <p class="text-gray-700">Tổng tiền đơn hàng: <span class="font-semibold">{{ number_format($total, 0, ',', '.') }} VND</span></p>
            </div>
            <button id="checkout" class="bg-gray-600 text-white font-semibold rounded-md px-6 py-3 hover:bg-gray-700 transition">Thanh toán</button>
        </div>
    @else
        <p class="text-center text-gray-700">Giỏ hàng của bạn đang trống.</p>
    @endif
</div>
@endsection

<script src="https://kit.fontawesome.com/e7db34f14d.js" crossorigin="anonymous"></script> --}}


{{-- //product --}}
{{-- @extends('layout.layoutClient')

@section('title')
    Trang chủ
@endsection

@section('body')
    <div class="max-w-7xl mx-auto mt-8">
        <!-- Banner với góc bo -->
        <img src="/img/banner/banner1.jpg" alt="Hình ảnh banner" class="w-full h-auto rounded-3xl">
    </div>

    <div class="pt-5 pb-5 max-w-7xl mx-auto">
        <!-- Sản Phẩm Nổi Bật -->
        <div class="flex justify-between items-center mt-5">
            <h2 class="text-2xl font-medium text-gray-700">Sản phẩm nổi bật</h2>
    <a href="" class="text-blue-500 hover:underline">
        <p>xem tất cả --></p>
    </a>
        </div>
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12">
                <swiper-container style="--swiper-navigation-color: gray; --swiper-navigation-width:10px; height: 480px"
                    class="container mt-5 mx-auto max-w-full" space-between="30" slides-per-view="4" loop="true"
                    navigation="true" autoplay-delay="1500" autoplay-disable-on-interaction="false"
                    onmouseover="swiper.autoplay.stop()" onmouseout="swiper.autoplay.start()">
                    
                    @foreach ($result_product_default as $product)
                        @foreach ($product->product_meta as $meta)
                            <swiper-slide style="height:480px;">
                                <div class="flex flex-col text-center border border-gray-300 rounded-lg p-2" style="height: 480px">
                                    <a href="./detail">
                                        <div class="relative">
                                            <div class="image-container">
                                                <img src="/img/products/{{ $product['primary_image'] }}" alt="PRODUCT_IMAGE_ALT"
                                                    class="img-primary h-64 transition-transform duration-300 hover:scale-105" />
                                                <img src="/img/products/{{ $product['second_image'] }}" alt="PRODUCT_IMAGE_ALT 2"
                                                    class="img-secondary h-64 transition-transform duration-300 hover:scale-105" />
                                            </div>
                                        </div>
                                    </a>
                                    <div class="flex justify-center gap-3">
                                        <p class="text-sm text-gray-500">Màu sắc:</p>
                                        <p class="text-sm text-gray-900">
                                            @foreach ($product->color as $color)
                                                {{ $color['name_color'] }},
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="flex justify-center gap-3">
                                        <p class="text-sm text-gray-500">Kích thước:</p>
                                        <p class="text-sm text-gray-900">
                                            @foreach ($product->size as $size)
                                                {{ $size['name_size'] }},
                                            @endforeach
                                        </p>
                                    </div>
                                    <h3 class="mt-1 font-semibold text-gray-900" style="height: 43px; display: flex; align-items: center; justify-content: center;">
                                        <a href="#">{{ $product['name'] }}</a>
                                    </h3>
                                    <p class="mt-1 text-gray-900">{{ number_format($meta['price_sale']) }} VND</p>
                                    <div class="flex justify-center mt-5 space-x-2">
                                        <a href="/detail/{{ $product->id }}">
                                            <button class="flex justify-center items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700">
                                                Chi tiết
                                            </button>
                                        </a>
                                        <button class="flex justify-center items-center px-2 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </button>
                                        <form action="{{ route('favorites.add', $product->id) }}" method="POST">
                                            @csrf
                                            <!-- Kiểm tra xem sản phẩm đã yêu thích chưa, nếu có thì hiển thị trái tim đỏ, nếu không thì trái tim trắng -->
                                            {{-- @if ( $favorite_product->isNotEmpty()) --}}
                                                {{-- <button type="submit" class="flex justify-center items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100 text-red-600">
                                                    <i class="fa-solid fa-heart"></i> <!-- Trái tim đỏ khi đã yêu thích -->
                                                </button> --}}
                                            {{-- @else --}}
                                                {{-- <button type="submit" class="flex justify-center items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100 text-gray-700">
                                                    <i class="fa-regular fa-heart"></i> <!-- Trái tim trắng khi chưa yêu thích -->
                                                </button>
                                       
                                        </form>
                                    </div>
                                </div>
                            </swiper-slide>
                        @endforeach
                    @endforeach
                </swiper-container>
            </div>
        </div>

        <!-- Sản Phẩm Khuyến Mãi -->
        <div class="pt-5 pb-5 max-w-7xl mx-auto">
            <div class="flex justify-between items-center mt-5">
                <h2 class="text-2xl font-medium text-gray-700">Sản phẩm khuyến mãi</h2>
        <a href="" class="text-blue-500 hover:underline">
            <p>xem tất cả --></p>
        </a>
            </div>
            <div class="grid grid-cols-12 gap-4 mt-5">
                @foreach ($result_product_sale as $product)
                    @foreach ($product->product_meta as $meta)
                        <div class="col-span-12 md:col-span-4"> <!-- Adjusted to 4 columns for medium screens and above -->
                            <a href="#">
                                <div class="bg-white border border-gray-300 shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                    <div class="flex items-center p-2">
                                        <!-- Product Image on the Left -->
                                        <div class="flex-shrink-0 relative">
                                            <img src="/img/products/{{ $product['primary_image'] }}" alt="PRODUCT_IMAGE_ALT"
                                                class="h-48 w-48 object-cover">
                                            <img src="/img/products/{{ $product['second_image'] }}" alt="PRODUCT_IMAGE_ALT"
                                                class="h-48 w-48 object-cover absolute inset-0 opacity-0 transition-opacity duration-300 hover:opacity-100">
                                        </div>

                                        <!-- Product Details on the Right -->
                                        <div class="ml-4 flex-grow">
                                            <h4 class="font-semibold text-lg truncate-1-lines"
                                                style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                                {{ $product['name'] }}</h4>
                                            <p class="text-gray-500">Màu:
                                                @foreach ($product->color as $color)
                                                    {{ $color['name_color'] }},
                                                @endforeach
                                            </p>
                                            <div class="text-gray-500 line-through">{{ number_format($meta['price']) }} VND</div>
                                            <div class="text-red-500 font-bold">{{ number_format($meta['price_sale']) }} VND -50%</div>
                                            <div class="flex justify-center mt-5 space-x-2">
                                                <a href="/detail/{{ $product->id }}">
                                                    <button class="flex justify-center items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700">
                                                        Chi tiết
                                                    </button>
                                                </a>
                                                <button class="flex justify-center items-center px-2 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>
                                                <form action="{{ route('favorites.add', $product->id) }}" method="POST">
                                                    @csrf
                                                    <!-- Kiểm tra xem sản phẩm đã yêu thích chưa, nếu có thì hiển thị trái tim đỏ, nếu không thì trái tim trắng -->
                                                    {{-- @if ( $favorite_product->isNotEmpty()) --}}
                                                        {{-- <button type="submit" class="flex justify-center items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100 text-red-600">
                                                            <i class="fa-solid fa-heart"></i> <!-- Trái tim đỏ khi đã yêu thích -->
                                                        </button> --}}
                                                    {{-- @else --}}
                                                        {{-- <button type="submit" class="flex justify-center items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100 text-gray-700">
                                                            <i class="fa-regular fa-heart"></i> <!-- Trái tim trắng khi chưa yêu thích -->
                                                        </button>
                                               
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>

        <!-- Tất Cả Sản Phẩm -->
        <div class="pt-5 pb-5 max-w-7xl mx-auto">
            <div class="flex justify-between items-center mt-5">
                <h2 class="text-2xl font-medium text-gray-700">Tất Cả Sản Phẩm</h2>
        <a href="" class="text-blue-500 hover:underline">
            <p>xem tất cả --></p>
        </a>
            </div>
            <div class="grid grid-cols-12 gap-4 mt-5">
                @foreach ($result_product as $product)
                    @foreach ($product->product_meta as $meta)
                        <div class="col-span-12 md:col-span-3"> <!-- Sử dụng 3 cột cho màn hình trung bình và lớn -->
                            <div class="flex flex-col text-center border border-gray-300 rounded-lg p-2 transition-shadow duration-300 hover:shadow-lg h-full">
                                <div class="relative flex-grow">
                                    <div class="image-container">
                                        <img src="/img/products/{{ $product['primary_image'] }}" alt="{{ $product['name'] }}" 
                                             class="img-primary h-64 w-full object-cover transition-transform duration-300 hover:scale-105" />
                                        <img src="/img/products/{{ $product['second_image'] }}" alt="{{ $product['name'] }} 2" 
                                             class="img-secondary h-64 w-full object-cover absolute inset-0 opacity-0 transition-opacity duration-300 hover:opacity-100" />
                                    </div>
                                </div>
                                <p class="text-sm text-gray-500 truncate">
                                    @foreach ($product->color as $color)
                                        {{ $color['name_color'] }}@if (!$loop->last), @endif
                                    @endforeach
                                </p>
                                <h3 class="mt-1 font-semibold text-gray-900">
                                    <a href="#">{{ $product['name'] }}</a>
                                </h3>
                                <div class="flex flex-col justify-center items-center mt-2">
                                    @if ($meta->product_sale === 'sale') <!-- Kiểm tra nếu sản phẩm có giảm giá -->
                                        <p class="text-sm text-gray-900 line-through">{{ number_format($meta['price']) }} VND</p> <!-- Giá gốc -->
                                        <p class="text-lg text-red-600 font-semibold">{{ number_format($meta['price_sale']) }} VND</p> <!-- Giá giảm -->
                                    @else
                                        <p class="text-lg text-gray-900 font-semibold">{{ number_format($meta['price']) }} VND</p> <!-- Giá gốc nếu không có giảm giá -->
                                    @endif
                                </div>
                                <div class="flex justify-center mt-5 space-x-2">
                                    <a href="/detail/{{ $product->id }}">
                                        <button class="flex justify-center items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700">
                                            Chi tiết
                                        </button>
                                    </a>
                                    <a href="">
                                        <button class="flex justify-center items-center px-2 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('favorites.add', $product->id) }}" method="POST">
                                        @csrf
                                        <!-- Kiểm tra xem sản phẩm đã yêu thích chưa, nếu có thì hiển thị trái tim đỏ, nếu không thì trái tim trắng -->
                                        {{-- @if ( $favorite_product->isNotEmpty()) --}}
                                            {{-- <button type="submit" class="flex justify-center items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100 text-red-600">
                                                <i class="fa-solid fa-heart"></i> <!-- Trái tim đỏ khi đã yêu thích -->
                                            </button> --}}
                                        {{-- @else --}}
                                            {{-- <button type="submit" class="flex justify-center items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100 text-gray-700">
                                                <i class="fa-regular fa-heart"></i> <!-- Trái tim trắng khi chưa yêu thích -->
                                            </button>
                                   
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
                
            </div>
        </div>
        
        
    </div>
    

    @endsection --}} 
    {{-- //produc_controller
    {{-- <?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\color;
use App\Models\size;
use App\Models\product_meta;
use App\Models\category;
use App\Models\SearchKeyword;
use App\Models\category_child;

class productController extends Controller
{
    public function showProducts($categoryId, $subcategoryId = null)
    {
        // Lấy thông tin danh mục cha
        $category = Category::find($categoryId);
        $subcategory = null;
        
        // Nếu có subcategoryId, lấy sản phẩm theo danh mục con
        if ($subcategoryId) {
            $products = Product::with(['product_meta', 'color', 'size'])
                ->where('id_category_child', $subcategoryId)
                ->paginate(9); // Hiển thị 9 sản phẩm mỗi trang để grid đẹp hơn
            $subcategory = Category_child::find($subcategoryId);
            
            return view('client.product', compact('products', 'category', 'subcategory'));
        } else {
            // Nếu không có subcategoryId, lấy sản phẩm theo danh mục cha
            $products = Product::with(['product_meta', 'color', 'size'])
                ->where('id_category_parent', $categoryId)
                ->paginate(9); // Hiển thị 9 sản phẩm mỗi trang để grid đẹp hơn
            
            return view('client.product', compact('products', 'category'));
        }
    }
    
    // Lấy danh mục
    public function show($categoryId)
    {
        $category = Category::with(['category_child' => function($query) {
            $query->orderBy('name', 'asc'); // Sắp xếp danh mục con theo tên
        }])->findOrFail($categoryId);
        
        return view('client.product', compact('category'));
    }
    
    public function detail($id)
    {
        $result_product = Product::with(['product_meta', 'color', 'size'])
            ->where('id', $id)
            ->first();
            
        // Lấy các sản phẩm liên quan cùng danh mục
        $related_products = Product::with(['product_meta', 'color', 'size'])
            ->where('id_category_parent', $result_product->id_category_parent)
            ->where('id', '!=', $id)
            ->take(4)
            ->get();
            
        return view('client.detail', compact('result_product', 'related_products'));
    }

    public function Search(Request $request) 
    {
        $query = trim($request->input('query')); // Loại bỏ khoảng trắng thừa
        
        if(empty($query)) {
            return redirect()->back()->with('error', 'Vui lòng nhập từ khóa tìm kiếm');
        }
        
        $results = Product::with(['product_meta', 'color', 'size', 'Category'])
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhereHas('Category', function($q) use ($query) {
                      $q->where('name', 'LIKE', "%{$query}%");
                  });
            })
            ->orderBy('created_at', 'desc') // Sắp xếp sản phẩm mới nhất
            ->paginate(9);
            
        // Lưu từ khóa tìm kiếm
        $keyword = SearchKeyword::firstOrNew(['keyword' => $query]);
        $keyword->count = $keyword->exists ? $keyword->count + 1 : 1;
        $keyword->save();
        
        // Lấy top từ khóa phổ biến
        $popularKeywords = SearchKeyword::orderBy('count', 'desc')
            ->take(10)
            ->get();
            
        // Lấy danh mục để hiển thị filter
        $result_category = Category::all();
            
        return view('client.cart.search', compact('results', 'query', 'popularKeywords', 'result_category'));
    } --}}
} --}}



// search
@extends('layout.layoutClient')

@section('title')
    Search
@endsection

@section('body')
<div class="container mx-auto py-12 max-w-7xl">
    <!-- Search section -->
    <div class="flex justify-between space-x-8">
        <!-- Sidebar Filters -->
        <div class="w-1/4 space-y-8">
            <!-- Category Section -->
            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Danh mục sản phẩm</h3>
                @foreach ($result_category as $category)
                    <div class="mt-3">
                        <a href="{{ route('product.showProducts', $category['id']) }}" 
                           class="block text-gray-600 hover:text-purple-600 hover:bg-purple-50 border border-gray-200 hover:border-purple-300 p-3 rounded-lg transition-all duration-200 transform hover:-translate-y-1">
                            {{ $category->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Main content -->
        <div class="w-1/2">
            <!-- Keywords Section -->
            <div class="flex items-center space-x-4 mb-8 bg-white p-4 rounded-xl shadow-md">
                <h3 class="text-xl font-bold text-gray-800">Từ khoá:</h3>
                <div class="flex flex-wrap">
                    <span class="inline-block bg-purple-100 text-purple-700 rounded-full px-6 py-2 text-base font-medium">
                        {{ $query }}
                    </span>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-800 mb-6">Sản phẩm</h3>

            <!-- Product Listings -->
            @if($results->isEmpty())
                <div class="mt-8 text-center py-12 bg-white rounded-xl shadow-md">
                    <img src="/img/no-results.svg" alt="No Results" class="w-48 mx-auto mb-4">
                    <p class="text-lg text-gray-600">
                        Không có sản phẩm nào tồn tại với từ khoá "<strong class="text-purple-600">{{ $query }}</strong>".
                    </p>
                </div>
            @else
                <div id="products-container" class="space-y-6">
                    @foreach ($results as $product)
                        @foreach ($product->product_meta as $meta)
                            <div class="transform transition duration-300 hover:-translate-y-1">
                                <a href="/detail/{{$product->id}}" class="block">
                                    <div class="bg-white rounded-xl shadow-md hover:shadow-xl overflow-hidden border border-gray-100">
                                        <div class="flex p-6">
                                            <!-- Product Image -->
                                            <div class="flex-shrink-0 relative group">
                                                <img src="/img/products/{{$product['primary_image']}}" 
                                                     alt="Product Image" 
                                                     class="h-40 w-40 object-cover rounded-lg transform transition duration-500 group-hover:scale-105">
                                                <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition duration-300 rounded-lg"></div>
                                            </div>

                                            <!-- Product Details -->
                                            <div class="ml-6 flex-1">
                                                <h4 class="text-xl font-bold text-gray-800 mb-3 hover:text-purple-600 transition">
                                                    {{ $product->name }}
                                                </h4>
                                                
                                                <div class="space-y-3">
                                                    <div class="flex items-center space-x-6">
                                                        <div class="flex items-center">
                                                            <span class="text-gray-600 font-medium">Size:</span>
                                                            <div class="ml-2 flex space-x-2">
                                                                @foreach ($product->size as $size)
                                                                    <span class="px-2 py-1 bg-purple-50 text-purple-600 rounded-md text-sm font-medium">
                                                                        {{ $size->name_size }}
                                                                    </span>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="flex items-center">
                                                            <span class="text-gray-600 font-medium">Color:</span>
                                                            <div class="ml-2 flex space-x-2">
                                                                @foreach ($product->color as $color)
                                                                    <span class="px-2 py-1 bg-purple-50 text-purple-600 rounded-md text-sm font-medium">
                                                                        {{ $color->name_color }}
                                                                    </span>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex items-center space-x-4">
                                                        <div class="text-gray-500 line-through text-lg">
                                                            {{ number_format($meta['price']) }} VND
                                                        </div>
                                                        <div class="text-red-500 font-bold text-xl">
                                                            {{ number_format($meta['price_sale']) }} VND
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endforeach
                </div>

                <!-- Load More Button -->
                <div class="text-center mt-10">
                    <button id="load-more" 
                            class="px-8 py-3 bg-purple-600 text-white rounded-full hover:bg-purple-700 transform hover:-translate-y-1 transition-all duration-200 font-medium focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                        Xem thêm
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>

                <script>
                let currentPage = 1;
                const query = '{{ $query }}';

                document.getElementById('load-more').addEventListener('click', function() {
                    currentPage++;
                    
                    fetch(`/search?query=${query}&page=${currentPage}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.results.length > 0) {
                            const container = document.getElementById('products-container');
                            
                            data.results.forEach(product => {
                                product.product_meta.forEach(meta => {
                                    const productHTML = createProductHTML(product, meta);
                                    container.insertAdjacentHTML('beforeend', productHTML);
                                });
                            });

                            if (!data.hasMore) {
                                document.getElementById('load-more').style.display = 'none';
                            }
                        }
                    });
                });

                function createProductHTML(product, meta) {
                    return `
                        <div class="transform transition duration-300 hover:-translate-y-1">
                            <a href="/detail/${product.id}" class="block">
                                <div class="bg-white rounded-xl shadow-md hover:shadow-xl overflow-hidden border border-gray-100">
                                    <div class="flex p-6">
                                        <div class="flex-shrink-0 relative group">
                                            <img src="/img/products/${product.primary_image}" 
                                                 alt="Product Image" 
                                                 class="h-40 w-40 object-cover rounded-lg transform transition duration-500 group-hover:scale-105">
                                            <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition duration-300 rounded-lg"></div>
                                        </div>

                                        <div class="ml-6 flex-1">
                                            <h4 class="text-xl font-bold text-gray-800 mb-3 hover:text-purple-600 transition">
                                                ${product.name}
                                            </h4>
                                            
                                            <div class="space-y-3">
                                                <div class="flex items-center space-x-6">
                                                    <div class="flex items-center">
                                                        <span class="text-gray-600 font-medium">Size:</span>
                                                        <div class="ml-2 flex space-x-2">
                                                            ${product.size.map(s => `
                                                                <span class="px-2 py-1 bg-purple-50 text-purple-600 rounded-md text-sm font-medium">
                                                                    ${s.name_size}
                                                                </span>
                                                            `).join('')}
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex items-center">
                                                        <span class="text-gray-600 font-medium">Color:</span>
                                                        <div class="ml-2 flex space-x-2">
                                                            ${product.color.map(c => `
                                                                <span class="px-2 py-1 bg-purple-50 text-purple-600 rounded-md text-sm font-medium">
                                                                    ${c.name_color}
                                                                </span>
                                                            `).join('')}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="flex items-center space-x-4">
                                                    <div class="text-gray-500 line-through text-lg">
                                                        ${new Intl.NumberFormat().format(meta.price)} VND
                                                    </div>
                                                    <div class="text-red-500 font-bold text-xl">
                                                        ${new Intl.NumberFormat().format(meta.price_sale)} VND
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    `;
                }
                </script>
            @endif
        </div>

        <!-- Right Sidebar -->
        <div class="w-1/4">
            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Hashtag thịnh hành</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach ($popularKeywords as $hashtag)
                        <span class="inline-flex items-center px-4 py-2 bg-purple-50 text-purple-700 rounded-full text-sm font-medium hover:bg-purple-100 transition duration-200 cursor-pointer" 
                              title="{{ $hashtag->keyword }}">
                            #{{ $hashtag->keyword }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

//searchcontroller
