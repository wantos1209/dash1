<?php 
    use App\Models\Bo;

    function getDataBo()
    {
        return Bo::all();
    }

    function getDataBo2()
    {
        $session_id = session('id_bo');
        $bonama = '';
        if($session_id != ''){
            $bo = Bo::where('id', $session_id)->first();
            $bonama = $bo->nama;
        } else {
            $bonama = 'arwana';
        }
        return $bonama;
    }
    

    function backToDashboard()
    {
        return redirect()->route('dashboard');
    }

    function getDataBo3() 
    {
        return Bo::orderBy('id', 'ASC')->first();
    }

    