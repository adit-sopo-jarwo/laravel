@extends('Layout/Main')

@section('content')
    <div class="flex justify-center items-center py-12">
        <div class="grid grid-cols-1">
            <h1 class="mb-6 text-3xl font-bold mx-32">Edit Supplier</h1>
            <div class="flex flex-col bg-white border border-gray-200 rounded-xl p-4 md:p-5 shadow-xl">
                <form action="{{route('admin.Update', $buah->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="max-w-lg space-y-5 mt-2 ">
                        <div class="mb-2">
                            <label for="Fruit" class="font-medium">Fruit Name</label>
                            <input type="text" name="Fruit" id="Fruit"
                                class="py-3 px-8 w-full border rounded-lg text-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                value="{{$buah->Nama_Buah}}">
                        </div>
                        <div class="mb-2">
                            <label for="Price" class="font-medium">Price per Kg</label>
                            <input type="text" name="Price" id="Price"
                                class="py-3 px-8 w-full border rounded-lg text-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                value="{{$buah->Harga_kg}}">
                        </div>
                        <div class="mb-2">
                            <label for="Stock" class="font-medium">Stock</label>
                            <input type="number" name="Stock" id="Stock"
                                class="py-3 px-8 w-full border rounded-lg text-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                value="{{$buah->Stok_Buah}}">
                        </div>
                        <div>
                            <label for="Supplier" class="font-medium">ID Supplier</label>
                            <input type="text" name="ID_Supplier" id="ID_Supplier"
                                class="py-3 px-8 w-full border rounded-lg text-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                value="{{$buah->ID_Supplier}}">
                        </div>
                    </div>
                    <div class="flex justify-center items-center mt-4 mb-2">
                        <button class="bg-yellow-400 hover:bg-yellow-500 py-2 px-6 rounded-md shadow-lg">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
