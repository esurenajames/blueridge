<div class="fixed left-0 top-0 w-64 h-full bg-[#f8f4f3] p-4 z-50 sidebar-menu transition-transform">
    <h2 class="font-bold py-3">Barangay Blue Ridge</h2>
    </a>
    <ul class="mt-4">
        <span class="text-gray-400 font-bold">Home</span>
        <li class="mb-1 group">
            <a href="{{ route('main') }}" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-home-2-line mr-3 text-lg"></i>
                <span class="text-sm">Home</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                <i class='bx bx-news mr-3 text-lg'></i>                
                <span class="text-sm">Forms</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                <li class="mb-4">
                    <a href="{{ route('view-all') }}" class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] pl-4">View All</a>
                </li>
                <li class="mb-4">
                    <a href="" class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] pl-4">Quotation</a>
                </li>
                <li class="mb-4">
                    <a href="" class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] pl-4"> Purchase Request</a>
                </li>
                <li class="mb-4">
                    <a href="" class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] pl-4">Purchase Order</a>
                </li>
                <li class="mb-4">
                    <a href="" class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] pl-4">Declined</a>
                </li>  
                <li class="mb-4">
                    <a href="" class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] pl-4">History</a>
                </li>  
            </ul>
        </li>
        <li class="mb-1 group">
            <a href="{{ route('forms') }}" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='bx bx-list-ul mr-3 text-lg'></i>                
                <span class="text-sm">Request Form</span>
            </a>
        </li>
        <span class="text-gray-400 font-bold">PERSONAL</span>
        <li class="mb-1 group">
            <a href="{{ route('notifications') }}" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='bx bx-bell mr-3 text-lg' ></i>                
                <span class="text-sm">Notifications</span>
                <span class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-600 bg-red-200 rounded-full">5</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="{{ route('settings') }}" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='bx bx-cog mr-3 text-lg'></i>                
                <span class="text-sm">Settings</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="{{ route('login') }}" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='bx bx-log-out-circle mr-3 text-lg'></i>                
                <span class="text-sm">Logout</span>
            </a>
        </li>
    </ul>
</div>

