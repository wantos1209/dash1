<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bo;
use Illuminate\Support\Facades\Hash;

class BoController extends Controller
{
    public function index() 
    {
        // dd(getDataBo());
        return view('bo.index',[
            'menu' => 'bo',
            'data' => Bo::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }
    
    public function form($id='') 
    { 
        if($id == 'new'){
            $jenis = 1;
            $data = "";
        } else {
            $jenis = 2; 
            $data = Bo::where('id',$id)->first();
            
        }
        
        return view('bo.form',[
            'menu' => 'bo',
            'jenis' => $jenis,
            'data' => $data
        ]);
    }

    public function create(Request $request) 
    {
        $id = $request->id;
        if($id != ''){
            return $this->update($request);
        }

        $request->validate([
            'link' => 'required',
        ]);
           
        $data = $request->all();

        Bo::create([
            'nama' => $data['nama'],
            'link' => $data['link']
        ]);

        return redirect("bo")->withSuccess('Data berhasil disimpan!');
    }

    public function delete($id)
    {
        Bo::where('id',$id)->delete();
        return redirect("bo")->withSuccess('Data berhasil dihapus!');
    }

    public function update($request) 
    {
        $id = $request->id;
        $rules = [
            'link' => 'required',
        ];
        
        $data = Bo::where('id', $id)->first();
        
        if($data['nama']  !== $request->nama){
            $rules['nama'] = 'required|unique:bos';
            // $rules['nama'] = 'required';
        }

        $validateData = $request->validate($rules);
        Bo::where('id', $id)->update($validateData);

        return redirect("bo")->withSuccess('Data berhasil diubah!');
    }
}
