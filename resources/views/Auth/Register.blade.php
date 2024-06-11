<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Humbuah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-h-screen bg-blue-900 py-6 flex flex-col justify-center sm:py-10">
        <div class="flex justify-center items-center mb-14">
            <a href="{{ route('login') }}" class="font-serif font-bold text-5xl text-white">
                Humbuah</a>
        </div>
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-green-400 to-purple-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">

                <div class="max-w-md mx-auto">
                    <div class="text-center mb-6">
                        <h1 class="text-2xl font-semibold">Register New Account</h1>
                    </div>
                    <form action="{{ route('register-proses') }}" method="post">
                        @csrf
                        <div class="divide-y divide-gray-200">
                            <div class="py-8 text-base leading-6 space-y-5 text-gray-700 sm:text-lg sm:leading-7 ">
                                <div class="relative">
                                    <input autocomplete="off" id="username" name="username" type="text"
                                        class="peer placeholder-transparent block p-2.5 h-10 w-full border-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                        placeholder="Username" required />
                                    <label for="username"
                                        class="absolute left-3 -top-5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-5 peer-focus:text-gray-600 peer-focus:text-sm">User
                                        Name</label>
                                </div>
                                <div class="relative">
                                    <input autocomplete="off" id="email" name="email" type="email"
                                        class="peer placeholder-transparent block p-2.5 h-10 w-full border-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                        placeholder="Email address" required />
                                    <label for="email"
                                        class="absolute left-3 -top-5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-5 peer-focus:text-gray-600 peer-focus:text-sm">Email
                                        Address</label>
                                </div>
                                <div class="relative">
                                    <input autocomplete="off" id="password" name="password" type="password"
                                        class="peer placeholder-transparent block p-2.5 h-10 w-full border-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                        placeholder="Password" required />
                                    <label for="password"
                                        class="absolute left-3 -top-5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                                </div>
                                <div class="flex justify-center relative">
                                    <button class="relative">
                                        <span class="absolute top-0 left-0 mt-1 ml-1 h-full w-full rounded bg-black"></span>
                                        <span
                                            class="fold-bold relative inline-block h-full w-full rounded border-2 border-black bg-green-500 px-3 py-1 text-base font-bold text-black transition duration-100 hover:bg-yellow-400 hover:text-gray-900">Sign Up</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

@if ($message = Session::get('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ $message }}'
        });
    </script>
@endif

</html>
