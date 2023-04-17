<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    
    public function index() 
    {
        $namabo = getDataBo2();
        $namabo = strtolower($namabo);
        $url = 'https://www.m3y0kl1n3.com/api/'. $namabo .'settings';
        $data = file_get_contents($url);
        $data = json_decode($data, true);   
        $data = $data['data'][0];
        
        return view('setting.index',[
            'menu' => 'setting',
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {   
        $id = $request['id'];
        $home = $request['home'];
        $syair = $request['syair'];
        $hadiah = $request['hadiah'];
        $jadwal = $request['jadwal'];
        $promo = $request['promo'];
        $content = $request['content'];
        $rtp = $request['rtp'];
        
        $namabo = getDataBo2();
        $namabo = strtolower($namabo);
        $url = 'https://www.m3y0kl1n3.com/api/'. $namabo .'settings/' . $id;
        $data = [
                    'home' => $home,
                    'syair' => $syair,
                    'hadiah' => $hadiah,
                    'jadwal' => $jadwal,
                    'promo' => $promo,
                    'content' => $content,
                    'rtp' => $rtp,
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
        return redirect()->action([SettingController::class, 'index'])->withSuccess('Success, Data berhasil diubah!');
    }
   
}
