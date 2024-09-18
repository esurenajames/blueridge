<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

@vite('resources/css/main.css', 'resources/js/app.js')
<title>Form Request List</title>

<body>
    <!--sidenav -->
    @livewire('sidebar-secretary')
      <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <!-- navbar -->
        @livewire('navbar')
        <!-- end navbar -->

       
        <div class="ml-5 mr-5">
            <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Request Approval</h2>
            <ol class="list-none p-0 inline-flex space-x-2 ml-6">
                <li class="flex items-center">
                    <svg onclick="window.location.href='/';" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" class="cursor-pointer hover:fill-blue-500 transition-colors duration-300" fill="#4b5563"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                    <span class="mx-2">/</span>
                </li>
                <li class="flex items-center">
                    <a href="{{ route ("/approval-management")}}" class="text-gray-600 hover:text-blue-500 transition-colors duration-300">Approval Management</a>
                    <span class="mx-2">/</span>
                </li>
                <li class="flex items-center">
                    <span class="text-gray-800">Request Details</span>
                </li>
            </ol>
        </div>
        
        <div class="mb-4 mt-10" x-data="{ showConfirmationModal: false, showEditDetailsModal: false, showViewDetailsModal: false, showApproveModal: false, showDeclineModal: false }">
         <div class="flex flex-wrap ml-10 mt-10">
            <div class="w-full md:w-1/2 lg:w-1/4 mb-4 md:mb-0">
                <h2 class="text-xl font-bold mb-4">Request Forms Details</h2>
                <div class="flex items-center mb-2">
                    <p class="w-1/4 font-semibold">Steps:</p> 
                    <span class="w-3/4 ml-2">{{ $steps[$requestData->steps] ?? 'Unknown' }}</span>
                </div>
                <div class="flex items-center mb-2">
                    <p class="w-1/4 font-semibold">Status:</p> 
                    <span class="w-3/4 ml-2">
                        <span class="
                            @if($status[$requestData->status] === 'Pending') text-yellow-500
                            @elseif($status[$requestData->status] === 'Approved') text-green-600
                            @elseif($status[$requestData->status] === 'Declined') text-red-600
                            @else text-gray-500
                            @endif
                        ">
                            {{ $status[$requestData->status] ?? 'Unknown' }}
                        </span>
                    </span>
                </div>                
                <div class="flex items-center mb-2">
                    <p class="w-1/4 font-semibold">Requestor:</p> 
                    <span class="w-3/4 ml-2">{{ $requestData->requestor->fname }} {{ $requestData->requestor->lname }}</span>
                </div>
                <div class="flex items-center mb-2">
                    <p class="w-1/4 font-semibold">CC:</p>
                    <span class="w-3/4 ml-2">
                        @foreach($ccUsers as $user)
                            <span>{{ $user->fname }} {{ $user->lname }}</span>@if (!$loop->last), @endif
                        @endforeach
                    </span>
                </div>
                <div class="flex items-center mb-2">
                    <p class="w-1/4 font-semibold">Title:</p> 
                    <span class="w-3/4 ml-2">{{ $requestData->request_name }}</span>
                </div>
                <div class="flex items-center mb-2">
                    <p class="w-1/4 font-semibold">Dates:</p> 
                    <span class="w-3/4 ml-2">{{ $requestData->created_at->format('F d, Y') }}</span>
                </div>
                <div class="flex items-center mb-4 mt-4">
                    <span class="w-1/4"></span>
                    <span class="w-2/4">
                        <button class="bg-blue-600 text-white w-9/12 py-2 rounded hover:bg-blue-700" @click="showApproveModal = true">Approve Request</button>
                    </span>
                </div>
                <div class="flex items-center mb-4 mt-4">
                    <span class="w-1/4"></span>
                    <span class="w-2/4">
                        <button class="bg-gray-600 text-white w-9/12 py-2 rounded hover:bg-gray-700" @click="showDeclineModal = true">Decline Request</button>
                    </span>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/4 pl-0 md:pl-5">
                <h2 class="text-xl font-bold mb-4">Approval History</h2>
                <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
            
                @if(!empty($approvalDates) && !empty($approvalIds) && !empty($approvalStatus))
                    @foreach($approvalDates as $index => $date)
                        <div class="flex items-center mb-2">
                            <!-- Display the formatted approval date -->
                            <p class="w-2/5">{{ \Carbon\Carbon::parse($date)->format('M j, Y g:i a') }}</p>
                            
                            <!-- Display the approval status (Approved/Declined) -->
                            @if(isset($approvalStatus[$index]))
                                @if($approvalStatus[$index] == 1)
                                    <span class="w-1/5 text-green-600">Approved</span>
                                @elseif($approvalStatus[$index] == 3)
                                    <span class="w-1/5 text-red-600">Declined</span>
                                @else
                                    <span class="w-1/5 text-yellow-500">Pending</span>
                                @endif
                            @else
                                <span class="w-1/5 text-yellow-500">Pending</span>
                            @endif
            
                            <!-- Display the approver's first and last name -->
                            @if(isset($approvers[$approvalIds[$index]]))
                                <span class="w-1/5 whitespace-nowrap">
                                    {{ $approvers[$approvalIds[$index]]->fname ?? 'Unknown' }} {{ $approvers[$approvalIds[$index]]->lname ?? 'Approver' }}
                                </span>
                            @else
                                <span class="w-1/5 whitespace-nowrap">Unknown Approver</span>
                            @endif
                        </div>
                    @endforeach
                @else
                    <p>No approval history available.</p>
                @endif
            </div>            
         </div>
         
         <!-- Cut -->
         <div class="p-4 bg-gray-100 border border-gray-300 shadow sm:p-8 mt-4 ml-10 mr-10">
             <div>
                 <h2 class="text-xl font-bold text-green-600">Request Form Details:</h2>
             </div>
             <div class="p-4 bg-gray-100 border border-gray-300 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">{{ $requestData->request_name }}</h2>
                </div>
                 <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                 
                <div class="flex">
                    <!-- Left Column (1/4 width) -->
                    <div class="w-1/4 pr-4 border-r border-gray-300">
                        <!-- Requestor -->
                        <p class="font-bold text-gray-900 text-base mb-2">Requestor</p>
                        <div class="flex flex-wrap gap-2 mb-2">
                            @if($requestData->requestor)
                                <div class="flex items-center bg-white border border-gray-300 text-gray-800 pr-2 pl-0.5 py-1 rounded-xl text-base">
                                    <img src="{{ $requestData->requestor->profile_picture ? asset('storage/' . $requestData->requestor->profile_picture) : 'https://covington.va.us/wp-content/uploads/2022/03/profile-placeholder-image-gray-silhouette-no-photo-person-avatar-default-pic-used-web-design-173997790.jpg' }}" alt="{{ $requestData->requestor->fname }}" class="w-8 h-8 rounded-xl mr-2">
                                    <span class="text-sm">{{ $requestData->requestor->fname }} {{ $requestData->requestor->lname }}</span>
                                </div>
                            @else
                                <div class="flex items-center bg-gray-200 text-gray-800 px-3 pt-3 rounded-lg text-base">
                                    <span class="text-sm">Requestor not found</span>
                                </div>
                            @endif
                        </div>
                
                        <!-- Collaborators -->
                        <p class="font-bold text-gray-900 text-base mb-2">Collaborators</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mb-3 text-base">
                            @forelse ($collaborators as $collaborator)
                                <div class="flex items-center bg-white border border-gray-300 text-gray-800 pr-3 pl-0.5 py-1 rounded-xl text-base">
                                    <img src="{{ $collaborator->profile_picture ? asset('storage/' . $collaborator->profile_picture) : 'https://covington.va.us/wp-content/uploads/2022/03/profile-placeholder-image-gray-silhouette-no-photo-person-avatar-default-pic-used-web-design-173997790.jpg' }}" alt="{{ $collaborator->fname }}" class="w-8 h-8 rounded-xl mr-2">
                                    <span class="text-sm">{{ $collaborator->fname }} {{ $collaborator->lname }}</span>
                                </div>
                            @empty
                                <div class="text-base">
                                    <span>No collaborators</span>
                                </div>
                            @endforelse
                        </div>
                    </div>
                
                    <!-- Right Column -->
                    <div class="request-item ml-4 w-3/4 ">
                        <p class="font-semibold">Description: <span class="font-medium">{{ $requestData->request_description }}</span></p>
                        <!-- Dynamically populate the request type -->
                        <p class="font-semibold">Type of request: 
                            <span class="font-medium">
                                @if($requestData->request_type == 1)
                                    Punong Barangay's Certification Form
                                @elseif($requestData->request_type == 2)
                                    Request Form
                                @elseif($requestData->request_type == 3)
                                    Fetty Cash Voucher
                                @else
                                    Unknown Request Type
                                @endif
                            </span>
                        </p>                        
                        <!-- Dynamically populate the time sent -->
                        <p class="font-semibold">Time sent: <span class="font-medium">{{ $requestData->created_at->format('h:i A') }}</span></p>
                        <div>
                            <h2 class="text-sm font-bold text-gray-900 mt-4">Quotation Form Details:</h2>
                            <div class="mt-4">
                                <h3 class="text-sm font-semibold text-gray-700">Submitted Documents:</h3>
                                <ul class="mt-2">
                                    @if(!empty($files))
                                        @foreach($files as $file)
                                            <li>
                                                <a href="{{ asset('uploads/' . $file) }}" target="_blank" class="block text-sm font-medium text-blue-500 hover:text-blue-700 underline">
                                                    {{ basename($file) }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <li>No files submitted.</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>            
             </div>
         </div>

         

                
         
         <!-- Approve Modal -->
         <form method="POST" action="{{ route('approve.request', $requestData->id) }}">
            @csrf
            <div x-show="showApproveModal" class="fixed inset-0 overflow-y-auto z-[1000]">
                <div class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
                    <div class="w-full max-w-lg bg-white shadow-lg rounded-md p-6 relative">
                        <div class="flex items-center justify-between">
                            <h4 class="text-lg text-[#333] font-semibold">Approve Request</h4>
                            <svg type="button" @click="showApproveModal = false" xmlns="http://www.w3.org/2000/svg" class="w-3.5 cursor-pointer shrink-0 fill-[#333] hover:fill-red-500 float-right" viewBox="0 0 320.591 320.591">
                                <path d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"></path>
                                <path d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"></path>
                            </svg>
                        </div>
                        <div class="my-8">
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700">Remarks</label>
                                <textarea name="remarks" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" rows="4" placeholder="Enter your remarks here"></textarea>
                            </div>
                            <div class="mt-6 flex justify-end">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Submit</button>
                                <button type="button" @click="showApproveModal = false" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>        
     
         <!-- Decline Modal -->
         <form method="POST" action="{{ route('decline.request', $requestData->id) }}">
            @csrf
            <div x-show="showDeclineModal" class="fixed inset-0 overflow-y-auto z-[1000]">
                <div class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
                    <div class="w-full max-w-lg bg-white shadow-lg rounded-md p-6 relative">
                        <div class="flex items-center justify-between">
                            <h4 class="text-lg text-[#333] font-semibold">Decline Request</h4>
                            <!-- Close button -->
                            <svg type="button" @click="showDeclineModal = false" xmlns="http://www.w3.org/2000/svg" class="w-3.5 cursor-pointer shrink-0 fill-[#333] hover:fill-red-500 float-right" viewBox="0 0 320.591 320.591">
                                <path d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"></path>
                                <path d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"></path>
                            </svg>
                        </div>
                        <div class="my-8">
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700">Remarks</label>
                                <textarea name="remarks" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" rows="4" placeholder="Enter your remarks here"></textarea>
                            </div>
                            <div class="mt-6 flex justify-end">
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2">Submit</button>
                                <button type="button" @click="showDeclineModal = false" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>        
     </div>
  

     
     

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
