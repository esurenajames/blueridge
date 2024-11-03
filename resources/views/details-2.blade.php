<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.tailwindcss.com"></script>
@vite('resources/css/main.css', 'resources/js/app.js')
<title>Admin Panel</title>

@php
    use Carbon\Carbon; // Import Carbon at the beginning of the file
@endphp

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

        <!-- Existing content -->
        <div class="px-4 mt-1 sm:rounded-lg pb-2">
    <!-- Start of Stepper -->            
    <div class="px-4 mt-1 sm:rounded-lg pb-8">
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
        <p class="text-xs text-gray-400">
        {{ isset($approval_dates[0]) ? Carbon::parse($approval_dates[0])->format('Y-m-d h:i A') : 'n/a' }}
</p>
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
                <p class="text-xs text-gray-400">
            {{ isset($approval_dates[1]) ? Carbon::parse($approval_dates[1])->format('Y-m-d h:i A') : 'n/a' }}
        </p>
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
        <p class="text-xs text-gray-400">
            {{ isset($approval_dates[2]) ? Carbon::parse($approval_dates[2])->format('Y-m-d h:i A') : 'n/a' }}
        </p>
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
        <p class="text-xs text-gray-400">
            {{ isset($approval_dates[3]) ? Carbon::parse($approval_dates[3])->format('Y-m-d h:i A') : 'n/a' }}
        </p>
    </div>
</div>


</div>

<h2 class="text-sm font-bold text-gray-900 mt-8">Request Form Details:</h2>

<div class="w-full p-6 bg-white border border-gray-200 shadow sm:pd-6 mt-4 rounded-md">
    <div class="flex justify-between items-start mb-4">
        <h2 class="text-base font-bold text-gray-900">{{ $request->request_name }}</h2>
        <div>
            <span class="question-mark-btn mr-1">
                <i class='bx bx-question-mark'></i>
            </span>
            <span class="self-end ml-1 font-light">|</span>
            
            @if($request->status == 1)
                <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-3.5 py-1 rounded-full">
                    Pending Approval
                </span>
            @elseif($request->status == 2)
                <span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-3.5 py-1 rounded-full">
                    Approved
                </span>
            @elseif($request->status == 3)
                <span class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-3.5 py-1 rounded-full">
                    Declined
                </span>
            @elseif($request->status == 4)
                <span class="bg-blue-200 text-blue-800 text-sm font-medium mr-2 px-3.5 py-1 rounded-full">
                    Completed
                </span>
            @elseif($request->status == 5)
                <span class="bg-orange-100 text-orange-800 text-sm font-medium mr-2 px-3.5 py-1 rounded-full">
                    Pending Resubmission
                </span>
            @elseif($request->status == 6)
                <span class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-3.5 py-1 rounded-full">
                    Resubmit
                </span>
            @else
                <span class="bg-gray-100 text-gray-800 text-sm font-medium mr-2 px-3.5 py-1 rounded-full">
                    Unknown Status
                </span>
            @endif

            </span>
        </div>
    </div>
    <hr class="border-t border-gray-300 w-full my-4">
    <div class="flex">
        <!-- Left Column (1/4 width) -->
        <div class="w-2/4 pr-4 border-r border-gray-300">
            <!-- Requestor -->
            <p class="font-bold text-gray-900 text-base mb-2">Requestor</p>
            <div class="flex flex-wrap gap-2 mb-2">
                @if($requestor)
                    <div class="flex items-center bg-white border border-gray-300 text-gray-800 pr-3 pl-0.5 py-0.5 rounded-xl text-base">
                        <img src="{{ asset('storage/' . $requestor->profile_picture) }}" alt="{{ $requestor->fname }}" class="w-8 h-8 rounded-xl mr-2">
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
                @forelse($collaborators as $collaborator)
                    <div class="flex items-center bg-white border border-gray-300 text-gray-800 pr-2 pl-0.5 py-1 rounded-xl text-base">
                        <img src="{{ $collaborator->profile_picture ? asset('storage/' . $collaborator->profile_picture) : 'https://covington.va.us/wp-content/uploads/2022/03/profile-placeholder-image-gray-silhouette-no-photo-person-avatar-default-pic-used-web-design-173997790.jpg' }}" alt="{{ $collaborator->fname }}" class="w-8 h-8 rounded-xl mr-2">
                        <span class="text-xs">{{ $collaborator->fname }} {{ $collaborator->lname }}</span>
                    </div>
                @empty
                    <div class="">
                        <span class="test-base">No collaborators</span>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Right Column (3/4 width) -->
        <div class="w-3/4 pl-4">
            <!-- Description -->
            <p class="text-base font-bold text-gray-900 mb-1">Description</p>
            <p class="text-sm mb-1 break-words">{{ $request->request_description }}</p>
            <p class="text-sm mb-1 font-bold text-gray-900">Category</p>
            <p class="text-xs mb-1 break-words">{{ $request->category }}</p>
            <!-- Time Sent -->
            <p class="font-bold mb-1 text-gray-900 text-sm">Time Sent</p>
            <p class="text-xs">{{ $request->created_at->format('m/d/Y h:i A') }} ({{ $request->created_at->format('l') }})</p>
        </div>
    </div>
</div>



<div>
<h2 id="requestTitle" class="text-sm font-bold text-gray-900 mt-6">Request Details:</h2>
<div id="requestSection" class="mt-2 hidden">
    <h3 id="requestDocumentsTitle" class="text-sm font-semibold text-gray-700">Submitted Documents:</h3>
    <ul class="mt-2">
        <li>
            <span id="fileLinksContainer"></span>
        </li>
    </ul>
</div>

<h2 id="quotationTitle" class="text-sm font-bold text-gray-900 mt-3 hidden">Quotation Details:</h2>
<div id="quotationSection" class="mt-2 hidden">
    <h3 id="quotationDocumentsTitle" class="text-sm font-semibold text-gray-700">Submitted Documents:</h3>
    <ul class="mt-2">
        <li>
            <span id="quotationFileLinksContainer"></span>
        </li>
    </ul>
</div>

<h2 id="purchaseRequestTitle" class="text-sm font-bold text-gray-900 mt-3 hidden">Purchase Request Details:</h2>
<div id="purchaseRequestSection" class="mt-2 hidden">
    <h3 id="purchaseRequestDocumentsTitle" class="text-sm font-semibold text-gray-700">Submitted Documents:</h3>
    <ul class="mt-2">
        <li>
            <span id="purchaseRequestFileLinksContainer"></span>
        </li>
    </ul>
</div>

<h2 id="purchaseOrderTitle" class="text-sm font-bold text-gray-900 mt-3 hidden">Purchase Order Details:</h2>
<div id="purchaseOrderSection" class="mt-2 hidden">
    <h3 id="purchaseOrderDocumentsTitle" class="text-sm font-semibold text-gray-700">Submitted Documents:</h3>
    <ul class="mt-2">
        <li>
            <span id="purchaseOrderFileLinksContainer"></span>
        </li>
    </ul>
</div>


<h2 class="text-sm font-bold text-gray-900 mt-3">Remarks:</h2>
<p class="text-sm">
    {{ $request->remarks ? $request->remarks : 'No Remarks' }}
</p>

@if($request->steps == 2) 


<div x-data="submitForms()" x-cloak>
<div x-data="fileUploader({{ $request->id }})" @submit.prevent="quotationSubmit" x-cloak>
    <div class="flex justify-end mt-4">
        <button @click="showModal = true" class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg" style="border: 1px solid gray;">
        Attach Quotation Form Documents
            </button>

        <button @click="openModal($event, {{ $request->id }})" class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 ml-2 rounded-lg" style="background-color: #4F46E5;">
            Quotation Form
        </button>

    </div>

    <!-- Quotation Document Modal -->
    <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50" style="display: none;">
    <div class="bg-white rounded-lg shadow-lg w-80 md:w-1/3 p-6">
        <h2 class="text-lg font-semibold mb-4">Document Submission</h2>

        <!-- Notification for no documents -->
        <div x-show="!hasFiles && submitAttempted" class="mb-4 text-red-500">
            <p>Please attach at least one document before submitting.</p>
        </div>

        <form @submit.prevent="quotationSubmit">
        <div class="flex items-center mb-2">
                        <label for="files" class="block text-sm font-medium text-indigo-900 dark:text-black mr-2">Upload Files</label>
                        <span class="text-gray-500 text-sm">(File size should not exceed 25MB.)
                        </span>
                    </div>
            <div class="mb-4">
                <input type="file" id="files" name="files[]" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.xls,.xlsx" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" @change="previewFiles">
            </div>

            <div x-show="hasFiles" class="mt-4 max-w-full overflow-hidden">
                <h3 class="text-lg font-medium mb-2">Selected Files</h3>
                <div class="max-h-60 overflow-y-auto scrollbar">
                    <template x-for="(file, index) in files" :key="index">
                        <div class="flex items-center justify-between bg-gray-100 rounded-lg p-2.5 mb-2 max-w-full overflow-hidden">
                            <div class="flex items-center space-x-2">
                                <!-- File Preview (Clickable for Full View) -->
                                <a :href="file.url" target="_blank" class="w-20 h-20 block overflow-hidden rounded-lg bg-gray-200 flex items-center justify-center">
                                    <img x-show="file.type.includes('image')" :src="file.url" class="object-cover w-20 h-20" alt="Image preview">
                                    <span x-show="!file.type.includes('image')" x-html="getFileIcon(file)" class="text-blue-500 text-6xl w-20 h-20 flex items-center justify-center"></span>
                                </a>
                                <!-- File Name and Size -->
                                <div class="flex flex-col w-52">
                                    <a :href="file.url" target="_blank" class="text-sm text-blue-500 hover:underline truncate" x-text="file.name"></a>
                                    <span class="text-xs text-gray-500">(<span x-text="formatBytes(file.size)"></span>)</span>
                                </div>
                            </div>
                            <!-- Remove Button -->
                            <button type="button" @click="removeFile(index)" class="text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-3.707-8.293a1 1 0 011.414-1.414L10 8.586l2.293-2.293a1 1 0 111.414 1.414L11.414 10l2.293 2.293a1 1 0 11-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 10 6.293 7.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </template>
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <button type="button" @click="showModal = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg mr-2">Cancel</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Submit</button>
            </div>
        </form>
    </div>
</div>

<div x-show="showConfirmationModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50" @click.away="showConfirmationModal = false" style="display: none;">
    <div class="bg-white rounded-lg shadow-lg w-90 p-6"> <!-- Adjust width as needed -->
        <h2 class="text-lg font-semibold mb-4">Confirm Submission</h2>
        <p class="mb-4">Are you sure you want to submit the selected documents? This action cannot be undone.</p>
        <div class="flex justify-end mt-8">
            <button type="button" @click="showConfirmationModal = false; showModal = true" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg mr-2">Cancel</button>
            <button type="button" @click="submitQuotationForm" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Confirm</button>
        </div>
    </div>
</div>

<div x-show="showSuccessModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50" @click.away="showSuccessModal = false" style="display: none;">
    <div class="bg-white rounded-lg shadow-lg w-100 p-6 flex flex-col items-center"> <!-- Center content -->
        <!-- Check Mark GIF -->
        <img src="{{ asset('images/verified.gif') }}" alt="Success Check Mark" class="h-16 w-16 mb-4" />


        <h2 class="text-lg font-semibold mb-4">Upload Successful</h2>
        <p class="mb-4">Your documents have been uploaded successfully.</p>
        <div class="flex justify-end mt-4">
            <button type="button" @click="showSuccessModal = false; showModal = false; location.reload();" class="bg-blue-600 hover:bg-blue-700 text-white px-44 py-2 rounded-lg">OK</button>
        </div>
    </div>
</div>



<script>
   function fileUploader(requestId) {
    return {
        requestData: {
            id: requestId,
            name: '',
            description: '',
            category: ''
        },
        categoryOptions: ['Office Supplies', 'Technology & Electronics', 'Furniture', 'Cleaning & Maintenance', 'Breakroom Supplies'],
        files: [],
        hasFiles: false,
        showModal: false, 
        showOtherInput: false,
        showConfirmationModal: false,
        showSuccessModal: false, // New property for success modal
        submitAttempted: false, // New property to track submit attempts

        init() {
            this.hasFiles = this.files.length > 0;
        },

        previewFiles(event) {
            const files = event.target.files;
            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            ];
            const MAX_FILE_SIZE = 25 * 1024 * 1024; // 25MB in bytes

            let totalSize = this.files.reduce((sum, file) => sum + file.size, 0); // Current total size

            if (!files || files.length === 0) return;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                // Check if the file type is allowed
                if (!allowedTypes.includes(file.type)) {
                    console.warn(`Unsupported file type: ${file.name}`);
                    alert(`Unsupported file type: ${file.name}. Please upload files of type: jpg, jpeg, png, pdf, doc, docx, xls, xlsx.`);
                    continue;
                }

                // Check if the individual file exceeds the 25MB limit
                if (file.size > MAX_FILE_SIZE) {
                    console.warn(`File too large: ${file.name}`);
                    alert(`The file "${file.name}" exceeds the 25MB limit. Please upload a smaller file.`);
                    continue;
                }

                // Check if adding this file would exceed the total 25MB limit
                if (totalSize + file.size > MAX_FILE_SIZE) {
                    console.warn(`Cumulative size exceeds 25MB with the addition of: ${file.name}`);
                    alert(`Adding "${file.name}" will exceed the total 25MB limit. Please remove some files or choose smaller ones.`);
                    continue;
                }

                // If valid, read the file and add it to the list
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.files.push({
                        name: file.name,
                        size: file.size,
                        type: file.type,
                        url: e.target.result
                    });
                    this.hasFiles = true; // Set hasFiles to true if a valid file is added
                };
                reader.readAsDataURL(file);

                // Update the total size after adding the file
                totalSize += file.size;
            }

            // Final check: Warn if total size of all files exceeds 25MB
            if (totalSize > MAX_FILE_SIZE) {
                console.warn(`Total size of all uploaded files exceeds 25MB.`);
                alert(`The total size of all uploaded files exceeds the 25MB limit. Please remove some files.`);
            }
        },

        removeFile(index) {
            this.files.splice(index, 1);
            if (this.files.length === 0) {
                this.hasFiles = false;
            }
        },

        formatBytes(bytes, decimals = 2) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const dm = decimals < 0 ? 0 : decimals;
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
        },

        getFileIcon(file) {
            const fileType = file.type.split('/')[1];
            let iconHtml = '';

            switch (fileType) {
                case 'pdf':
                    iconHtml = '<i class="far fa-file-pdf"></i>';
                    break;
                case 'doc':
                case 'docx':
                    iconHtml = '<i class="far fa-file-word"></i>';
                    break;
                case 'xls':
                case 'xlsx':
                    iconHtml = '<i class="far fa-file-excel"></i>';
                    break;
                default:
                    iconHtml = '<i class="far fa-file-alt"></i>';
                    break;
            }

            return iconHtml;
        },

        openModal(event, requestId) {
            this.currentRequestId = requestId; // Store the request ID
            this.isModalOpen = true; // Open the modal
        },

        quotationSubmit() {
            this.submitAttempted = true; // Mark the submit attempt
            if (!this.hasFiles) {
                return; // Do not proceed if there are no files
            }
            this.showConfirmationModal = true; // Show the confirmation modal
        },

        // Function to handle the actual submission
        submitQuotationForm() {
            const formData = new FormData();

            // Append files
            this.files.forEach((file) => {
                formData.append('files[]', this.dataURLtoFile(file.url, file.name));
            });

            // Append request ID
            formData.append('id', this.requestData.id);

            // Log request ID
            console.log('Request ID:', this.requestData.id);

            // CSRF token setup
            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : '';

            // Submit form using fetch
            fetch('{{ route('quotation.submit') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    this.showModal = false; // Close the document submission modal
                    this.showConfirmationModal = false; // Close the confirmation modal
                    this.showSuccessModal = true; // Show the success modal
                } else {
                    console.error('Submission failed:', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        },

        dataURLtoFile(dataurl, filename) {
            const arr = dataurl.split(',');
            const mime = arr[0].match(/:(.*?);/)[1];
            const bstr = atob(arr[1]);
            let n = bstr.length;
            const u8arr = new Uint8Array(n);
            while (n--) {
                u8arr[n] = bstr.charCodeAt(n);
            }
            return new File([u8arr], filename, { type: mime });
        }
    };
}
</script>

    <!-- Modal for Quotation Form -->
    <div x-show="isModalOpen" @click.away="isModalOpen = false" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg max-w-5xl w-full p-6 relative">
            <button @click="isModalOpen = false" class="absolute top-4 right-4 text-gray-600 hover:text-gray-900 focus:outline-none">&times;</button>
            <h2 class="text-xl font-bold sm:text-xl mb-4">Company <span x-text="currentCompanyIndex + 1"></span></h2>
            <template x-for="(company, index) in companies" :key="index">
                <div x-show="currentCompanyIndex === index">
                    <input type="hidden" id="request_id" x-model="currentRequestId">
                    
                    <!-- Company Name Input -->
                    <div class="mb-4">
                        <label for="company_name" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Company Name</label>
                        <input type="text" id="company_name" x-model="company.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3" placeholder="Enter company name" required>
                    </div>

                    <div class="mb-4">
                        <label for="company_address" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Company Address</label>
                        <input type="text" id="company_address" x-model="company.address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-3" placeholder="Enter company Address" required>
                    </div>
                    
                    <!-- Quotation Table -->
                    <div class="mb-4 flex flex-col">
                <label for="quotation_description" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Quotation</label>
                <div class="overflow-x-auto mb-2">
                    <table id="quotation-table" class="min-w-full bg-white border-gray-300 border rounded-lg">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">Item</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">Qty</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">Unit</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">Description</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">Unit Price</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">Amount</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="(row, rIndex) in globalRows" :key="rIndex">
                                <tr>
                                    <td class="border px-4 py-2">
                                        <input type="text" x-model="row.item_type" class="border-0 w-28 p-2" placeholder="Item Type" required>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <input type="number" x-model="row.qty" class="border-0 w-20 p-2" @input="calculateAmount(row)" placeholder="Qty" required>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <select x-model="row.unit" class="border-0 w-full p-2" required>
                                            <option value="" disabled>Select Unit</option>
                                            <option value="pcs">pcs (pieces)</option>
                                            <option value="box">box</option>
                                            <option value="pack">pack</option>
                                            <option value="dozen">dozen</option>
                                            <option value="pair">pair</option>
                                            <option value="g">g (grams)</option>
                                            <option value="kg">kg (kilograms)</option>
                                            <option value="ml">ml (milliliters)</option>
                                            <option value="liters">liters</option>
                                            <option value="mm">mm (millimeters)</option>
                                        </select>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <textarea x-model="row.item_description" rows="2" class="border-0 w-full p-2" placeholder="Item Description" required></textarea>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <input type="number" x-model="row.unit_price[currentCompanyIndex]" class="border-0 w-28 p-2" @input="calculateAmount(row, currentCompanyIndex)" step="0.01" placeholder="Unit Price" required>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <input type="number" x-model="row.amount[currentCompanyIndex]" class="border-0 w-20 p-2" readonly>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <button @click="removeRow(rIndex)" class="text-red-600 hover:text-red-800 font-medium text-sm">Remove</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-end">
                    <button @click="addRow()" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Add More</button>
                </div>
            </div>
                </div>
            </template>

            <div class="flex justify-between mt-4">
                <div class="flex-grow">
                    <button @click="previousCompany()" :disabled="currentCompanyIndex === 0" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Previous</button>
                </div>
                <div class="flex justify-end space-x-4">
                    <button @click="nextCompany()" :disabled="currentCompanyIndex === companies.length - 1" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Next</button>
                    <button @click="showSummary()" class="text-indigo-700 hover:text-indigo-900 font-medium text-sm">Proceed</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Summary Modal -->
    <div x-show="isSummaryOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg max-w-5xl w-full p-6 relative">
            <h2 class="text-xl font-bold mb-4">Summary of Quotation</h2>

            <template x-for="(company, index) in companies" :key="index">
                <div class="mb-6">
                    <h3 class="font-semibold text-lg mb-2">
                        Company <span x-text="index + 1"></span>: <span x-text="company.name"></span>
                    </h3>
                    <p><strong>Company Address:</strong> <span x-text="company.address"></span></p>

                    <table class="min-w-full bg-white border-gray-300 border rounded-lg mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">Item</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">Qty</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">Unit</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">Description</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">Unit Price</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="(row, rIndex) in globalRows" :key="rIndex">
                                <tr>
                                    <td class="border px-4 py-2" x-text="row.item_type"></td>
                                    <td class="border px-4 py-2" x-text="row.qty"></td>
                                    <td class="border px-4 py-2" x-text="row.unit"></td>
                                    <td class="border px-4 py-2" x-text="row.item_description"></td>
                                    <td class="border px-4 py-2" x-text="row.unit_price[index] || 0"></td>
                                    <td class="border px-4 py-2" x-text="row.amount[index] || 0"></td>
                                </tr>
                            </template>
                        </tbody>
                    </table>

                    <div class="text-right mt-2">
                        <strong>Total:</strong> <span x-text="calculateTotal(index)"></span>
                    </div>
                </div>
            </template>
            <div class="flex justify-end space-x-4 mt-4">
                <button @click="isSummaryOpen = false" class="text-gray-500 hover:text-gray-700 font-medium text-sm">Cancel</button>
                <button @click="showSuccess();" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Confirm & Submit</button>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div x-show="showConfirmationModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50" @click.away="showConfirmationModal = false" x-cloak>
        <div class="bg-white rounded-lg shadow-lg w-90 p-6">
            <h2 class="text-lg font-semibold mb-4">Confirm Submission</h2>
            <p class="mb-4">Are you sure you want to submit the selected documents? This action cannot be undone.</p>
            <div class="flex justify-end mt-8">
                <button type="button" @click="showConfirmationModal = false; showModal = true" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg mr-2">Cancel</button>
                <button type="button" @click="submitQuotationForm" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Confirm</button>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div x-show="showSuccessModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50" @click.away="showSuccessModal = false" x-cloak>
        <div class="bg-white rounded-lg shadow-lg w-100 p-6 flex flex-col items-center">
            <img src="{{ asset('images/verified.gif') }}" alt="Success Check Mark" class="h-16 w-16 mb-4" />
            <h2 class="text-lg font-semibold mb-4">Quotation Form</h2>
            <p class="mb-4">Your documents have been uploaded successfully.</p>
            <div class="flex justify-end mt-4">
                <button type="button" @click="showSuccessModal = false; submitQuotation();" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">OK</button>
            </div>
        </div>
    </div>

<script>
function submitForms() {
    return {
        showSuccessModal: false,
        isModalOpen: false,
        isSummaryOpen: false,
        showConfirmationModal: false,
        currentRequestId: null,
        currentCompanyIndex: 0,
        globalRows: [{ item_type: '', qty: 0, unit: '', item_description: '', unit_price: [], amount: [] }],
        companies: [
            { company_id: '1', name: '', address: '', rows: [] },
            { company_id: '2', name: '', address: '', rows: [] },
            { company_id: '3', name: '', address: '', rows: [] },
        ],

        // Populate company-specific rows based on global rows
        populateCompanyRows() {
            this.companies.forEach((company, index) => {
                company.rows = this.globalRows.map(row => ({
                    item_type: row.item_type,
                    qty: row.qty,
                    unit: row.unit,
                    item_description: row.item_description,
                    unit_price: row.unit_price[index] || 0,
                    amount: row.amount[index] || 0,
                    item_status: 0  // Assuming status is initialized
                }));
            });

            console.log("Populated Company Rows:", this.companies);  // Debugging step
        },


        openModal(event, requestId) {
            this.currentRequestId = requestId;
            this.isModalOpen = true;
            this.populateCompanyRows(); // Populate company rows when modal opens
        },

        addRow() {
            const newRow = {
                item_type: '',
                qty: 0,
                unit: '',
                item_description: '',
                unit_price: new Array(this.companies.length).fill(0), // Initialize with the right length
                amount: new Array(this.companies.length).fill(0)
            };
            this.globalRows.push(newRow);
            this.populateCompanyRows();
        },


        calculateAmount(row, cIndex) {
            const qty = parseFloat(row.qty) || 0;
            const unitPrice = parseFloat(row.unit_price[cIndex]) || 0;
            row.amount[cIndex] = qty * unitPrice; // Update the amount for the specific company
        },


        calculateTotal(index) {
            return this.globalRows.reduce((total, row) => {
                return total + (parseFloat(row.amount[index]) || 0);
            }, 0).toFixed(2);
        },

        formatPrice(price) {
            return parseFloat(price).toFixed(2);
        },

        removeRow(index) {
            this.globalRows.splice(index, 1);  // Remove row from global rows
            this.populateCompanyRows();  // Reflect changes in all companies
        },


        showSummary() {
            this.isSummaryOpen = true;
        },

        showSuccess() {
            this.showSuccessModal = true;
        },

        submitQuotation() {
            console.log("Company Data Before Submission:", this.companies);

            const quotationData = this.companies.map(company => {
                // Filter rows that are valid
                const items = company.rows.filter(row => 
                    row.item_type && row.qty && row.unit && row.item_description
                );

                return {
                    request_id: this.currentRequestId,
                    company_id: company.company_id,
                    company_name: company.name,
                    company_address: company.address,
                    items: items.map(row => ({
                        item_type: row.item_type,
                        qty: row.qty,
                        unit: row.unit,
                        item_description: row.item_description,
                        unit_price: row.unit_price || 0,
                        amount: row.amount || 0,
                        item_status: 0
                    }))
                };
            }).filter(company => company.items.length > 0);  // Ensure no empty item lists

            // Stop if no valid data to submit
            if (quotationData.length === 0) {
                
                return;
            }

            console.log("Sending Quotation Data:", quotationData);

            fetch('/submit-quotation', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(quotationData)
            })
            .then(response => {
                if (!response.ok) {
                    return response.text().then(text => {
                        throw new Error(`Error: ${response.status}, ${text}`);
                    });
                }
                return response.json();
            })
            .then(data => {
                alert(data.message || 'Quotation saved successfully!');
                this.resetForm();
            })
            .catch(error => {
                alert('There was a problem with the submission: ' + error.message);
            });
        },

        resetForm() {
            this.companies.forEach(company => {
                company.name = '';
                company.address = '';
                company.rows = [];
            });
            this.isModalOpen = false;
            this.isSummaryOpen = false;
        },

        nextCompany() {
            if (this.currentCompanyIndex < this.companies.length - 1) {
                this.currentCompanyIndex++;
                this.populateCompanyRows();  // Ensure rows are synchronized
            }
        },

        previousCompany() {
            if (this.currentCompanyIndex > 0) {
                this.currentCompanyIndex--;
                this.populateCompanyRows();  // Ensure rows are synchronized
            }
        }
    };
}
</script>

</div>

@endif

@if($request->steps == 3) 
<div x-data="fileUploader({{ $request->id }})" @submit.prevent="purchaseRequestSubmit">
    <div class="flex justify-end mt-4">
        <button @click="showModal = true" class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg" style="border: 1px solid gray;">
        Attach Purchase Request Documents
            </button>
    </div>

    <!-- Quotation Document Modal -->
    <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50" style="display: none;">
    <div class="bg-white rounded-lg shadow-lg w-80 md:w-1/3 p-6">
        <h2 class="text-lg font-semibold mb-4">Document Submission</h2>

        <!-- Notification for no documents -->
        <div x-show="!hasFiles && submitAttempted" class="mb-4 text-red-500">
            <p>Please attach at least one document before submitting.</p>
        </div>

        <form @submit.prevent="purchaseRequestSubmit">
            <div class="mb-4">
                <label for="files" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Upload Files</label>
                <input type="file" id="files" name="files[]" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.xls,.xlsx" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" @change="previewFiles">
            </div>

            <div x-show="hasFiles" class="mt-4 max-w-full overflow-hidden">
                <h3 class="text-lg font-medium mb-2">Selected Files</h3>
                <div class="max-h-60 overflow-y-auto scrollbar">
                    <template x-for="(file, index) in files" :key="index">
                        <div class="flex items-center justify-between bg-gray-100 rounded-lg p-2.5 mb-2 max-w-full overflow-hidden">
                            <div class="flex items-center space-x-2">
                                <!-- File Preview (Clickable for Full View) -->
                                <a :href="file.url" target="_blank" class="w-20 h-20 block overflow-hidden rounded-lg bg-gray-200 flex items-center justify-center">
                                    <img x-show="file.type.includes('image')" :src="file.url" class="object-cover w-20 h-20" alt="Image preview">
                                    <span x-show="!file.type.includes('image')" x-html="getFileIcon(file)" class="text-blue-500 text-6xl w-20 h-20 flex items-center justify-center"></span>
                                </a>
                                <!-- File Name and Size -->
                                <div class="flex flex-col w-52">
                                    <a :href="file.url" target="_blank" class="text-sm text-blue-500 hover:underline truncate" x-text="file.name"></a>
                                    <span class="text-xs text-gray-500">(<span x-text="formatBytes(file.size)"></span>)</span>
                                </div>
                            </div>
                            <!-- Remove Button -->
                            <button type="button" @click="removeFile(index)" class="text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-3.707-8.293a1 1 0 011.414-1.414L10 8.586l2.293-2.293a1 1 0 111.414 1.414L11.414 10l2.293 2.293a1 1 0 11-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 10 6.293 7.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </template>
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <button type="button" @click="showModal = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg mr-2">Cancel</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Submit</button>
            </div>
        </form>
    </div>
</div>

<div x-show="showConfirmationModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50" @click.away="showConfirmationModal = false" style="display: none;">
    <div class="bg-white rounded-lg shadow-lg w-90 p-6"> <!-- Adjust width as needed -->
        <h2 class="text-lg font-semibold mb-4">Confirm Submission</h2>
        <p class="mb-4">Are you sure you want to submit the selected documents? This action cannot be undone.</p>
        <div class="flex justify-end mt-8">
            <button type="button" @click="showConfirmationModal = false; showModal = true" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg mr-2">Cancel</button>
            <button type="button" @click="submitPurchaseRequest" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Confirm</button>
        </div>
    </div>
</div>

<div x-show="showSuccessModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50" @click.away="showSuccessModal = false" style="display: none;">
    <div class="bg-white rounded-lg shadow-lg w-100 p-6 flex flex-col items-center"> <!-- Center content -->
        <!-- Check Mark GIF -->
        <img src="{{ asset('images/verified.gif') }}" alt="Success Check Mark" class="h-16 w-16 mb-4" />


        <h2 class="text-lg font-semibold mb-4">Upload Successful</h2>
        <p class="mb-4">Your documents have been uploaded successfully.</p>
        <div class="flex justify-end mt-4">
            <button type="button" @click="showSuccessModal = false; showModal = false; location.reload();" class="bg-blue-600 hover:bg-blue-700 text-white px-44 py-2 rounded-lg">OK</button>
        </div>
    </div>
</div>



<script>
   function fileUploader(requestId) {
    return {
        requestData: {
            id: requestId,
            name: '',
            description: '',
            category: ''
        },
        categoryOptions: ['Office Supplies', 'Technology & Electronics', 'Furniture', 'Cleaning & Maintenance', 'Breakroom Supplies'],
        files: [],
        hasFiles: false,
        showModal: false, 
        showOtherInput: false,
        showConfirmationModal: false,
        showSuccessModal: false, // New property for success modal
        submitAttempted: false, // New property to track submit attempts

        init() {
            this.hasFiles = this.files.length > 0;
        },

        previewFiles(event) {
            const files = event.target.files;
            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            ];
            const MAX_FILE_SIZE = 25 * 1024 * 1024; // 25MB in bytes

            let totalSize = this.files.reduce((sum, file) => sum + file.size, 0); // Current total size

            if (!files || files.length === 0) return;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                // Check if the file type is allowed
                if (!allowedTypes.includes(file.type)) {
                    console.warn(`Unsupported file type: ${file.name}`);
                    alert(`Unsupported file type: ${file.name}. Please upload files of type: jpg, jpeg, png, pdf, doc, docx, xls, xlsx.`);
                    continue;
                }

                // Check if the individual file exceeds the 25MB limit
                if (file.size > MAX_FILE_SIZE) {
                    console.warn(`File too large: ${file.name}`);
                    alert(`The file "${file.name}" exceeds the 25MB limit. Please upload a smaller file.`);
                    continue;
                }

                // Check if adding this file would exceed the total 25MB limit
                if (totalSize + file.size > MAX_FILE_SIZE) {
                    console.warn(`Cumulative size exceeds 25MB with the addition of: ${file.name}`);
                    alert(`Adding "${file.name}" will exceed the total 25MB limit. Please remove some files or choose smaller ones.`);
                    continue;
                }

                // If valid, read the file and add it to the list
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.files.push({
                        name: file.name,
                        size: file.size,
                        type: file.type,
                        url: e.target.result
                    });
                    this.hasFiles = true; // Set hasFiles to true if a valid file is added
                };
                reader.readAsDataURL(file);

                // Update the total size after adding the file
                totalSize += file.size;
            }

            // Final check: Warn if total size of all files exceeds 25MB
            if (totalSize > MAX_FILE_SIZE) {
                console.warn(`Total size of all uploaded files exceeds 25MB.`);
                alert(`The total size of all uploaded files exceeds the 25MB limit. Please remove some files.`);
            }
        },

        removeFile(index) {
            this.files.splice(index, 1);
            if (this.files.length === 0) {
                this.hasFiles = false;
            }
        },

        formatBytes(bytes, decimals = 2) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const dm = decimals < 0 ? 0 : decimals;
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
        },

        getFileIcon(file) {
            const fileType = file.type.split('/')[1];
            let iconHtml = '';

            switch (fileType) {
                case 'pdf':
                    iconHtml = '<i class="far fa-file-pdf"></i>';
                    break;
                case 'doc':
                case 'docx':
                    iconHtml = '<i class="far fa-file-word"></i>';
                    break;
                case 'xls':
                case 'xlsx':
                    iconHtml = '<i class="far fa-file-excel"></i>';
                    break;
                default:
                    iconHtml = '<i class="far fa-file-alt"></i>';
                    break;
            }

            return iconHtml;
        },

        openModal(event, requestId) {
            this.currentRequestId = requestId; // Store the request ID
            this.isModalOpen = true; // Open the modal
        },

        purchaseRequestSubmit() {
            this.submitAttempted = true; // Mark the submit attempt
            if (!this.hasFiles) {
                return; // Do not proceed if there are no files
            }
            this.showConfirmationModal = true; // Show the confirmation modal
        },

        // Function to handle the actual submission
        submitPurchaseRequest() {
            const formData = new FormData();

            // Append files
            this.files.forEach((file) => {
                formData.append('files[]', this.dataURLtoFile(file.url, file.name));
            });

            // Append request ID
            formData.append('id', this.requestData.id);

            // Log request ID
            console.log('Request ID:', this.requestData.id);

            // CSRF token setup
            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : '';

            // Submit form using fetch
            fetch('{{ route('purchaseRequest.submit') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    this.showModal = false; // Close the document submission modal
                    this.showConfirmationModal = false; // Close the confirmation modal
                    this.showSuccessModal = true; // Show the success modal
                } else {
                    console.error('Submission failed:', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        },

        dataURLtoFile(dataurl, filename) {
            const arr = dataurl.split(',');
            const mime = arr[0].match(/:(.*?);/)[1];
            const bstr = atob(arr[1]);
            let n = bstr.length;
            const u8arr = new Uint8Array(n);
            while (n--) {
                u8arr[n] = bstr.charCodeAt(n);
            }
            return new File([u8arr], filename, { type: mime });
        }
    };
}
</script>
@endif


@if($request->steps == 4) 
<div x-data="fileUploader({{ $request->id }})" @submit.prevent="purchaseOrderSubmit">
    <div class="flex justify-end mt-4">
        <button @click="showModal = true" class="bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-lg" style="border: 1px solid gray;">
        Attach Purchase Order Documents
            </button>
    </div>

    <!-- Quotation Document Modal -->
    <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50" style="display: none;">
    <div class="bg-white rounded-lg shadow-lg w-80 md:w-1/3 p-6">
        <h2 class="text-lg font-semibold mb-4">Document Submission</h2>

        <!-- Notification for no documents -->
        <div x-show="!hasFiles && submitAttempted" class="mb-4 text-red-500">
            <p>Please attach at least one document before submitting.</p>
        </div>

        <form @submit.prevent="purchaseOrderSubmit">
            <div class="mb-4">
                <label for="files" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-black">Upload Files</label>
                <input type="file" id="files" name="files[]" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.xls,.xlsx" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" @change="previewFiles">
            </div>

            <div x-show="hasFiles" class="mt-4 max-w-full overflow-hidden">
                <h3 class="text-lg font-medium mb-2">Selected Files</h3>
                <div class="max-h-60 overflow-y-auto scrollbar">
                    <template x-for="(file, index) in files" :key="index">
                        <div class="flex items-center justify-between bg-gray-100 rounded-lg p-2.5 mb-2 max-w-full overflow-hidden">
                            <div class="flex items-center space-x-2">
                                <!-- File Preview (Clickable for Full View) -->
                                <a :href="file.url" target="_blank" class="w-20 h-20 block overflow-hidden rounded-lg bg-gray-200 flex items-center justify-center">
                                    <img x-show="file.type.includes('image')" :src="file.url" class="object-cover w-20 h-20" alt="Image preview">
                                    <span x-show="!file.type.includes('image')" x-html="getFileIcon(file)" class="text-blue-500 text-6xl w-20 h-20 flex items-center justify-center"></span>
                                </a>
                                <!-- File Name and Size -->
                                <div class="flex flex-col w-52">
                                    <a :href="file.url" target="_blank" class="text-sm text-blue-500 hover:underline truncate" x-text="file.name"></a>
                                    <span class="text-xs text-gray-500">(<span x-text="formatBytes(file.size)"></span>)</span>
                                </div>
                            </div>
                            <!-- Remove Button -->
                            <button type="button" @click="removeFile(index)" class="text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-3.707-8.293a1 1 0 011.414-1.414L10 8.586l2.293-2.293a1 1 0 111.414 1.414L11.414 10l2.293 2.293a1 1 0 11-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 10 6.293 7.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </template>
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <button type="button" @click="showModal = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg mr-2">Cancel</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Submit</button>
            </div>
        </form>
    </div>
</div>

<div x-show="showConfirmationModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50" @click.away="showConfirmationModal = false" style="display: none;">
    <div class="bg-white rounded-lg shadow-lg w-90 p-6"> <!-- Adjust width as needed -->
        <h2 class="text-lg font-semibold mb-4">Confirm Submission</h2>
        <p class="mb-4">Are you sure you want to submit the selected documents? This action cannot be undone.</p>
        <div class="flex justify-end mt-8">
            <button type="button" @click="showConfirmationModal = false; showModal = true" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg mr-2">Cancel</button>
            <button type="button" @click="submitPurchaseOrder" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Confirm</button>
        </div>
    </div>
</div>

<div x-show="showSuccessModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50" @click.away="showSuccessModal = false" style="display: none;">
    <div class="bg-white rounded-lg shadow-lg w-100 p-6 flex flex-col items-center"> <!-- Center content -->
        <!-- Check Mark GIF -->
        <img src="{{ asset('images/verified.gif') }}" alt="Success Check Mark" class="h-16 w-16 mb-4" />


        <h2 class="text-lg font-semibold mb-4">Upload Successful</h2>
        <p class="mb-4">Your documents have been uploaded successfully.</p>
        <div class="flex justify-end mt-4">
            <button type="button" @click="showSuccessModal = false; showModal = false; location.reload();" class="bg-blue-600 hover:bg-blue-700 text-white px-44 py-2 rounded-lg">OK</button>
        </div>
    </div>
</div>



<script>
   function fileUploader(requestId) {
    return {
        requestData: {
            id: requestId,
            name: '',
            description: '',
            category: ''
        },
        categoryOptions: ['Office Supplies', 'Technology & Electronics', 'Furniture', 'Cleaning & Maintenance', 'Breakroom Supplies'],
        files: [],
        hasFiles: false,
        showModal: false, 
        showOtherInput: false,
        showConfirmationModal: false,
        showSuccessModal: false, // New property for success modal
        submitAttempted: false, // New property to track submit attempts

        init() {
            this.hasFiles = this.files.length > 0;
        },

        previewFiles(event) {
            const files = event.target.files;
            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            ];
            const MAX_FILE_SIZE = 25 * 1024 * 1024; // 25MB in bytes

            let totalSize = this.files.reduce((sum, file) => sum + file.size, 0); // Current total size

            if (!files || files.length === 0) return;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                // Check if the file type is allowed
                if (!allowedTypes.includes(file.type)) {
                    console.warn(`Unsupported file type: ${file.name}`);
                    alert(`Unsupported file type: ${file.name}. Please upload files of type: jpg, jpeg, png, pdf, doc, docx, xls, xlsx.`);
                    continue;
                }

                // Check if the individual file exceeds the 25MB limit
                if (file.size > MAX_FILE_SIZE) {
                    console.warn(`File too large: ${file.name}`);
                    alert(`The file "${file.name}" exceeds the 25MB limit. Please upload a smaller file.`);
                    continue;
                }

                // Check if adding this file would exceed the total 25MB limit
                if (totalSize + file.size > MAX_FILE_SIZE) {
                    console.warn(`Cumulative size exceeds 25MB with the addition of: ${file.name}`);
                    alert(`Adding "${file.name}" will exceed the total 25MB limit. Please remove some files or choose smaller ones.`);
                    continue;
                }

                // If valid, read the file and add it to the list
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.files.push({
                        name: file.name,
                        size: file.size,
                        type: file.type,
                        url: e.target.result
                    });
                    this.hasFiles = true; // Set hasFiles to true if a valid file is added
                };
                reader.readAsDataURL(file);

                // Update the total size after adding the file
                totalSize += file.size;
            }

            // Final check: Warn if total size of all files exceeds 25MB
            if (totalSize > MAX_FILE_SIZE) {
                console.warn(`Total size of all uploaded files exceeds 25MB.`);
                alert(`The total size of all uploaded files exceeds the 25MB limit. Please remove some files.`);
            }
        },

        removeFile(index) {
            this.files.splice(index, 1);
            if (this.files.length === 0) {
                this.hasFiles = false;
            }
        },

        formatBytes(bytes, decimals = 2) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const dm = decimals < 0 ? 0 : decimals;
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
        },

        getFileIcon(file) {
            const fileType = file.type.split('/')[1];
            let iconHtml = '';

            switch (fileType) {
                case 'pdf':
                    iconHtml = '<i class="far fa-file-pdf"></i>';
                    break;
                case 'doc':
                case 'docx':
                    iconHtml = '<i class="far fa-file-word"></i>';
                    break;
                case 'xls':
                case 'xlsx':
                    iconHtml = '<i class="far fa-file-excel"></i>';
                    break;
                default:
                    iconHtml = '<i class="far fa-file-alt"></i>';
                    break;
            }

            return iconHtml;
        },

        openModal(event, requestId) {
            this.currentRequestId = requestId; // Store the request ID
            this.isModalOpen = true; // Open the modal
        },

        purchaseOrderSubmit() {
            this.submitAttempted = true; // Mark the submit attempt
            if (!this.hasFiles) {
                return; // Do not proceed if there are no files
            }
            this.showConfirmationModal = true; // Show the confirmation modal
        },

        // Function to handle the actual submission
        submitPurchaseOrder() {
            const formData = new FormData();

            // Append files
            this.files.forEach((file) => {
                formData.append('files[]', this.dataURLtoFile(file.url, file.name));
            });

            // Append request ID
            formData.append('id', this.requestData.id);

            // Log request ID
            console.log('Request ID:', this.requestData.id);

            // CSRF token setup
            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : '';

            // Submit form using fetch
            fetch('{{ route('purchaseOrder.submit') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    this.showModal = false; // Close the document submission modal
                    this.showConfirmationModal = false; // Close the confirmation modal
                    this.showSuccessModal = true; // Show the success modal
                } else {
                    console.error('Submission failed:', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        },

        dataURLtoFile(dataurl, filename) {
            const arr = dataurl.split(',');
            const mime = arr[0].match(/:(.*?);/)[1];
            const bstr = atob(arr[1]);
            let n = bstr.length;
            const u8arr = new Uint8Array(n);
            while (n--) {
                u8arr[n] = bstr.charCodeAt(n);
            }
            return new File([u8arr], filename, { type: mime });
        }
    };
}
</script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const steps = @json($request->steps); // Get the steps value from Laravel
        const fileLinksContainer = document.getElementById('fileLinksContainer');
        const quotationFileLinksContainer = document.getElementById('quotationFileLinksContainer');
        const purchaseRequestFileLinksContainer = document.getElementById('purchaseRequestFileLinksContainer');
        const purchaseOrderFileLinksContainer = document.getElementById('purchaseOrderFileLinksContainer');

        const showSection = (sectionId, titleId) => {
            document.getElementById(sectionId).classList.remove('hidden');
            document.getElementById(titleId).classList.remove('hidden');
        };

        const hideSection = (sectionId, titleId) => {
            document.getElementById(sectionId).classList.add('hidden');
            document.getElementById(titleId).classList.add('hidden');
        };

        const updateDocumentTitlesAndLinks = (steps) => {
            // Hide all sections and titles initially
            hideSection('requestSection', 'requestTitle');
            hideSection('quotationSection', 'quotationTitle');
            hideSection('purchaseRequestSection', 'purchaseRequestTitle');
            hideSection('purchaseOrderSection', 'purchaseOrderTitle');

            // Show sections based on the steps
            if (steps >= 1) {
                showSection('requestSection', 'requestTitle');
                document.getElementById('requestDocumentsTitle').textContent = 'Submitted Documents:';
            }
            if (steps >= 2) {
                showSection('quotationSection', 'quotationTitle');
                document.getElementById('quotationDocumentsTitle').textContent = 'Submitted Documents:';
            }
            if (steps >= 3) {
                showSection('purchaseRequestSection', 'purchaseRequestTitle');
                document.getElementById('purchaseRequestDocumentsTitle').textContent = 'Submitted Documents:';
            }
            if (steps >= 4) {
                showSection('purchaseOrderSection', 'purchaseOrderTitle');
                document.getElementById('purchaseOrderDocumentsTitle').textContent = 'Submitted Documents:';
            }
        };

        // Function to generate file links based on the specified step
        const generateFileLinks = (filesArray, container, step) => {
            const filteredFiles = filesArray.filter(file => file.step === step); // Filter files by step

            if (filteredFiles.length > 0) {
                filteredFiles.forEach((file) => {
                    const fileName = file.file_path.split('/').pop(); // Extract the file name from the path
                    const fileExtension = fileName.split('.').pop().toLowerCase(); // Get file extension

                    // Create a link wrapper for the icon and file name
                    const linkWrapper = document.createElement('a');
                    linkWrapper.href = file.file_path; // Set the file URL directly to the href
                    linkWrapper.download = fileName; // Set the download attribute with the file name
                    linkWrapper.classList.add('flex', 'items-center', 'text-sm', 'text-blue-500', 'hover:underline'); // Styling

                    // Create the icon or image element
                    let iconOrImage;
                    switch (fileExtension) {
                        case 'pdf':
                            iconOrImage = document.createElement('i');
                            iconOrImage.classList.add('fas', 'fa-file-pdf', 'mr-1', 'fa-1.5x'); // Larger Font Awesome PDF icon
                            break;
                        case 'doc':
                        case 'docx':
                            iconOrImage = document.createElement('i');
                            iconOrImage.classList.add('fas', 'fa-file-word', 'mr-1', 'fa-1.5x'); // Larger Font Awesome Word icon
                            break;
                        case 'xls':
                        case 'xlsx':
                            iconOrImage = document.createElement('i');
                            iconOrImage.classList.add('fas', 'fa-file-excel', 'mr-1', 'fa-1.5x'); // Larger Font Awesome Excel icon
                            break;
                        case 'jpg':
                        case 'jpeg':
                        case 'png':
                        case 'gif':
                            iconOrImage = document.createElement('i');
                            iconOrImage.classList.add('fas', 'fa-file-image', 'mr-1', 'fa-1.5x'); // Larger Font Awesome Image icon
                            break;
                        default:
                            iconOrImage = document.createElement('img');
                            iconOrImage.src = 'path/to/stock-file-icon.png'; // Use a stock image logo
                            iconOrImage.alt = 'File icon';
                            iconOrImage.classList.add('w-6', 'h-6', 'mr-2', 'rounded-xl'); // Larger stock file icon
                    }

                    // Create the text element
                    const linkText = document.createElement('span');
                    linkText.textContent = fileName;

                    // Append the icon or image and text to the link wrapper
                    linkWrapper.appendChild(iconOrImage);
                    linkWrapper.appendChild(linkText);

                    // Append the link wrapper to the container
                    container.appendChild(linkWrapper);
                });
            } else {
                // If no files available for the step, display a message
                const message = document.createElement('div');
                message.textContent = "No files available for this step.";
                container.appendChild(message);
            }
        };

        // Call the function to generate file links for each section based on the step
        const filesArray = @json(json_decode($request->files));
        generateFileLinks(filesArray, fileLinksContainer, 1); // Step 1
        generateFileLinks(filesArray, quotationFileLinksContainer, 2); // Step 2
        generateFileLinks(filesArray, purchaseRequestFileLinksContainer, 3); // Step 3
        generateFileLinks(filesArray, purchaseOrderFileLinksContainer, 4); // Step 4

        // Update the document titles and links based on steps
        updateDocumentTitlesAndLinks(steps);
    });
</script>


            </div>
        </div>
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


