@extends('Layout/Main')

@section('content')
<div class="flex justify-center items-center py-12">
    <div class="grid grid-cols-1">
        <h1 class="mb-6 text-3xl font-bold mx-32">Add Supplier</h1>
        <div class="flex flex-col bg-white border border-gray-200 rounded-xl p-4 md:p-5 shadow-xl">
            <form action="{{ route('admin.Store-Order') }}" method="post">
                @csrf
                <div class="max-w-lg space-y-5 mt-2 ">
                    <div class="mb-2">
                        <label for="Customer" class="font-medium">Customer Name</label>
                        <input type="text" name="Customer" id="Customer"
                            class="py-3 px-8 w-full border rounded-lg text-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    </div>
                    <div class="mb-2">
                        <label for="Address" class="font-medium">Address</label>
                        <input type="text" name="Address" id="Address"
                            class="py-3 px-8 w-full border rounded-lg text-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    </div>
                    <div class="mb-2">
                        <label for="Phone" class="font-medium">Phone Number</label>
                        <input type="tel" name="Phone" id="Phone"
                            class="py-3 px-8 w-full border rounded-lg text-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    </div>
                    <div>
                        <label for="Email" class="font-medium">Email</label>
                        <input type="email" name="Email" id="Email"
                            class="py-3 px-8 w-full border rounded-lg text-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    </div>
                    <div>
                        <label for="Buah" class="font-medium">ID Buah</label>
                        <select name="Buah" id="Buah" class="py-3 px-8 w-full border rounded-lg text-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                            @foreach ($buahs as $buah)
                                <option value="{{ $buah->id }}">{{ $buah->id }} - {{ $buah->Nama_Buah }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="Total" class="font-medium">Total</label>
                        <input type="text" name="Total" id="Total"
                            class="py-3 px-8 w-full border rounded-lg text-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                        <p class="text-sm font-thin text-gray-400">kilo gram</p>
                    </div>
                </div>
                <div class="flex justify-center items-center mt-4 mb-2">
                    <button type="submit" class="bg-orange-600 hover:bg-orange-700 py-2 px-6 rounded-md shadow-lg">
                        Make Order
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
