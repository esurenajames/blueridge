<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/heroicons@1.0.1/build/css/heroicons.min.css" rel="stylesheet">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @vite('resources/css/app.css', 'resources/js/app.css')
    </head>
    <body class="bg-gray-200 rounded-lg py-5">
 
<!-- https://play.tailwindcss.com/MIwj5Sp9pw -->
<div class="py-16">
<div class="py-16">
    <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
        <div class="hidden lg:block lg:w-1/2 bg-cover"
            style="background-image:url('https://i.pinimg.com/736x/6b/1b/22/6b1b22573f9f3d4bba11a9fa5cb45652.jpg')">
        </div>
        <div class="w-full p-8 lg:w-1/2">
          <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-4">Barangay BlueRidge</h2>
          <p class="text-base text-gray-600 text-center mb-5">Please sign in to continue</p>
            <a href="#" class="flex items-center justify-center mt-4 text-white rounded-lg shadow-md hover:bg-gray-100">
            <div class="px-4 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="gray" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M4.5 3.75a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V6.75a3 3 0 0 0-3-3h-15Zm4.125 3a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Zm-3.873 8.703a4.126 4.126 0 0 1 7.746 0 .75.75 0 0 1-.351.92 7.47 7.47 0 0 1-3.522.877 7.47 7.47 0 0 1-3.522-.877.75.75 0 0 1-.351-.92ZM15 8.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15ZM14.25 12a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H15a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15Z" clip-rule="evenodd" />
                </svg>
            </div>
            <h1 class="px-4 py-3 w-5/6 text-center text-gray-600 font-bold">Sign in using RFID</h1>
            </a>
            <div class="mt-4 flex items-center justify-between">
                <span class="border-b w-1/5 lg:w-1/3"></span>
                <label class="text-xs text-center text-gray-500 uppercase">login</label>
                <span class="border-b w-1/5 lg:w-1/3"></span>
            </div>

            <!-- Start of Forms -->

            <div class="mt-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="username" />
            </div>
            <div class="mt-4">
                <div class="flex justify-between">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <a href="#" class="text-xs text-gray-500 hover:text-gray-800">Forget Password?</a>
                </div>
                <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="password" />
            </div>
            <div class="mt-8">
                <button @click="showError = true" class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600">Login</button>
            </div>
            <div x-show="showError" class="mt-4 text-center">
                <p class="text-red-500 text-sm font-bold">Incorrect username or password. Please try again.</p>
            </div>

            <!-- End of Forms -->

            <div class="mt-4 flex flex-col items-center">
              <div class="flex items-center justify-between w-full">
                  <span class="border-b w-1/5 md:w-1/4"></span>
                  <label class="text-xs text-gray-500 uppercase mx-2">sign up</label>
                  <span class="border-b w-1/5 md:w-1/4"></span>
              </div>
            <div class="py-1">
              <p class="mt-4 text-sm text-gray-600">Not registered yet? <a href="{{ route('create-account') }}" class="font-bold text-gray-600 hover:text-gray-800">Create an Account</a></p>
            </div>
          </div>
        </div>
    </div>
</div>
</div>
    </body>
<html>