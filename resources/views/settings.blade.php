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
    <div class="ml-5 mr-5">
    <h2 class="text-3xl pt-6 pl-6 font-bold mb-1">Settings Page</h2>
    <p class="text-gray-600 pl-6 pb-6">Modify your account preferences.</p>
    <hr class="border-t border-gray-300 w-3.5/4 mx-auto">
    </div>   

    <div class="flex flex-col md:flex-row ml-5 mr-10">
    <!-- First Flex Div -->
    <div class="flex-wrap pl-6 md:p-4 gap-4">
        <div class="bg-white px-2 pb-1 mt-4 sm:max-w-xl sm:rounded-lg">
            <div class="px-6 pb-8 mt-1 sm:max-w-xl sm:rounded-lg">
                <h2 class="pt-7 text-xl font-bold sm:text-xl">Account Information</h2>
                <p class="text-gray-600">Edit your profile account</p>
                <div class="grid mt-8">
                    <div class="flex flex-col items-center space-y-3 sm:flex-row sm:space-y-0">
                        <img class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500"
                            src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGZhY2V8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60"
                            alt="Bordered avatar">
                    </div>

                    <div class="items-center mt-4 sm:mt-8 text-[#202142]">
                        <div class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                            <div class="w-full">
                                <label for="first_name" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">First name</label>
                                <input type="text" id="first_name"
                                    class="bg-gray-50 border border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 "
                                    placeholder="Mikee" required>
                            </div>

                            <div class="w-full">
                                <label for="last_name" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">last name</label>
                                <input type="text" id="last_name"
                                    class="bg-gray-50 border border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 "
                                    placeholder="Gonzaga" required>
                            </div>
                        </div>

                        <div class="mb-2 sm:mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Username</label>
                            <input type="email" id="email"
                                class="bg-gray-50 border border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 "
                                placeholder="juan.delacruz" required>
                        </div>

                        <div class="mb-2 sm:mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Email</label>
                            <input type="text" id="email"
                                class="bg-gray-50 border border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 "
                                placeholder="juan.delacruz@gmail.com" required>
                        </div>

                        <div class="mb-2 sm:mb-6">
                            <label for="profession" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Profession</label>
                            <input type="text" id="profession" 
                                class="bg-gray-50 border border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 "
                                placeholder="Tanod" required>
                        </div>

                        <div class="flex justify-end w-full">
                            <button type="submit"
                                class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Second Flex Div -->
    <div class="flex-1 flex-wrap pl-6 md:p-4 gap-6">
        <div class="bg-white mt-4 sm:max-w-xl sm:rounded-lg">
            <div class="px-6 mt-1 sm:max-w-xl sm:rounded-lg pb-8">
                <h2 class="pt-7 text-xl font-bold sm:text-xl">Password</h2>
                <div class="grid mt-8">
                    <div class="mb-2 sm:mb-6">
                        <label for="current_password" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Current Password</label>
                        <input type="password" id="current_password" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Enter current password" required>
                    </div>

                    <div class="mb-2 sm:mb-6">
                        <label for="new_password" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">New Password</label>
                        <input type="password" id="new_password" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Enter new password" required>
                    </div>

                    <div class="mb-2 sm:mb-6">
                        <label for="retype_password" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Re-type New Password</label>
                        <input type="password" id="retype_password" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Retype new password" required>
                    </div>

                    <div class="flex justify-end w-full">
                        <button type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Save</button>
                    </div>
                </div>
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