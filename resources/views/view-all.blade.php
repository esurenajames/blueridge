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
      <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">View Forms </h2>
      
      <p class="text-gray-600 pl-6 pb-6">
         <a href="#" class="text-indigo-700 hover:underline">Home</a> >
         <span>View Forms</span>
      </p>
   </div>
 
<!-- Tab View -->
<div 
    x-data="{ activeTab: 'view-all' }" 
    class="space-y-5 bg-white p-1 mt-5 shadow-md ml-1 mr-2"
>
    <!-- Tabs -->
    <ul class="-mb-px flex items-center gap-4 text-sm font-medium">
        <li class="flex-1">
            <a 
                href="#" 
                @click.prevent="activeTab = 'view-all'" 
                :class="{ 'text-blue-700': activeTab === 'view-all', 'text-gray-500': activeTab !== 'view-all' }"
                class="relative flex items-center justify-center gap-2 px-4 py-2 bg-white rounded-t-md hover:text-blue-700"
            >
                View All Request
                <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500"> 8 </span>
            </a>
        </li>
        <li class="flex-1">
            <a 
                href="#" 
                @click.prevent="activeTab = 'to-approve'" 
                :class="{ 'text-blue-700': activeTab === 'to-approve', 'text-gray-500': activeTab !== 'to-approve' }"
                class="flex items-center justify-center gap-2 px-4 py-2 bg-white rounded-t-md hover:text-blue-700"
            >
                For Approval
                <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500"> 2 </span>
            </a>
        </li>
        <li class="flex-1">
            <a 
                href="#" 
                @click.prevent="activeTab = 'purchase-request'" 
                :class="{ 'text-blue-700': activeTab === 'purchase-request', 'text-gray-500': activeTab !== 'purchase-request' }"
                class="flex items-center justify-center gap-2 px-4 py-2 bg-white rounded-t-md hover:text-blue-700"
            >
                Processing
                <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500"> 8 </span>
            </a>
        </li>
        <li class="flex-1">
            <a 
                href="#" 
                @click.prevent="activeTab = 'purchase-order'" 
                :class="{ 'text-blue-700': activeTab === 'purchase-order', 'text-gray-500': activeTab !== 'purchase-order' }"
                class="flex items-center justify-center gap-2 px-4 py-2 bg-white rounded-t-md hover:text-blue-700"
            >
                Purchase Order
                <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500"> 1 </span>
            </a>
        </li>
        <li class="flex-1">
            <a 
                href="#" 
                @click.prevent="activeTab = 'declined'" 
                :class="{ 'text-blue-700': activeTab === 'declined', 'text-gray-500': activeTab !== 'declined' }"
                class="flex items-center justify-center gap-2 px-4 py-2 bg-white rounded-t-md hover:text-blue-700"
            >
                Declined
                <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500"> 2 </span>
            </a>
        </li>
        <li class="flex-1">
            <a 
                href="#" 
                @click.prevent="activeTab = 'history'" 
                :class="{ 'text-blue-700': activeTab === 'history', 'text-gray-500': activeTab !== 'history' }"
                class="flex items-center justify-center gap-2 px-4 py-2 bg-white rounded-t-md hover:text-blue-700"
            >
                History
                <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500"> 15 </span>
            </a>
        </li>
    </ul>
    <!-- Tab Content -->
    <div x-show="activeTab === 'view-all'" class="p-4">
    <!-- Content for View All tab -->
    <p>View All Content</p>
   </div>
   <div x-show="activeTab === 'to-approve'" class="p-4">
      <!-- Content for To Approve tab -->
      <p>To Approve Content</p>
   </div>
   <div x-show="activeTab === 'purchase-request'" class="p-4">
      <!-- Content for Purchase Request tab -->
      <p>Purchase Request Content</p>
   </div>
   <div x-show="activeTab === 'purchase-order'" class="p-4">
      <!-- Content for Purchase Order tab -->
      <p>Purchase Order Content</p>
   </div>
   <div x-show="activeTab === 'declined'" class="p-4">
      <!-- Content for Declined tab -->
      <p>Declined Content</p>
   </div>
   <div x-show="activeTab === 'history'" class="p-4">
      <!-- Content for History tab -->
      <p>History Content</p>
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