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
    <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Details</h2>

    <p class="text-gray-600 pl-6 pb-6">
         <a href="{{ route('view-all') }}" class="text-indigo-700 hover:underline">View All</a> >
         <span>Details</span>
      </p>

    </div>   
 
    <div class="mt-2 w-3/4 mx-auto">
        <div x-data="{ rows: [{},], totalAmount: 0 }" class="bg-white mt-10 sm:rounded-lg pl-6 pr-6 mb-4 mx-auto max-w-screen-lg mt-7 ">
            <div class="flex justify-between items-start">
            <a href="{{ route('view-all') }}" class="flex items-center text-gray-700 hover:text-black font-medium text-md mt-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 transform rotate-180" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8.293 2.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L13.586 11H3a1 1 0 1 1 0-2h10.586L8.293 3.707a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/>
                </svg>
                Back
            </a>
                <div class="mt-6">                
                    <span>
                        <a>Request ID: #132345</a>
                        <span class="question-mark-btn">
                                <i class='bx bx-question-mark'></i>
                            </span>
                    </span> <span class="self-end ml-1 font-light">|</span>
                    <span class="text-green-500 self-end ml-1 font-medium">Completed</span>
                </div>
            </div>
            <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">

        <!-- Existing content -->
        <div class="px-8 mt-1 sm:rounded-lg pb-8">
            <!-- Start of Stepper -->            
            <div class="flex items-start max-w-screen-lg mx-auto">
                <div class="w-full">
                    <div class="flex items-center w-full">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-blue-600 p-1.5 flex items-center justify-center rounded-full">
                            <span class="text-base text-white font-bold">1</span>
                        </div>
                    <div class="w-full h-1 mx-4 rounded-lg bg-blue-600"></div>
                </div>
                    <div class="mt-2 mr-4">
                        <h6 class="text-base font-bold text-blue-500">Request Form</h6>
                        <p class="text-xs text-gray-400">Completed</p>
                        <p class="text-xs text-gray-400">Date Placeholder</p>
                    </div>
                </div>
                <div class="w-full">
                    <div class="flex items-center w-full">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-blue-600 p-1.5 flex items-center justify-center rounded-full">
                            <span class="text-base text-white font-bold">2</span>
                        </div>
                        <div class="w-full h-1 mx-4 rounded-lg bg-blue-600"></div>
                    </div>
                    <div class="mt-2 mr-4">
                        <h6 class="text-base font-bold text-blue-500">Quotation Form</h6>
                        <p class="text-xs text-gray-400">Completed</p>
                        <p class="text-xs text-gray-400">Date Placeholder</p>
                    </div>
                </div>
                <div class="w-full">
                    <div class="flex items-center w-full">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-blue-600 p-1.5 flex items-center justify-center rounded-full">
                            <span class="text-base text-white font-bold">3</span>
                        </div>
                        <div class="w-full h-1 mx-4 rounded-lg bg-blue-600"></div>
                    </div>
                    <div class="mt-2 mr-4">
                        <h6 class="text-base font-bold text-blue-500">Purchase Request</h6>
                        <p class="text-xs text-gray-400">Completed</p>
                        <p class="text-xs text-gray-400">Date Placeholder</p>
                    </div>
                </div>
                <div class="w-full">
                    <div class="flex items-center w-full">
                        <div class="w-8 h-8 shrink-0 mx-[-1px] bg-blue-600 p-1.5 flex items-center justify-center rounded-full">
                            <span class="text-base text-white font-bold">4</span>
                        </div>
                        <div class="w-full h-1 mx-4 rounded-lg bg-blue-600"></div>
                    </div>
                    <div class="mt-2 mr-4">
                        <h6 class="text-base font-bold text-blue-500">Purchase Order</h6>
                        <p class="text-xs text-gray-400">Complete</p>
                        <p class="text-xs text-gray-400">Date Placeholder</p>
                    </div>
                </div>
            </div>
            <div>
            <h2 class="text-sm font-bold text-gray-900 mt-10">Request Form Details:</h2>
            </div>
            <!-- Cut -->
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
                    <div> 
                        <p class="mt-4 text-sm">Attached Documents</p>
                        <a href="#" class="flex items-center space-x-2 text-sm text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M17.707 1.293A1 1 0 0 1 19 2v16a1 1 0 0 1-1.707.707L13 14.414V16a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v1.586l4.293-4.293zM12 7a1 1 0 0 1-1-1V1.414L5.707 7H12z" clip-rule="evenodd"/>
                            </svg>
                            <span class="">Request Form.word</span>
                        </a>
                    </div>

                </div>
                
                <!-- View Details Button -->
                <div class="flex justify-end mt-4">
                    <a href="{{ route('quotation') }}" class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;" hidden>Send Proof of Purchase</a>
                    <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;" hidden>Follow Up</button>
                </div>
            </div>
            <div>
                <h2 class="text-sm font-bold text-gray-900 mt-10">Quotation Remarks:</h2>
                <p class="text-sm"> Please send a quotation before march 29. Make sure the budget is around 10000 only</p>
            </div>
            <!-- Quotation Form Details Section -->
            <div>
                <h2 class="text-sm font-bold text-gray-900 mt-10">Quotation Form Details:</h2>
                <!-- List of Submitted Documents -->
                <div class="mt-4">
                    <h3 class="text-xs font-semibold text-gray-700">Submitted Documents:</h3>
                    <ul class="mt-2">
                        <li>
                            <a href="#" class="flex items-center space-x-2 text-sm text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M17.707 1.293A1 1 0 0 1 19 2v16a1 1 0 0 1-1.707.707L13 14.414V16a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v1.586l4.293-4.293zM12 7a1 1 0 0 1-1-1V1.414L5.707 7H12z" clip-rule="evenodd"/>
                                </svg>
                                <span>Quotation 1.pdf</span>
                            </a>
                        </li>
                        <!-- Add more documents as needed -->
                    </ul>
                </div>
                <!-- List of Approved Documents -->
                <div class="mt-4">
                    <h3 class="text-xs font-semibold text-gray-700">Approved Documents:</h3>
                    <ul class="mt-2">
                        <li>
                            <a href="#" class="flex items-center space-x-2 text-sm text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M17.707 1.293A1 1 0 0 1 19 2v16a1 1 0 0 1-1.707.707L13 14.414V16a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v1.586l4.293-4.293zM12 7a1 1 0 0 1-1-1V1.414L5.707 7H12z" clip-rule="evenodd"/>
                                </svg>
                                <span>Approved Quotation</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center space-x-2 text-sm text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M17.707 1.293A1 1 0 0 1 19 2v16a1 1 0 0 1-1.707.707L13 14.414V16a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v1.586l4.293-4.293zM12 7a1 1 0 0 1-1-1V1.414L5.707 7H12z" clip-rule="evenodd"/>
                                </svg>
                                <span>Purchase Order</span>
                            </a>
                        </li>
                        <!-- Add more documents as needed -->
                    </ul>
                </div>
                <div>
                    <h2 class="text-sm font-bold text-gray-900 mt-10">Purchase Request Remarks:</h2>
                    <p class="text-sm"> Wait for further updates.</p>
                </div>
                <div>
                    <h2 class="text-sm font-bold text-gray-900 mt-10">Purchase Order Remarks:</h2>
                    <p class="text-sm"> Please proceed with buying the products</p>
                </div>
            </div>
            <h2 class="text-sm font-bold text-gray-900 mt-10">Purchase Order Details:</h2>
            <!-- List of Submitted Documents -->
            <div class="mt-4">
                <h3 class="text-xs font-semibold text-gray-700">Proof of Purchase:</h3>
                <ul class="mt-2">
                    <li>
                        <a href="#" class="flex items-center space-x-2 text-sm text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M17.707 1.293A1 1 0 0 1 19 2v16a1 1 0 0 1-1.707.707L13 14.414V16a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v1.586l4.293-4.293zM12 7a1 1 0 0 1-1-1V1.414L5.707 7H12z" clip-rule="evenodd"/>
                            </svg>
                            <span>Proof.pdf</span>
                        </a>
                    </li>
                    <!-- Add more documents as needed -->
                </ul>
            </div>

        </div>       

        
            <!-- End of Stepper --> 
    </div>
</div>



    
        <!-- End of Stepper --> 
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
