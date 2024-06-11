<?php

namespace App\Http\Controllers;

use App\Models\Buah;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BuahController extends Controller
{
    public function index(Request $request)
    {
        $buah = new Buah;
        $suppliers = Supplier::all();

        if ($request->get('search')) {
            $buah = $buah->where('Nama_Buah', 'LIKE', '%' . $request->get('search') . '%');
        }

        $buah = $buah->get();
        return view('Buah.index', compact('buah', 'suppliers', 'request'));
    }

    public function create()
    {
        $suppliers = Supplier::all(); 
        return view('Buah.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Fruit' => 'required',
            'Price' => 'required',
            'Stock' => 'required',
            'Supplier' => 'required', 
        ]);

        if ($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator);

        $data = [
            'Nama_Buah' => $request->input('Fruit'),
            'Harga_kg' => $request->input('Price'),
            'Stok_Buah' => $request->input('Stock'),
            'ID_Supplier' => $request->input('Supplier'), 
        ];

        Buah::create($data);

        return redirect()->route('index')->with('success', 'Fruit Added Successfully');
    }

    public function edit($id)
    {
        $buah = Buah::findOrFail($id);
        $suppliers = Supplier::all(); 
        return view('Buah.edit', compact('buah', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Fruit' => 'required',
            'Price' => 'required',
            'Stock' => 'required',
            'Supplier' => 'required',
        ]);

        if ($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator);

        $find = Buah::find($id);

        $data['Nama_Buah'] = $request->input('Fruit');
        $data['Harga_kg'] = $request->input('Price');
        $data['Stok_Buah'] = $request->input('Stock');
        $data['ID_Supplier'] = $request->input('Supplier');

        $find->update($data);
        return redirect()->route('Buah.index')->with('success', 'Fruit Updated Successfully');
    }

    public function delete($id)
    {
        $buah = Buah::findOrFail($id);

        $buah->delete();

        return redirect()->route('Buah.index')->with('success', 'Fruit Deleted Successfully');
    }
}
