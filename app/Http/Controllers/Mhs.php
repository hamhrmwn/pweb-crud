<?php

namespace App\Http\Controllers;

use App\Models\Modelmhs;
use Illuminate\Http\Request;

class Mhs extends Controller{
    public function index(){
        $data=[
            'dataMhs' => Modelmhs::all()
        ];
        return View('mahasiswa.data', $data);
    }

    public function add(){
        return View('mahasiswa.formtambah');
    }
    
    public function save(Request $r){
        $nim = $r->nim;
        $nama = $r->nama;
        $telp = $r->telp;
        $alamat = $r->alamat;

        try{
            $mhs = new Modelmhs;
            $mhs->mhsnim = $nim;
            $mhs->mhsnama = $nama;
            $mhs->mhstelp = $telp;
            $mhs->mhsalamat = $alamat;
            $mhs->save();

            $r->session()->flash('msg', 'Data Berhasil Tersimpan!');
            return redirect('/mhs/tambah');
            // echo 'Data Sukses Tersimpan';
        } catch (Throwable $e){
            echo $e;
        }
    }

    public function edit($nim){
        $mhs = Modelmhs::find($nim);
        $data = [
            'nim' => $nim,
            'nama' => $mhs->mhsnama,
            'telp' => $mhs->mhstelp,
            'alamat' => $mhs->mhsalamat
        ];

        return View('mahasiswa.edit', $data);
    }

    public function update(Request $r){
        $nim = $r->nim;
        $nama = $r->nama;
        $telp = $r->telp;
        $alamat = $r->alamat;

        try{
            $mhs = Modelmhs::find($nim);
            $mhs->mhsnama = $nama;
            $mhs->mhstelp = $telp;
            $mhs->mhsalamat = $alamat;
            $mhs->save();

            $r->session()->flash('msg', 'Data Berhasil Diupdate!');
            return redirect('/mhs/index');
        } catch (Throwable $e){
            echo $e;
        }
    }

    public function hapus($nim){
        Modelmhs::find($nim)->delete();
        return redirect()->back();
    }
}
