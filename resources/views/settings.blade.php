<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
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
        <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Settings</h2>
        <p class="text-gray-600 pl-6 pb-6">Update and manage your profile information and password.</p>
        <hr class="border-t border-gray-300 w-3.5/4 mx-auto">
    </div>   

    <div class="flex flex-col md:flex-row ml-5 mr-10">
        <!-- First Flex Div -->
        <div class="flex-wrap pl-6 md:p-4 gap-4" >
            <div class="bg-white px-2 pb-1 mt-4 sm:max-w-xl sm:rounded-lg">
                <div class="px-6 pb-8 mt-1 sm:max-w-xl sm:rounded-lg">
                    <h2 class="pt-7 text-xl font-bold sm:text-xl mb-2">Account Information</h2>
                    <p class="text-gray-600">Edit your profile account</p>
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="grid mt-8" x-data="{ open: false, showModal: false}">
                        <div class="relative flex flex-col items-center space-y-3 sm:flex-row sm:space-y-0">
                            <img @click="open = !open" class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500 cursor-pointer" 
                                 src="{{ Auth::user()->profile_picture ? Storage::url(Auth::user()->profile_picture) : asset('images/default-profile.jpg') }}" 
                                 alt="Bordered avatar">
                            <div x-show="open" @click.away="open = false" class="absolute top-44 mt-2 bg-white border dark:bg-gray-800 border-gray-700 shadow-lg rounded-md w-55 z-10">
                                <ul>
                                    <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer text-sm text-white" @click="showModal = true; open = false">See Profile Picture</li>
                                    <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer text-sm text-white upload-new-profile">Upload New Profile</li>
                                </ul>
                            </div>
                            
                        </div>
    
                        <!-- Hidden File Input -->
                        <input type="file" id="profile_picture_input" name="profile_picture" class="hidden" accept="image/*" @change="handleFileUpload">
    
                        <!-- Modal -->
                        <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" @click="showModal = false">
                            <div class="bg-white p-1 rounded-lg shadow-lg" @click.stop>
                                <button @click="showModal = false" class="absolute top-0 right-0 mt-4 mr-4 text-white text-4xl">&times;</button>
                                
                                <!-- Use a Blade directive to check if profile_picture exists -->
                                @if(Auth::user()->profile_picture)
                                    <img class="w-full h-full object-cover rounded-lg" src="{{ Storage::url(Auth::user()->profile_picture) }}" style="max-height: 80vh;" alt="Enlarged Profile Picture">
                                @else
                                    <!-- Provide a default image or placeholder if no profile picture exists -->
                                    <img class="w-full h-full object-cover rounded-lg" src="{{ asset('images/default-profile.jpg') }}" style="max-height: 80vh;" alt="Default Profile Picture">
                                @endif
                            </div>
                        </div>
                        

                            <div class="items-center mt-4 sm:mt-8 text-[#202142]">
                                <div class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                                    <div class="w-full">
                                        <label for="first_name" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">First name</label>
                                        <input type="text" id="fname" name="fname" value="{{ Auth::user()->fname ?? '' }}" class="bg-gray-50 border border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5" required>
                                    </div>
    
                                    <div class="w-full">
                                        <label for="last_name" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Last name</label>
                                        <input type="text" id="lname" name="lname" value="{{ Auth::user()->lname ?? '' }}" class="bg-gray-50 border border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5" required>
                                    </div>
                                </div>
    
                                <div class="mb-2 sm:mb-6">
                                    <label for="email" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Username</label>
                                    <input type="text" id="username" name="username" value="{{ Auth::user()->username ?? '' }}" class="bg-gray-50 border border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5" required>
                                </div>
    
                                <div class="mb-2 sm:mb-6">
                                    <label for="email" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Email</label>
                                    <input type="email" id="email" name="email" value="{{ Auth::user()->email ?? '' }}" class="bg-gray-50 border border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5" required>
                                </div>
    
                                <div class="mb-2 sm:mb-6">
                                    <label for="profession" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Profession</label>
                                    <input type="text" id="profession" name="profession" value="{{ Auth::user()->profession ?? '' }}" class="bg-gray-50 border border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5" placeholder="Barangay Official" required>
                                </div>
    
                                <div class="flex justify-end w-full">
                                    <button type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 mt-2">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- Second Flex Div -->
    <div class="flex-1 flex-wrap pl-6 md:p-4 gap-6 mb-4">
        <div class="bg-white mt-4 sm:max-w-xl sm:rounded-lg pl-3 pr-3">
            <div class="px-6 mt-1 sm:max-w-xl sm:rounded-lg pb-8">
                <h2 class="pt-7 text-xl font-bold sm:text-xl">Password</h2>
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <div class="grid mt-8">
                        <div class="mb-2 sm:mb-6">
                            <label for="current_password" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Current Password</label>
                            <input type="password" id="current_password" name="current_password" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Enter current password" required>
                        </div>

                        <div class="mb-2 sm:mb-6">
                            <label for="new_password" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">New Password</label>
                            <input type="password" id="new_password" name="new_password" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Enter new password" required>
                        </div>

                        <div class="mb-2 sm:mb-6">
                            <label for="retype_password" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Re-type New Password</label>
                            <input type="password" id="retype_password" name="new_password_confirmation" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Retype new password" required>
                        </div>
                    </div>
                    <div class="flex justify-end w-full">
                        <button type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 mt-2">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div x-data="{ showModal: @if(session()->has('success') || session()->has('error')) true @else false @endif }">
        <div x-show="showModal" class="fixed inset-0 overflow-y-auto z-50">
            <div class="fixed inset-0 flex items-center justify-center">
                <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
                    <button @click="showModal = false" class="absolute top-0 right-0 mt-4 mr-4 text-gray-600 hover:text-gray-800 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 320.591 320.591">
                            <path d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"/>
                            <path d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"/>
                        </svg>
                    </button>
                    <div class="text-center mt-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 fill-current text-[#333] inline-block mb-4" viewBox="0 0 512 512">
                            <path d="M383.841 171.838c-7.881-8.31-21.02-8.676-29.343-.775L221.987 296.732l-63.204-64.893c-8.005-8.213-21.13-8.393-29.35-.387-8.213 7.998-8.386 21.137-.388 29.35l77.492 79.561a20.687 20.687 0 0 0 14.869 6.275 20.744 20.744 0 0 0 14.288-5.694l147.373-139.762c8.316-7.888 8.668-21.027.774-29.344z"/>
                            <path d="M256 0C114.84 0 0 114.84 0 256s114.84 256 256 256 256-114.84 256-256S397.16 0 256 0zm0 470.487c-118.265 0-214.487-96.214-214.487-214.487 0-118.265 96.221-214.487 214.487-214.487 118.272 0 214.487 96.221 214.487 214.487 0 118.272-96.215 214.487-214.487 214.487z"/>
                        </svg>
                        <h4 class="text-2xl text-[#333] font-semibold mt-6" x-text="showModal == true ? 'Success!' : 'Error!'"></h4>
                        <p class="text-sm text-gray-500 mt-4" x-text="showModal == true ? '{{ session('success') }}' : '{{ session('error') }}'"></p>
                    </div>
                    <button @click="showModal = false" class="bg-[#333] hover:bg-[#222] text-white text-sm font-semibold rounded-full px-6 py-2.5 mt-8 w-full focus:outline-none">Okay</button>
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

   function handleFileUpload(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('img[alt="Bordered avatar"]').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    document.querySelector('.upload-new-profile').addEventListener('click', function() {
    document.getElementById('profile_picture_input').click();
});
   </script>


</body>
</html>