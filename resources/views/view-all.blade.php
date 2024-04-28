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
<div class="space-y-5 bg-white p-1 mt-5 shadow-md w-3/4 mx-auto mt-7">
    <!-- Tabs -->
    <ul class="-mb-px flex items-center gap-4 text-sm font-medium">
        <li class="flex-1">
            <a href="#" data-tab="view-all" class="tab-link relative flex items-center justify-center gap-2 px-4 py-2 bg-white rounded-t-md hover:text-blue-700">View All Request
                <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500"> 2 </span>
            </a>
        </li>
        <li class="flex-1">
            <a href="#" data-tab="to-approve" class="tab-link relative flex items-center justify-center gap-2 px-4 py-2 bg-white rounded-t-md hover:text-blue-700">For Approval
                <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500"> 1 </span>
            </a>
        </li>
        <li class="flex-1">
            <a href="#" data-tab="processing" class="tab-link relative flex items-center justify-center gap-2 px-4 py-2 bg-white rounded-t-md hover:text-blue-700">Processing
                <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500"> 1 </span>
            </a>
        </li>
        <li class="flex-1">
            <a href="#" data-tab="purchase-order" class="tab-link relative flex items-center justify-center gap-2 px-4 py-2 bg-white rounded-t-md hover:text-blue-700">Purchase Order
                <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500"> 1 </span>
            </a>
        </li>
        <li class="flex-1">
            <a href="#" data-tab="declined" class="tab-link relative flex items-center justify-center gap-2 px-4 py-2 bg-white rounded-t-md hover:text-blue-700">Declined
                <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500"> 2 </span>
            </a>
        </li>
        <li class="flex-1">
            <a href="#" data-tab="history" class="tab-link relative flex items-center justify-center gap-2 px-4 py-2 bg-white rounded-t-md hover:text-blue-700">History
                <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500"> 3 </span>
            </a>
        </li>
    </ul>
</div>
<div class="mt-2 w-3/4 mx-auto">

        <!-- Content for View All tab -->
        <div id="view-all-content" class="tab-content">
            <!-- Request Name and Status -->
            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Volleyball Ball for Intrams</h2>
                    <div>                
                        <span class="question-mark-btn mr-1">
                            <i class='bx bx-question-mark'></i>
                        </span> <span class="self-end ml-1 font-light">|</span>
                        <span class="text-yellow-500 self-end ml-1 font-medium">On processing</span>
                    </div>
                </div>
                <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                <!-- Description, Type, and Time -->
                <div class="request-item">
                    <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Type of request: Purchase Request</p>
                    <p>Time sent: 10:00 AM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <button class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</button>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Follow Up</button>
                </div>
            </div>

            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Volleyball Ball for Intrams</h2>
                    <div>                
                        <span class="question-mark-btn mr-1">
                            <i class='bx bx-question-mark'></i>
                        </span> <span class="self-end ml-1 font-light">|</span>
                        <span class="text-yellow-500 self-end ml-1 font-medium">On processing</span>
                    </div>
                </div>
                <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                <!-- Description, Type, and Time -->
                <div class="request-item">
                    <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Type of request: Purchase Request</p>
                    <p>Time sent: 10:00 AM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <button class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</button>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Follow Up</button>
                </div>
            </div>
        </div>
   

        <!-- Content for approve-content tab -->
        <div id="to-approve-content" class="tab-content" style="display: none;">
            <!-- Request Name and Status -->
            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Volleyball Ball for Intrams</h2>
                    <div>                
                        <span class="question-mark-btn mr-1">
                            <i class='bx bx-question-mark'></i>
                        </span> <span class="self-end ml-1 font-light">|</span>
                        <span class="text-yellow-500 self-end ml-1 font-medium">On processing</span>
                    </div>
                </div>
                <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                <!-- Description, Type, and Time -->
                <div class="request-item">
                    <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Type of request: Purchase Request</p>
                    <p>Time sent: 10:00 AM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <button class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</button>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Follow Up</button>
                </div>
            </div>
        </div>
        <!-- end of approve-content tab -->


        <!-- Content for processing tab -->
        <div id="processing-content" class="tab-content" style="display: none;">
            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Volleyball Ball for Intrams</h2>
                    <div>                
                        <span class="question-mark-btn mr-1">
                            <i class='bx bx-question-mark'></i>
                        </span> <span class="self-end ml-1 font-light">|</span>
                        <span class="text-yellow-500 self-end ml-1 font-medium">On processing</span>
                    </div>
                </div>
                <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                <!-- Description, Type, and Time -->
                <div class="request-item">
                    <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Type of request: Purchase Request</p>
                    <p>Time sent: 10:00 AM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <button class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</button>
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
                    <h2 class="text-lg font-bold text-gray-900">Volleyball Ball for Intrams</h2>
                    <div>                
                        <span class="question-mark-btn mr-1">
                            <i class='bx bx-question-mark'></i>
                        </span> <span class="self-end ml-1 font-light">|</span>
                        <span class="text-yellow-500 self-end ml-1 font-medium">On processing</span>
                    </div>
                </div>
                <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                <!-- Description, Type, and Time -->
                <div class="request-item">
                    <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Type of request: Purchase Request</p>
                    <p>Time sent: 10:00 AM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <button class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</button>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Follow Up</button>
                </div>
            </div>
        </div>
        <!-- end of approve-content tab -->

        <!-- Content for declined tab -->
        <div id="declined-content" class="tab-content" style="display: none;">
            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Volleyball Ball for Intrams</h2>
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
                    <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Type of request: Purchase Request</p>
                    <p>Time sent: 10:00 AM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <button class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</button>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Follow Up</button>
                </div>
            </div>

            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Volleyball Ball for Intrams</h2>
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
                    <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Type of request: Purchase Request</p>
                    <p>Time sent: 10:00 AM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <button class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</button>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Follow Up</button>
                </div>
            </div>
        </div>
        <!-- end of declined tab -->

        <!-- Content for history tab -->
        <div id="history-content" class="tab-content" style="display: none;">
            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Volleyball Ball for Intrams</h2>
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
                    <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Type of request: Purchase Request</p>
                    <p>Time sent: 10:00 AM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <button class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</button>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Follow Up</button>
                </div>
            </div>
            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Volleyball Ball for Intrams</h2>
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
                    <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Type of request: Purchase Request</p>
                    <p>Time sent: 10:00 AM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <button class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</button>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Follow Up</button>
                </div>
            </div>
            <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Volleyball Ball for Intrams</h2>
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
                    <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Type of request: Purchase Request</p>
                    <p>Time sent: 10:00 AM</p>
                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <button class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</button>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Follow Up</button>
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