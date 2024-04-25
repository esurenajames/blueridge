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

      <!-- Content -->
      <div class="ml-5 mr-5">
    <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">My Notifications</h2>

    <p class="text-gray-600 pl-6 pb-6">
         <a href="#" class="text-indigo-700 hover:underline">Home</a> >
         <span>Notifications</span>
      </p>

    </div>   

    <div class="flex flex-col md:flex-row ml-5 mr-10" style="height: 100vh;">
  <div class="w-1/2 bg-white dark:bg-white-800 rounded-xl mx-auto border p-10 shadow-sm mt-5 mb-5 overflow-y-auto">
    <div class="inline-flex items-center justify-between w-full">
      <h3 class="font-bold text-xl sm:text-2xl text-gray-800 dark:text-black">Notifications</h3>
    </div>
    <p class="mt-8 font-medium text-gray-500 text-sm sm:text-base dark:text-black">Today</p>
<div class="mt-2 px-6 py-4 bg-white rounded-lg shadow w-full">
    <div class="inline-flex items-center justify-between w-full">
        <div class="inline-flex items-center">
            <img
                src="https://cdn-icons-png.flaticon.com/128/1312/1312128.png"
                alt="Form Request Icon" class="w-6 h-6 mr-3">
            <h3 class="font-bold text-base text-gray-800">Form Request</h3>
        </div>
        <p class="text-xs text-gray-500">
            Just now
        </p>
    </div>
    <p class="mt-1 text-sm">
        Your form request has been submitted.
    </p>
</div>

<div class="mt-2 px-6 py-4 bg-white rounded-lg shadow w-full">
    <div class="inline-flex items-center justify-between w-full">
        <div class="inline-flex items-center">
            <img
                src="https://cdn-icons-png.flaticon.com/128/1312/1312129.png"
                alt="Form Approved Icon" class="w-6 h-6 mr-3">
            <h3 class="font-bold text-base text-gray-800">Form Approved</h3>
        </div>
        <p class="text-xs text-gray-500">
            10 min ago
        </p>
    </div>
    <p class="mt-1 text-sm">
        Your form request has been approved.
    </p>
</div>

<div class="mt-2 px-6 py-4 bg-white rounded-lg shadow w-full">
    <div class="inline-flex items-center justify-between w-full">
        <div class="inline-flex items-center">
            <img
                src="https://cdn-icons-png.flaticon.com/128/1312/1312129.png"
                alt="Form Approved Icon" class="w-6 h-6 mr-3">
            <h3 class="font-bold text-base text-gray-800">Form Approved</h3>
        </div>
        <p class="text-xs text-gray-500">
            10 hours ago
        </p>
    </div>
    <p class="mt-1 text-sm">
        Your form request has been approved.
    </p>
</div>

<p class="mt-8 font-medium text-gray-500 text-sm sm:text-base dark:text-black">Yesterday</p>

<div class="mt-2 px-6 py-4 bg-white rounded-lg shadow w-full">
    <div class="inline-flex items-center justify-between w-full">
        <div class="inline-flex items-center">
            <img
                src="https://cdn-icons-png.flaticon.com/128/1312/1312129.png"
                alt="Form Approved Icon" class="w-6 h-6 mr-3">
            <h3 class="font-bold text-base text-gray-800">Form Approved</h3>
        </div>
        <p class="text-xs text-gray-500">
            10 hours ago
        </p>
    </div>
    <p class="mt-1 text-sm">
        Your form request has been approved.
    </p>
</div>

<div class="mt-2 px-6 py-4 bg-white rounded-lg shadow w-full">
    <div class="inline-flex items-center justify-between w-full">
        <div class="inline-flex items-center">
            <img
                src="https://cdn-icons-png.flaticon.com/128/1312/1312131.png"
                alt="Form Declined Icon" class="w-6 h-6 mr-3">
            <h3 class="font-bold text-base text-gray-800">Form Declined</h3>
        </div>
        <p class="text-xs text-gray-500">
            15 hours ago
        </p>
    </div>
    <p class="mt-1 text-sm">
        Your form request has been declined.
    </p>
</div>

<div class="mt-2 px-6 py-4 bg-white rounded-lg shadow w-full">
    <div class="inline-flex items-center justify-between w-full">
        <div class="inline-flex items-center">
            <img
                src="https://cdn-icons-png.flaticon.com/128/1312/1312131.png"
                alt="Form Declined Icon" class="w-6 h-6 mr-3">
            <h3 class="font-bold text-base text-gray-800">Form Declined</h3>
        </div>
        <p class="text-xs text-gray-500">
            15 hours ago
        </p>
    </div>
    <p class="mt-1 text-sm">
        Your form request has been declined.
    </p>
</div>

<p class="mt-8 font-medium text-gray-500 text-sm sm:text-base dark:text-black">April 21, 2024</p>

<div class="mt-2 px-6 py-4 bg-white rounded-lg shadow w-full">
    <div class="inline-flex items-center justify-between w-full">
        <div class="inline-flex items-center">
            <img
                src="https://cdn-icons-png.flaticon.com/128/1312/1312129.png"
                alt="Form Approved Icon" class="w-6 h-6 mr-3">
            <h3 class="font-bold text-base text-gray-800">Form Approved</h3>
        </div>
        <p class="text-xs text-gray-500">
            32 hours ago
        </p>
    </div>
    <p class="mt-1 text-sm">
        Your form request has been approved.
    </p>
</div>

<div class="mt-2 px-6 py-4 bg-white rounded-lg shadow w-full">
    <div class="inline-flex items-center justify-between w-full">
        <div class="inline-flex items-center">
            <img
                src="https://cdn-icons-png.flaticon.com/128/1312/1312131.png"
                alt="Form Declined Icon" class="w-6 h-6 mr-3">
            <h3 class="font-bold text-base text-gray-800">Form Declined</h3>
        </div>
        <p class="text-xs text-gray-500">
            33 hours ago
        </p>
    </div>
    <p class="mt-1 text-sm">
        Your form request has been declined.
    </p>
</div>

<div class="mt-2 px-6 py-4 bg-white rounded-lg shadow w-full">
    <div class="inline-flex items-center justify-between w-full">
        <div class="inline-flex items-center">
            <img
                src="https://cdn-icons-png.flaticon.com/128/1312/1312131.png"
                alt="Form Declined Icon" class="w-6 h-6 mr-3">
            <h3 class="font-bold text-base text-gray-800">Form Declined</h3>
        </div>
        <p class="text-xs text-gray-500">
            40 hours ago
        </p>
    </div>
    <p class="mt-1 text-sm">
        Your form request has been declined.
    </p>
</div>

    <!-- Additional notifications can be added here -->
    <button
    class="inline-flex text-sm bg-white justify-center px-4 py-2 mt-12 w-full text-red-500 items-center rounded font-medium
     shadow border focus:outline-none transform active:scale-75 transition-transform duration-700 hover:bg-red-500
      hover:text-white hover:-translate-y-1 hover:scale-110 dark:hover:bg-white dark:text-gray-800 dark:hover:text-gray-800">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 sm:mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    Clear all notifications
    </button>
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