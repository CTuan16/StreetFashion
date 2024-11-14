@extends('layout.layoutClient')

@section('title')
    Gợi Ý Phối Đồ Sang Trọng
@endsection

@section('body')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-12">Gợi Ý Phối Đồ Sang Trọng</h1>

    <!-- Hero Section -->
    <div class="mb-16">
        <div class="relative rounded-xl overflow-hidden shadow-lg">
            <img src="img/banner/aokhoac.jpg" alt="Featured Outfit" class="w-full h-[500px] object-cover">
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-10">
                <h2 class="text-3xl font-bold text-white mb-4">Phong Cách Thu Đông 2023</h2>
                <p class="text-gray-200 text-lg leading-relaxed">Khám phá những xu hướng thời trang mới nhất</p>
            </div>
        </div>
    </div>

    <!-- Style Guide Section -->
    <div class="mb-20">
        <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">Cách Phối Đồ Theo Dịp</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="space-y-6 bg-white rounded-xl shadow-md p-6 transition-transform duration-300 hover:scale-105">
                <img src="/img/Form/hinh1dk.jpg" alt="Casual Style" class="w-full h-96 object-cover rounded-xl">
                <h3 class="text-2xl font-bold text-gray-800">Phong Cách Hàng Ngày</h3>
                <p class="text-gray-600 leading-relaxed">Thoải mái nhưng vẫn thanh lịch với áo sơ mi trắng, quần jeans và giày sneaker. Phù hợp cho các hoạt động hàng ngày như đi café, shopping hay gặp gỡ bạn bè.</p>
            </div>
            <div class="space-y-6 bg-white rounded-xl shadow-md p-6 transition-transform duration-300 hover:scale-105">
                <img src="/img/Form/hinh1dn.jpg" alt="Casual Style" class="w-full h-96 object-cover rounded-xl">
                <h3 class="text-2xl font-bold text-gray-800">Trang Phục Công Sở</h3>
                <p class="text-gray-600 leading-relaxed">Chuyên nghiệp và sang trọng với bộ suit, váy công sở hoặc quần tây áo sơ mi. Lựa chọn hoàn hảo cho môi trường làm việc chuyên nghiệp.</p>
            </div>
        </div>
    </div>

    <!-- Seasonal Trends -->
    <div class="mb-20">
        <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">Xu Hướng Theo Mùa</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="transform transition-transform duration-300 hover:scale-105">
                <img src="/img/outfits/spring.jpg" alt="Spring Fashion" class="w-full h-80 object-cover rounded-xl shadow-lg">
            </div>
            <div class="transform transition-transform duration-300 hover:scale-105">
                <img src="/img/outfits/summer.jpg" alt="Summer Fashion" class="w-full h-80 object-cover rounded-xl shadow-lg">
            </div>
            <div class="transform transition-transform duration-300 hover:scale-105">
                <img src="/img/outfits/autumn.jpg" alt="Autumn Fashion" class="w-full h-80 object-cover rounded-xl shadow-lg">
            </div>
        </div>
    </div>

    <!-- Style Tips -->
    <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-12 rounded-xl shadow-md">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Bí Quyết Phối Đồ</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="text-center bg-white p-8 rounded-xl shadow-sm transition-transform duration-300 hover:shadow-lg">
                <div class="w-20 h-20 bg-gray-900 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Cân Bằng Màu Sắc</h3>
                <p class="text-gray-600 leading-relaxed">Kết hợp màu sắc hài hòa, tránh quá nhiều màu sắc rực rỡ trong một set đồ</p>
            </div>
            <div class="text-center bg-white p-8 rounded-xl shadow-sm transition-transform duration-300 hover:shadow-lg">
                <div class="w-20 h-20 bg-gray-900 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Phối Layer</h3>
                <p class="text-gray-600 leading-relaxed">Tạo điểm nhấn bằng cách kết hợp nhiều lớp trang phục khác nhau</p>
            </div>
            <div class="text-center bg-white p-8 rounded-xl shadow-sm transition-transform duration-300 hover:shadow-lg">
                <div class="w-20 h-20 bg-gray-900 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Phụ Kiện</h3>
                <p class="text-gray-600 leading-relaxed">Sử dụng phụ kiện để nâng tầm trang phục và tạo điểm nhấn riêng biệt</p>
            </div>
        </div>
    </div>
</div>
@endsection