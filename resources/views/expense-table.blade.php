<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

@vite('resources/css/main.css', 'resources/js/app.js')
<title>Admin Panel</title>

<body>
    <!--sidenav -->
    @livewire('sidebar-secretary')
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->
    <div class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <!-- navbar -->
        @livewire('navbar')
        <!-- end navbar -->

        <div class="ml-5 mr-5">
            <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Summary of Income and Expenditure 2024</h2>
            <ol class="list-none p-0 inline-flex space-x-2 ml-6 ">
                <li class="flex items-center">
                    <svg onclick="window.location.href='/';" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" class="cursor-pointer hover:fill-blue-500 transition-colors duration-300" fill="#4b5563"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                    <span class="mx-2">/</span>
                </li>
                <li class="flex items-center">
                    <span class="text-gray-800">Summary of Income and Expenditure</span>
                </li>
            </ol>
        </div> 

        <div class="p-4" x-data="{ showFirstHalf: true, showSecondHalf: true, openSections: [], editing: false }">
         <div class="overflow-x-auto">
             <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
                 <thead class="bg-gray-100 border-b">
                     <tr>
                         <th class="py-2 px-4 border-r text-left text-gray-600 font-medium">Object of Expenditure</th>
                         <th class="py-2 px-4 text-left text-gray-600 font-medium wrap-header">Proposed Budget</th>
                         <th class="py-2 px-4 text-left text-gray-600 font-medium cursor-pointer" @click="showFirstHalf = !showFirstHalf">1st half</th>
                         <th class="py-2 px-4 text-left text-gray-600 font-medium" x-show="showFirstHalf">Jan</th>
                         <th class="py-2 px-4 text-left text-gray-600 font-medium" x-show="showFirstHalf">Feb</th>
                         <th class="py-2 px-4 text-left text-gray-600 font-medium" x-show="showFirstHalf">Mar</th>
                         <th class="py-2 px-4 text-left text-gray-600 font-medium" x-show="showFirstHalf">Apr</th>
                         <th class="py-2 px-4 text-left text-gray-600 font-medium" x-show="showFirstHalf">May</th>
                         <th class="py-2 px-4 text-left text-gray-600 font-medium" x-show="showFirstHalf">Jun</th>
                         <th class="py-2 px-4 text-left text-gray-600 font-medium cursor-pointer" @click="showSecondHalf = !showSecondHalf">2nd half</th>
                         <th class="py-2 px-4 text-left text-gray-600 font-medium" x-show="showSecondHalf">Jul</th>
                         <th class="py-2 px-4 text-left text-gray-600 font-medium" x-show="showSecondHalf">Aug</th>
                         <th class="py-2 px-4 text-left text-gray-600 font-medium" x-show="showSecondHalf">Sept</th>
                         <th class="py-2 px-4 text-left text-gray-600 font-medium" x-show="showSecondHalf">Oct</th>
                         <th class="py-2 px-4 text-left text-gray-600 font-medium" x-show="showSecondHalf">Nov</th>
                         <th class="py-2 px-4 text-left text-gray-600 font-medium" x-show="showSecondHalf">Dec</th>
                         <th class="py-2 px-4 border-r text-left text-gray-600 font-medium">Actions</th>
                     </tr>
                 </thead>
                 <tbody class="divide-y divide-gray-200">
                     <!-- Beginning Cash Balance Section -->
                     <tr class="main-row cursor-pointer bg-gray-50 hover:bg-gray-100" @click="openSections.includes(1) ? openSections = openSections.filter(i => i !== 1) : openSections.push(1)">
                         <td class="py-3 px-4 border-r flex justify-between items-center">
                             Beginning Cash Balance
                             <i :class="openSections.includes(1) ? 'ri-arrow-down-s-line transform rotate-180' : 'ri-arrow-down-s-line'" class="transition-transform duration-200"></i>
                         </td>
                     </tr>
                     <tr x-show="openSections.includes(1)" class="group1 bg-white">
                         <td :contenteditable="editing" class="py-3 px-4 border-r">Initial Cash Balance</td>
                         <td :contenteditable="editing" class="py-3 px-4">P100,000.0</td>
                         <td class="py-3 px-4">summary of first half</td>
                         <td :contenteditable="editing" class="py-3 px-4" x-show="showFirstHalf">P100,000.0</td>
                         <td :contenteditable="editing" class="py-3 px-4" x-show="showFirstHalf">P100,000.0</td>
                         <td :contenteditable="editing" class="py-3 px-4" x-show="showFirstHalf">P100,000.0</td>
                         <td :contenteditable="editing" class="py-3 px-4" x-show="showFirstHalf">P100,000.0</td>
                         <td :contenteditable="editing" class="py-3 px-4" x-show="showFirstHalf">P100,000.0</td>
                         <td :contenteditable="editing" class="py-3 px-4" x-show="showFirstHalf">P100,000.0</td>
                         <td class="py-3 px-4">summary of second half</td>
                         <td :contenteditable="editing" class="py-3 px-4" x-show="showSecondHalf">P100,000.0</td>
                         <td :contenteditable="editing" class="py-3 px-4" x-show="showSecondHalf">P100,000.0</td>
                         <td :contenteditable="editing" class="py-3 px-4" x-show="showSecondHalf">P100,000.0</td>
                         <td :contenteditable="editing" class="py-3 px-4" x-show="showSecondHalf">P100,000.0</td>
                         <td :contenteditable="editing" class="py-3 px-4" x-show="showSecondHalf">P100,000.0</td>
                         <td :contenteditable="editing" class="py-3 px-4" x-show="showSecondHalf">P100,000.0</td>
                         <td class="py-3 px-4">
                             <button @click="editing = !editing" class="bg-blue-500 text-white px-4 py-1 rounded">
                                 <span x-text="editing ? 'Save' : 'Edit'"></span>
                             </button>
                         </td>
                     </tr>
                 </tbody>
             </table>
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
