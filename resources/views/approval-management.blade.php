<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

@vite('resources/css/main.css', 'resources/js/app.js')
<title>Admin Panel</title>

<body class="bg-gray-200">
    <!--sidenav -->
      @livewire('sidebar-secretary')

        <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
        <!-- end sidenav -->

        <div class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
            <!-- navbar -->
            @livewire('navbar')
            <!-- end navbar -->

            <div class="ml-5 mr-5">
                <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Approval Management</h2>
                <ol class="list-none p-0 inline-flex space-x-2 ml-6 ">
                    <li class="flex items-center">
                        <svg onclick="window.location.href='/';" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" class="cursor-pointer hover:fill-blue-500 transition-colors duration-300" fill="#4b5563">
                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                        </svg>
                        <span class="mx-2">/</span>
                    </li>
                    <li class="flex items-center">
                        <span class="text-gray-800">Approval Management</span>
                    </li>
                </ol>

                <div class="bg-white mt-8 mb-4 sm:rounded-lg ml-5 mr-5 pt-2 pr-3 pb-4 shadow-md">
                <div class="mt-6 ml-5 mr-5" x-data="{ activeTab: '{{ $activeTab }}' }">
                <div class="max-w-screen-full border-b border-gray-200 dark:border-neutral-300">
                    <ul class="flex font-sans relative justify-start">
                        <li :class="activeTab === 'Pending Request' ? 'text-blue-600 font-bold border-b-2 border-blue-500' : 'text-gray-600 font-bold'" 
                            class="flex items-center min-w-36 whitespace-nowrap text-[15px] py-3 px-4 cursor-pointer transition-all relative z-10" 
                            @click="activeTab = 'Pending Request'">
                            Pending Request 
                            <span class="ml-2 bg-gray-300 text-black rounded-full w-6 h-6 flex items-center justify-center text-[12px]">{{ $pendingCount }}</span>
                        </li>
                        <li :class="activeTab === 'Returned' ? 'text-blue-600 font-bold border-b-2 border-blue-500' : 'text-gray-600 font-bold'" 
                            class="flex items-center min-w-36 whitespace-nowrap text-[15px] py-3 px-4 cursor-pointer transition-all relative z-10" 
                            @click="activeTab = 'Returned'">
                            Returned 
                            <span class="ml-2 bg-gray-300 text-black rounded-full w-6 h-6 flex items-center justify-center text-[12px]">{{ $returnCount }}</span>
                        </li>
                        <li :class="activeTab === 'History' ? 'text-blue-600 font-bold border-b-2 border-blue-500' : 'text-gray-600 font-bold'" 
                            class="flex items-center min-w-36 whitespace-nowrap text-[15px] py-3 px-4 cursor-pointer transition-all relative z-10" 
                            @click="activeTab = 'History'">
                            History 
                            <span class="ml-2 bg-gray-300 text-black rounded-full w-6 h-6 flex items-center justify-center text-[12px]">{{ $historyCount }}</span>
                        </li>
                    </ul>
                </div>
            
                <!-- Content Div -->
                <div class="max-w-screen-max ">
                    <!-- Sample Content -->
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center">
                            <input type="text" class="block mr-2 px-4 py-2 border-gray-300 rounded-md border bg-white text-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Search">
                            <select class="block mr-2 px-4 py-2 border border-gray-300 rounded-md text-gray-600 bg-white focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled class="text-md">Select Type of Request</option>
                                <option value="type" class="text-md">View All</option>
                                <option value="type" class="text-md">Punong Barangay's Certification</option>
                                <option value="date" class="text-md">Request Form</option>
                                <option value="approver" class="text-md">Petty Cash</option>
                            </select>
                        </div>
                        <div class="flex items-center">
                            <span class="text-md mr-2 text-gray-600">Show entries:</span>
                            <form action="{{ route('/approval-management') }}" method="GET" class="flex items-center m-0 p-0">
                                <select name="perPage" onchange="this.form.submit()" class="block px-4 py-2 border rounded-md text-gray-600 bg-white text-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                                    <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
                                    <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                                    <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                                </select>
                            </form>
                        </div>
                    </div>
        
                    <div x-show="activeTab === 'Pending Request'">
                        <div class="overflow-x-auto mt-4 rounded-md">
                            <table class="min-w-full divide-y divide-gray-400">
                                <tbody class="divide-y divide-gray-300">
                                    @foreach($pendingRequests as $request)
                                        <tr class="bg-white hover:bg-gray-100 cursor-pointer" 
                                            @click="window.location.href = '{{ route('request-approval', ['id' => $request->id]) }}'">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center space-x-2">
                                                    @if($request->requestor)
                                                        <img src="{{ $request->requestor->profile_picture ? asset('storage/' . $request->requestor->profile_picture) : 'https://covington.va.us/wp-content/uploads/2022/03/profile-placeholder-image-gray-silhouette-no-photo-person-avatar-default-pic-used-web-design-173997790.jpg' }}"  
                                                            alt="{{ $request->requestor->fname }}"
                                                            class="w-8 h-8 rounded-full">
                                                        <p class="text-md font-semibold">{{ $request->requestor->fname }} {{ $request->requestor->lname }}</p>
                                                    @else
                                                        <img src="{{ asset('default-profile-picture.png') }}" 
                                                            alt="Default Profile Picture" 
                                                            class="w-8 h-8 rounded-full">
                                                        <p class="text-md font-semibold">Unknown Requestor</p>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <p class="text-gray-700 font-semibold">{{ $request->request_name }}</p>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <p class="text-gray-600">{{ Str::limit($request->request_description, 100, '...') }}</p>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <p class="text-gray-600">Steps {{ $request->steps }}/4</p>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                                <p class="text-sm font-bold text-gray-500">{{ $request->created_at->format('M d, Y') }}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div x-show="activeTab === 'Returned'">
                        <div class="overflow-x-auto mt-4 rounded-md">
                            <table class="min-w-full divide-y divide-gray-400">
                                <tbody class="divide-y divide-gray-300">
                                    @foreach($returnRequests as $request)
                                        <tr class="bg-white hover:bg-gray-100 cursor-pointer" 
                                            @click="window.location.href = '{{ route('request-approval', ['id' => $request->id]) }}'">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center space-x-2">
                                                    <img src="{{ $request->requestor->profile_picture ? asset('storage/' . $request->requestor->profile_picture) : 'https://covington.va.us/wp-content/uploads/2022/03/profile-placeholder-image-gray-silhouette-no-photo-person-avatar-default-pic-used-web-design-173997790.jpg' }}"  
                                                    alt="{{ $request->requestor->fname }}"
                                                    class="w-8 h-8 rounded-full">
                                                    <p class="text-md font-semibold">{{ $request->requestor->fname }} {{ $request->requestor->lname }}</p>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <p class="text-gray-700 font-semibold">{{ $request->request_name }}</p>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <p class="text-gray-600">{{ Str::limit($request->request_description, 100, '...') }}</p>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <p class="text-gray-600">Steps {{ $request->steps }}/4</p>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                                <p class="text-sm font-bold text-gray-500">{{ $request->created_at->format('M d, Y') }}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div x-show="activeTab === 'History'">
                        <div class="overflow-x-auto mt-4 rounded-md">
                            <table class="min-w-full divide-y divide-gray-400">
                                <tbody class="divide-y divide-gray-300">
                                    @foreach($historyRequests as $request)
                                        <tr class="bg-white hover:bg-gray-100 cursor-pointer" 
                                            @click="window.location.href = '{{ route('request-approval', ['id' => $request->id]) }}'">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center space-x-2">
                                                    <img src="{{ $request->requestor->profile_picture ? asset('storage/' . $request->requestor->profile_picture) : 'https://covington.va.us/wp-content/uploads/2022/03/profile-placeholder-image-gray-silhouette-no-photo-person-avatar-default-pic-used-web-design-173997790.jpg' }}"  
                                                    alt="{{ $request->requestor->fname }}"
                                                    class="w-8 h-8 rounded-full">
                                                    <p class="text-md font-semibold">{{ $request->requestor->fname }} {{ $request->requestor->lname }}</p>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <p class="text-gray-700 font-semibold">{{ $request->request_name }}</p>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <p class="text-gray-600">{{ Str::limit($request->request_description, 100, '...') }}</p>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <p class="text-gray-600">Steps {{ $request->steps }}/4</p>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                                <p class="text-sm font-bold text-gray-500">{{ $request->created_at->format('M d, Y') }}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="items-center mt-2">
                        <!-- Help text -->
                        <div class="max-w-screen-max ">
                            <!-- Content for Pending Requests -->
                            <div x-show="activeTab === 'Pending Request'" class="flex items-center justify-between mt-2">
                                <span class="text-md mb-2 mt-2 text-gray-700 dark:text-gray-400">
                                    Showing <span class="font-semibold text-gray-500">{{ $pendingRequests->firstItem() }}</span> to <span class="font-semibold text-gray-500">{{ $pendingRequests->lastItem() }}</span> of <span class="font-semibold text-gray-500">{{ $pendingRequests->total() }}</span> Entries
                                </span>
                                <!-- Pagination for Pending Requests -->
                                <nav aria-label="Page navigation example">
                                    <ul class="flex items-center -space-x-px h-10 text-base mb-2 mt-2">
                                        <!-- Previous Link -->
                                        @if ($pendingRequests->onFirstPage())
                                            <li aria-disabled="true">
                                                <span class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white dark:bg-gray-800 dark:border-gray-700">
                                                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                                    </svg>
                                                </span>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ $pendingRequests->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                                    </svg>
                                                </a>
                                            </li>
                                        @endif
                    
                                        <!-- Page Numbers -->
                                        @foreach ($pendingRequests->links()->elements[0] as $page => $url)
                                            <li>
                                                <a href="{{ $url }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                    {{ $page }}
                                                </a>
                                            </li>
                                        @endforeach
                    
                                        <!-- Next Link -->
                                        <li>
                                            <a href="{{ $pendingRequests->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 leading-tight dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                    
                            <!-- Content for Returned Requests -->
                            <div x-show="activeTab === 'Returned'" class="flex items-center justify-between mt-2">
                                <span class="text-md mb-2 mt-2 text-gray-700 dark:text-gray-400">
                                    Showing <span class="font-semibold text-gray-500">{{ $returnRequests->firstItem() }}</span> to <span class="font-semibold text-gray-500">{{ $returnRequests->lastItem() }}</span> of <span class="font-semibold text-gray-500">{{ $returnRequests->total() }}</span> Entries
                                </span>
                                <!-- Pagination for In Progress Requests -->
                                <nav aria-label="Page navigation example">
                                    <ul class="flex items-center -space-x-px h-10 text-base mb-2 mt-2">
                                        <!-- Previous Link -->
                                        @if ($returnRequests->onFirstPage())
                                            <li aria-disabled="true">
                                                <span class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white dark:bg-gray-800 dark:border-gray-700">
                                                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                                    </svg>
                                                </span>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ $returnRequests->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                                    </svg>
                                                </a>
                                            </li>
                                        @endif
                    
                                        <!-- Page Numbers -->
                                        @foreach ($returnRequests->links()->elements[0] as $page => $url)
                                            <li>
                                                <a href="{{ $url }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                    {{ $page }}
                                                </a>
                                            </li>
                                        @endforeach
                    
                                        <!-- Next Link -->
                                        <li>
                                            <a href="{{ $returnRequests->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 leading-tight dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                    
                            <!-- Content for History Requests -->
                            <div x-show="activeTab === 'History'" class="flex items-center justify-between mt-2">
                                <span class="text-md mb-2 mt-2 text-gray-700 dark:text-gray-400">
                                    Showing <span class="font-semibold text-gray-500">{{ $historyRequests->firstItem() }}</span> to <span class="font-semibold text-gray-500">{{ $historyRequests->lastItem() }}</span> of <span class="font-semibold text-gray-500">{{ $historyRequests->total() }}</span> Entries
                                </span>
                                <!-- Pagination for History Requests -->
                                <nav aria-label="Page navigation example">
                                    <ul class="flex items-center -space-x-px h-10 text-base mb-2 mt-2">
                                        <!-- Previous Link -->
                                        @if ($historyRequests->onFirstPage())
                                            <li aria-disabled="true">
                                                <span class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white dark:bg-gray-800 dark:border-gray-700">
                                                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                                    </svg>
                                                </span>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ $historyRequests->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                                    </svg>
                                                </a>
                                            </li>
                                        @endif
                    
                                        <!-- Page Numbers -->
                                        @foreach ($historyRequests->links()->elements[0] as $page => $url)
                                            <li>
                                                <a href="{{ $url }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                    {{ $page }}
                                                </a>
                                            </li>
                                        @endforeach
                    
                                        <!-- Next Link -->
                                        <li>
                                            <a href="{{ $historyRequests->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 leading-tight dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        
     
     
   </body>
      <!-- End Content -->
    </main>


   <script src="https://unpkg.com/@popperjs/core@2"></script>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script>
         
   // start: Sidebar
   const sidebarToggle = document.querySelector('.sidebar-toggle')
   const sidebarOverlay = document.querySelector('.sidebar-overlay')
   const sidebarMenu = document.querySelector('.sidebar-menu')
   const main = document.querySelector('.main')
   sidebarToggle.addEventListener('click', function (e) {
      e.preventDefault()
      main.classList.toggle('active')
      sidebarOverlay.classList.toggle('hidden')
      sidebarMenu.classList.toggle('-translate-x-full')
   })
   sidebarOverlay.addEventListener('click', function (e) {
      e.preventDefault()
      main.classList.add('active')
      sidebarOverlay.classList.add('hidden')
      sidebarMenu.classList.add('-translate-x-full')
   })
   document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (item) {
      item.addEventListener('click', function (e) {
         e.preventDefault()
         const parent = item.closest('.group')
         if (parent.classList.contains('selected')) {
               parent.classList.remove('selected')
         } else {
               document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (i) {
                  i.closest('.group').classList.remove('selected')
               })
               parent.classList.add('selected')
         }
      })
   })
   // end: Sidebar

   // start: Popper
   const popperInstance = {}
   document.querySelectorAll('.dropdown').forEach(function (item, index) {
      const popperId = 'popper-' + index
      const toggle = item.querySelector('.dropdown-toggle')
      const menu = item.querySelector('.dropdown-menu')
      menu.dataset.popperId = popperId
      popperInstance[popperId] = Popper.createPopper(toggle, menu, {
         modifiers: [
               {
                  name: 'offset',
                  options: {
                     offset: [0, 8],
                  },
               },
               {
                  name: 'preventOverflow',
                  options: {
                     padding: 24,
                  },
               },
         ],
         placement: 'bottom-end'
      });
   })
   document.addEventListener('click', function (e) {
      const toggle = e.target.closest('.dropdown-toggle')
      const menu = e.target.closest('.dropdown-menu')
      if (toggle) {
         const menuEl = toggle.closest('.dropdown').querySelector('.dropdown-menu')
         const popperId = menuEl.dataset.popperId
         if (menuEl.classList.contains('hidden')) {
               hideDropdown()
               menuEl.classList.remove('hidden')
               showPopper(popperId)
         } else {
               menuEl.classList.add('hidden')
               hidePopper(popperId)
         }
      } else if (!menu) {
         hideDropdown()
      }
   })

   function hideDropdown() {
      document.querySelectorAll('.dropdown-menu').forEach(function (item) {
         item.classList.add('hidden')
      })
   }
   function showPopper(popperId) {
      popperInstance[popperId].setOptions(function (options) {
         return {
               ...options,
               modifiers: [
                  ...options.modifiers,
                  { name: 'eventListeners', enabled: true },
               ],
         }
      });
      popperInstance[popperId].update();
   }
   function hidePopper(popperId) {
      popperInstance[popperId].setOptions(function (options) {
         return {
               ...options,
               modifiers: [
                  ...options.modifiers,
                  { name: 'eventListeners', enabled: false },
               ],
         }
      });
   }

   
   // start: Tab
   document.querySelectorAll('[data-tab]').forEach(function (item) {
      item.addEventListener('click', function (e) {
            e.preventDefault()
            const tab = item.dataset.tab
            const page = item.dataset.tabPage
            const target = document.querySelector('[data-tab-for="' + tab + '"][data-page="' + page + '"]')
            document.querySelectorAll('[data-tab="' + tab + '"]').forEach(function (i) {
               i.classList.remove('active')
            })
            document.querySelectorAll('[data-tab-for="' + tab + '"]').forEach(function (i) {
               i.classList.add('hidden')
            })
            item.classList.add('active')
            target.classList.remove('hidden')
      })
   })
   // end: Tab

   </script>
</body>
