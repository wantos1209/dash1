<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        //   $path = url()->current();
        //   $path = basename($path);  
        if($request->jenisdashboard != ''  && $request->jenisdashboard !=  session('jenisdashboard')){
        Session::put('jenisdashboard', $request->jenisdashboard);
        } else if (session('jenisdashboard') == '' || session('jenisdashboard') == null) {
        Session::put('jenisdashboard', 'APP');
        } 

        if(session('jenisdashboard') != ''){
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);
            
            $credentials = $request->only('username', 'password');
           
            if (Auth::attempt($credentials)) {
                Session::put('id_bo', getDataBo3()->id);
                return redirect()->intended('dashboard')
                            ->withSuccess('You have Successfully loggedin');
            }
        }
        return redirect("login")->withSuccess('Invalid username or password!');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
             $return = view('dashboard',['menu' => 'dashboard']);
        } else {
            $return = redirect("login")->withSuccess('Opps! You do not have access');
        }
        return $return;
    }
  
       
    
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'username' => $data['username'],
        'password' => Hash::make($data['password'])
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();

        //Hapus session Bo
        Session::forget('id_bo');

        return redirect("login");
    }

    public function change_password()
    {
        return view('auth.change_password',[
            'menu' => 'Dashboard'
        ]);
    }

    public function update_change_password(Request $request)
    {  
        
        $user = Auth::user();
        $id = auth()->user()->id;

        $current_password = $request->current_password;
        $new_password = $request->password;
        $confirm_password = $request->password_confirmation;
       
        if (!Hash::check($current_password, $user->password)) {
            return redirect()->back()->with('fail', 'Password yang anda masukkan salah');
        }
        
        if ($new_password != $confirm_password) {
            return redirect()->back()->with('fail', 'Password baru dan konfirmasi password yang anda masukkan tidak sama');
        }
    
        $new_password = Hash::make($new_password);
        User::where('id', $id)->update([
                                'password' => $new_password
                            ]);
    
        return redirect()->back()->with('success', 'Password berhasil diubah.');
    }
}
