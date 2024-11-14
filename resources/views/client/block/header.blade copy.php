<!-- Top Header Bar -->

<header class="bg-black text-white py-1">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 sm:px-6">
        <div>
            <a href="#" class="flex items-center space-x-1">
                <i class="fa-solid fa-house"></i>
                <span>Street Fashion</span>
            </a>
        </div>
        <div class="flex items-center space-x-2 text-sm">
            <span>Hotline: 0906.880.960</span>
            <span>•</span>
            <a href="#" class="hover:underline">Hỗ trợ trực tuyến</a>
        </div>
    </div>
</header>

<!-- Main Navigation -->
<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/">
                    <img class="w-20" src="/img/logo.png" alt="Dosiin Logo">
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="flex items-center space-x-8 relative">
                

                <div class="inline-block text-left">
                    <div>  
                        <button style="display: flex;align-items: center" class="inline-flex justify-center w-full  px-4 py-2 text-sm font-medium text-gray-700" onclick="toggleDropdown('shopDropdown')">
                            Cửa hàng
                            <i class="fa-solid fa-caret-down -mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20"></i>
                        </button>
                    </div>

                    <!-- Dropdown Menu for Shop -->
                    <div id="shopDropdown" style="z-index: 1200" class="hidden absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none">
                        @foreach ($result_category as $category )
                        <a href="{{ route('product.showProducts', $category['id']) }}" class="block  py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <div class="py-1 flex justify-between px-3 items-center">
                         
                                
                                  
                       
                            {{$category['name']}}
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 4L16 12L8 20" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                        </div>
                    </a>
                        @endforeach
                      
                    </div>
                </div>

                <a href="#" class="text-gray-700 hover:text-gray-900 font-medium">Bộ sưu tập</a>
                <a href="{{ route('favorite.product') }}" class="text-gray-700 hover:text-gray-900 font-medium">Sản phẩm yêu thích</a>
                <a href="#" class="text-gray-700 hover:text-gray-900 font-medium">Gợi ý outfit</a>
            </div>

            <!-- Search Bar -->
            <div class="relative w-1/2 max-w-lg">
                <form action="/search" method="GET"> <!-- Thêm method GET để gửi yêu cầu tìm kiếm -->
                  <input type="text" name="query" placeholder="Nhập từ khoá tìm kiếm" class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                  <button type="submit" class="absolute inset-y-0 right-4 flex items-center text-gray-500 hover:text-gray-700"> <!-- Đặt class cho nút để nó có thể nhấn được -->
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </button>
                </form>
              </div>
              

            <!-- Right Icons -->
            <!-- Right Icons -->
<div class="flex items-center space-x-7 relative">
    <!-- Notification Icon -->
    <a href="#" class="text-gray-500 hover:text-gray-900 flex items-center">
        <i class="fa-solid fa-bell" style="font-size: 21px;"></i>
    </a>

    <!-- Cart Icon -->
    @if(Auth::check())
        <a href="{{ route('cart') }}" class="text-gray-500 hover:text-gray-900 flex items-center">
            <i class="fa-solid fa-cart-shopping" style="font-size: 21px;"></i>
        </a>
    @else
        <a href="#" onclick="alert('Vui lòng đăng nhập để xem giỏ hàng!')" class="text-gray-500 hover:text-gray-900 flex items-center">
            <i class="fa-solid fa-cart-shopping" style="font-size: 21px;"></i>
        </a>
    @endif

    <!-- User Icon with Dropdown -->
    <div class="inline-block text-left">
        <div>
            
            <button class="hover:text-gray-900 inline-flex justify-center items-center py-2 text-sm font-medium text-gray-500" onclick="toggleDropdown('userDropdown')">
            @if (Auth::User())
                
            
            <img
            className="inline-block h-6 w-6 rounded-full ring-2 ring-white " style="width: 25px;height: 25px;;border-radius: 50%"
            src="{{Auth::User()->avatar}}"
            alt=""
          />
            @else
            <i class="fa-solid fa-user" style="font-size: 21px;"></i>
            @endif
                
            </button>
        </div>

        <!-- User Dropdown Menu -->
        <div id="userDropdown" class="hidden absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none">
         @if (Auth::User())
         <div class="py-1">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Hồ Sơ</a>
        </div>
        <div class="py-1">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Lịch sử mua hàng</a>
        </div>
        <div class="py-1">
            <a href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Đăng xuất</a>
        </div>
         @else
         
          <div class="py-1">
              <a href="/register" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Đăng ký</a>
          </div>
          <div class="py-1">
              <a href="/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Đăng nhập</a>
          </div>
         @endif
        </div>
    </div> 
   
</div>

        </div>
    </div>
</nav>

<script src="https://kit.fontawesome.com/e7db34f14d.js" crossorigin="anonymous"></script>
<script>
    function toggleDropdown(dropdownId) {
        const dropdownMenu = document.getElementById(dropdownId);
        dropdownMenu.classList.toggle('hidden');
    }

    // Close dropdowns if clicking outside
    window.addEventListener('click', function(event) {
        const dropdownMenus = document.querySelectorAll('.absolute');
        dropdownMenus.forEach(menu => {
            const button = menu.previousElementSibling;
            if (!button.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    });
</script>
