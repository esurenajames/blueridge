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

        <div class="p-4 mt-10 ml-5 mr-5" x-data="{ showFirstHalf: true, showSecondHalf: true, openSections: [], editing: false, showRowModal: false, type: '', rowType: '', subRows: ['Sub Row 1', 'Sub Row 2'], selectedSubRow: '' }">
         <div class="overflow-x-auto">
            <div class="flex justify-end mb-4">
                <button @click="showRowModal = true" class="px-6 py-2.5 min-w-[150px] rounded text-white text-sm font-semibold border-none outline-none bg-[#333] hover:bg-[#222]">Add Row</button>
            </div>
            <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="py-2 px-4 border-r text-left text-gray-600 font-medium whitespace-nowrap">Object of Expenditure</th>
                        <th class="py-2 px-4 text-left text-gray-600 font-medium whitespace-nowrap">Proposed Budget</th>
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
                        <th class="py-2 px-4 text-left text-gray-600 font-medium">YTD</th>
                        <th class="py-2 px-4 text-left text-gray-600 font-medium">Balance</th>
                        <th class="py-2 px-4 border-r text-left text-gray-600 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($groupedExpenses as $sectionId => $expenses)
                        <tr class="cursor-pointer bg-gray-50 hover:bg-gray-100" @click="openSections.includes({{ $sectionId }}) ? openSections = openSections.filter(i => i !== {{ $sectionId }}) : openSections.push({{ $sectionId }})">
                            <td class="py-3 px-4 border-r flex justify-between items-center">
                                <span class="font-medium">{{ $sectionNames[$sectionId] }}</span>
                                <i :class="openSections.includes({{ $sectionId }}) ? 'ri-arrow-down-s-line transform rotate-180' : 'ri-arrow-down-s-line'" class="transition-transform duration-200"></i>
                            </td>
                        </tr>
                        @foreach($expenses as $expense)
                            <tr x-show="openSections.includes({{ $sectionId }})" class="bg-white">
                                <td :contenteditable="editing" class="py-3 px-4 border-r">{{ $expense->object_of_expenditure }}</td>
                                <td :contenteditable="editing" class="py-3 px-4">{{ $expense->proposed_budget }}</td>
                                <td class="py-3 px-4">{{ $expense->first_half }}</td> <!-- First half summary -->
                                <td class="py-3 px-4" x-show="showFirstHalf">{{ $expense->jan }}</td>
                                <td class="py-3 px-4" x-show="showFirstHalf">{{ $expense->feb }}</td>
                                <td class="py-3 px-4" x-show="showFirstHalf">{{ $expense->mar }}</td>
                                <td class="py-3 px-4" x-show="showFirstHalf">{{ $expense->apr }}</td>
                                <td class="py-3 px-4" x-show="showFirstHalf">{{ $expense->may }}</td>
                                <td class="py-3 px-4" x-show="showFirstHalf">{{ $expense->jun }}</td>
                                <td class="py-3 px-4">{{ $expense->second_half }}</td> <!-- Second half summary -->
                                <td class="py-3 px-4" x-show="showSecondHalf">{{ $expense->jul }}</td>
                                <td class="py-3 px-4" x-show="showSecondHalf">{{ $expense->aug }}</td>
                                <td class="py-3 px-4" x-show="showSecondHalf">{{ $expense->sept }}</td>
                                <td class="py-3 px-4" x-show="showSecondHalf">{{ $expense->oct }}</td>
                                <td class="py-3 px-4" x-show="showSecondHalf">{{ $expense->nov }}</td>
                                <td class="py-3 px-4" x-show="showSecondHalf">{{ $expense->dec }}</td>
                                <td class="py-3 px-4">{{ $expense->ytd }}</td> <!-- YTD summary -->
                                <td class="py-3 px-4">{{ $expense->balance }}</td>
                                <td class="py-5 px-4 flex justify-start">
                                    <button class="mr-4" title="Edit" @click="editing = !editing">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-blue-500 hover:fill-blue-700" viewBox="0 0 348.882 348.882">
                                            <path d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z" data-original="#000000"/>
                                            <path d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z" data-original="#000000"/>
                                        </svg>
                                    </button>
                                    <button class="mr-4 mb-1" title="View Details" @click="showViewDetailsModal = true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-6 fill-green-500 hover:fill-green-700" viewBox="0 0 24 24">
                                            <path d="M12 7c-2.2 0-4 1.8-4 4s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4m0 6c-1.1 0-2-0.9-2-2s0.9-2 2-2 2 0.9 2 2-0.9 2-2 2m0-8c7.7 0 14 6.3 14 14 0 1.1-0.9 2-2 2-1.1 0-2-0.9-2-2 0-5.5-4.5-10-10-10s-10 4.5-10 10c0 1.1-0.9 2-2 2-1.1 0-2-0.9-2-2 0-7.7 6.3-14 14-14m0 20c3.9 0 7-3.1 7-7s-3.1-7-7-7-7 3.1-7 7 3.1 7 7 7z" data-original="#000000"/>
                                        </svg>
                                    </button>
                                    <button class="mr-1" title="Delete" @click="console.log(showConfirmationModal); showConfirmationModal = true;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 hover:fill-red-700" viewBox="0 0 24 24">
                                            <path d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z" data-original="#000000"/>
                                            <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z" data-original="#000000"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
            
            <div x-show="showRowModal" class="fixed inset-0 overflow-y-auto z-[1000]">
                <div class="fixed inset-0 flex justify-center items-center z-[1000] bg-[rgba(0,0,0,0.5)]">
                    <div class="w-full max-w-lg bg-white shadow-lg rounded-md p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h4 class="text-lg text-[#333] font-semibold">Add Rows</h4>
                            <!-- Close button -->
                            <svg type="button" @click="showRowModal = false" xmlns="http://www.w3.org/2000/svg" class="w-3.5 cursor-pointer shrink-0 fill-[#333] hover:fill-red-500 float-right" viewBox="0 0 320.591 320.591">
                                <path d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z" data-original="#000000"></path>
                                <path d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z" data-original="#000000"></path>
                            </svg>
                        </div>
            
                        <!-- Form to handle submission -->
                        <form action="{{ route('expense.store') }}" method="POST">
                            @csrf
                            <select x-model="type" name="type" class="w-full mb-4 px-3 py-2 border border-gray-300 rounded-md">
                                <option value="" disabled>Select Type</option>
                                <option value="Cash Balance">Cash Balance</option>
                                <option value="Receipts">Receipts</option>
                                <option value="Expenditures">Expenditures</option>
                            </select>
                            
                            <!-- Always visible text input for Sub Row Name -->
                            <input type="text" name="object_of_expenditure" placeholder="Enter Sub Row Name" class="w-full mb-4 px-3 py-2 border border-gray-300 rounded-md">
                            
                            <!-- Buttons to add or cancel -->
                            <div class="flex justify-end gap-4 max-sm:flex-col">
                                <button type="button" @click="showRowModal = false" class="px-6 py-2.5 min-w-[150px] rounded text-white text-sm font-semibold border-none outline-none bg-[#333] hover:bg-[#222]">Cancel</button>
                                <button type="submit" class="px-6 py-2.5 min-w-[150px] rounded text-[#333] text-sm font-semibold border-none outline-none bg-gray-200 hover:bg-gray-300 active:bg-gray-200">Add</button>
                            </div>
                        </form>
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
