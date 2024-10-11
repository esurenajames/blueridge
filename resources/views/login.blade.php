<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

@vite(['resources/css/app.css','resources/js/app.js'])

<body class="bg-gray-200 rounded-lg py-5">

<div class="py-16">
    <div class="py-16">
        <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
            <div class="hidden lg:block lg:w-1/2 bg-cover"
                style="background-image:url('https://i.pinimg.com/736x/6b/1b/22/6b1b22573f9f3d4bba11a9fa5cb45652.jpg')">
            </div>
            <div class="w-full p-8 lg:w-1/2">
            <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-4">Barangay BlueRidge</h2>
            <p class="text-base text-gray-600 text-center mb-5">Please sign in to continue</p>
                <a href="{{ route('main') }}" class="flex items-center justify-center mt-4 text-white rounded-lg shadow-md hover:bg-gray-100">

                </a>
                <div class="mt-4 flex items-center justify-between">
                    <span class="border-b w-1/5 lg:w-1/3"></span>
                    <label class="text-xs text-center text-gray-500 uppercase">login</label>
                    <span class="border-b w-1/5 lg:w-1/3"></span>
                </div>

                <!-- Start of Forms -->

                <form method="POST" action="{{ route('Login') }}">
                    @csrf
                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                        <input name="username" class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="text" />
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                            <a href="{{ route('forgot') }}" class="text-xs text-gray-500 hover:text-gray-800">Forgot Password?</a>
                        </div>
                        <input name="password" class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="password" />
                    </div>
                    <div class="mt-8">
                        <button class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600">Login</button>
                    </div>
                </form>

                <div x-show="{{ session('error') ? 'true' : 'false' }}" class="mt-4 text-center">
                    <p class="text-red-500 text-sm font-bold">{{ session('error') }}</p>
                </div>

                <!-- End of Forms -->


            </div>
            </div>
        </div>
    </div>
</div>

<script>

    </script>
</body>
