<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    
    @vite('resources/css/main.css', 'resources/js/app.js')
    

    <title>Request</title>


</head>
<body class="text-gray-800 font-inter">
    <!--sidenav -->
      @livewire('sidebar')
      <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <!-- navbar -->
        @livewire('navbar')
        <!-- end navbar -->

      <!-- Content -->
       
      <div class="py-2 ml-2">
   <div class="ml-2 mr-2">
      <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Purchase Request Page</h2>
      
      <p class="text-gray-600 pl-6 pb-6">
         <a href="#" class="text-indigo-700 hover:underline">Home</a> > 
         <span>Purchase Request Forms</span>
      </p>
   </div>
 
   <!-- Form Request -->
   <div class="mx-auto max-w-5xl">
    <div class="bg-white mt-4 sm:max-w-5xl sm:rounded-lg pl-3 pr-3 mb-4 ">
        <div class="px-6 mt-1 sm:max-w-5xl sm:rounded-lg pb-8">
            <h2 class="pt-7 text-xl font-bold sm:text-xl">Purchase Request Info</h2>
            
            <!-- Request Name -->
            <div class="grid mt-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <!-- First Row: P.R. Number and Date of Request -->
    <div class="mb-2">
        <label for="pr_number" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">P.R. Number</label>
        <input type="text" id="pr_number" name="pr_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Enter P.R. Number" required>
    </div>
    <div class="mb-2">
        <label for="date_of_request" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Date of Request</label>
        <input type="text" id="date_of_request" name="date_of_request" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Enter Date of Request" required>
    </div>

    <!-- Second Row: Barangay and City -->
    <div class="mb-2">
        <label for="barangay" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Barangay</label>
        <input type="text" id="barangay" name="barangay" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Enter Barangay" required>
    </div>
    <div class="mb-2">
        <label for="city" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">City</label>
        <input type="text" id="city" name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Enter City" required>
    </div>

    <!-- Third Row: Province -->
    <div class="mb-2">
        <label for="province" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Province</label>
        <input type="text" id="province" name="province" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Enter Province" required>
    </div>
</div>

                

              
            </div>
        </div>
    </div>

   <!-- Confirmation -->
<!-- Confirmation -->
<div class="bg-white mt-4 sm:max-w-5xl sm:rounded-lg pl-3 pr-3 mb-4">
    <div class="px-6 mt-1 sm:max-w-5xl sm:rounded-lg pb-8">
        <h2 class="pt-8 text-xl font-bold sm:text-xl">Purchase Request Info</h2>
        <div class="grid mt-8">
            <div class="overflow-x-auto">
                <table id="purchaseTable" class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg divide-y divide-gray-200">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">#</th>
                            <th class="py-3 px-4 text-left">Quantity</th>
                            <th class="py-3 px-4 text-left">Unit of Measurement</th>
                            <th class="py-3 px-4 text-left">Item Description</th>
                            <th class="py-3 px-4 text-left">Est. Unit Cost</th>
                            <th class="py-3 px-4 text-left">Est. Amount</th>
                            <th class="py-3 px-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody" class="text-gray-700 divide-y divide-gray-200">
                        <tr class="bg-white">
                            <td class="py-3 px-1">
                                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 w-full p-2.5" style="width: 50px;">
                            </td>
                            <td class="py-3 px-1">
                                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 w-full p-2.5" style="width: 100px;">
                            </td>
                            <td class="py-3 px-1">
                                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5">
                                    <option value="pieces">Pieces</option>
                                    <option value="boxes">Boxes</option>
                                    <option value="kg">Kg</option>
                                    <option value="meters">Meters</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </td>
                            <td class="py-3 px-1">
                                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 w-full p-2.5" style="width: 300px; resize: horizontal;">
                            </td>
                            <td class="py-3 px-1">
                                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 w-full p-2.5">
                            </td>
                            <td class="py-3 px-1">
                                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 w-full p-2.5">
                            </td>
                            <td class="py-3 px-1 text-center">
                                <button onclick="removeRow(this)" class="delete">Remove</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex justify-end w-full mt-4">
            <!-- Add Row Button -->
            <button onclick="addRow()" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">Add Row</button>
        </div>
    </div>
</div>

<div class="mb-2">
<div class="mx-auto max-w-5xl">
    <div class="bg-white mt-4 sm:max-w-5xl sm:rounded-lg pl-3 pr-3 mb-4 ">
        <div class="px-6 mt-1 sm:max-w-5xl sm:rounded-lg pb-8">
            <h2 class="pt-7 text-xl font-bold sm:text-xl"></h2>

        <label for="city" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Purpose</label>
        <input type="text" id="city" name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Enter Purpose" required>
        <div class="flex justify-end w-full mt-4"><button class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 mt-2">Send Request</button></div>
    </div>
    
    </div>


<script>
    function addRow() {
        const tableBody = document.getElementById("tableBody");
        const newRow = document.createElement("tr");

        newRow.innerHTML = `
            <td class="py-3 px-1">
                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 w-full p-2.5" style="width: 50px;">
            </td>
            <td class="py-3 px-1">
                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 w-full p-2.5" style="width: 100px;">
            </td>
            <td class="py-3 px-1">
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5">
                    <option value="pieces">Pieces</option>
                    <option value="boxes">Boxes</option>
                    <option value="kg">Kg</option>
                    <option value="meters">Meters</option>
                    <!-- Add more options as needed -->
                </select>
            </td>
            <td class="py-3 px-1">
                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 w-full p-2.5" style="width: 300px; resize: horizontal;">
            </td>
            <td class="py-3 px-1">
                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 w-full p-2.5">
            </td>
            <td class="py-3 px-1">
                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 w-full p-2.5">
            </td>
            <td class="py-3 px-1 text-center">
                <button onclick="removeRow(this)" class="delete">Remove</button>
            </td>
        `;

        tableBody.appendChild(newRow);
    }

    function removeRow(button) {
        const tableBody = document.getElementById("tableBody");
        const rows = tableBody.getElementsByTagName("tr");

        // Ensure there's more than one row before removing
        if (rows.length > 1) {
            const row = button.closest("tr");
            row.remove();
        } else {
            alert("Cannot remove the last row.");
        }
    }
</script>



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
</html>