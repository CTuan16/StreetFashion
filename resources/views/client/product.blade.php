@extends('layout.layoutClient')

@section('title')
    Sản phẩm
@endsection

@section('body')
<div class="sm:mx-auto">
    {{-- Breadcrumb Navigation (optional) --}}
</div>

<div class="max-w-7xl mx-auto mb-8">
    <div class="grid grid-cols-12 gap-10">
        <!-- Phần ảnh bên trái -->
        <div class="col-span-2 mt-10">
            <nav class="bg-white p-3 rounded-lg shadow-sm mb-4">
                <ol class="flex flex-wrap items-center text-xs">
                    <li>
                        <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-600 transition-colors">Trang chủ</a>
                    </li>
                    <li class="mx-1 text-gray-400">/</li>
                    <li>
                        <a href="{{ url('/product/' . $category->id) }}" class="text-gray-600 hover:text-gray-600 transition-colors">{{ $category->name }}</a>
                    </li>
                    @if (isset($subcategory))
                        <li class="mx-1 text-gray-400">/</li>
                        <li>
                            <a href="{{ url('/product/' . $category->id . '/' . $subcategory->id) }}" class="text-gray-600 hover:text-gray-600 transition-colors">{{ $subcategory->name }}</a>
                        </li>
                    @endif
                </ol>
            </nav>
            <!-- anh -->
            <div class="flex flex-col space-y-8">
                <div class="group relative overflow-hidden rounded-xl shadow-lg">
                    <img 
                        class="h-[50vh] w-full object-cover transform transition duration-500 group-hover:scale-110" 
                        src="/img/form/hinh1dk.jpg" 
                        alt="Image 1"
                    />
                    <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>

                <div class="group relative overflow-hidden rounded-xl shadow-lg">
                    <img 
                        class="h-[50vh] w-full object-cover transform transition duration-500 group-hover:scale-110" 
                        src="/img/form/hinh2dk.jpg" 
                        alt="Image 2"
                    />
                    <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="group relative overflow-hidden rounded-xl shadow-lg">
                    <img 
                        class="h-[50vh] w-full object-cover transform transition duration-500 group-hover:scale-110" 
                        src="/img/form/hinh2dk.jpg" 
                        alt="Image 2"
                    />
                    <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
            </div>
        </div>
        <!-- Phần sản phẩm bên phải -->
        <div class="col-span-10 mt-10">
            {{-- <div class="container mx-auto mt-3 text-center">
                <h2 class="text-3xl font-bold text-gray-500">{{ $category->name }}</h2>
            </div> --}}

            {{-- Hiển thị danh mục con --}}
            <div class="mt-5 flex flex-wrap justify-center gap-4">
                @foreach ($category->category_child as $subcategory)
                <a href="/product/{{ $category->id }}/{{ $subcategory->id }}" class="px-4 py-2 bg-white text-gray-800 rounded-md border border-gray-200 hover:border-gray-500 hover:bg-gray-50">
                    {{ $subcategory->name }}
                </a>
                @endforeach
            </div>
            
            <!-- Phần hiển thị sản phẩm -->
            <div class="bg-white rounded-lg shadow-md mt-6">
                <div class="mt-10 border border-gray-200 rounded-lg">
                    <section class="lg:max-w-8xl lg:mx-auto lg:px-8">
                        <div class="relative w-full pb-6 mb-6 overflow-x-auto">
                            <div role="list" class="mx-4 inline-flex flex-wrap justify-center lg:grid lg:grid-cols-3 lg:gap-x-8 mt-10">
                                @foreach ($products as $product)
                                    @foreach ($product->product_meta as $product_meta)
                                        <div class="flex flex-col text-center w-full max-w-xs mx-2 mb-6 transition-transform hover:scale-105">
                                            <div class="relative">
                                                <div class="image-container">
                                                    <img src="/img/products/{{ $product->primary_image }}" alt="PRODUCT_IMAGE_ALT" class="img-primary h-64 w-full object-cover rounded-lg" />
                                                    <img src="/img/products/{{ $product->second_image }}" alt="PRODUCT_IMAGE_ALT 2" class="img-secondary h-64 w-full object-cover rounded-lg absolute top-0 left-0 transition-opacity duration-300 opacity-0 hover:opacity-100" />
                                                </div>
                                            </div>
                                            <div class="flex justify-center gap-2 mt-2">
                                                <p class="text-sm text-gray-500">Kích thước:</p>
                                                <p class="text-sm text-gray-900 flex gap-2">
                                                    @foreach ($product->size as $size)
                                                        {{ $size->name_size }}@if (!$loop->last), @endif
                                                    @endforeach
                                                </p>
                                            </div>
                                            <div class="flex justify-center gap-2">
                                                <p class="text-sm text-gray-500">Màu sắc:</p>
                                                <p class="text-sm text-gray-900 flex gap-2">
                                                    @foreach ($product->color as $color)
                                                        {{ $color->name_color }}@if (!$loop->last), @endif
                                                    @endforeach
                                                </p>
                                            </div>
                                            <h3 class="mt-1 font-semibold text-gray-900" style="height: 43px; display: flex; align-items: center; justify-content: center;">
                                                <a href="#">{{ $product->name }}</a>
                                            </h3>
                                            @if($product_meta->product_sale == 'sale')
                                                <p class="mt-1 text-gray-900">
                                                    <span class="line-through text-gray-500">{{ number_format($product_meta->price) }} VND</span>
                                                    <span class="text-red-600">{{ number_format($product_meta->price_sale) }} VND</span>
                                                </p>
                                            @else
                                                <p class="mt-1 text-gray-900">{{ number_format($product_meta->price) }} VND</p>
                                            @endif
                                            <div class="flex justify-center mt-5 space-x-2">
                                                <a href="/detail/{{ $product->id }}">
                                                    <button class="flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700">Chi tiết</button>
                                                </a>
                                                <button class="flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>
                                                <form action="{{ route('add.favorite', $product->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="flex justify-center items-center px-2 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100">
                                                        @if(auth()->check() && auth()->user()->favorite_product->contains('id_product', $product->id))
                                                            <i class="fa-solid fa-heart text-red-500"></i>
                                                        @else
                                                            <i class="fa-solid fa-heart text-gray-400"></i>
                                                        @endif
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <!-- Pagination -->
                        {{-- phân trang --}}
                        <div class="bg-white mt-10 flex px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
                            <div class="hidden flex flex-col sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                        @if ($products->onFirstPage())
                                            <span class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-gray-100 text-sm font-medium text-gray-400">&lt;</span>
                                        @else
                                            <a href="{{ $products->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">&lt;</a>
                                        @endif

                                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                            <a href="{{ $url }}" 
                                               aria-current="{{ $products->currentPage() == $page ? 'page' : '' }}"
                                               class="{{ $products->currentPage() == $page ? 'z-10 bg-gray-50 border-gray-500 text-gray-600' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50' }} relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                {{ $page }}
                                            </a>
                                        @endforeach

                                        @if ($products->hasMorePages())
                                            <a href="{{ $products->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">&gt;</a>
                                        @else
                                            <span class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-gray-100 text-sm font-medium text-gray-400">&gt;</span>
                                        @endif
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
