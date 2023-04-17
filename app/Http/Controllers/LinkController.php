<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class LinkController extends Controller
{
    public function index() 
    {
        
        $data = $this->getData();
        $search = request('search');
       
        if($search  != ''){
            $results = [];
            foreach ($data as $d) {
                if (strpos($d['link'], $search) !== false) {
                    $results[] = $d;
                }
            }
            $data =  $results;
        }
        
        $perPage = 10;
        $page =  request()->get('page', 1);
        $slicedData = array_slice($data, ($page - 1) * $perPage, $perPage);
        $paginator = new LengthAwarePaginator(
            $slicedData, 
            count($data), 
            $perPage, 
            $page, 
            ['path' => url()->current()]
        );
        
        return view('link.index',[
            'menu' => 'link',
            'data' => $paginator
        ]);
    }

    public function form($id='') 
    { 
        if($id == 'new'){
            $jenis = 1;
            $data = "";
        } else {
            $jenis = 2; 
            $data = $this->getData($id);
        }
        
        return view('link.form',[
            'menu' => 'link',
            'jenis' => $jenis,
            'data' => $data
        ]);
    }
    public function create(Request $request) 
    {
        $request->validate([
            'link' => 'required',
        ]);
           
        $data = $request->all();
        
        $link = $data['link'];
        $id = '';
        if(isset($data['id'])){
            $id = $data['id'];
            $methode  = "PUT";
        } else {
            $methode  = "POST";
        }
        
        $this->action($id, $link, $methode);
        return redirect("link")->withSuccess('Data berhasil disimpan!');
    }

    public function delete($id)
    {
        $data = $this->getData($id);
        $id = $data['id'];
        $link = $data['link'];
        $methode = "DELETE";

        $this->action($id, $link, $methode);
        return redirect("link")->withSuccess('Data berhasil dihapus!');
    }

    public function getData($id = '')
    {
        $url = $this->getUrl();
        $data = file_get_contents($url);
        $data = json_decode($data, true);   
        $data = $data['data'];
        
        if($id != ''){
            foreach ($data as $index => $d) {
                if ($d['id'] == $id) {
                    $data = $data[$index];
                }
            }
        }
        return $data;
    }

    public function getUrl($id = ''){
        $namabo = getDataBo2();
        $namabo = strtolower($namabo);
        if($id != ''){
            $url = "https://www.m3y0kl1n3.com/api/" . $namabo . "linkalts/".$id;
        } else {
            $url = "https://www.m3y0kl1n3.com/api/" . $namabo . "linkalts";
        }
        // dd($url);
       
        return $url;
    }

    public function action($id, $link, $methode)
    {
        $url = $this->getUrl($id);
        
        $data = [
                    'link' => $link,
                ];                                                                    
        $data_string = json_encode($data);  
       
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $methode);                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_string))                                                                       
        );                                                                                                                   
        
        $result = curl_exec($ch);
        
        // Cek apakah ada error saat melakukan request
        if(curl_error($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        
        curl_close($ch);
    }

}
