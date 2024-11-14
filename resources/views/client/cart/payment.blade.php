@extends('layout.layoutClient')

@section('title')
    Thanh toán
@endsection

@section('body')
<div class="container mx-auto p-6  rounded-lg shadow-lg max-w-7xl mt-8 mb-8" style="border: solid #EAD99E 1px;">

    <h1 class="text-4xl font-bold text-center text-gray-900 mb-10">Thanh Toán</h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Thông tin người dùng -->
        <div class="bg-white p-6 rounded-lg " style="border: solid #EAD99E 1px;">
            <h2 class="text-2xl font-bold mb-6 text-gray-700">Thông tin của bạn</h2>
            <form>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Tên:</label>
                    <input type="text" id="name" value="{{ Auth::user()->name }}" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:border-blue-500 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700 font-semibold mb-2">Số điện thoại:</label>
                    <input type="tel" id="phone" value="{{ Auth::user()->phone }}" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:border-blue-500 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email:</label>
                    <input type="email" id="email" value="{{ Auth::user()->email }}" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:border-blue-500 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 font-semibold mb-2">Địa chỉ:</label>
                    <textarea id="address" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:border-blue-500 focus:ring-blue-500" required>{{ Auth::user()->address }}</textarea>
                </div>

                <!-- Thêm chọn tỉnh, huyện, xã -->
                <div class="mb-4">
                    <label for="province" class="block text-gray-700 font-semibold mb-2">Tỉnh/Thành phố:</label>
                    <select id="province" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:border-blue-500 focus:ring-blue-500" required>
                        <option value="">Chọn tỉnh/thành phố</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="district" class="block text-gray-700 font-semibold mb-2">Quận/Huyện:</label>
                    <select id="district" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:border-blue-500 focus:ring-blue-500" required>
                        <option value="">Chọn quận/huyện</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="ward" class="block text-gray-700 font-semibold mb-2">Phường/Xã:</label>
                    <select id="ward" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:border-blue-500 focus:ring-blue-500" required>
                        <option value="">Chọn phường/xã</option>
                    </select>
                </div>
            </form>
        </div>

        <!-- Thông tin đơn hàng -->
        <div class="bg-white p-6 rounded-lg " style="border: solid #EAD99E 1px;">
            <h2 class="text-2xl font-bold mb-6 text-gray-700">Thông tin đơn hàng</h2>
            <div class="border border-gray-300 rounded-lg p-6 mb-6">
                <!-- Danh sách sản phẩm -->
                <div class="space-y-4">
                    @php
                        $userId = auth()->id();
                        $cart = session()->get('cart.' . $userId, []);
                        $total = 0;
                    @endphp

                    @foreach($cart as $id => $item)
                        @php
                            $itemTotal = $item['price'] * $item['quantity'];
                            $total += $itemTotal;
                        @endphp
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="/img/products/{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-16 h-16 rounded-md mr-4">
                                <div>
                                    <p class="text-gray-800 font-semibold">{{ $item['name'] }}</p>
                                    <p class="text-gray-800">Size: {{ $item['size'] }}</p>
                                    <p class="text-gray-800">Màu: {{ $item['color'] }}</p>
                                    <p class="text-gray-800">Số lượng: {{ $item['quantity'] }}</p>
                                </div>
                            </div>
                            <p class="text-gray-600">{{ number_format($itemTotal, 0, ',', '.') }} VND</p>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 border-t pt-4">
                    <!-- Input for Khuyến mãi -->
                    <div class="mb-4">
                        <label for="promotion_code" class="block text-gray-700 font-semibold mb-2">Mã khuyến mãi:</label>
                        <input type="text" id="promotion_code" placeholder="Nhập mã khuyến mãi" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-gray-700">Phí vận chuyển:</p>
                        <p class="text-gray-600">30.000 VND</p>
                    </div>
                    
                    <!-- Khuyến mãi -->
                    <div class="flex items-center justify-between">
                        <p class="text-gray-700">Khuyến mãi:</p>
                        <p class="text-gray-600">0 VND</p>
                    </div>
                
                    <div class="flex items-center justify-between font-bold text-xl mt-2">
                        <p class="text-gray-900">Tổng cộng:</p>
                        <p class="text-gray-900">{{ number_format($total + 30000, 0, ',', '.') }} VND</p>
                    </div>
                </div>
                
            </div>

            <!-- Phương thức thanh toán -->
            <h2 class="text-2xl font-bold mb-6 text-gray-700">Phương thức thanh toán</h2>
            <div class="space-y-3">
                <label class="flex items-center">
                    <input type="radio" name="payment_method" value="cash_on_delivery" class="mr-3" required>
                    <span class="text-gray-700">Thanh toán khi nhận hàng</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="payment_method" value="vpbank" class="mr-3">
                    <span class="text-gray-700">Thanh toán qua VPBank</span>
                    <img src="/img/vpbank.png" alt="VPBank" class="w-8 h-8 ml-2">
                </label>
                <label class="flex items-center">
                    <input type="radio" name="payment_method" value="mb" class="mr-3">
                    <span class="text-gray-700">Thanh toán qua MB</span>
                    <img src="/img/mbbank.png" alt="MB" class="w-8 h-8 ml-2">
                </label>
                <label class="flex items-center">
                    <input type="radio" name="payment_method" value="momo" class="mr-3">
                    <span class="text-gray-700">Thanh toán qua MoMo</span>
                    <img src="/img/momo.png" alt="MoMo" class="w-8 h-8 ml-2">
                </label>
            </div>

            <button class="w-full bg-blue-600 text-white font-semibold rounded-md px-4 py-3 mt-6 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Đặt hàng
            </button>
        </div>
    </div>
</div>

<script src="{{ asset('js/api_city.js') }}"></script>

@endsection
