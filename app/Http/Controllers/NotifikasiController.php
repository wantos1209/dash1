<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index() 
    {
        $namabo = getDataBo2();
        $namabo = strtolower($namabo);
        $url = 'https://www.m3y0kl1n3.com/api/' . $namabo . 'notifications';
        $data = file_get_contents($url);
        $data = json_decode($data, true);   
        $data = $data['data'][0];
        
        return view('notifikasi.index',[
            'menu' => 'notifikasi',
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {   
        $id = $request['id'];
        $title = $request['title'];
        $content = $request['content'];

        $namabo = getDataBo2();
        $namabo = strtolower($namabo);
        $url = 'https://www.m3y0kl1n3.com/api/' . $namabo . 'notifications/' . $id;
        $data = [
                    'title' => $title,
                    'content' => $content
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
        return redirect()->action([NotifikasiController::class, 'index'])->withSuccess('Success, Data berhasil diubah!');
    }
   
}
