@extends('layout.layoutClient')

@section('title')
    Search
@endsection

@section('body')
<div class="container mx-auto py-8 max-w-7xl">
    <div class="flex justify-between space-x-8">
        <!-- Left Sidebar -->
        <div class="w-1/4">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Danh mục sản phẩm</h3>
                @foreach ($result_category as $category)
                    <div class="mt-3">
                        <a href="{{ route('product.showProducts', $category['id']) }}" 
                           class="block text-gray-600 hover:text-black transition duration-150 px-4 py-2.5 rounded-lg hover:bg-gray-50 border border-transparent hover:border-gray-200">
                            {{ $category->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Main Content -->
        <div class="w-1/2">
            <div class="flex items-center space-x-3 mb-8">
                <h3 class="text-lg font-semibold text-gray-800">Từ khoá tìm kiếm:</h3>
                <span class="px-4 py-1.5 bg-gray-100 text-gray-700 rounded-full text-sm font-medium">
                    "{{ $query }}"
                </span>
            </div>

            <h3 class="text-lg font-semibold text-gray-800 mb-6">Kết quả tìm kiếm</h3>

            @if($results->isEmpty())
                <div class="bg-gray-50 rounded-lg p-8 text-center">
                    <p class="text-gray-600">Không tìm thấy sản phẩm nào với từ khoá "<strong>{{ $query }}</strong>"</p>
                </div>
            @else
                @foreach ($results as $product)
                    @foreach ($product->product_meta as $meta)
                        <div class="mb-6">
                            <a href="/detail/{{$product->id}}" class="block transition duration-200 hover:shadow-lg">
                                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                                    <div class="flex p-6">
                                        <div class="flex-shrink-0">
                                            <img src="/img/products/{{$product['primary_image']}}" 
                                                 alt="{{ $product->name }}" 
                                                 class="h-48 w-48 object-cover rounded-lg shadow-sm hover:scale-105 transition duration-300">
                                        </div>
                                        <div class="ml-8 flex flex-col justify-between flex-grow">
                                            <div>
                                                <h4 class="font-semibold text-xl text-gray-800 mb-4 hover:text-gray-600 transition">{{ $product->name }}</h4>
                                                <div class="space-y-3">
                                                    <div class="flex items-center space-x-8">
                                                        <div class="flex items-center">
                                                            <span class="text-gray-500 mr-3">Size:</span>
                                                            <div class="flex gap-1">
                                                                @foreach ($product->size as $size)
                                                                    <span class="text-gray-800 font-medium">{{ $size->name_size }}{{ !$loop->last ? ',' : '' }}</span>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <span class="text-gray-500 mr-3">Màu:</span>
                                                        <div class="flex gap-2">
                                                            @foreach ($product->color as $color)
                                                                <span class="text-gray-800 font-medium">{{ $color->name_color }}{{ !$loop->last ? ',' : '' }}</span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-6">
                                                @if($meta['product_sale'] == 'sale')
                                                    <div class="flex items-center gap-3">
                                                        <span class="text-gray-400 line-through text-base">{{ number_format($meta['price']) }} VND</span>
                                                        <span class="text-red-600 font-bold text-xl">{{ number_format($meta['price_sale']) }} VND</span>
                                                        <span class="px-3 py-1 bg-red-100 text-red-600 text-sm font-semibold rounded-full">Sale</span>
                                                    </div>
                                                @else
                                                    <div class="text-gray-900 font-bold text-xl">{{ number_format($meta['price']) }} VND</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            @endif
        </div>

        <!-- Right Sidebar -->
        <div class="w-1/4">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Từ khoá phổ biến</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach ($popularKeywords as $hashtag)
                        <span class="inline-block bg-gray-50 text-gray-700 rounded-full px-4 py-1.5 text-sm font-medium hover:bg-gray-100 transition duration-150 cursor-pointer" 
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
