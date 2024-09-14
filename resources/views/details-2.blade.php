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
        <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Details</h2>
        <ol class="list-none p-0 inline-flex space-x-2 ml-6 ">
            <li class="flex items-center">
            <svg onclick="window.location.href='/';" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" class="cursor-pointer hover:fill-blue-500 transition-colors duration-300" fill="#4b5563"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>        <span class="mx-2">/</span>
            </li>
            <li class="flex items-center">
                <a href="{{ route ("view-all")}}" class="text-gray-600 hover:text-blue-500 transition-colors duration-300">View All Request</a>
                <span class="mx-2">/</span>
            </li>
            <li class="flex items-center">
                <span class="text-gray-800">Details</span>
            </li>
        </ol>
    </div> 
 
    <div class="mt-2 w-/4 mx-auto">
        <div x-data="{ rows: [{},], totalAmount: 0 }" class="bg-white mt-10 sm:rounded-lg pl-6 pr-6 mb-4 mx-auto max-w-screen-lg mt-7 ">
            <div class="flex justify-between items-start">
            <a href="{{ route('view-all') }}" class="flex items-center text-gray-700 hover:text-black font-medium text-md mt-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 transform rotate-180" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8.293 2.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L13.586 11H3a1 1 0 1 1 0-2h10.586L8.293 3.707a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/>
                </svg>
                Back
            </a>
            <div class="mt-6">                
    <span>
        <a>#{{$request->id}}</a>
        <span class="question-mark-btn">
            <i class='bx bx-question-mark'></i>
        </span>
    </span>
            <span class="self-end ml-1 font-light">|</span>
        @if($request->status == 2 && $request->steps == 5)
            <span class="text-green-600 self-end ml-1 font-medium">Completed</span>
        @elseif($request->status == 3)
            <span class="text-yellow-500 self-end ml-1 font-medium">
                @if($request->steps == 4)
                    Declined - Purchase Order
                @elseif($request->steps == 3)
                    Declined - Purchase Request
                @elseif($request->steps == 2)
                    Declined - Quotation Form
                @elseif($request->steps == 1)
                    Declined - Request Form
                @else
                    Declined
                @endif
            </span>
        @elseif((int)$request->steps === 1)
            <span class="text-yellow-500 self-end ml-1 font-medium">Pending Request Form Approval</span>
        @elseif((int)$request->steps === 2)
            <span class="text-yellow-500 self-end ml-1 font-medium">Pending Quotation Form Approval</span>
        @elseif((int)$request->steps === 3)
            <span class="text-yellow-500 self-end ml-1 font-medium">Pending Purchase Request Approval</span>
        @elseif((int)$request->steps === 4)
            <span class="text-yellow-500 self-end ml-1 font-medium">Pending Purchase Order Approval</span>
        @endif

        </div>
        </div>

            <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">

        <!-- Existing content -->
        <div class="px-8 mt-1 sm:rounded-lg pb-8">
    <!-- Start of Stepper -->            
    <div class="px-8 mt-1 sm:rounded-lg pb-8">
    <!-- Start of Stepper -->
    <div class="flex items-start max-w-screen-lg mx-auto">

<div class="w-full">
    <div class="flex items-center w-full">
        <div class="w-8 h-8 shrink-0 mx-[-1px] 
            @if($request->steps >= 1)
                @if($request->steps == 1 && $request->status == 3) bg-red-600 
                @elseif($request->steps == 1 && $request->status == 4) bg-green-600 
                @elseif($request->steps == 1 && $request->status == 2) bg-blue-600 
                @elseif($request->steps == 1) bg-orange-300
                @elseif($request->steps > 1) bg-green-600
                @else bg-gray-300 
                @endif
            @else bg-gray-300 @endif
            p-1.5 flex items-center justify-center rounded-full">
            <span class="text-base text-white font-bold">1</span>
        </div>
        <div class="w-full h-1 mx-4 rounded-lg 
            @if($request->steps > 1 || $request->steps == 1)
                @if($request->steps == 1 && $request->status == 3) bg-red-600 
                @elseif($request->steps == 1 && $request->status == 4) bg-green-600 
                @elseif($request->steps == 1 && $request->status == 2) bg-blue-600 
                @elseif($request->steps == 1) bg-orange-300
                @elseif($request->steps > 1) bg-green-600
                @else bg-gray-300 
                @endif
            @else bg-gray-300 @endif"></div>
    </div>
    <div class="mt-2 mr-4">
        <h6 class="text-base font-bold 
            @if($request->steps >= 1)
                @if($request->steps == 1 && $request->status == 3) text-red-600 
                @elseif($request->steps == 1 && $request->status == 4) text-green-600 
                @elseif($request->steps == 1 && $request->status == 2) text-blue-600 
                @elseif($request->steps == 1) text-orange-300
                @elseif($request->steps > 1) text-green-600
                @else text-gray-500 
                @endif
            @else text-gray-500 @endif">Request Form</h6>
        <p class="text-xs text-gray-400">
            @if($request->steps >= 1)
                @if($request->steps == 1 && $request->status == 3) Declined 
                @elseif($request->steps == 1 && $request->status == 4) Completed 
                @elseif($request->steps == 1 && $request->status == 2) Approved 
                @elseif($request->steps == 1) Pending 
                @elseif($request->steps > 1) Approved
                @else Pending 
                @endif
            @else Pending @endif
        </p>
        <p class="text-xs text-gray-400">Date Placeholder</p>
    </div>
</div>

<!-- Step 2: Quotation Form -->
<div class="w-full">
    <div class="flex items-center w-full">
        <div class="w-8 h-8 shrink-0 mx-[-1px] 
            @if($request->steps >= 2)
                @if($request->steps == 2 && $request->status == 3) bg-red-600 
                @elseif($request->steps == 2 && $request->status == 4) bg-green-600 
                @elseif($request->steps == 2 && $request->status == 2) bg-blue-600 
                @elseif($request->steps == 2) bg-orange-300
                @elseif($request->steps > 2) bg-green-600
                @else bg-gray-300 
                @endif
            @else bg-gray-300 @endif
            p-1.5 flex items-center justify-center rounded-full">
            <span class="text-base text-white font-bold">2</span>
        </div>
        <div class="w-full h-1 mx-4 rounded-lg 
            @if($request->steps >= 2)
                @if($request->steps == 2 && $request->status == 3) bg-red-600 
                @elseif($request->steps == 2 && $request->status == 4) bg-green-600 
                @elseif($request->steps == 2 && $request->status == 2) bg-blue-600 
                @elseif($request->steps == 2) bg-orange-300
                @elseif($request->steps > 2) bg-green-600
                @else bg-gray-300 
                @endif
            @else bg-gray-300 @endif"></div>
    </div>
    <div class="mt-2 mr-4">
        <h6 class="text-base font-bold 
            @if($request->steps >= 2)
                @if($request->steps == 2 && $request->status == 3) text-red-600 
                @elseif($request->steps == 2 && $request->status == 4) text-green-600 
                @elseif($request->steps == 2 && $request->status == 2) text-blue-600 
                @elseif($request->steps == 2) text-orange-300 
                @elseif($request->steps > 2) text-green-600
                @else text-gray-500 
                @endif
            @else text-gray-500 @endif">Quotation Form</h6>
        <p class="text-xs text-gray-400">
            @if($request->steps >= 2)
                @if($request->steps == 2 && $request->status == 3) Declined 
                @elseif($request->steps == 2 && $request->status == 4) Completed 
                @elseif($request->steps == 2 && $request->status == 2) Approved 
                @elseif($request->steps == 2) Pending 
                @elseif($request->steps > 2) Approved
                @else Pending 
                @endif
            @else Pending @endif
        </p>
        <p class="text-xs text-gray-400">Date Placeholder</p>
    </div>
</div>

<!-- Step 3: Purchase Request -->
<div class="w-full">
    <div class="flex items-center w-full">
        <div class="w-8 h-8 shrink-0 mx-[-1px] 
            @if($request->steps >= 3)
                @if($request->steps == 3 && $request->status == 3) bg-red-600 
                @elseif($request->steps == 3 && $request->status == 4) bg-green-600 
                @elseif($request->steps == 3 && $request->status == 2) bg-blue-600 
                @elseif($request->steps == 3) bg-orange-300
                @elseif($request->steps > 3) bg-green-600
                @else bg-gray-300 
                @endif
            @else bg-gray-300 @endif
            p-1.5 flex items-center justify-center rounded-full">
            <span class="text-base text-white font-bold">3</span>
        </div>
        <div class="w-full h-1 mx-4 rounded-lg 
            @if($request->steps >= 3)
                @if($request->steps == 3 && $request->status == 3) bg-red-600 
                @elseif($request->steps == 3 && $request->status == 4) bg-green-600 
                @elseif($request->steps == 3 && $request->status == 2) bg-blue-600 
                @elseif($request->steps == 3) bg-orange-300
                @elseif($request->steps > 3) bg-green-600
                @else bg-gray-300 
                @endif
            @else bg-gray-300 @endif"></div>
    </div>
    <div class="mt-2 mr-4">
        <h6 class="text-base font-bold 
            @if($request->steps >= 3)
                @if($request->steps == 3 && $request->status == 3) text-red-600 
                @elseif($request->steps == 3 && $request->status == 4) text-green-600 
                @elseif($request->steps == 3 && $request->status == 2) text-blue-600 
                @elseif($request->steps == 3) text-orange-300 
                @elseif($request->steps > 3) text-green-600
                @else text-gray-500 
                @endif
            @else text-gray-500 @endif">Purchase Request</h6>
        <p class="text-xs text-gray-400">
            @if($request->steps >= 3)
                @if($request->steps == 3 && $request->status == 3) Declined 
                @elseif($request->steps == 3 && $request->status == 4) Completed 
                @elseif($request->steps == 3 && $request->status == 2) Approved 
                @elseif($request->steps == 3) Pending 
                @elseif($request->steps > 3) Approved
                @else Pending 
                @endif
            @else Pending @endif
        </p>
        <p class="text-xs text-gray-400">Date Placeholder</p>
    </div>
</div>

<!-- Step 4: Purchase Order -->
<div class="w-full">
    <div class="flex items-center w-full">
        <div class="w-8 h-8 shrink-0 mx-[-1px] 
            @if($request->steps >= 4)
                @if($request->steps == 4 && $request->status == 3) bg-red-600 
                @elseif($request->steps == 4 && $request->status == 4) bg-green-600 
                @elseif($request->steps == 4 && $request->status == 2) bg-blue-600 
                @elseif($request->steps == 4) bg-orange-300
                @elseif($request->steps > 4) bg-green-600
                @else bg-gray-300 
                @endif
            @else bg-gray-300 @endif
            p-1.5 flex items-center justify-center rounded-full">
            <span class="text-base text-white font-bold">4</span>
        </div>
        <div class="w-full h-1 mx-4 rounded-lg 
            @if($request->steps >= 4)
                @if($request->steps == 4 && $request->status == 3) bg-red-600 
                @elseif($request->steps == 4 && $request->status == 4) bg-green-600 
                @elseif($request->steps == 4 && $request->status == 2) bg-blue-600 
                @elseif($request->steps == 4) bg-orange-300
                @elseif($request->steps > 4) bg-green-600
                @else bg-gray-300 
                @endif
            @else bg-gray-300 @endif"></div>
    </div>
    <div class="mt-2 mr-4">
        <h6 class="text-base font-bold 
            @if($request->steps >= 4)
                @if($request->steps == 4 && $request->status == 3) text-red-600 
                @elseif($request->steps == 4 && $request->status == 4) text-green-600 
                @elseif($request->steps == 4 && $request->status == 2) text-blue-600 
                @elseif($request->steps == 4) text-orange-300 
                @elseif($request->steps > 4) text-green-600
                @else text-gray-500 
                @endif
            @else text-gray-500 @endif">Purchase Order</h6>
        <p class="text-xs text-gray-400">
            @if($request->steps >= 4)
                @if($request->steps == 4 && $request->status == 3) Declined 
                @elseif($request->steps == 4 && $request->status == 4) Completed 
                @elseif($request->steps == 4 && $request->status == 2) Approved 
                @elseif($request->steps == 4) Pending 
                @elseif($request->steps > 4) Approved
                @else Pending 
                @endif
            @else Pending @endif
        </p>
        <p class="text-xs text-gray-400">Date Placeholder</p>
    </div>
</div>




</div>




                <h2 class="text-sm font-bold text-gray-900 mt-10">Request Form Details:</h2>
    <div class="w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4">
        <div class="flex justify-between items-start mb-4">
            <h2 class="text-lg font-bold text-gray-900">{{ $request->request_name }}</h2>
            <div>        
                <span class="question-mark-btn mr-1">
                    <i class='bx bx-question-mark'></i>
                </span> 
                <span class="self-end ml-1 font-light">|</span>
                <span class="text-yellow-500 self-end ml-1 font-medium">
                    @if($request->status == 2)
                        @if((int)$request->steps == 5)
                            Completed
                        @else
                            Completed
                        @endif
                    @elseif($request->status == 3)
                        @if((int)$request->steps == 5)
                            Declined
                        @else
                            Declined
                        @endif
                    @elseif((int)$request->steps + 1 == 2)
                        For Request Form
                    @elseif((int)$request->steps + 1 == 3)
                        For Quotation Form
                    @elseif((int)$request->steps + 1 == 4)
                        For Purchase Request
                    @elseif((int)$request->steps + 1 == 5)
                        For Purchase Order
                    @else
                        <!-- Optional: Display nothing or a default message -->
                    @endif
                </span>




            </div>
        </div>
        <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
        <!-- Description, Type, and Time -->
        <div class="request-item">
            <p>Description: {{ $request->request_description }}</p>
            <p>Type of request: {{ $request->request_type}}</p>
            <p>Time sent: {{ $request->created_at->format('h:i:s A') }}</p>
        </div>  
    </div>
<div>
    <h2 class="text-sm font-bold text-gray-900 mt-10">Remarks: </h2>
    <p class="text-sm">
    {{ $request->remarks ? $request->remarks : 'No Remarks' }}
</p>

</div>
<!-- Quotation Form Details Section -->
<div>
    <h2 class="text-sm font-bold text-gray-900 mt-10">Quotation Form Details:</h2>
    <!-- List of Submitted Documents -->
    <div class="mt-4">
        <h3 class="text-xs font-semibold text-gray-700">Submitted Documents:</h3>
        <ul class="mt-2">
            <li>
            <span id="fileLinksContainer"></span>

<!-- Modal HTML -->
<div id="fileModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white p-4 rounded relative">
        <span id="closeModal" class="absolute top-2 right-2 cursor-pointer text-red-500">&times;</span>
        <div id="modalFile"></div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileLinksContainer = document.getElementById('fileLinksContainer');
        const fileModal = document.getElementById('fileModal');
        const closeModal = document.getElementById('closeModal');

        // Parse the JSON-encoded files array from Laravel
        const filesArray = @json(json_decode($request->files)); // Decode the JSON-encoded file paths

        // Check if filesArray has valid content
        if (filesArray && filesArray.length > 0) {
            // Generate file links dynamically
            filesArray.forEach((file) => {
                const fileName = file.split('/').pop(); // Extract the file name from the path

                // Create a link wrapper for the icon and file name
                const linkWrapper = document.createElement('a');
                linkWrapper.href = file; // Set the file URL directly to the href
                linkWrapper.download = fileName; // Set the download attribute with the file name
                linkWrapper.classList.add('flex', 'items-center', 'text-sm', 'text-blue-500', 'hover:underline'); // Styling
                linkWrapper.setAttribute('data-file', file); // Set the data attribute with the file URL

                // Create the SVG icon element
                const svgIcon = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                svgIcon.setAttribute('class', 'h-4 w-4');
                svgIcon.setAttribute('viewBox', '0 0 20 20');
                svgIcon.setAttribute('fill', 'currentColor');
                svgIcon.innerHTML = `
                    <path fill-rule="evenodd" d="M17.707 1.293A1 1 0 0 1 19 2v16a1 1 0 0 1-1.707.707L13 14.414V16a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v1.586l4.293-4.293zM12 7a1 1 0 0 1-1-1V1.414L5.707 7H12z" clip-rule="evenodd"/>`;

                // Create the text element
                const linkText = document.createElement('span');
                linkText.textContent = fileName;

                // Append the SVG icon and text to the link wrapper
                linkWrapper.appendChild(svgIcon);
                linkWrapper.appendChild(linkText);

                // Append the link wrapper to the container
                fileLinksContainer.appendChild(linkWrapper);
            });
        } else {
            // If filesArray is empty or invalid, display a message
            fileLinksContainer.textContent = "No files available.";
        }

        // Close the modal when clicking outside of the modal content
        fileModal.addEventListener('click', function(event) {
            if (event.target === fileModal) {
                fileModal.classList.add('hidden');
            }
        });

        // Close the modal button
        closeModal.addEventListener('click', function() {
            fileModal.classList.add('hidden');
        });
    });
</script>

                </a>
            </li>
            <!-- Add more documents as needed -->
        </ul>
    </div>
    <!-- List of Approved Documents -->
    <div class="mt-4">
        <h3 class="text-xs font-semibold text-gray-700">Approved Documents:</h3>
        <ul class="mt-2">
            <li>
                <a href="#" class="flex items-center space-x-2 text-sm text-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M17.707 1.293A1 1 0 0 1 19 2v16a1 1 0 0 1-1.707.707L13 14.414V16a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v1.586l4.293-4.293zM12 7a1 1 0 0 1-1-1V1.414L5.707 7H12z" clip-rule="evenodd"/>
                    </svg>
                    <span>Approved Quotation</span>
                </a>
            </li>
            <!-- Add more documents as needed -->
        </ul>
    </div>
    <div>
        <h2 class="text-sm font-bold text-gray-900 mt-10">Remarks:</h2>
        <p class="text-sm">Wait for further updates.</p>
    </div>
</div>

        
            <!-- End of Stepper --> 
    </div>
</div>

    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>

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

   </script>
</body>
