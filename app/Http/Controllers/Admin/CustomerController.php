<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = customer::all();
        return view('modul_admin.customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modul_admin.customer.disable-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addplg = New customer();
        $addplg->nama = $request->nama;
        $addplg->email_customer = $request->email_customer;
        $addplg->alamat = $request->alamat;
        $addplg->kelamin = $request->kelamin;
        $addplg->no_telp = $request->no_telp;
        $addplg->save();

        Session::flash('success','Customer Berhasil Ditambah!');
        return redirect('customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = customer::with('transaksi')->where('id',$id)->first();
        return view('modul_admin.customer.infoCustomer', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = customer::where('id',$id)->first();
        return view('modul_admin.customer.editCustomer', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $addplg = customer::where('id',$id)->first();
        $addplg->nama = $request->nama;
        $addplg->email_customer = $request->email_customer;
        $addplg->alamat = $request->alamat;
        $addplg->kelamin = $request->kelamin;
        $addplg->no_telp = $request->no_telp;
        $addplg->save();

        Session::flash('success','Update Customer Berhasil');
        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = customer::find($id);
        $delete->delete();

        Session::flash('success','Hapus Customer Berhasil');
        return redirect('customer');
    }
}
