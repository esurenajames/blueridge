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
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <!-- navbar -->
        @livewire('navbar')
        <!-- end navbar -->

        <div class="ml-5 mr-5">
            <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Quotation Approval</h2>
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
                    <span class="text-gray-800">Quotation Approval</span>
                </li>
            </ol>
        </div>

        <div class="mb-4 mt-10">
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
                                    @elseif($status[$requestData->status] === 'Returned') text-blue-500
                                    @else text-gray-500
                                @endif
                            ">
                                {{ $status[$requestData->status] ?? 'Unknowned Status' }}
                            </span>
                        </span>
                    </div>
                    
                    <div class="flex items-center mb-2">
                        <p class="w-1/4 font-semibold">Requestor:</p> 
                        <span class="w-3/4 ml-2">{{ $requestData->requestor->fname }} {{ $requestData->requestor->lname }}</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <p class="w-1/4 font-semibold">Colaborators:</p>
                        <span class="w-3/4 ml-2">
                            @foreach($collaborators as $user)
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
                </div>

                <div class="w-full md:w-1/2 lg:w-1/4 pl-0 md:pl-5">
                    <h2 class="text-xl font-bold mb-4">Approval History</h2>
                    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
                
                    @if(!empty($approvalDates) && !empty($approvalIds) && !empty($approvalStatus))
                        @foreach($approvalDates as $index => $date)
                            <div class="flex items-center mb-2">
                                <!-- Display the formatted approval date -->
                                <p class="w-2/5">{{ \Carbon\Carbon::parse($date)->format('M j, Y g:i a') }}</p>
                                
                                <!-- Display the approval status (Approved/Declined/Returned/Pending) -->
                                @if(isset($approvalStatus[$index]))
                                    @if($approvalStatus[$index] == 1)
                                        <span class="w-1/5 text-green-600">Approved</span>
                                    @elseif($approvalStatus[$index] == 3)
                                        <span class="w-1/5 text-red-600">Declined</span>
                                    @elseif($approvalStatus[$index] == 5)
                                        <span class="w-1/5 text-blue-500">Returned</span>
                                    @else
                                        <span class="w-1/5 text-yellow-500">Pending</span>
                                    @endif
                                @else
                                    <span class="w-1/5 text-yellow-500">Unknowned Status</span>
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
                                                   <a href="{{ asset('' . $file) }}" target="_blank" class="block text-sm font-medium text-blue-500 hover:text-blue-700 underline">
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

                           <div class="mt-2 w-4/4 mx-auto">
                            <div x-data="{ rows: [{},], totalAmount: 0 }" class="bg-white mt-10 sm:rounded-lg pl-6 pr-6 mb-4 mx-auto max-w-screen-xl mt-7 ">
                                <div class="flex justify-between items-start">
                                </div>
                            <!-- Existing content -->
                                    <div class="px-8 mt-1 sm:rounded-lg pb-8 mt-10">
                                        <!-- Start of Table -->    
                                        <div x-data="{ selectedCell: null }">
                                            <table class="selectable-table">
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        @foreach ($companyNames as $companyName)
                                                            <th>{{ $companyName }}</th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody id="selectableTableBody">
                                                    @php
                                                        // Group quotations by item_type
                                                        $groupedQuotations = $quotations->groupBy('item_type');
                                                    @endphp
                                            
                                                    @foreach ($groupedQuotations as $itemType => $group)
                                                        <tr>
                                                            @php
                                                                // Get the first quotation to display common fields
                                                                $firstQuotation = $group->first();
                                                            @endphp
                                                            <td>{{ $itemType }}</td> <!-- Display the item_type -->
                                            
                                                            @foreach ($companyNames as $companyName)
                                                                <td x-on:click="selectedCell = {{ $firstQuotation->company_id }}" x-bind:class="{ 'selected': selectedCell === {{ $firstQuotation->company_id }} }" class="company">
                                                                    @php
                                                                        // Find quotation for this company in the group
                                                                        $quotation = $group->firstWhere('company_id', $loop->index + 1);
                                                                    @endphp
                                                                    @if ($quotation)
                                                                        <span class="block text-gray-600 text-base">{{ $quotation->item_description }}</span>
                                                                        <span class="block text-gray-600 text-sm">₱{{ $quotation->unit_price }}</span>
                                                                        <span class="block text-gray-600 text-base">{{ $firstQuotation->qty }}{{ $firstQuotation->unit }}</span>
                                                                    @else
                                                                        <span class="block text-gray-600 text-base">N/A</span>
                                                                        <span class="block text-gray-600 text-sm">₱0</span>
                                                                    @endif
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                            
                                                    <tr id="totalsRow"> 
                                                        <td>Total</td>
                                                        @foreach ($companyNames as $companyName)
                                                            @php
                                                                // Calculate total for the current company based on company_id
                                                                $total = $quotations->where('company_id', $loop->index + 1)->sum(function ($quotation) {
                                                                    return $quotation->unit_price * $quotation->qty; // Total price calculation
                                                                });
                                                            @endphp
                                                            <td id="{{ strtolower($companyName) }}Total" class="text-gray-800 text-md">₱{{ $total }}</td>
                                                        @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                            
                                            
                                        </div>
                            
                                        <div class="flex justify-end mt-4">
                                            <span class="text-gray-700 text-base font-semibold">Selected Total:</span>
                                            <span id="selectedTotal" class="text-gray-700 text-base font-semibold ml-2">₱0.00</span>
                                        </div>
                                        
                                        <!-- Send button -->
                                        <div class="flex justify-end mt-6 space-x-4">
                                            <!-- Approve Button -->
                                            <button class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition ease-in-out duration-300" @click="showApproveModal = true">
                                                Approve Quotation
                                            </button>
                                        
                                            <!-- Decline/Return Button -->
                                            <button class="bg-gray-600 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-700 transition ease-in-out duration-300" @click="showDeclineModal = true">
                                                Decline / Return
                                            </button>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                       </div>
                   </div>            
                </div>
            </div>
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

    document.addEventListener('DOMContentLoaded', function() {
        const companyCells = document.querySelectorAll('#selectableTableBody td.company');
        companyCells.forEach(cell => {
            cell.addEventListener('click', function() {
                const row = cell.parentNode;
                const selectedCells = row.querySelectorAll('.selected');
                selectedCells.forEach(selectedCell => {
                    selectedCell.classList.remove('selected');
                });
                cell.classList.add('selected');
                updateSelectedTotal();
            });
        });
    });

    function updateSelectedTotal() {
        const selectedCells = document.querySelectorAll('#selectableTableBody td.selected');
        let total = 0;
        selectedCells.forEach(selectedCell => {
            const priceSpan = selectedCell.querySelector('span.text-sm');
            const price = parseFloat(priceSpan.innerText.slice(1));
            total += price;
        });
        document.getElementById('selectedTotal').innerText = "₱" + total.toFixed(2);
    }

   </script>
</body>
