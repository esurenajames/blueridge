<div>
@livewireScripts
<div class="py-2 px-6 bg-[#f8f4f3] flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">   

    <button type="button" class="text-lg text-gray-900 font-semibold sidebar-toggle">
        <i class="ri-menu-line"></i>
    </button>


    <ul class="ml-auto flex items-center ">

        <li class="dropdown">
            <button type="button" id="notification-bell"
                class="dropdown-toggle text-gray-400 mr-4 w-8 h-8 rounded flex items-center justify-center hover:text-gray-600 relative"
                wire:click="toggleDropdownAndMarkAsRead">
                @if($unreadCount > 0)
                    <span class="absolute top-0 right-0 transform translate-x-1 -translate-y-1 bg-red-500 text-white rounded-full px-2 text-[12px] notification-badge">
                        {{ $unreadCount }}
                    </span>
                @endif
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24" style="fill: gray;">
                    <path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z"></path>
                </svg>
            </button>
            
            <!-- Notification dropdown -->
            <div class="dropdown-menu shadow-md shadow-black/5 z-30 {{ $dropdownVisible ? 'block' : 'hidden' }} max-w-sm w-full bg-white rounded-md border border-gray-300" wire:ignore>
                <div class="flex items-center px-4 pt-4 border-b border-b-gray-100 notification-tab">
                    <button type="button" data-tab="notification" data-tab-page="notifications" class="text-gray-400 font-medium text-[14px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1 active">
                        Notifications
                    </button>
                </div>
                <div class="my-2">
                    <ul class="max-h-74 overflow-y-auto" data-tab-for="notification" data-page="notifications">
                        @foreach($notifications as $notification)
                            <li>
                                <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                    <div class="ml-2">
                                        <div class="text-[14px] text-gray-600 font-medium line-clamp-2 group-hover:text-blue-500">{{ $notification->message }}</div>
                                        <div class="text-[12px] text-gray-400">{{ $notification->created_at->diffForHumans() }}</div>
                                    </div>                                    
                                </a>
                            </li>
                        @endforeach
                        <div class="flex justify-center py-1">
                            <a href="/notifications" class="text-gray-600 text-[14px] hover:text-black">View All</a>
                        </div>
                    </ul>
                </div>
            </div>
        </li>
        

        
        <button id="fullscreen-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24" style="fill: gray;transform: ;msFilter:;"><path d="M5 5h5V3H3v7h2zm5 14H5v-5H3v7h7zm11-5h-2v5h-5v2h7zm-2-4h2V3h-7v2h5z"></path></svg>
        </button>
        <script>
            const fullscreenButton = document.getElementById('fullscreen-button');
        
            fullscreenButton.addEventListener('click', toggleFullscreen);
        
            function toggleFullscreen() {
                if (document.fullscreenElement) {
                    // If already in fullscreen, exit fullscreen
                    document.exitFullscreen();
                } else {
                    // If not in fullscreen, request fullscreen
                    document.documentElement.requestFullscreen();
                }
            }
        </script>

        <li class="dropdown ml-3">
            <button type="button" class="dropdown-toggle flex items-center">
                <div class="flex-shrink-0 w-10 h-10 relative">
                    <div class="p-1 bg-white rounded-full focus:outline-none focus:ring">
                        <img class="w-9 h-9 rounded-full" src="{{ Auth::user()->profile_picture ? Storage::url(Auth::user()->profile_picture) : 'https://covington.va.us/wp-content/uploads/2022/03/profile-placeholder-image-gray-silhouette-no-photo-person-avatar-default-pic-used-web-design-173997790.jpg' }}" alt="{{ $user->fname }}"/>
                        <div class="top-0 left-7 absolute w-3 h-3 bg-lime-400 border-2 border-white rounded-full animate-ping"></div>
                        <div class="top-0 left-7 absolute w-3 h-3 bg-lime-500 border-2 border-white rounded-full"></div>
                    </div>
                </div>
                <div class="p-2 md:block text-left">
                    <h2 class="text-[18px] font-semibold text-gray-800">{{ $user->fname }} {{ $user->lname }}</h2>
                    <p class="text-[14px] text-gray-500">{{ $user->profession }}</p>
                </div>                
            </button>
            <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-300 w-full max-w-[140px]">
                <li>
                    <a href="{{ route('settings') }}" class="flex items-center text-[16px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Profile</a>
                </li>
                <li>
                    <a href="{{ route('settings') }}" class="flex items-center text-[16px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Settings</a>
                </li>
                <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a role="menuitem" class="flex items-center text-[16px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50 cursor-pointer"
                        onclick="event.preventDefault(); 
                        document.getElementById('logout-form').submit();">
                        Log Out
                    </a>
                </form>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                </li>
            </ul>
        </li>
    </ul>
</div>

</div>
