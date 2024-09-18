<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

@vite('resources/css/main.css', 'resources/js/app.js')
<title>Form Request List</title>

<body class="mb-5 bg-gray-200">
    <!--sidenav -->
      @livewire('sidebar-secretary')
      <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <!-- navbar -->
        @livewire('navbar')
        <!-- end navbar -->

      <!-- Content -->
       
        
      <div class="ml-5 mr-5">
        <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Form Request List</h2>
        <ol class="list-none p-0 inline-flex space-x-2 ml-6 ">
            <li class="flex items-center">
            <svg onclick="window.location.href='/';" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" class="cursor-pointer hover:fill-blue-500 transition-colors duration-300" fill="#4b5563"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>        <span class="mx-2">/</span>
            </li>
            <li class="flex items-center">
                <span class="text-gray-800">Form Request List</span>
            </li>
        </ol>
    </div> 

    <div class="mb-4 mt-10" 
    x-data="{
        showConfirmationModal: false,
        showViewDetailsModal: false,
        showEditDetailsModal: false,
        requestDetails: {},
        requestToDeleteId: null, // Define this here

        openViewDetailsModal(requestId) {
            // Fetch request details from the server
            fetch(`/api/requests/${requestId}`)
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        this.requestDetails = result.data;
                        this.showViewDetailsModal = true;
                    } else {
                        alert(result.message);
                    }
                })
                .catch(error => console.error('Error fetching request details:', error));
        },
        
        openEditDetailsModal(requestId) {
            // Fetch request details and show edit modal
            fetch(`/api/requests/${requestId}`)
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        this.requestDetails = result.data;
                        this.showEditDetailsModal = true;
                    } else {
                        alert(result.message);
                    }
                })
                .catch(error => console.error('Error fetching request details:', error));
        },
    }" x-cloak>
    
        <div class="w-9/12 mx-auto mb-2 max-w-screen-xl">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="text" class="block mr-2 px-4 py-2 rounded-md border bg-white text-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Search">
                    <select class="block mr-2 px-4 py-2 border border-white rounded-md text-gray-600 bg-white focus:outline-none focus:ring-blue-500 focus:border-blue-500" >
                        <option value="" disabled class="text-md ">Select Type of Request</option>
                        <option value="type" class="text-md ">View All</option>
                        <option value="type" class="text-md ">Punong Barangay's Certification</option>
                        <option value="date" class="text-md ">Request Form</option>
                        <option value="approver" class="text-md ">Petty Cash</option>
                    </select>
                </div>
                <div class="flex items-center">
                    <span class="text-md mr-2 text-gray-600">Show entries:</span>
                    <form action="{{ route('requests.index') }}" method="GET" class="flex items-center m-0 p-0">
                        <select name="per_page" onchange="this.form.submit()" class="block px-4 py-2 border rounded-md text-gray-600 bg-white text-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10</option>
                            <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>20</option>
                            <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page') == '100' ? 'selected' : '' }}>100</option>
                        </select>
                    </form>
                </div>                
            </div>
        </div>
        <div class="w-9/12 min-w-80 mx-auto max-w-screen-xl">
            <div class="overflow-x-auto rounded-md">
                <table class="bg-white font-[sans-serif] rounded-md">
                    <thead class="bg-gray-800 whitespace-nowrap">
                        <tr>
                            <th class="pl-6 w-8">
                                <input id="checkbox" type="checkbox" class="hidden peer" />
                                <label for="checkbox" class="relative flex items-center justify-center p-0.5 peer-checked:before:hidden before:block before:absolute before:w-full before:h-full before:bg-white w-5 h-5 cursor-pointer bg-blue-500 border border-gray-400 rounded overflow-hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-full fill-white" viewBox="0 0 520 520">
                                        <path
                                            d="M79.423 240.755a47.529 47.529 0 0 0-36.737 77.522l120.73 147.894a43.136 43.136 0 0 0 36.066 16.009c14.654-.787 27.884-8.626 36.319-21.515L486.588 56.773a6.13 6.13 0 0 1 .128-.2c2.353-3.613 1.59-10.773-3.267-15.271a13.321 13.321 0 0 0-19.362 1.343q-.135.166-.278.327L210.887 328.736a10.961 10.961 0 0 1-15.585.843l-83.94-76.386a47.319 47.319 0 0 0-31.939-12.438z"
                                            data-name="7-Check" data-original="#000000" />
                                    </svg>
                                </label>
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                Name of Requestor
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                Type of Request
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                Name of Request
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                Date
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                Last Approved by
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                Completion
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="whitespace-nowrap">
                        @foreach($requests as $request)
                            <tr class="even:bg-blue-50">
                                <td class="pl-6 w-8">
                                    <input id="checkbox{{ $request->id }}" type="checkbox" class="hidden peer" />
                                    <label for="checkbox{{ $request->id }}" class="relative flex items-center justify-center p-0.5 peer-checked:before:hidden before:block before:absolute before:w-full before:h-full before:bg-white w-5 h-5 cursor-pointer bg-blue-500 border border-gray-400 rounded overflow-hidden">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-full fill-white" viewBox="0 0 520 520">
                                            <path
                                                d="M79.423 240.755a47.529 47.529 0 0 0-36.737 77.522l120.73 147.894a43.136 43.136 0 0 0 36.066 16.009c14.654-.787 27.884-8.626 36.319-21.515L486.588 56.773a6.13 6.13 0 0 1 .128-.2c2.353-3.613 1.59-10.773-3.267-15.271a13.321 13.321 0 0 0-19.362 1.343q-.135.166-.278.327L210.887 328.736a10.961 10.961 0 0 1-15.585.843l-83.94-76.386a47.319 47.319 0 0 0-31.939-12.438z"
                                                data-name="7-Check" data-original="#000000" />
                                        </svg>
                                    </label>
                                </td>
                                <td class="px-6 py-4 text-sm"> 
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10 relative">
                                            <div class="p-1 bg-white rounded-full focus:outline-none focus:ring">
                                                @if($request->requestor)
                                                    <img class="w-8 h-8 rounded-full" 
                                                        src="{{ $request->requestor->profile_picture ? asset('storage/' . $request->requestor->profile_picture) : asset('default-profile-picture.png') }}" 
                                                        alt="{{ $request->requestor->fname ? $request->requestor->fname : 'Unknown' }} {{ $request->requestor->lname ? $request->requestor->lname : 'Requestor' }}"/>
                                                @else
                                                    <img class="w-8 h-8 rounded-full" 
                                                        src="{{ asset('default-profile-picture.png') }}" 
                                                        alt="Default Profile Picture"/>
                                                @endif
                                            </div>
                                        </div>
                                        <span class="ml-2">{{ $request->requestor->fname }} {{ $request->requestor->lname }}</span>
                                    </div>
                                </td>                            
                                <td class="px-6 py-4 text-sm">
                                    @if($request->request_type == 1)
                                        Punong Barangay's Certification Form
                                    @elseif($request->request_type == 2)
                                        Request Form
                                    @elseif($request->request_type == 3)
                                        Fetty Cash Voucher
                                    @else
                                        Unknown Request Type
                                    @endif
                                </td>                                
                                <td class="px-6 py-4 text-sm">{{ $request->request_name }}</td>
                                <td class="px-6 py-4 text-sm">{{ $request->created_at->format('m/d/Y') }}</td>
                                <td class="px-6 py-4 text-sm">{{ $request->last_approved_by }}</td>
                                <td class="px-6 py-4">
                                    <div class="w-48 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="bg-blue-600 h-3 rounded-full" style="width: {{ $request->completion_percentage }}%;"></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                        <button class="mr-4" title="Edit" @click="openEditDetailsModal({{ $request->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-blue-500 hover:fill-blue-700" viewBox="0 0 348.882 348.882">
                                                <path d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z" data-original="#000000" />
                                                <path d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z" data-original="#000000" />
                                            </svg>
                                        </button>
                                        <button class="mr-4" title="View Details" @click="openViewDetailsModal({{ $request->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-6 fill-green-500 hover:fill-green-700" viewBox="0 0 24 24">
                                                <path d="M12 7c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4m0 6c-1.1 0-2-0.9-2-2s0.9-2 2-2 2 0.9 2 2-0.9 2-2 2m0-8c7.7 0 14 6.3 14 14 0 1.1-0.9 2-2 2-1.1 0-2-0.9-2-2 0-5.5-4.5-10-10-10s-10 4.5-10 10c0 1.1-0.9 2-2 2-1.1 0-2-0.9-2-2 0-7.7 6.3-14 14-14m0 20c3.9 0 7-3.1 7-7s-3.1-7-7-7-7 3.1-7 7 3.1 7 7 7z" data-original="#000000" />
                                            </svg>
                                        </button>
                                        <button class="mr-4" title="Delete" @click="showConfirmationModal = true; requestToDeleteId = {{ $request->id }};">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 hover:fill-red-700" viewBox="0 0 24 24">
                                            <path
                                                d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                data-original="#000000" />
                                            <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                data-original="#000000" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination and entries display -->
                <div class="flex items-center justify-between">
                    <span class="text-md mb-2 mt-2 text-gray-700 dark:text-gray-400">
                        Showing <span class="font-semibold text-gray-500">{{ $requests->firstItem() }}</span> to <span class="font-semibold text-gray-500">{{ $requests->lastItem() }}</span> of <span class="font-semibold text-gray-500">{{ $requests->total() }}</span> Entries
                    </span>
                    <nav aria-label="Page navigation example">
                        <ul class="flex items-center -space-x-px h-10 text-base mb-2 mt-2">
                            <li>
                                <a href="{{ $requests->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" {{ !$requests->onFirstPage() ? '' : 'aria-disabled="true"' }}>
                                    <span class="sr-only">Previous</span>
                                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                    </svg>
                                </a>
                            </li>
                            @foreach($requests->getUrlRange(1, $requests->lastPage()) as $page => $url)
                                <li>
                                    <a href="{{ $url }}" class="flex items-center justify-center px-4 h-10 leading-tight border border-gray-300 text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white 
                                        @if ($requests->currentPage() == $page) bg-gray-900 text-white hover:bg-gray-600 @endif"
                                    aria-current="{{ $requests->currentPage() == $page ? 'page' : '' }}">{{ $page }}</a>
                                </li>
                            @endforeach
                            <li>
                                <a href="{{ $requests->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" {{ !$requests->hasMorePages() ? 'aria-disabled="true"' : '' }}>
                                    <span class="sr-only">Next</span>
                                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                
                <!-- Confirmation Modal -->        
                <div x-show="showConfirmationModal" class="fixed inset-0 overflow-y-auto z-[1000]">
                    <div class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
                        <div class="w-full max-w-lg bg-white shadow-lg rounded-md p-6 relative">
                            <svg type="button" @click="showConfirmationModal = false" xmlns="http://www.w3.org/2000/svg" class="w-3.5 cursor-pointer shrink-0 fill-[#333] hover:fill-red-500 float-right" viewBox="0 0 320.591 320.591">
                                <path d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z" data-original="#000000"></path>
                                <path d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z" data-original="#000000"></path>
                            </svg>
                            <div class="my-8">
                                <h4 class="text-lg text-[#333] font-semibold">Are you sure you want to delete this form request?</h4>
                                <p class="text-sm text-gray-500 mt-4">Once deleted, the from request cannot be recovered. Are you sure you want to proceed?</p>
                            </div>
                            <div class="mt-6 flex justify-end">
                                <button type="button" @click="deleteRequest()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                <button type="button" @click="showConfirmationModal = false" class="bg-gray-400 hover:bg-gray-500 text-white ml-2 font-bold py-2 px-4 rounded">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function deleteRequest() {
                        const requestId = document.querySelector('[x-data]').__x.$data.requestToDeleteId;
                        console.log('Deleting request with ID:', requestId);

                        fetch(`/requests/${requestId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Request deleted successfully!');
                                location.reload(); // Reload the page or remove the row from the UI as needed
                            } else {
                                alert('Error deleting request: ' + (data.message || 'Unknown error'));
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred while deleting the request.');
                        });
                    }
                </script>

                <div x-show="showEditDetailsModal" class="fixed inset-0 overflow-y-auto z-[1000]">
                    <div class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
                        <div class="w-full max-w-lg bg-white shadow-lg rounded-md p-6 relative">
                            <div class="flex items-center justify-between">
                                <h4 class="text-lg text-[#333] font-semibold">Edit Details</h4>
                                <!-- Close button -->
                                <svg type="button" @click="showEditDetailsModal = false" xmlns="http://www.w3.org/2000/svg" class="w-3.5 cursor-pointer shrink-0 fill-[#333] hover:fill-red-500" viewBox="0 0 320.591 320.591">
                                    <!-- SVG paths here -->
                                </svg>
                            </div>
                            <div class="my-8">
                                <form id="editRequestForm">
                                    <input type="hidden" id="request_id" name="id" x-bind:value="requestDetails.id" />
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-gray-700">Name of Requestor</label>
                                        <input type="text" disabled id="requestor_name" name="requestor_name" x-bind:value="requestDetails.requestor_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" />
                                    </div>
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-gray-700">Type of Request</label>
                                        <input type="text" id="request_type" name="request_type" x-bind:value="requestDetails.request_type" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" />
                                    </div>
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-gray-700">Request Name</label>
                                        <input type="text" id="request_name" name="request_name" x-bind:value="requestDetails.request_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" />
                                    </div>
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea id="request_description" name="request_description" x-bind:value="requestDetails.request_description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm"></textarea>
                                    </div>
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-gray-700">Date</label>
                                        <p x-text="requestDetails.created_at" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm">Placeholder for created date</p>
                                    </div>
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-gray-700">Files</label>
                                        <div class="mt-1">
                                            <template x-if="requestDetails.files && requestDetails.files.length > 0">
                                                <div>
                                                    <template x-for="file in requestDetails.files" :key="file">
                                                        <a :href="'/uploads/' + file.replace('/uploads/', '')" target="_blank" class="block text-sm font-medium text-blue-500 hover:text-blue-700 underline">
                                                            <span x-text="file.replace('/uploads/', '')"></span>
                                                        </a>
                                                    </template>
                                                </div>
                                            </template>
                                            <template x-if="!(requestDetails.files && requestDetails.files.length > 0)">
                                                <p class="text-sm text-gray-500">No files available</p>
                                            </template>
                                        </div>
                                    </div>
                                    <div class="mt-6 flex justify-end">                           
                                        <button type="button" id="saveEditButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                                        <button type="button" @click="showEditDetailsModal = false" class="bg-gray-400 hover:bg-gray-500 ml-2 text-white font-bold py-2 px-4 rounded">Close</button>
                                    </div>                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('saveEditButton').addEventListener('click', function () {
                        const formData = new FormData(document.getElementById('editRequestForm'));

                        // Send the request
                        fetch('/update-request', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Request updated successfully!');
                                // Optionally, refresh or close the modal here
                            } else {
                                alert('Error updating request: ' + (data.message || 'Unknown error'));
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred while updating the request.');
                        });
                    });
                </script>
                
                
                
                <div x-show="showViewDetailsModal" class="fixed inset-0 overflow-y-auto z-[1000]">
                    <div class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
                        <div class="w-full max-w-lg bg-white shadow-lg rounded-md p-6 relative">
                            <div class="flex items-center justify-between">
                                <h4 class="text-lg text-[#333] font-semibold">View Details</h4>
                                <svg type="button" @click="showViewDetailsModal = false" xmlns="http://www.w3.org/2000/svg" class="w-3.5 cursor-pointer shrink-0 fill-[#333] hover:fill-red-500 float-right" viewBox="0 0 320.591 320.591">
                                    <path d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"></path>
                                    <path d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"></path>
                                </svg>
                            </div>
                            <div class="my-8">
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700">Name of Requestor</label>
                                    <p x-text="requestDetails.requestor_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm">Placeholder for requestor name</p>
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700">Type of Request</label>
                                    <p x-text="requestDetails.request_type" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm">Placeholder for type</p>
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700">Request Name</label>
                                    <p x-text="requestDetails.request_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm">Placeholder for request name</p>
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700">Description</label>
                                    <p x-text="requestDetails.request_description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm">Placeholder for description</p>
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700">Date</label>
                                    <p x-text="requestDetails.created_at" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm">Placeholder for created date</p>
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700">Files</label>
                                    <div class="mt-1">
                                        <template x-if="requestDetails.files && requestDetails.files.length > 0">
                                            <div>
                                                <template x-for="file in requestDetails.files" :key="file">
                                                    <a :href="'/uploads/' + file.replace('/uploads/', '')" 
                                                       target="_blank" 
                                                       class="block text-sm font-medium text-blue-500 hover:text-blue-700 underline">
                                                       <span x-text="file.replace('/uploads/', '')"></span>
                                                    </a>
                                                </template>
                                            </div>
                                        </template>
                                        <template x-if="!(requestDetails.files && requestDetails.files.length > 0)">
                                            <p class="text-sm text-gray-500">No files available</p>
                                        </template>
                                    </div>
                                </div>                                
                                <div class="mt-6 flex justify-end">
                                    <button class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded" @click="showViewDetailsModal = false">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.store('modals', {
                        showViewDetailsModal: false,
                        requestDetails: {},
                    });
                });
            
                openViewDetailsModal(requestId) {
                    fetch(`/api/requests/${requestId}`)
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                this.requestDetails = result.data;
                                // Ensure files is an array
                                if (!Array.isArray(this.requestDetails.files)) {
                                    this.requestDetails.files = [];
                                }
                                this.showViewDetailsModal = true;
                            } else {
                                alert(result.message);
                            }
                        })
                        .catch(error => console.error('Error fetching request details:', error));
                }
            </script>

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
    document.addEventListener("DOMContentLoaded", function () {
        const tabLinks = document.querySelectorAll('.tab-link');
        const tabContents = document.querySelectorAll('.tab-content');

        tabLinks.forEach(tabLink => {
            tabLink.addEventListener('click', function (event) {
                event.preventDefault();

                // Remove active class from all tab links
                tabLinks.forEach(link => {
                    link.classList.remove('active');
                });

                // Remove active class from all tab contents
                tabContents.forEach(content => {
                    content.style.display = 'none';
                });

                // Add active class to the clicked tab link
                this.classList.add('active');

                // Show the selected tab content
                const target = this.getAttribute('data-tab');
                document.getElementById(target + '-content').style.display = 'block';
            });
        });

        // Set the first tab as active by default on page load
        tabLinks[0].classList.add('active');
        tabContents[0].style.display = 'block';
    });

   </script>
</body>