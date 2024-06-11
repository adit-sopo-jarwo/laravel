<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function Supplier(Request $request)
    {
        $supplier = new Supplier;

        if ($request->get('search')) {
            $supplier = $supplier->where('Nama_Supplier', 'LIKE', '%' . $request->get('search') . '%');
        }

        $supplier = $supplier->get();
        return view('Supplier.index', compact('supplier', 'request'));
    }

    public function Create_Supplier()
    {
        return view('Supplier.Create');
    }

    public function Store_Supplier(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Supplier' => 'required',
            'Address' => 'required',
            'Phone' => 'required',
            'Email' => 'required|email',
        ]);

        if ($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator);

        $data = [
            'Nama_Supplier' => $request->input('Supplier'),
            'Alamat' => $request->input('Address'),
            'Telepon' => $request->input('Phone'),
            'Email' => $request->input('Email'),
        ];

        Supplier::create($data);

        return redirect()->route('Supplier')->with('success', 'Supplier Addedd Successfully');
    }

    public function Edit_Supplier($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('Supplier.Edit', compact('supplier'));
    }

    public function Update_Supplier(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Supplier' => 'required',
            'Address' => 'required',
            'Phone' => 'required|tel',
            'Email' => 'required|email',
        ]);

        if ($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator);

        $find = Supplier::find($id);

        $data['Nama_Supplier'] = $request->input('Supplier');
        $data['Alamat'] = $request->input('Address');
        $data['Telepon'] = $request->input('Phone');
        $data['Email'] = $request->input('Email');

        $find->update($data);
        return redirect()->route('Supplier')->with('success', 'Supplier Update Successfully');
    }

    public function Delete_Supplier($id)
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        return redirect()->route('Supplier')->with('success', 'Supplier Deleted Successfully');
    }
}
