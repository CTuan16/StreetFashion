@extends('layout.layoutClient')

@section('title')
    Trang chủ
@endsection

@section('body')
    <div class="max-w-7xl mx-auto mt-8">
        <swiper-container class="rounded-3xl shadow-lg" 
            navigation="true" 
            pagination="true" 
            loop="true" 
            autoplay-delay="3000" 
            autoplay-disable-on-interaction="false"
            style="--swiper-navigation-color: #4B5563; --swiper-navigation-size: 30px; --swiper-navigation-background-color: rgba(75, 85, 99, 0.8); --swiper-navigation-sides-offset: 20px; --swiper-navigation-border-radius: 50%;">
            <swiper-slide>
                <img src="/img/banner/banner1.jpg" alt="Banner 1" class="w-full h-[500px] object-cover rounded-3xl">
               
            </swiper-slide>
            <swiper-slide>
                <img src="/img/banner/banner.jpg" alt="Banner 2" class="w-full h-[500px] object-cover rounded-3xl">
                
            </swiper-slide>
            <swiper-slide>
                <img src="/img/banner/banner1.jpg" alt="Banner 3" class="w-full h-[500px] object-cover rounded-3xl">
               
            </swiper-slide>
        </swiper-container>
    </div>

    <div class="pt-5 pb-5 max-w-7xl mx-auto">
        <!-- Sản Phẩm Nổi Bật -->
        <div class="flex justify-between items-center mt-5">
            <h2 class="text-2xl font-medium text-gray-800">Sản phẩm nổi bật</h2>
            <a href="" class="text-gray-600 hover:text-gray-800 hover:underline">
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
                               
                                        <div class="relative">
                                            <div class="image-container">
                                                <img src="/img/products/{{ $product['primary_image'] }}" alt="PRODUCT_IMAGE_ALT"
                                                    class="img-primary h-64 transition-transform duration-300 hover:scale-105" />
                                                <img src="/img/products/{{ $product['second_image'] }}" alt="PRODUCT_IMAGE_ALT 2"
                                                    class="img-secondary h-64 transition-transform duration-300 hover:scale-105" />
                                            </div>
                                        </div>
                             
                                    <div class="flex justify-center gap-3">
                                        <p class="text-sm text-gray-600">Màu sắc:</p>
                                        <p class="text-sm text-gray-800">
                                            @foreach ($product->color as $color)
                                                {{ $color['name_color'] }},
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="flex justify-center gap-3">
                                        <p class="text-sm text-gray-600">Kích thước:</p>
                                        <p class="text-sm text-gray-800">
                                            @foreach ($product->size as $size)
                                                {{ $size['name_size'] }},
                                            @endforeach
                                        </p>
                                    </div>
                                    <h3 class="mt-1 font-semibold text-gray-800 truncate" >
                                     
                                        <p>{{ $product['name'] }}</p>
                                    </h3>
                                    <p class="mt-1 text-gray-800">{{ number_format($meta['price']) }} VND</p>
                                    <div class="flex justify-center mt-5 space-x-2">
                                        <a href="/detail/{{ $product->id }}">
                                            <button class="flex justify-center items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700">
                                                Chi tiết
                                            </button>
                                        </a>
                                        <button class="flex justify-center items-center px-2 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </button>
                                        <form action="{{ route('add.favorite', $product->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="flex justify-center items-center px-2 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100">
                                                @if($user && $user->favorite_product->contains('id_product', $product->id))
                                                    <i class="fa-solid fa-heart text-red-500"></i>
                                                @else
                                                    <i class="fa-solid fa-heart text-gray-400"></i>
                                                @endif
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
                <h2 class="text-2xl font-medium text-gray-800">Sản phẩm khuyến mãi</h2>
                <a href="" class="text-gray-600 hover:text-gray-800 hover:underline">
                    <p>xem tất cả --></p>
                </a>
            </div>
            <div class="grid grid-cols-12 gap-4 mt-5">
                @foreach ($result_product_sale as $product)
                    @foreach ($product->product_meta as $meta)
                        <div class="col-span-12 md:col-span-4">
                            <a href="#">
                                <div class="bg-white border border-gray-300 shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                    <div class="flex items-center p-2">
                                        <div class="flex-shrink-0 relative">
                                            <img src="/img/products/{{ $product['primary_image'] }}" alt="PRODUCT_IMAGE_ALT"
                                                class="h-48 w-48 object-cover">
                                            <img src="/img/products/{{ $product['second_image'] }}" alt="PRODUCT_IMAGE_ALT"
                                                class="h-48 w-48 object-cover absolute inset-0 opacity-0 transition-opacity duration-300 hover:opacity-100">
                                        </div>

                                        <div class="ml-4 flex-grow">
                                            <h4 class="font-semibold text-lg text-gray-800 truncate-1-lines"
                                                style="">
                                                {{ $product['name'] }}</h4>
                                            <p class="text-gray-600">Màu:
                                                @foreach ($product->color as $color)
                                                    {{ $color['name_color'] }},
                                                @endforeach
                                            </p>
                                            <div class="text-gray-600 line-through">{{ number_format($meta['price']) }} VND</div>
                                            <div class="flex items-center gap-2">
                                                <div class="text-red-600 font-bold">{{ number_format($meta['price_sale']) }} VND</div>
                                                <span class="px-2 py-0.5 bg-red-100 text-red-600 text-xs font-semibold rounded-full">Sale</span>
                                            </div>
                                            <div class="flex justify-center mt-5 space-x-2">
                                                <a href="/detail/{{ $product->id }}">
                                                    <button class="flex justify-center items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700">
                                                        Chi tiết
                                                    </button>
                                                </a>
                                                <button class="flex justify-center items-center px-2 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>
                                                <form action="{{ route('add.favorite', $product->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="flex justify-center items-center px-2 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100">
                                                        @if($user && $user->favorite_product->contains('id_product', $product->id))
                                                            <i class="fa-solid fa-heart text-red-500"></i>
                                                        @else
                                                            <i class="fa-solid fa-heart text-gray-400"></i>
                                                        @endif
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
                <h2 class="text-2xl font-medium text-gray-800">Tất Cả Sản Phẩm</h2>
                <a href="" class="text-gray-600 hover:text-gray-800 hover:underline">
                    <p>xem tất cả --></p>
                </a>
            </div>
            <div class="grid grid-cols-12 gap-4 mt-5">
                @foreach ($result_product as $product)
                    @foreach ($product->product_meta as $meta)
                        <div class="col-span-12 md:col-span-3">
                            <div class="flex flex-col text-center border border-gray-300 rounded-lg p-2 transition-shadow duration-300 hover:shadow-lg h-full">
                                <div class="relative flex-grow">
                                    <div class="image-container">
                                        <img src="/img/products/{{ $product['primary_image'] }}" alt="{{ $product['name'] }}" 
                                             class="img-primary h-64 w-full object-cover transition-transform duration-300 hover:scale-105" />
                                        <img src="/img/products/{{ $product['second_image'] }}" alt="{{ $product['name'] }} 2" 
                                             class="img-secondary h-64 w-full object-cover absolute inset-0 opacity-0 transition-opacity duration-300 hover:opacity-100" />
                                    </div>
                                </div>
                                <div class="flex justify-center gap-3">
                                    <p class="text-sm text-gray-600">Màu sắc:</p>
                                    <p class="text-sm text-gray-800">
                                        @foreach ($product->color as $color)
                                            {{ $color['name_color'] }},
                                        @endforeach
                                    </p>
                                </div>
                                <div class="flex justify-center gap-3">
                                    <p class="text-sm text-gray-600">Kích thước:</p>
                                    <p class="text-sm text-gray-800">
                                        @foreach ($product->size as $size)
                                            {{ $size['name_size'] }},
                                        @endforeach
                                    </p>
                                </div>
                                <h3 class="mt-1 font-semibold text-gray-800 ">
                                    <a href="#">{{ $product['name'] }}</a>
                                </h3>
                            
                                  
                                    <p class="mt-1 text-gray-800">{{ number_format($meta['price']) }} VND</p>
                                
                             
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
                                    <form action="{{ route('add.favorite', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="flex justify-center items-center px-2 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100">
                                            @if($user && $user->favorite_product->contains('id_product', $product->id))
                                                <i class="fa-solid fa-heart text-red-500"></i>
                                            @else
                                                <i class="fa-solid fa-heart text-gray-400"></i>
                                            @endif
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
    
    <div class="relative bg-gray-900 overflow-hidden mb-4"> 
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 py-8 bg-gray-900 sm:py-12 lg:max-w-2xl lg:w-full">
                <main class="mx-auto max-w-7xl px-4 sm:px-6">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-3xl tracking-tight font-bold text-white sm:text-4xl">
                            <span class="block">Khuyến mãi đặc biệt</span>
                            <span class="block text-red-500">Giảm giá lên đến 50%</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-300 sm:text-lg">
                            Đừng bỏ lỡ cơ hội mua sắm với giá ưu đãi nhất!
                        </p>
                        <div class="mt-5 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="#" class="w-full flex items-center justify-center px-6 py-2 border border-transparent text-base font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-48 w-full object-cover sm:h-56 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Shopping banner">
        </div>
    </div>
    

    @endsection