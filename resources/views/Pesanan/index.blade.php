@extends('Layout/Main')
@section('content')
    <div class="flex flex-col">
        <div class="p-1.5 px-4 min-w-full inline-block align-middle">
            <div class="flex flex-col md:flex-row justify-between mb-6 mx-8">
                <a href="{{ route('admin.Create-Order') }}"
                    class="bg-orange-600 hover:bg-orange-700 shadow-md py-2 px-8 rounded-md mb-4 md:mb-0 text-center">Make Order</a>
                <div class="relative w-full md:w-auto" >
                    <form action="{{ route('admin.Order') }}" method="get">
                        <input
                            class="py-2 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-100 dark:border-neutral-700 dark:text-black dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            type="text" placeholder="Search Suppliers" value="{{ $request->get('search') }}"
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
                            <th scope="col" class="px-6 py-3 font-medium text-center text-gray-500 uppercase">Customer
                                Name</th>
                            <th scope="col" class="px-6 py-3 font-medium text-center text-gray-500 uppercase">Address
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium text-center text-gray-500 uppercase">Phone
                                Number</th>
                            <th scope="col" class="px-6 py-3 font-medium text-center text-gray-500 uppercase">Email</th>
                            <th scope="col" class="px-6 py-3 font-medium text-center text-gray-500 uppercase">Buah
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium text-center text-gray-500 uppercase">Total</th>
                            <th scope="col" class="px-6 py-3 font-medium text-center text-gray-500 uppercase">Total Price
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium text-center text-gray-500 uppercase">Order
                                Status</th>
                            <th scope="col" class="px-6 py-3 font-medium text-center text-gray-500 uppercase">Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="min-w-full divide-y divide-gray-200 pr-12">
                        @foreach ($pesanan as $order)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800">{{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center font-medium text-gray-800">
                                    {{ $order->Nama_Pelanggan }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800">{{ $order->Alamat }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800">{{ $order->Telepon }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800">{{ $order->Email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800">
                                    {{ $buahs->firstWhere('id', $order->ID_Buah)->Nama_Buah ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800">{{ $order->Jumlah }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800">{{ $order->Total }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800">
                                    {{ $order->Status_Pesanan }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center font-medium text-gray-800">
                                        <form id="status-form-{{ $order->id }}"
                                            action="{{ route('admin.Update-Status', $order->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="flex items-center gap-2">
                                                <button type="submit" name="status" value="Complete"
                                                    class="bg-blue-500 text-white px-3 py-1 hover:bg-blue-700 rounded-sm"
                                                    id="complete-{{ $order->id }}" {{ $order->Status_Pesanan !== 'Proccess' ? 'disabled' : '' }}>
                                                    Complete
                                                </button>
                                                <button type="submit" name="status" value="Cancel"
                                                    class="bg-red-500 text-white px-3 py-1 hover:bg-red-700 rounded-sm"
                                                    id="cancel-{{ $order->id }}" {{ $order->Status_Pesanan !== 'Proccess' ? 'disabled' : '' }}>
                                                    Cancel
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.status').forEach(function(statusElement) {
                const status = statusElement.dataset.status;
                if (status !== 'Proccess') {
                    const row = statusElement.closest('tr');
                    row.querySelectorAll('.update-button').forEach(function(button) {
                        button.disabled = true;
                        button.classList.add('opacity-50', 'cursor-not-allowed');
                    });
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($message = Session::get('success'))
        <script>
            Swal.fire("Status Changed Successfully!");
        </script>
    @endif
@endsection
