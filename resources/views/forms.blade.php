<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

@vite('resources/css/main.css', 'resources/js/app.js')
<title>Admin Panel</title>

<body class="bg-gray-200">
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
    <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Request Forms</h2>

    <p class="text-gray-600 pl-6 pb-6">
         <a href="#" class="text-indigo-700 hover:underline">Home</a> >
         <span>Request Forms</span>
      </p>
    </div>   
 
   <!-- Form Request -->
   <div class="mx-auto max-w-xl mt-7 ">
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
   </div>



<!-- Request Type -->
<div x-data="{ step: 1, rows: [{}], requestType: '', showModal: false }">
        <!-- Step 1: Select Request -->
        <div x-show="step === 1">
            <div class="bg-white mt-10 sm:max-w-xl sm:rounded-lg pl-3 pr-3 mb-4 mx-auto max-w-prose">
                <div class="px-8 mt-1 sm:rounded-lg pb-8">
                    <h2 class="pt-7 text-xl font-bold sm:text-xl">Select Request</h2>
                    <div class="grid mt-8">
                        <div class="mb-4">
                            <label for="request_type" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Select Request</label>
                            <select id="request_type" name="request_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3" required x-model="requestType">
                              <option value="" disabled>Select Request Transaction</option>
                              <option value="type1">Punong Barangay's Certification Form</option>
                              <option value="type2">Request Form</option>
                              <option value="type3">Request Name 3</option>
                           </select>
                        </div>
                        <div class="flex justify-end">
                           <button @click="step = 2; console.log(step)" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 2: Punong Barangay -->
        <div x-show="step === 2 && requestType === 'type1'">
            <div class="bg-white mt-10 sm:rounded-lg pl-6 pr-6 mb-4 mx-auto max-w-screen-lg mt-7">
                <div class="px-8 mt-1 sm:rounded-lg pb-8">
                    <h2 class="pt-7 text-xl font-bold sm:text-xl">Punong Barangay's Certification Form</h2>
                    <div class="grid grid-cols-2 gap-8 mt-8">
                        <!-- To Section -->
                        <div>
                            <label for="request_name" class="block text-sm font-medium text-indigo-900 dark:text-black inline-block font-semibold">To: <span class="text-sm font-medium text-indigo-900 dark:text-black">The Bank Manager</span></label>
                            <div class="text-sm font-medium text-indigo-900 dark:text-black">
                                <p>Land Bank of the Philippines</p>
                                <p>QC Hall Extension Office</p>
                            </div>
                        </div>

                        <!-- Date and PCB Number Section -->
                        <div class="flex flex-col items-end">
                            <!-- PCB Number -->
                            <div>
                                <label for="pcb_number" class="block text-sm font-medium text-indigo-900 dark:text-black inline-block font-semibold">PCB No:</label>
                                <span class="inline-block text-sm font-medium text-indigo-900 dark:text-black">Placeholder</span>
                            </div>
                            <!-- Date -->
                            <div>
                                <label for="request_date" class="block text-sm font-medium text-indigo-900 dark:text-black inline-block font-semibold">Date:</label>
                                <span class="inline-block text-sm font-medium text-indigo-900 dark:text-black">Placeholder</span>
                            </div>
                        </div>

                        <!-- Account Information -->
                        <div class="col-span-2">
                            <label for="account_info" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Account Information</label>
                            <div class="overflow-x-auto mb-2">
                                <table id="account-table" class="min-w-full bg-white border-gray-300 border rounded-lg">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Account No.</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Check No.</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Date</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Payee</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Amount</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Purpose</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="(row, index) in rows" :key="index">
                                            <tr>
                                                <td class="border px-4 py-2">
                                                    <input type="text" x-model="row.account_no" class="border-0 w-full p-2" placeholder="Account No." required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="text" x-model="row.check_no" class="border-0 w-full p-2" placeholder="Check No." required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="date" x-model="row.date" class="border-0 w-full p-2" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="text" x-model="row.payee" class="border-0 w-full p-2" placeholder="Payee" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="number" x-model="row.amount" class="border-0 w-full p-2" placeholder="Amount" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <input type="text" x-model="row.purpose" class="border-0 w-full p-2" placeholder="Purpose" required>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <button @click="rows.splice(index, 1)" class="text-red-600 hover:text-red-800 font-medium text-sm">Delete</button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex justify-end">
                                <button @click="rows.push({})" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Add More</button>
                            </div>
                        </div>

                        <!-- Next and Previous Buttons -->
                        <div class="col-span-2 flex justify-between mt-4">
                           <button @click="step = 1; console.log(step)" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
                           <button @click="step = 3; console.log(step)" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 3: Summary -->
        <div x-show="step === 3 && requestType === 'type1'">
            <div class="bg-white mt-10 sm:rounded-lg pl-6 pr-6 mb-4 mx-auto max-w-screen-lg mt-7 ">
                <div class="px-8 mt-1 sm:rounded-lg pb-8">
                    <h2 class="pt-7 text-xl font-bold sm:text-xl">PCB Form Summary</h2>
                    <div class="grid grid-cols-2 gap-8 mt-8">
                        <!-- To Section -->
                        <div>
                            <label for="request_name" class="block text-sm font-medium text-indigo-900 dark:text-black inline-block font-semibold">To: <span class="text-sm font-medium text-indigo-900 dark:text-black">The Bank Manager</span></label>
                            <div class="text-sm font-medium text-indigo-900 dark:text-black">
                                <p>Land Bank of the Philippines</p>
                                <p>QC Hall Extension Office</p>
                            </div>
                        </div>

                        <!-- Date and PCB Number Section -->
                        <div class="flex flex-col items-end">
                            <!-- PCB Number -->
                            <div>
                                <label for="pcb_number" class="block text-sm font-medium text-indigo-900 dark:text-black inline-block font-semibold">PCB No:</label>
                                <span class="inline-block text-sm font-medium text-indigo-900 dark:text-black">Placeholder</span>
                            </div>
                            <!-- Date -->
                            <div>
                                <label for="request_date" class="block text-sm font-medium text-indigo-900 dark:text-black inline-block font-semibold">Date:</label>
                                <span class="inline-block text-sm font-medium text-indigo-900 dark:text-black">Placeholder</span>
                            </div>
                        </div>

                        <!-- Account Information Summary -->
                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Account Information Summary</label>
                            <div class="overflow-x-auto mb-2">
                                <table class="min-w-full bg-white border-gray-300 border rounded-lg">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Account No.</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Check No.</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Date</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Payee</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Amount</th>
                                            <th class="px-4 py-2 text-sm font-medium text-gray-700">Purpose</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Summary rows will be dynamically added here -->
                                    </tbody>
                                </table>
                            </div>
                            <!-- Submit Button -->
                            <div class="flex justify-end w-full mt-4">
                                 <button @click="showModal = true" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 mt-2">Send PCB Request</button>
                           </div>
                        </div>
                        <div class="flex justify-between w-full mt-8">
                           <button @click="step = 2; console.log(step)" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Request Form Info -->
        <div x-show="step === 2 && requestType === 'type2'">
            <div class="bg-white mt-10 sm:max-w-xl sm:rounded-lg pl-3 pr-3 mb-4 mx-auto max-w-prose">
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
                        <label for="request_description" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Upload a File</label>
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2 border-gray-300 border-solid rounded-lg cursor-pointer bg-white hover:bg-gray-100 ">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PDF, WORD, PNG, or JPG (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div>


                    </div>
                    
                    <!-- Next Button -->
                    <div class="flex justify-between w-full">
                        <button @click="step = 1; console.log(step)" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
                        <button @click="step = 3; console.log(step)" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Next</button>
                    </div>
                </div>
            </div>
        </div>

   <!-- Step 2 Confirmation -->
        <div x-show="step === 3 && requestType === 'type2'">
            <div class="bg-white mt-10 sm:max-w-xl sm:rounded-lg pl-3 pr-3 mb-4 mx-auto max-w-prose ">
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
                    <div class="flex justify-end w-full mt-4" x-show="step === 3 && requestType === 'type1' || requestType === 'type2'">
                        <button @click="showModal = true" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 mt-2">Send </button>
                    </div>
                    <div class="flex justify-between w-full mt-6">
                        <button @click="step = 2; console.log(step)" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Content -->

        <!-- Start of Modal -->
        <div x-show="showModal" class="fixed inset-0 overflow-y-auto z-[1000]">
            <div class="fixed inset-0 px-4 flex flex-wrap justify-center items-center w-full h-full z-[100] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
                <div class="w-full max-w-md bg-white shadow-lg rounded-md px-5 py-10 relative mx-auto text-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-24 h-24 fill-green-500 absolute left-1/2 top-0 -translate-x-1/2 -translate-y-1/2" viewBox="0 0 60 60">
                    <circle cx="30" cy="30" r="29" data-original="#5edd60" />
                    <path fill="#fff"
                        d="m24.262 42.07-6.8-6.642a1.534 1.534 0 0 1 0-2.2l2.255-2.2a1.621 1.621 0 0 1 2.256 0l4.048 3.957 11.353-17.26a1.617 1.617 0 0 1 2.2-.468l2.684 1.686a1.537 1.537 0 0 1 .479 2.154L29.294 41.541a3.3 3.3 0 0 1-5.032.529z"
                        data-original="#ffffff" />
                    </svg>
                    <div class="mt-8">
                    <h3 class="text-2xl font-semibold flex-1">Awesome!</h3>
                    <p class="text-sm text-gray-500 mt-2">Your booking has been confirmed. <br /> Check your email for details.</p>
                    <button type="button" @click="showModal = false" class="px-6 py-2.5 mt-8 w-full rounded text-white text-sm font-semibold border-none outline-none bg-green-500 hover:bg-green-600">Got it</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Modal -->
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

   window.addEventListener('DOMContentLoaded', function() {
        // Simulate change event on dropdown to initialize requestType
        document.querySelector('#request_type').dispatchEvent(new Event('change'));
    });
   </script>
</body>
