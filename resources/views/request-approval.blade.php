<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

@vite('resources/css/main.css', 'resources/js/app.js')
<title>Admin Panel</title>

<body>
    <!--sidenav -->
      @livewire('sidebar')
      <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <!-- navbar -->
        @livewire('navbar')
        <!-- end navbar -->

       
        <div class="ml-5 mr-5">
            <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Request Forms</h2>
            <ol class="list-none p-0 inline-flex space-x-2 ml-6">
                <li class="flex items-center">
                    <svg onclick="window.location.href='/';" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" class="cursor-pointer hover:fill-blue-500 transition-colors duration-300" fill="#4b5563"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                    <span class="mx-2">/</span>
                </li>
                <li class="flex items-center">
                    <span class="text-gray-800">Request Forms</span>
                </li>
            </ol>
        </div>
        
        <div class="flex flex-wrap ml-10 mt-10">
            <div class="w-full md:w-1/2 lg:w-1/4 mb-4 md:mb-0">
                <h2 class="text-xl font-bold mb-4">Request Forms Details</h2>
                <div class="flex items-center mb-2">
                    <p class="w-1/4 font-semibold">Status:</p> <span class="w-3/4 ml-2">Placeholder</span>
                </div>
                <div class="flex items-center mb-2">
                    <p class="w-1/4 font-semibold">Department:</p> <span class="w-3/4 ml-2">Placeholder</span>
                </div>
                <div class="flex items-center mb-2">
                    <p class="w-1/4 font-semibold">Requestor:</p> <span class="w-3/4 ml-2">Placeholder</span>
                </div>
                <div class="flex items-center mb-2">
                    <p class="w-1/4 font-semibold">Title:</p> <span class="w-3/4 ml-2">Placeholder</span>
                </div>
                <div class="flex items-center mb-2">
                    <p class="w-1/4 font-semibold">Dates:</p> <span class="w-3/4 ml-2">Placeholder</span>
                </div>
                <div class="flex items-center mb-4 mt-4">
                    <span class="w-1/4"></span>
                    <span class="w-2/4">
                        <button class="bg-blue-600 text-white w-9/12 py-2 rounded hover:bg-blue-700">Approve Request</button>
                    </span>
                </div>
                <div class="flex items-center mb-4 mt-4">
                    <span class="w-1/4"></span>
                    <span class="w-2/4">
                        <button class="bg-gray-600 text-white w-9/12 py-2 rounded hover:bg-gray-700">Decline Request</button>
                    </span>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/4 pl-0 md:pl-5">
                <h2 class="text-xl font-bold mb-4">Approval History</h2>
                <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="flex items-center mb-2">
                    <p class="w-2/5">Date Placeholder</p> <span class="w-1/5 text-green-600">Approve</span> <span class="w-1/5 whitespace-nowrap">Name Placeholder</span>
                </div>
                <div class="flex items-center mb-2">
                    <p class="w-2/5">Date Placeholder</p> <span class="w-1/5 text-yellow-500">Pending</span> <span class="w-1/5 whitespace-nowrap">Name Placeholder</span>
                </div>
            </div>
        </div>
        
        <!-- Cut -->
        <div class="p-4 bg-gray-100 border border-gray-300 shadow sm:p-8 mt-4 ml-10 mr-10">
            <div>
                <h2 class="text-xl font-bold text-green-600">Request Form Details:</h2>
            </div>
            <div class="p-4 bg-gray-100 border border-gray-300 shadow sm:p-8 mt-4">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Upgrade Barangay Office Computer Systems</h2>
                </div>
                <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
                <!-- Description, Type, and Time -->
                <div class="request-item">
                    <p>Description: Modernize the barangay office computer systems by upgrading hardware and software to enhance productivity and efficiency in delivering services to residents.</p>
                    <p>Type of request: IT Upgrade</p>
                    <p>Time sent: 11:00 AM</p>
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

   </script>
</body>
