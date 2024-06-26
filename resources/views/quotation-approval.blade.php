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
        <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Quotation Approval</h2>
        <ol class="list-none p-0 inline-flex space-x-2 ml-6 ">
            <li class="flex items-center">
            <svg onclick="window.location.href='/';" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" class="cursor-pointer hover:fill-blue-500 transition-colors duration-300" fill="#4b5563"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>        <span class="mx-2">/</span>
            </li>
            <li class="flex items-center">
                <span class="text-gray-800">Quotation Approval</span>
            </li>
        </ol>
    </div>  
 
    <div class="mt-2 w-/4 mx-auto">
        <div x-data="{ rows: [{},], totalAmount: 0 }" class="bg-white mt-10 sm:rounded-lg pl-6 pr-6 mb-4 mx-auto max-w-screen-xl mt-7 ">
            <div class="flex justify-between items-start">
            <a href="{{ route('view-all') }}" class="flex items-center text-gray-700 hover:text-black font-medium text-md mt-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 transform rotate-180" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8.293 2.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L13.586 11H3a1 1 0 1 1 0-2h10.586L8.293 3.707a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/>
                </svg>
                Back
            </a>
                <div class="mt-6">                
                    <span>
                        <a>Request ID: #12345</a>
                        <span class="question-mark-btn">
                                <i class='bx bx-question-mark'></i>
                            </span>
                    </span> <span class="self-end ml-1 font-light">|</span>
                    <span class="text-yellow-500 self-end ml-1 font-medium">Quotation send last date placeholder</span>
                </div>
            </div>

            <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">

        <!-- Existing content -->
        <div class="px-8 mt-1 sm:rounded-lg pb-8">
            <!-- Start of Stepper -->            

            <!-- Start of Table -->    
            <div x-data="{ selectedCell: null }">
               <table class="selectable-table">
                   <thead>
                       <tr>
                           <th>Qty</th>
                           <th>Unit</th>
                           <th>Item</th>
                           <th>Asus</th>
                           <th>Gigabyte</th>
                           <th>MSI</th>
                       </tr>
                   </thead>
                   <tbody id="selectableTableBody">
                       <tr>
                           <td>2</td>
                           <td>pcs</td>
                           <td>Laptop</td>
                           <td x-on:click="selectedCell = 1" x-bind:class="{ 'selected': selectedCell === 1 }" class="company">
                               <span class="block text-gray-600 text-base">Asus Laptop - Model A</span>
                               <span class="block text-gray-600 text-sm">$1200</span>
                           </td>
                           <td x-on:click="selectedCell = 2" x-bind:class="{ 'selected': selectedCell === 2 }" class="company">
                               <span class="block text-gray-600 text-base"> Gigabyte Laptop - Model B</span>
                               <span class="block text-gray-600 text-sm">$1100</span>
                           </td>
                           <td x-on:click="selectedCell = 3" x-bind:class="{ 'selected': selectedCell === 3 }" class="company">
                               <span class="block text-gray-600 text-base">MSI Laptop - Model C</span>
                               <span class="block text-gray-600 text-sm">$1300</span>
                           </td>
                       </tr>
                       <tr>
                           <td>1</td>
                           <td>pcs</td>
                           <td>Mouse</td>
                           <td x-on:click="selectedCell = 4" x-bind:class="{ 'selected': selectedCell === 4 }" class="company">
                                <span class="block text-gray-600 text-base">Asus Mouse - Model X</span>
                               <span class="block text-gray-600 text-sm">$20</span>
                           </td>
                           <td x-on:click="selectedCell = 5" x-bind:class="{ 'selected': selectedCell === 5 }" class="company">
                               <span class="block text-gray-600 text-base">Gigabyte Mouse - Model Y</span>
                               <span class="block text-gray-600 text-sm">$25</span>
                           </td>
                           <td x-on:click="selectedCell = 6" x-bind:class="{ 'selected': selectedCell === 6 }" class="company">
                               <span class="block text-gray-600 text-base">MSI Mouse - Model Z</span>
                               <span class="block text-gray-600 text-sm">$30</span>
                           </td>
                       </tr>
                       <tr>
                           <td>3</td>
                           <td>pcs</td>
                           <td>Keyboard</td>
                           <td x-on:click="selectedCell = 7" x-bind:class="{ 'selected': selectedCell === 7 }" class="company">
                               <span class="block text-gray-600 text-base">Asus Keyboard - Model P</span>
                               <span class="block text-gray-600 text-sm">$50</span>
                           </td>
                           <td x-on:click="selectedCell = 8" x-bind:class="{ 'selected': selectedCell === 8 }" class="company">

                               <span class="block text-gray-600 text-base">Gigabyte Keyboard - Model Q</span>
                               <span class="block text-gray-600 text-sm">$45</span>
                           </td>
                           <td x-on:click="selectedCell = 9" x-bind:class="{ 'selected': selectedCell === 9 }" class="company">
                               <span class="block text-gray-600 text-base">MSI Keyboard - Model R</span>
                               <span class="block text-gray-600 text-sm">$55</span>
                           </td>
                       </tr>
                       <tr id="totalsRow">
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td id="asusTotal" class="text-gray-800 text-md">$1270</td>
                        <td id="gigabyteTotal" class="text-gray-800 text-sm">$1170</td>
                        <td id="msiTotal" class="text-gray-800 text-sm">$1385</td>
                    </tr>
                   </tbody>
               </table>
           </div>

           <div class="flex justify-end mt-4">
                <span class="text-gray-700 text-base font-semibold">Selected Total:</span>
                <span id="selectedTotal" class="text-gray-700 text-base font-semibold ml-2">$0.00</span>
            </div>
        
        
            <!-- End of Table -->
            <div class="mt-6">
               <h2 class="text-lg font-bold text-gray-900">Remarks:</h2>
               <textarea class="w-full mt-2 p-2 border border-gray-300 rounded-md" rows="4" placeholder="Enter remarks here..."></textarea>
           </div>
           
           <!-- Send button -->
           <div class="flex justify-end mt-6">
               <button class="bg-indigo-700 hover:bg-indigo-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                   Send
               </button>
           </div>
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
        document.getElementById('selectedTotal').innerText = "$" + total.toFixed(2);
    }

   </script>
</body>
