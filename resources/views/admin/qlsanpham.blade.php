@extends('admin.dashboard')
@section('title')
    Quản Lý Sản Phẩm
@endsection
@section('body')
<div class="flex flex-col">

    <!-- Phần tiêu đề Sản Phẩm và Thêm Sản Phẩm nằm trên cùng -->
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="flex justify-between py-4">
            <h1 class="text-2xl font-semibold text-gray-700 ml-20">Sản Phẩm</h1>
            <a href="#" onclick="openModal()" class="inline-flex items-center px-4 py-2 mr-10 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                Thêm Sản Phẩm
            </a>
        </div>
    </div>
    
    <!-- Phần Search Bar nằm ở giữa, ngay dưới tiêu đề -->
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

    <!-- Bảng dữ liệu sản phẩm -->
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Hình ảnh</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Sản Phẩm</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Số Lượng</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Màu</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Size</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Giá</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Thao Tác</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($result_product as $product)
                    @foreach ($result_product_meta[$product->id] as $product_meta )
                    <tr>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">
                       

                            <!-- Hình ảnh sản phẩm -->
                            <div class="flex justify-center">
                                <img src="/img/products/{{$product['primary_image']}}" alt="Hình ảnh sản phẩm" class="w-auto h-20 rounded-full">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{$product['name']}} </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{$product_meta['quantity']}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                         @foreach ($result_size[$product_meta->id] as $size   )
                            {{$size['name_size']}} 
                         @endforeach
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            @foreach ($product->color as $color)
                            {{ $color->name_color }}@if (!$loop->last), @endif
                            @endforeach
                           </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{number_format($product_meta['price_sale'])}} VND</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <!-- Thao tác (Xóa, Sửa) -->
                            <a href="/admin/products/edit/" class="text-blue-600 hover:text-blue-900 mx-2">Sửa</a>
                            <form action="{{ route('qlsanpham.destroy', $product->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 mx-2" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                  @endforeach
                  @endforeach
                  
                    <!-- Thêm các hàng dữ liệu khác nếu cần -->
                </tbody>
               
            </table>
            
        </div>
    </div>
</div>
<div class="items-center">

</div>
{{$result_product->links()}}
<!-- Modal -->
<div id="productModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Thêm Sản Phẩm</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md" >
                    @error('name')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                
                {{-- <div>
                    <label for="primary_image" class="block text-sm font-medium text-gray-700">Hình ảnh sản phẩm</label>
                    <input type="file" name="primary_image" id="primary_image" class="mt-1 block w-full" >
                    @error('primary_image')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div> --}}
                <div>
                    <label for="id_category" class="block text-sm font-medium text-gray-700">id_category</label>
                    <input type="text" name="id_category" id="id_category" class="mt-1 block w-full border-gray-300 rounded-md" >
                    @error('quantity')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Số lượng</label>
                    <input type="number" name="quantity" id="quantity" class="mt-1 block w-full border-gray-300 rounded-md" >
                    @error('quantity')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="size" class="block text-sm font-medium text-gray-700">Size</label>
                    <input type="text" name="size" id="size" class="mt-1 block w-full border-gray-300 rounded-md" >
                    @error('size')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="price_sale" class="block text-sm font-medium text-gray-700">Giá</label>
                    <input type="number" name="price_sale" id="price_sale" class="mt-1 block w-full border-gray-300 rounded-md" >
                    @error('price_sale')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">Thêm Sản Phẩm</button>
                    <button type="button" onclick="closeModal()" class="mt-4 ml-2 bg-red-600 text-white px-4 py-2 rounded">Hủy</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function openModal() {
        document.getElementById('productModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('productModal').classList.add('hidden');
    }
</script>

@endsection
