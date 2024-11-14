<!-- Top Header Bar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<link rel="stylesheet" href="/css/detail/form_size.css">
<header class="bg-black text-white py-2">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6">
        <div>
            <a href="#" class="flex items-center space-x-2 hover:text-gray-300 transition duration-150">
                <i class="fa-solid fa-house text-lg"></i>
                <span class="font-medium">Street Fashion</span>
            </a>
        </div>
        <div class="flex items-center space-x-4 text-sm">
            <span class="flex items-center">
                <i class="fa-solid fa-phone mr-2"></i>
                Hotline: 0906.880.960
            </span>
            <span class="text-gray-400">•</span>
            <a href="#" class="hover:text-gray-300 transition duration-150">Hỗ trợ trực tuyến</a>
        </div>
    </div>
</header>

<!-- Main Navigation -->
<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="hover:opacity-80 transition duration-150">
                    <img class="w-24" src="/img/logo.png" alt="Street Fashion Logo">
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="flex items-center space-x-10 relative">
                

                <div class="inline-block text-left">
                    <button class="flex items-center space-x-1 px-4 py-2 text-sm font-medium text-gray-700 hover:text-black transition duration-150 border-b-2 border-transparent hover:border-black" onclick="toggleDropdown('shopDropdown')">
                        <span>Cửa hàng</span>
                        <i class="fa-solid fa-caret-down text-gray-400"></i>
                    </button>

                    <!-- Dropdown Menu for Shop -->
                    <div id="shopDropdown" class="hidden absolute right-0 mt-2 w-56 rounded-lg shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" style="z-index: 1200">
                        @foreach ($result_category as $category)
                        <a href="{{ route('product.showProducts', $category['id']) }}" class="block hover:bg-gray-50 transition duration-150">
                            <div class="px-4 py-3 flex justify-between items-center">
                                <span class="text-sm text-gray-800">{{$category['name']}}</span>
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 4L16 12L8 20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

                
                <a href="{{ route('favorite.product') }}" class="text-gray-700 hover:text-gray-900 font-medium transition duration-150 border-b-2 border-transparent hover:border-black">Sản phẩm yêu thích</a>
                <a href="{{ route('size.selection') }}" class="text-gray-700 hover:text-black font-medium transition duration-150 border-b-2 border-transparent hover:border-black">Gợi ý outfit</a>
        </div>

            <!-- Search Bar -->
            <div class="relative w-1/2 max-w-lg">
                <form action="/search" method="GET" class="relative">
                    <input type="text" 
                           name="query" 
                           placeholder="Nhập từ khoá tìm kiếm" 
                           class="w-full py-2.5 px-5 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent transition duration-150"
                    >
                    <button type="submit" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition duration-150">
                        <i class="fa-solid fa-magnifying-glass text-lg"></i>
                    </button>
                </form>
            </div>

            <!-- Right Icons -->
            <div class="flex items-center space-x-8 relative">
                <!-- Notification Icon -->
                <a href="#" class="text-gray-500 hover:text-gray-700 transition duration-150 border-b-2 border-transparent hover:border-black">
                    <i class="fa-solid fa-bell text-xl"></i>
                </a>

                <!-- Cart Icon -->
                <a href="{{ route('cart') }}" class="text-gray-500 hover:text-gray-700 transition duration-150 border-b-2 border-transparent hover:border-black">
                    <i class="fa-solid fa-cart-shopping text-xl"></i>
                </a>

                <!-- User Icon with Dropdown -->
                <div class="inline-block text-left relative">
                    <button class="hover:text-gray-700 inline-flex items-center py-2 text-gray-500 transition duration-150 border-b-2 border-transparent hover:border-black" onclick="toggleDropdown('userDropdown')">
                        @if (Auth::User())
                            <img src="{{Auth::User()->avatar}}" 
                                 alt="User avatar" 
                                 class="w-8 h-8 rounded-full ring-2 ring-gray-200 object-cover"
                            >
                        @else
                            <i class="fa-solid fa-user text-xl"></i>
                        @endif
                    </button>

                    <!-- User Dropdown Menu -->
                    <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 rounded-lg shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" style="z-index: 9999;">
                        @if (Auth::User())
                            <div class="py-1">
                                <a href="{{ route('profile') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition duration-150">Hồ Sơ</a>
                            </div>
                            <div class="py-1">
                                <a href="{{ route('purchase.history') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition duration-150">Lịch sử mua hàng</a>
                            </div>
                            <div class="py-1">
                                <a href="/logout" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition duration-150">Đăng xuất</a>
                            </div>
                        @else
                            <div class="py-1">
                                <a href="/register" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition duration-150">Đăng ký</a>
                            </div>
                            <div class="py-1">
                                <a href="/login" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition duration-150">Đăng nhập</a>
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
