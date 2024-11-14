@extends('layout.layoutClient')
@section('title')
Sản phẩm yêu thích
@endsection
@section('body')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Sản phẩm yêu thích của bạn</h1>
        <div class="flex items-center gap-2">
            <div class="bg-gray-100 px-4 py-2 rounded-full">
                <p class="text-gray-600 font-medium flex items-center gap-2">
                    <span>{{ count($favorite_products) }}</span>
                    <i class="fa-solid fa-heart text-red-500"></i>
                </p>
            </div>
        </div>
    </div>
    <div class="mb-8">
        <div class="bg-white rounded-lg  p-4">
            <div class="flex flex-col sm:flex-row items-center gap-6">
              
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <i class="fa-solid fa-arrow-down-a-z text-gray-500"></i>
                    <select id="sort-name" class="form-select w-full sm:w-auto rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-gray-600" onchange="sortProducts(this.value)">
                        <option value="" disabled selected>Sắp xếp theo tên</option>
                        <option value="name_asc">Tên A-Z</option>
                        <option value="name_desc">Tên Z-A</option>
                    </select>
                </div>
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <i class="fa-solid fa-money-bill text-gray-500"></i>
                    <select id="sort-price" class="form-select w-full sm:w-auto rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 text-gray-600" onchange="sortByPrice(this.value)">
                        <option value="" disabled selected>Sắp xếp theo giá</option>
                        <option value="price_asc">Giá thấp đến cao</option>
                        <option value="price_desc">Giá cao đến thấp</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    @if(auth()->check())
        @if(count($favorite_products) > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 text-center ">
                @foreach($favorite_products as $favorite)
               
                    @if($favorite->product)
                        @php
                            $meta = $favorite->product->product_meta[0];
                        @endphp
                        <div class="group relative bg-white rounded-xl shadow-sm hover:shadow-md transition duration-300 p-4" data-price="{{ $meta->product_sale == 'sale' ? $meta->price_sale : $meta->price }}">
                            <div class="relative">
                                <img src="/img/products/{{ $favorite->product->primary_image }}" 
                                     alt="{{ $favorite->product->name }}" 
                                     class="w-full aspect-[3/4] object-cover rounded-lg transition duration-300 group-hover:opacity-75">
                                
                              
                            </div>

                            <div class="mt-4 space-y-2.5">
                                <h3 class="text-sm font-medium text-gray-900 hover:text-gray-700 truncate"">
                                    {{ $favorite->product->name }}
                                </h3>
                                
                                <div class="flex flex-col gap-1 ">
                                    @foreach($favorite->product->product_meta as $meta)
                                        @if($meta->product_sale == 'sale')
                                            <div class="flex items-center justify-center gap-2 text-sm">
                                                <span class="text-sm text-gray-500 line-through">
                                                    {{ number_format($meta->price) }}đ
                                                </span>
                                                <span class="text-sm font-medium text-red-600">
                                                    {{ number_format($meta->price_sale) }}đ
                                                </span>
                                            </div>
                                        @else
                                            <span class="text-sm font-medium text-gray-900">
                                                {{ number_format($meta->price) }}đ
                                            </span>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="flex items-center gap-2">
                                    <a href="/detail/{{ $favorite->product->id }}" 
                                       class="flex-1 text-center py-2.5 px-4 text-sm font-medium text-gray-900 bg-gray-50 border border-gray-200 rounded-lg hover:bg-gray-100 transition duration-200">
                                        Xem chi tiết
                                    </a>
                                    <form action="{{ route('add.favorite', $favorite->product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="flex justify-center items-center px-2 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100">
                                                @if(auth()->check() && auth()->user()->favorite_product->contains('id_product', $favorite->product->id))
                                                    <i class="fa-solid fa-heart text-red-500"></i>
                                                @else
                                                    <i class="fa-solid fa-heart text-gray-400"></i>
                                                @endif
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-xl shadow-sm">
                <i class="fa-regular fa-heart text-6xl"></i>
                <h3 class="mt-4 text-lg font-medium text-gray-900">Chưa có sản phẩm yêu thích</h3>
                <p class="mt-2 text-sm text-gray-500">Hãy thêm những sản phẩm bạn yêu thích vào danh sách</p>
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center px-6 py-3 mt-6 border border-transparent text-sm font-medium rounded-lg text-white bg-gray-900 hover:bg-gray-800 transition duration-200">
                    Khám phá ngay
                </a>
            </div>
        @endif
    @endif
    
</div>

@endsection
<script src="/js/favorite_product/format_price.js"></script>
<script src="/js/favorite_product/format_name_price.js"></script>
