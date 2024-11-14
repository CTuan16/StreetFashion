@extends('admin.dashboard')
@section('title')
    Trang Chu
@endsection
@section('body')
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <h1 class="text-2xl font-semibold text-gray-700 mr-4">Đơn hàng</h1>
    </div>

      <!-- Thêm phần Search Bar vào giữa -->
      <div class="flex justify-center py-4 items-center">
        <!-- Search Bar -->
        <div class="relative w-1/2 max-w-lg">
            <input type="text" placeholder="Nhập từ khoá tìm kiếm" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
            <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0 1 14 0z" />
                </svg>
            </div>
        </div>
      </div>
      
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th
                  scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Hình ảnh
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Sản Phẩm
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Số Lượng
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Giá
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Tổng đơn hàng
                </th>
                <th
                scope="col"
                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider"
              >
                Trạng thái
                <!-- SVG icon for down arrow -->
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-4 w-4 ml-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </th>
              
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">
                  <!-- Thêm hình ảnh sản phẩm tại đây -->
                  <div class="flex justify-center">
                    <img src="/img/products/ego.jpg" alt="Hình ảnh sản phẩm" class="w-auto h-20 rounded-full">
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">Sản phẩm A</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">2</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">200.000 VND</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">400.000 VND</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  <span class="text-green-600">Thành công</span>
                </td>
              </tr>
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">
                  <!-- Thêm hình ảnh sản phẩm tại đây -->
                  <div class="flex justify-center">
                    <img src="/img/products/ego.jpg" alt="Hình ảnh sản phẩm" class="w-auto h-20 rounded-full">
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">Sản phẩm B</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">1</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">150.000 VND</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">150.000 VND</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                  <span class="text-green-600">Thành công</span>
                </td>
              </tr>
              <!-- Thêm các hàng dữ liệu khác nếu cần -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
