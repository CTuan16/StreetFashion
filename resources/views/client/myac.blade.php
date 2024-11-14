@extends('layout.layoutClient')
@section('title')
    Email
@endsection
@section('body')
<div style="width: 800px" class="mx-10 my-10 border border-gray-300 rounded-lg p-5 flex flex-col  mx-auto relative overflow-hidden">
    
    <h2 class="mb-10 text-3xl border-b border-gray-300 pb-2">Hồ sơ cá nhân</h2>
    <div class="grid grid-cols-12 gap-10">
      <div class="col-span-8 ml-5 space-y-5">
        <div class="flex items-center">
          <span class="text-gray-400 w-1/3">Tên đăng nhập</span>
          <span class="text-black">thientieu275</span>
        </div>
        <div class="flex items-center">
          <span class="text-gray-400 w-1/3">Tên</span>
          <input type="text" value="Tiêu Nguyễn Hoàng Thiên" class="p-4 w-1/2 border border-gray-300 rounded-md">
        </div>
        <div class="flex items-center">
          <span class="text-gray-400 w-1/3">Email</span>
          <span class="text-black">tnht2705@gmail.com</span>
        </div>
        <div class="flex items-center">
          <span class="text-gray-400 w-1/3">Số điện thoại</span>
          <span class="text-black">0376206645</span>
        </div>
        <div class="flex items-center gap-4">
          <h3 class="text-gray-400 w-1/4">Giới tính</h3>
          <div class="flex items-center">
            <input id="gender_male" name="gender" type="radio" value="Nam" class="ml-5 h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
            <label for="gender_male" class="ml-2 text-sm">Nam</label>
          </div>
          <div class="flex items-center">
            <input id="gender_female" name="gender" type="radio" value="Nữ" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
            <label for="gender_female" class="ml-2 text-sm">Nữ</label>
          </div>
        </div>
        <div class="flex items-center">
          <span class="text-gray-400 w-1/3">Ngày sinh</span>
          <span class="text-black">27/05/2004</span>
        </div>
        <button class=" bottom-2 right-2 bg-indigo-600 text-white text-sm px-5 py-2 rounded-full hover:bg-indigo-700 focus:outline-none">
            Lưu
          </button>
      </div>
      <div class="col-span-1 flex justify-center">
        <div class="border-l-2 border-gray-300 h-full"></div>
      </div>
      <div class="col-span-3 relative">
        <img style="width: 150px; height: 140px;" src="/img/avt/thien.jpg" alt="Avatar" class="rounded-full border border-gray-300">
        <button class="mt-5 ml-7 bottom-2 right-2 bg-indigo-600 text-white text-sm px-3 py-1 rounded-full hover:bg-indigo-700 focus:outline-none">
            Chọn ảnh
          </button>
        <p class="text-gray-400 text-xs ml-2 mt-3">Dụng lượng file tối đa 1 MB <br> Định dạng:.JPEG, .PNG</p>
        
      </div>
    </div>
  </div>
  



        
@endsection
