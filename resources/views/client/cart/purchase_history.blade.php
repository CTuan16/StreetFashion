@extends('layout.layoutClient')

@section('title')
   Lịch sử mua hàng
@endsection

@section('body')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Lịch Sử Mua Hàng</h1>

    <!-- Filters -->
    <div class="mb-8 flex items-center justify-between">
        <div class="flex gap-4">
            <select class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option>Tất cả đơn hàng</option>
                <option>Đang xử lý</option>
                <option>Đang giao</option>
                <option>Đã giao</option>
                <option>Đã huỷ</option>
            </select>
            
            <select class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option>3 tháng gần đây</option>
                <option>6 tháng gần đây</option>
                <option>1 năm gần đây</option>
            </select>
        </div>

        <div class="relative">
            <input type="text" placeholder="Tìm kiếm đơn hàng..." 
                   class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Order List -->
    <div class="space-y-6">
        <!-- Single Order -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-sm text-gray-500">Mã đơn hàng:</span>
                        <span class="ml-2 font-medium">#ORD-2023-1234</span>
                    </div>
                    <span class="px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                        Đã giao
                    </span>
                </div>
            </div>

            <div class="px-6 py-4">
                <div class="flex items-center space-x-4">
                    <img src="/img/products/sample.jpg" alt="Product" class="h-20 w-20 object-cover rounded">
                    <div class="flex-1">
                        <h3 class="text-lg font-medium text-gray-900">Áo Thun Basic</h3>
                        <p class="text-sm text-gray-500">Size: L | Màu: Đen</p>
                        <p class="text-sm text-gray-500">Số lượng: 2</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-medium text-gray-900">599,000đ</p>
                        <p class="text-sm text-gray-500">Ngày đặt: 15/10/2023</p>
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-sm text-gray-500">Tổng tiền:</span>
                        <span class="ml-2 text-lg font-medium text-gray-900">1,198,000đ</span>
                    </div>
                    <div class="flex space-x-3">
                        <button class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Mua lại
                        </button>
                        <button class="px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Chi tiết
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
            <div class="flex flex-1 justify-between sm:hidden">
                <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
            </div>
            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Hiển thị
                        <span class="font-medium">1</span>
                        đến
                        <span class="font-medium">10</span>
                        trong
                        <span class="font-medium">20</span>
                        kết quả
                    </p>
                </div>
                <div>
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                        <a href="#" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" aria-current="page" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                        <a href="#" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection