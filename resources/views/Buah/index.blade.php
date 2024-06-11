@extends('Layout/Main')
@section('content')
    <div class="flex flex-col">
        <div class="p-1.5 px-4 min-w-full inline-block align-middle">
            <div class="flex flex-col md:flex-row justify-between mb-6 mx-8">
                <a href="{{ route('admin.Create') }}" class="bg-blue-600 hover:bg-blue-700 shadow-md py-2 px-4 rounded-md mb-4 text-center md:mb-0">Add Fruit</a>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="relative w-full md:w-auto">
                    <form action="{{ route('index') }}" method="get">
                        <input
                            class="py-2 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-100 dark:border-neutral-700 dark:text-black dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            type="text" placeholder="Search Fruits" value="{{ $request->get('search') }}"
                            name="search">
                        <div class="absolute inset-y-0 end-0 flex items-center z-20 ps-3.5 pr-2">
                            <button>
                                <svg class="flex-shrink-0 size-4 text-black dark:text-black"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="border rounded-lg shadow-md overflow-x-auto px-2">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-medium text-center text-gray-500 uppercase">No</th>
                            <th scope="col" class="px-6 py-3 font-medium text-center text-gray-500 uppercase">Fruit Name</th>
                            <th scope="col" class="px-6 py-3 font-medium text-center text-gray-500 uppercase">Price per Kg</th>
                            <th scope="col" class="px-6 py-3 font-medium text-center text-gray-500 uppercase">Stock</th>
                            <th scope="col" class="py-3 font-medium text-center text-gray-500 uppercase">Supplier</th>
                            <th scope="col" class="py-3 font-medium text-center text-gray-500 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="min-w-full divide-y divide-gray-200 pr-12">
                        @foreach ($buah as $buah)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center font-medium text-gray-800">{{ $buah->Nama_Buah }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800">Rp {{ $buah->Harga_kg }}/kg</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800">{{ $buah->Stok_Buah }} kg</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800">
                                    @foreach ($suppliers as $supplier)
                                        {{ $supplier->Nama_Supplier }}
                                    @endforeach
                                </td>
                                <td class="py-4 whitespace-nowrap text-center font-medium flex justify-center">
                                    <div class="flex justify-end">
                                        <div>
                                            <a href="{{ route('admin.Edit', $buah->id) }}"
                                                class="inline-block bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring focus:ring-yellow-300 rounded-md py-2 px-4 transition duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill inline-block mr-1" viewBox="0 0 16 16">
                                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                                </svg>
                                                Edit
                                            </a>
                                        </div>
                                        <div>
                                            <form action="{{ route('admin.Delete', ['id' => $buah->id]) }}" method="post" onsubmit="return confirm('Are You Sure Wanna Delete It?')">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="inline-block bg-red-500 hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 rounded-md py-2 px-4 ml-2 transition duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill inline-block mr-1" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                    </svg> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($message = Session::get('success'))
        <script>
            Swal.fire($message);
        </script>
    @endif
@endsection
