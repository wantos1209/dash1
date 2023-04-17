<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() 
    {
        return view('user.index',[
            'menu' => 'user',
            'data' => User::latest()->filter(request(['search']))->paginate(10)->withQueryString()

            // 'data' => $data
        ]);
    }
    
    public function form($id='') 
    { 
        if($id == 'new'){
            $jenis = 1;
            $data = "";
        } else {
            $jenis = 2; 
            $data = User::where('id',$id)->first();
            
        }
        
        return view('user.form',[
            'menu' => 'user',
            'jenis' => $jenis,
            'data' => $data
        ]);
    }

    public function create(Request $request) 
    {
        $id = $request->id;

        if($id != ''){

            $request->validate([
                'username' => 'required',
                'password' => 'required',
                'status' => 'required'
            ]);
            $this->update($request);
            return redirect("user")->withSuccess('Data berhasil disimpan!');
        }


        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:5',
        ]);
           
        $data = $request->all();

        User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'status' => $data['status']
        ]);

        return redirect("user")->withSuccess('Data berhasil disimpan!');
    }

    public function delete($id)
    {
        User::where('id',$id)->delete();
        return redirect("user")->withSuccess('Data berhasil dihapus!');
    }

    public function update($request) 
    {
        
        $id = $request->id;
        $rules = [
            'password' => 'required|min:5',
        ];
        
        $data = User::where('id', $id)->first();
        
        if($data['username']  != $request->username){
            $rules['username'] = 'required|unique:users';
        }

        $validateData = $request->validate($rules);
        User::where('id', $id)->update($validateData);

        return redirect("user")->withSuccess('Data berhasil diubah!');
    }
}
