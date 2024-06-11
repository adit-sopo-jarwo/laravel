<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Buah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PesananController extends Controller
{
    public function Order(Request $request)
    {
        $pesanan = new Pesanan;
        $buahs = Buah::all();

        if ($request->get('search')) {
            $pesanan = $pesanan->where('Nama_Pelanggan', 'LIKE', '%' . $request->get('search') . '%');
        }

        $pesanan = $pesanan->get();
        return view('Pesanan.index', compact('pesanan', 'buahs', 'request'));
    }

    public function Create_Order()
    {
        $buahs = Buah::all();
        return view('Pesanan.create', compact('buahs'));
    }

    public function Store_Order(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Customer' => 'required',
            'Address' => 'required',
            'Phone' => 'required',
            'Email' => 'required|email',
            'Buah' => 'required',
            'Total' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $hargaBuah = $this->getHargaBuah($request->input('Buah'));

        $data = [
            'Nama_Pelanggan' => $request->input('Customer'),
            'Alamat' => $request->input('Address'),
            'Telepon' => $request->input('Phone'),
            'Email' => $request->input('Email'),
            'ID_Buah' => $request->input('Buah'),
            'Jumlah' => $request->input('Total'),
            'Total' => $request->input('Total') * $hargaBuah,
        ];

        Pesanan::create($data);

        return redirect()->route('Order')->with('success', 'Order Added Successfully');
    }

    public function Update_Status(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:Complete,Cancel',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    
        $order = Pesanan::findOrFail($id);
    
        if ($request->status === 'Cancel') {
            $this->returnStock($order);
        }
    
        // Update the status
        $order->Status_Pesanan = $request->status;
        $order->save();
    
        return redirect()->back()->with('success');
    }
    
    private function returnStock($order)
    {
        $ID_Buah = $order->ID_Buah;
        $Total = $order->Jumlah;
    
        $buahEntry = Buah::where('id', $ID_Buah)->first();
    
        if ($buahEntry) {
            $buahEntry->Stok_Buah += $Total;
            $buahEntry->save();
        }
    }
    
    private function getHargaBuah($buahId)
    {
        $buah = Buah::find($buahId);
        return $buah ? $buah->Harga_kg : 0;
    }
}
