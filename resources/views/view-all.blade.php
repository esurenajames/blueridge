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
    <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">View All Request</h2>
          <ol class="list-none p-0 inline-flex space-x-2 ml-6 ">
            <li class="flex items-center">
              <svg onclick="window.location.href='/';" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" class="cursor-pointer hover:fill-blue-500 transition-colors duration-300" fill="#4b5563"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>        <span class="mx-2">/</span>
            </li>
            <li class="flex items-center">
                <span class="text-gray-800">View All Request</span>
              </li>
          </ol>
        </nav>
      </div>
    </div>     
 


<div>
<div class="text-base space-y-5 rounded-md bg-white p-3 mt-5 shadow-md w-3/4 mx-auto mt-7">
    <ul class="-mb-px flex flex-wrap items-center gap-1 text-md">
        <li class="flex-1">
            <a href="#" data-tab="view-all" class="tab-link box-link relative flex items-center justify-center gap-2 px-2 py-1 bg-white rounded-t-md hover:text-blue-800 overflow-hidden">
                <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 30 30">
                    <path fill="#808080" d="M 6 4 C 4.892 4 4 4.892 4 6 L 4 14 L 14 14 L 14 4 L 6 4 z M 16 4 L 16 14 L 26 14 L 26 6 C 26 4.892 25.108 4 24 4 L 16 4 z M 4 16 L 4 24 C 4 25.108 4.892 26 6 26 L 14 26 L 14 16 L 4 16 z M 16 16 L 16 26 L 24 26 C 25.108 26 26 25.108 26 24 L 26 16 L 16 16 z"/>
                </svg>
                View All
                <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500">{{ $counts['view_all'] ?? '0' }}</span>
            </a>
        </li>
            <li class="flex-1">
                <a href="#" data-tab="request-form-tab" class="tab-link whitespace-nowrap relative flex items-center justify-center gap-2 px-2 py-1 bg-white rounded-t-md hover:text-blue-800 overflow-hidden">
                <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 64 64">
                    <path fill="#808080" d="M62.828,29.172l-28-28C34.078,0.422,33.062,0,32,0H4C1.789,0,0,1.789,0,4v28 c0,1.062,0.422,2.078,1.172,2.828l28,28C29.953,63.609,30.977,64,32,64s2.047-0.391,2.828-1.172l28-28 C64.391,33.266,64.391,30.734,62.828,29.172z M20,28.004c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S24.418,28.004,20,28.004z"/>
                </svg>
                    Request Form
                    <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500">{{ $counts['request_form'] }}</span>
                </a>
            </li>
            
            <li class="flex-1">
                <a href="#" data-tab="quotation-tab" class="tab-link whitespace-nowrap relative flex items-center justify-center gap-2 px-2 py-1 bg-white rounded-t-md hover:text-blue-800 overflow-hidden">
                    <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 64 64">
                        <path fill="#808080" d="M62.828,29.172l-28-28C34.078,0.422,33.062,0,32,0H4C1.789,0,0,1.789,0,4v28 c0,1.062,0.422,2.078,1.172,2.828l28,28C29.953,63.609,30.977,64,32,64s2.047-0.391,2.828-1.172l28-28 C64.391,33.266,64.391,30.734,62.828,29.172z M20,28.004c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S24.418,28.004,20,28.004z"/>
                    </svg>
                    Quotation
                    <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500">{{ $counts['quotation'] }}</span>
                </a>
            </li>
            
            <li class="flex-1">
                <a href="#" data-tab="purchase-request-tab" class="tab-link whitespace-nowrap relative flex items-center justify-center gap-2 px-2 py-1 bg-white rounded-t-md hover:text-blue-800 overflow-hidden">
                    <svg class="w-6 h-6 fill-current text-gray-500" viewBox="0 0 24 24">
                        <path fill="#808080" fill-rule="evenodd" d="M10 2a3.001 3.001 0 0 0-2.83 2H6a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3h-1.17A3.001 3.001 0 0 0 14 2h-4zM9 5a1 1 0 0 1 1-1h4a1 1 0 1 1 0 2h-4a1 1 0 0 1-1-1zm6.78 6.625a1 1 0 1 0-1.56-1.25l-3.303 4.128-1.21-1.21a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.488-.082l4-5z" clip-rule="evenodd"></path>
                    </svg>
                    Purchase Request
                    <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500">{{ $counts['purchase_request'] }}</span>
                </a>
            </li>

            <li class="flex-1">
                <a href="#" data-tab="purchase-order-tab" class="tab-link whitespace-nowrap relative flex items-center justify-center gap-2 px-2 py-1 bg-white rounded-t-md hover:text-blue-800 overflow-hidden">
                    <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 32 32">
                        <path d="M27.857,27.864C27.935,29.572,26.571,31,24.861,31H7.139c-1.71,0-3.075-1.428-2.997-3.136L4.957,9.955 C4.981,9.42,5.421,9,5.956,9h20.089c0.535,0,0.975,0.42,0.999,0.955L27.857,27.864z M16.185,1.003C12.787,0.901,10,3.625,10,7v1h2V7 c0-2.209,1.791-4,4-4s4,1.791,4,4v1h2V7.252C22,3.966,19.468,1.101,16.185,1.003z"></path>
                    </svg>
                    Purchase Order
                    <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500">{{ $counts['purchase_order'] }}</span>
                </a>
            </li>
            
            <li class="flex-1">
                <a href="#" data-tab="declined-tab" class="tab-link whitespace-nowrap relative flex items-center justify-center gap-2 px-2 py-1 bg-white rounded-t-md hover:text-blue-800 overflow-hidden">
                    <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#808080">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path d="M21 11.674A7 7 0 0 0 12.255 22H3.993A1 1 0 0 1 3 21.008V2.992C3 2.444 3.445 2 3.993 2H16l5 5v4.674zM18 23a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm-1.293-2.292a3 3 0 0 0 4.001-4.001l-4.001 4zm-1.415-1.415l4.001-4a3 3 0 0 0-4.001 4.001z"></path>
                    </svg>
                    Declined
                    <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500">{{ $counts['declined'] }}</span>
                </a>
            </li>

            <li class="flex-1">
                <a href="#" data-tab="history-tab" class="tab-link relative flex items-center justify-center gap-2 px-2 py-1 bg-white rounded-t-md hover:text-blue-800">
                    <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 512 512">
                        <path d="M437.11,74.98c-99.974-99.974-262.064-99.973-362.038,0.001l0,0c-12.09-12.09-32.776-5.827-36.129,10.939L24.801,156.63 c-2.996,14.979,10.211,28.186,25.19,25.19l70.711-14.142c16.766-3.353,23.029-24.039,10.939-36.129l0,0 c68.622-68.622,180.279-68.622,248.901-0.001c68.9,68.899,68.9,180.003,0,248.903c-68.623,68.622-180.279,68.622-248.901-0.001 C97.329,346.14,80.174,301.07,80.174,256h-0.082c0-22.215-18.109-40.2-40.37-39.998c-22.076,0.2-39.694,18.688-39.629,40.765 c0.194,65.26,25.187,130.46,74.98,180.253c99.974,99.974,262.064,99.974,362.038,0.001C536.84,337.291,536.84,174.709,437.11,74.98 z"></path>
                        <path d="M336.837,267.978l-50.746-29.298v-88.596c0-16.569-13.431-30-30-30h0c-16.569,0-30,13.431-30,30V256 c0,11.103,6.036,20.79,15.002,25.978l-0.002,0.003l65.746,37.958c14.349,8.284,32.696,3.368,40.981-10.981v0 C356.102,294.61,351.186,276.262,336.837,267.978z"></path>
                    </svg>
                    History
                    <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-semibold text-gray-500">{{ $counts['history'] }}</span>
                </a>
            </li>
            
        </ul>
    </div>
</div>


<div class="mt-2 w-3/4 mx-auto" id="request-container">
    @foreach ($requests as $request)
        @php
            // Get the requestor for the current request
            $requestor = $requestors->where('id', $request->requestor_id)->first();

            // Decode the collaborators JSON and filter the collaborators for this request
            $collaboratorsList = json_decode($request->collaborators, true) ?? [];
            $filteredCollaborators = $allCollaborators->whereIn('id', $collaboratorsList);
        @endphp

        <div class="request-item w-full p-4 bg-white border border-gray-200 shadow sm:p-8 mt-4 rounded-md"
     data-steps="{{ $request->steps }}" data-status="{{ $request->status }}">
    <div class="flex justify-between items-start mb-4">
        <h2 class="text-lg font-bold text-gray-900">{{ $request->request_name }}</h2>
        <div>
            <span class="question-mark-btn mr-1">
                <i class='bx bx-question-mark'></i>
            </span>
            <span class="self-end mr-1 font-light">|</span>

            @switch($request->status)
                @case(1)
                    <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-3.5 py-1 rounded-full">
                        Pending
                    </span>
                    @break
                @case(2)
                    <span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-3.5 py-1 rounded-full">
                        Approved
                    </span>
                    @break
                @case(3)
                    <span class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-3.5 py-1 rounded-full">
                        Declined
                    </span>
                    @break
                @case(4)
                    <span class="bg-blue-200 text-blue-800 text-sm font-medium mr-2 px-3.5 py-1 rounded-full">
                        Completed
                    </span>
                    @break
                @case(5)
                    <span class="bg-orange-100 text-orange-800 text-sm font-medium mr-2 px-3.5 py-1 rounded-full">
                        Returned
                    </span>
                    @break
                @case(6)
                    <span class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-3.5 py-1 rounded-full">
                        Resubmit
                    </span>
                    @break
                @default
                    <span class="bg-gray-100 text-gray-800 text-sm font-medium mr-2 px-3.5 py-1 rounded-full">
                        Unknown Status
                    </span>
            @endswitch
        </div>
    </div>

            <hr class="border-t border-gray-300 w-3.5/4 mx-auto my-4">
            <div class="flex">
                <!-- Left Column (1/4 width) -->
                <div class="w-1/4 pr-4 border-r border-gray-300">
                    <!-- Requestor -->
                    <p class="font-bold text-gray-900 text-base mb-2">Requestor</p>
                    <div class="flex flex-wrap gap-2 mb-2">
                        @if($requestor)
                            <div class="flex items-center bg-white border border-gray-300 text-gray-800 pr-2 pl-0.5 py-1 rounded-xl text-base">
                                <img src="{{ $requestor->profile_picture ? asset('storage/' . $requestor->profile_picture) : 'https://covington.va.us/wp-content/uploads/2022/03/profile-placeholder-image-gray-silhouette-no-photo-person-avatar-default-pic-used-web-design-173997790.jpg' }}" alt="{{ $requestor->fname }}" class="w-8 h-8 rounded-xl mr-2">
                                <span class="text-sm">{{ $requestor->fname }} {{ $requestor->lname }}</span>
                            </div>
                        @else
                            <div class="flex items-center bg-gray-200 text-gray-800 px-3 pt-3 rounded-lg text-base">
                                <span class="text-sm">Requestor not found</span>
                            </div>
                        @endif
                    </div>

                    <!-- Collaborators -->
                    <p class="font-bold text-gray-900 text-base mb-2">Collaborators</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mb-3 text-base">
                        @forelse($filteredCollaborators as $collaborator)
                            <div class="flex items-center bg-white border border-gray-300 text-gray-800 pr-3 pl-0.5 py-1 rounded-xl text-base">
                                <img src="{{ $collaborator->profile_picture ? asset('storage/' . $collaborator->profile_picture) : 'https://covington.va.us/wp-content/uploads/2022/03/profile-placeholder-image-gray-silhouette-no-photo-person-avatar-default-pic-used-web-design-173997790.jpg' }}" alt="{{ $collaborator->fname }}" class="w-8 h-8 rounded-xl mr-2">
                                <span class="text-xs">{{ $collaborator->fname }} {{ $collaborator->lname }}</span>
                            </div>
                        @empty
                            <div class="">
                                <span class="text-base">No collaborators</span>
                            </div>
                        @endforelse
                    </div>
                    </div>


                <!-- Right Column (3/4 width) -->
                <div class="w-3/4 pl-4">
                    <!-- Description and Time Sent -->
                    <p class="text-base font-bold text-gray-900 mb-2">Description</p>
                    <p class="text-sm mb-2">{{ $request->request_description }}</p>

                    <p class="text-sm font-bold text-gray-900 mb-1">Category</p>
                    <p class="text-xs mb-1">
                        {{ $request->category ? $request->category : 'No category specified' }}
                    </p>                    

                    <p class="font-bold text-gray-900 text-sm mb-1">Time Sent</p>
                    <p class="text-xs">{{ $request->created_at->format('m/d/Y h:i A') }} ({{ $request->created_at->format('l') }})</p>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{ route('details-2', ['id' => $request->id]) }}" class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg" style="background-color: #4F46E5;">View Details</a>
                <button class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg ml-2" style="border: 1px solid gray;">Follow Up</button>
            </div>
        </div>
    @endforeach
</div>




<script>
document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tab-link');
    const requestItems = document.querySelectorAll('.request-item');

    tabs.forEach(tab => {
        tab.addEventListener('click', (e) => {
            e.preventDefault();

            const selectedTab = e.target.getAttribute('data-tab');
            tabs.forEach(t => t.classList.remove());
            tab.classList.add();

            requestItems.forEach(item => {
                const steps = parseInt(item.getAttribute('data-steps'));
                const status = parseInt(item.getAttribute('data-status'));

                if (shouldShowRequest(selectedTab, steps, status)) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });
    });

    function shouldShowRequest(tab, steps, status) {
        switch (tab) {
            case 'view-all':
                return true;
            case 'request-form-tab':
                return steps === 1 && status === 1;
            case 'quotation-tab':
                return steps === 2 && status === 1;
            case 'purchase-request-tab':
                return steps === 3 && status === 1;
            case 'purchase-order-tab':
                return steps === 4 && status === 1;
            case 'declined-tab':
                return status === 3;
            case 'history-tab':
                return status === 2 || status === 3;
            default:
                return false;
        }
    }
});
</script>



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

   </script>
</body>
