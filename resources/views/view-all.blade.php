<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
@vite('resources/css/main.css', 'resources/js/app.js')
<title>Admin Panel</title>

<body class="mb-5 bg-gray-200">
    <!--sidenav -->
      @livewire('sidebar')
      <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <!-- navbar -->
        @livewire('navbar')
        <!-- end navbar -->

      <!-- Content -->
       
      <div class="ml-5 mr-5">
    <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">My Request</h2>

    <p class="text-gray-600 pl-6 pb-6">
         <a href="#" class="text-indigo-700 hover:underline">Home</a> >
         <span>My Request</span>
      </p>

    </div>   
 
<!-- Tab View -->

<!-- Tabs -->
@livewire('tabs')
<!-- End of tabs -->

<div class="mt-2 w-3/4 mx-auto">

        <!-- Content for View All tab -->
            <div id="view-all-content" class="tab-content">
                <!-- Request Name and Status -->
                <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                    <div class="flex justify-between items-start mb-4">
                        <h2 class="text-lg font-bold text-gray-900">Upgrade Barangay Office Computer Systems</h2>
                        <div>                
                            <span class="question-mark-btn mr-1">
                                <i class='bx bx-question-mark'></i>
                            </span> <span class="self-end ml-1 font-light">|</span>
                            <span class="text-yellow-500 self-end ml-1 font-medium">For Purchase Request</span>
                        </div>
                    </div>
                    <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                    <!-- Description, Type, and Time -->
                    <div class="request-item">
                        <p>Description: Modernize the barangay office computer systems by upgrading hardware and software to enhance productivity and efficiency in delivering services to residents.</p>
                        <p>Type of request: IT Upgrade</p>
                        <p>Time sent: 11:00 AM</p>
                    </div>
                    
                    <!-- View Details Button -->
                    <div class="flex justify-end mt-4">
                        <a href="{{ route('details-2') }}" class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</a>
                        <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Follow Up</button>
                    </div>
                </div>
                <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                    <div class="flex justify-between items-start mb-4">
                        <h2 class="text-lg font-bold text-gray-900">Community Health Awareness Seminar</h2>
                        <div>                
                            <span class="text-red-500 self-end ml-1 font-medium">Date Before: Placeholder</span>
                            <span class="question-mark-btn mr-1">
                                <i class='bx bx-question-mark'></i>
                            </span> <span class="self-end ml-1 font-light">|</span>
                            <span class="text-yellow-500 self-end ml-1 font-medium">For Quotation</span> 
                        </div>
                    </div>
                    <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                    <!-- Description, Type, and Time -->
                    <div class="request-item">
                        <p>Description: Organize a health awareness seminar for the community focusing on preventive healthcare measures.</p>
                        <p>Type of request: Event Planning</p>
                        <p>Time sent: 1:45 PM</p>
                    </div>
                    
                    <!-- View Details Button -->
                    <div class="flex justify-end mt-4">
                        <a href="{{ route('details') }}" class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</a>
                        <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Follow Up</button>
                    </div>
                </div>
                <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                    <div class="flex justify-between items-start mb-4">
                        <h2 class="text-lg font-bold text-gray-900">Procurement of Office Printers and Supplies</h2>
                        <div>                
                            <span class="question-mark-btn mr-1">
                                <i class='bx bx-question-mark'></i>
                            </span> <span class="self-end ml-1 font-light">|</span>
                            <span class="text-yellow-500 self-end ml-1 font-medium">For Purchase Order</span>
                        </div>
                    </div>
                    <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                    <!-- Description, Type, and Time -->
                    <div class="request-item">
                        <p>Description: Acquire new printers and necessary supplies (such as ink cartridges, paper, etc.) for the barangay office to improve efficiency in document processing and administrative tasks.</p>
                        <p>Type of request: Procurement</p>
                        <p>Time sent: 9:30 AM</p>
                    </div>
                    
                    <!-- View Details Button -->
                    <div class="flex justify-end mt-4">
                        <a href="{{ route('details-4')}}" class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</a>
                        <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Follow Up</button>
                        <a href="{{ route('purchase-order')}}" class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Proof of purchase</a>
                    </div>
                </div>
        </div>


        <!-- Content for approve-content tab -->
        <div id="quotation-content" class="tab-content" style="display: none;">
            <!-- Request Name and Status -->
            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Community Health Awareness Seminar</h2>
                    <div>                
                        <span class="text-red-500 self-end ml-1 font-medium">Date Before: Placeholder</span>
                        <span class="question-mark-btn mr-1">
                            <i class='bx bx-question-mark'></i>
                        </span> <span class="self-end ml-1 font-light">|</span>
                        <span class="text-yellow-500 self-end ml-1 font-medium">For Quotation</span> 
                    </div>
                </div>
                <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                <!-- Description, Type, and Time -->
                <div class="request-item">
                    <p>Description: Organize a health awareness seminar for the community focusing on preventive healthcare measures.</p>
                    <p>Type of request: Event Planning</p>
                    <p>Time sent: 1:45 PM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <a href="{{ route('details') }}" class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</a>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Follow Up</button>
                    <a href="{{ route('quotation') }}" class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Send Quotation</a>
                </div>
            </div>
        </div>
        <!-- end of approve-content tab -->


        <!-- Content for processing tab -->
        <div id="purchase-request-content" class="tab-content" style="display: none;">
            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Upgrade Barangay Office Computer Systems</h2>
                    <div>                
                        <span class="question-mark-btn mr-1">
                            <i class='bx bx-question-mark'></i>
                        </span> <span class="self-end ml-1 font-light">|</span>
                        <span class="text-yellow-500 self-end ml-1 font-medium">For Purchase Request</span>
                    </div>
                </div>
                <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                <!-- Description, Type, and Time -->
                <div class="request-item">
                    <p>Description: Modernize the barangay office computer systems by upgrading hardware and software to enhance productivity and efficiency in delivering services to residents.</p>
                    <p>Type of request: IT Upgrade</p>
                    <p>Time sent: 11:00 AM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <a href="{{ route('details-3') }}" class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</a>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Follow Up</button>
                </div>
            </div>
        </div>
        <!-- end of processing tab -->

        <!-- Content for approve-content tab -->
        <div id="purchase-order-content" class="tab-content" style="display: none;">
            <!-- Request Name and Status -->
            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Procurement of Office Printers and Supplies</h2>
                    <div>                
                        <span class="question-mark-btn mr-1">
                            <i class='bx bx-question-mark'></i>
                        </span> <span class="self-end ml-1 font-light">|</span>
                        <span class="text-yellow-500 self-end ml-1 font-medium">For Purchase Order</span>
                    </div>
                </div>
                <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                <!-- Description, Type, and Time -->
                <div class="request-item">
                    <p>Description: Acquire new printers and necessary supplies (such as ink cartridges, paper, etc.) for the barangay office to improve efficiency in document processing and administrative tasks.</p>
                    <p>Type of request: Procurement</p>
                    <p>Time sent: 9:30 AM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <a href="{{ route('details-4')}}" class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</a>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Follow Up</button>
                    <a href="{{ route('purchase-order')}}" class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Proof of purchase</a>
                </div>
            </div>
        </div>
        <!-- end of approve-content tab -->

        <!-- Content for declined tab -->
        <div id="declined-content" class="tab-content" style="display: none;">
            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Community Garden Expansion</h2>
                    <div>                
                        <span class="question-mark-btn mr-1">
                            <i class='bx bx-question-mark'></i>
                        </span> <span class="self-end ml-1 font-light">|</span>
                        <span class="text-red-500 self-end ml-1 font-medium">Declined</span>
                    </div>
                </div>
                <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                <!-- Description, Type, and Time -->
                <div class="request-item">
                    <p>Description: Extend the community garden space to accommodate more residents interested in gardening and promote sustainable living.</p>
                    <p>Type of request: Development Project</p>
                    <p>Time sent: 3:20 PM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <a href={{route ('decline')}} class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</a>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;" hidden>Follow Up</button>
                </div>
            </div>

            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Community Garden Expansion</h2>
                    <div>                
                        <span class="question-mark-btn mr-1">
                            <i class='bx bx-question-mark'></i>
                        </span> <span class="self-end ml-1 font-light">|</span>
                        <span class="text-red-500 self-end ml-1 font-medium">Declined</span>
                    </div>
                </div>
                <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                <!-- Description, Type, and Time -->
                <div class="request-item">
                    <p>Description: Extend the community garden space to accommodate more residents interested in gardening and promote sustainable living.</p>
                    <p>Type of request: Procurement</p>
                    <p>Time sent: 9:15 AM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <button class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</button>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;" hidden>Follow Up</button>
                </div>
            </div>
        </div>
        <!-- end of declined tab -->

        <!-- Content for history tab -->
        <div id="history-content" class="tab-content" style="display: none;">
            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Barangay Street Lighting Improvement Project</h2>
                    <div>                
                        <span class="question-mark-btn mr-1">
                            <i class='bx bx-question-mark'></i>
                        </span> <span class="self-end ml-1 font-light">|</span>
                        <span class="text-green-500 self-end ml-1 font-medium">Completed</span>
                    </div>
                </div>
                <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                <!-- Description, Type, and Time -->
                <div class="request-item">
                    <p>Description: Implement an improvement project for barangay street lighting to enhance safety and security in the community, particularly in poorly lit areas.</p>
                    <p>Type of request: Infrastructure Development</p>
                    <p>Time sent: 2:30 PM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <a href="{{ route('details-5')}}" class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</a>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;" hidden>Follow Up</button>
                </div>
            </div>
            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Barangay Youth Development Program Funding</h2>
                    <div>                
                        <span class="question-mark-btn mr-1">
                            <i class='bx bx-question-mark'></i>
                        </span> <span class="self-end ml-1 font-light">|</span>
                        <span class="text-green-500 self-end ml-1 font-medium">Completed</span>
                    </div>
                </div>
                <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                <!-- Description, Type, and Time -->
                <div class="request-item">
                    <p>Description: Allocate funding for a barangay youth development program aimed at providing skills training, educational support, and recreational activities to empower and engage young residents.</p>
                    <p>Type of request: Budget Allocation</p>
                    <p>Time sent: 3:00 PM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <a href="{{ route('details-5')}}" class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</a>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;" hidden>Follow Up</button>
                </div>
            </div>
            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Barangay Community Center Renovation</h2>
                    <div>                
                        <span class="question-mark-btn mr-1">
                            <i class='bx bx-question-mark'></i>
                        </span> <span class="self-end ml-1 font-light">|</span>
                        <span class="text-green-500 self-end ml-1 font-medium">Completed</span>
                    </div>
                </div>
                <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                <!-- Description, Type, and Time -->
                <div class="request-item">
                    <p>Description: Renovate the barangay community center to provide a more functional and comfortable space for various community activities, meetings, and events.</p>
                    <p>Type of request: Infrastructure Development</p>
                    <p>Time sent: 10:45 AM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <button class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</button>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;" hidden>Follow Up</button>
                </div>
            </div>
            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Community Garden Expansion</h2>
                    <div>                
                        <span class="question-mark-btn mr-1">
                            <i class='bx bx-question-mark'></i>
                        </span> <span class="self-end ml-1 font-light">|</span>
                        <span class="text-red-500 self-end ml-1 font-medium">Declined</span>
                    </div>
                </div>
                <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                <!-- Description, Type, and Time -->
                <div class="request-item">
                    <p>Description: Extend the community garden space to accommodate more residents interested in gardening and promote sustainable living.</p>
                    <p>Type of request: Development Project</p>
                    <p>Time sent: 3:20 PM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <button class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</button>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;" hidden>Follow Up</button>
                </div>
            </div>

            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Barangay Health Clinic Supplies Replenishment</h2>
                    <div>                
                        <span class="question-mark-btn mr-1">
                            <i class='bx bx-question-mark'></i>
                        </span> <span class="self-end ml-1 font-light">|</span>
                        <span class="text-red-500 self-end ml-1 font-medium">Declined</span>
                    </div>
                </div>
                <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                <!-- Description, Type, and Time -->
                <div class="request-item">
                    <p>Description: Replenish essential medical supplies for the barangay health clinic to ensure adequate healthcare services for residents, including basic medications, bandages, and other consumables.</p>
                    <p>Type of request: Procurement</p>
                    <p>Time sent: 9:15 AM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <button class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</button>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;" hidden>Follow Up</button>
                </div>
            </div>
        </div>
        <!-- end of history tab -->


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

   </script>
</body>
