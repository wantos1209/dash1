<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index() 
    {
        $url = 'https://www.m3y0kl1n3.com/api/beritas';
        $data = file_get_contents($url);
        $data = json_decode($data, true);   
        $data = $data['data'][0];
        
        return view('berita.index',[
            'menu' => 'berita',
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {   
        $id = $request['id'];
        $link = $request['link'];
       
        $url = 'https://www.m3y0kl1n3.com/api/beritas/' . $id;
        $data = [
                    'link' => $link
                ];                                                                    
        $data_string = json_encode($data);  
        // dd($data_string);                                                                                 
        $ch = curl_init($url);                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_string))                                                                       
        );                                                                                                                   
        
        $result = curl_exec($ch);
        // dd($result);
        // Cek apakah ada error saat melakukan request
        if(curl_error($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        
        curl_close($ch);
        return redirect()->action([BeritaController::class, 'index'])->withSuccess('Success, Data berhasil diubah!');
    }
   
}
