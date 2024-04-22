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
    

    <title>Admin Panel</title>


</head>
<body>
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
      <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Request Forms</h2>
      
      <p class="text-gray-600 pl-6 pb-6">
         <a href="#" class="text-indigo-700 hover:underline">Home</a> >
         <span>Request Forms</span>
      </p>
   </div>
 
   <!-- Form Request -->
   <div class="mx-auto max-w-xl">
      <ol class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
         <li class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
            <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                  <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                     <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                  </svg>
                  Request<span class="hidden sm:inline-flex sm:ms-2">Type</span>
            </span>
         </li>
         <li class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
            <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
                  <span class="me-2">2</span>
                  Request <span class="hidden sm:inline-flex sm:ms-2">Info</span>
            </span>
         </li>
         <li class="flex items-center">   
            <span class="me-2">3</span>
            Confirmation
         </li>
      </ol>

       <!-- Request Type -->
    <div class="bg-white mt-10 sm:max-w-xl sm:rounded-lg pl-3 pr-3 mb-4">
        <div class="px-6 mt-1 sm:max-w-xl sm:rounded-lg pb-8">
            <h2 class="pt-7 text-xl font-bold sm:text-xl">Request Type</h2>   
            
            <!-- Type of Request -->
            <div class="grid mt-8">
                <div class="mb-2 sm:mb-6">
                    <label for="request_type" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Type of Request</label>
                    <select id="request_type" name="request_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" required>
                        <option value="" disabled selected>Select Request Type</option>
                        <option value="type1">Type 1</option>
                        <option value="type2">Type 2</option>
                        <option value="type3">Type 3</option>
                    </select>
                </div>
                
                <!-- Next Button -->
                <div class="flex justify-end w-full">
                    <button class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Next</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Request Info -->
    <div class="bg-white mt-10 sm:max-w-xl sm:rounded-lg pl-3 pr-3 mb-4 hidden">
        <div class="px-6 mt-1 sm:max-w-xl sm:rounded-lg pb-8">
            <h2 class="pt-7 text-xl font-bold sm:text-xl">Request Info</h2>
            
            <!-- Request Name -->
            <div class="grid mt-8">
                <div class="mb-2 sm:mb-6">
                    <label for="request_name" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Name of Request</label>
                    <input type="text" id="request_name" name="request_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Enter request name" required>
                </div>
                
                <!-- Request Description -->
                <div class="mb-2 sm:mb-6">
                    <label for="request_description" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Description</label>
                    <textarea id="request_description" name="request_description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Enter request description" required></textarea>
                </div>
                
                <!-- Request File -->
                <div class="mb-2 sm:mb-6">
                    <label for="request_file" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">File</label>
                    <input type="file" id="request_file" name="request_file" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" required>
                </div>
            </div>
            
            <!-- Next Button -->
            <div class="flex justify-between w-full">
                <button class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
                <button class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Next</button>
            </div>
        </div>
    </div>

   <!-- Confirmation -->
<div class="bg-white mt-10 sm:max-w-xl sm:rounded-lg pl-3 pr-3 mb-4 hidden">
    <div class="px-6 mt-1 sm:max-w-xl sm:rounded-lg pb-8">
        <h2 class="pt-7 text-xl font-bold sm:text-xl">Confirmation</h2>
        
        <!-- Summary -->
        <div class="grid mt-8">

            <div class="mb-2 sm:mb-6">
                <label for="summary_type" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Type of Request</label>
                <input type="text" id="summary_type" name="summary_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" readonly>
            </div>

            <div class="mb-2 sm:mb-6">
                <label for="summary_name" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Name of Request</label>
                <input type="text" id="summary_name" name="summary_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" readonly>
            </div>
            
            <!-- Request Description -->
            <div class="mb-2 sm:mb-6">
                <label for="summary_description" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Description</label>
                <textarea id="summary_description" name="summary_description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" readonly></textarea>
            </div>
            
            <!-- Request File -->
            <div class="mb-2 sm:mb-6">
                <label for="summary_file" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">File</label>
                <input type="text" id="summary_file" name="summary_file" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" readonly>
            </div>
            
        </div>
        
        <!-- Submit Button -->
        <div class="flex justify-end w-full mt-4">
            <button class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 mt-2">Send Request</button>
        </div>
         <div class="flex justify-between w-full mt-6">
            <button class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
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

   </script>


</body>
</html>