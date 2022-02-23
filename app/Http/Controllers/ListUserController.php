<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Auth;
use Session;
use Validate;

class ListUserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('admin');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min: 5', 'max:100'],
            'lastname' => ['required', 'string', 'min: 5', 'max:100'],
            'cc_number' => ['required|numeric', 'string', 'max:10', 'unique:users'],
            'country' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:180'],
            'cellphone' => ['required|numeric', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:150', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id_categories' => ['required', 'string', 'max:20'],
        ]);
    }
    //
    /*public function countCountries(){
        $count = User::select(DB::raw('country, count(*) as users_count'))
                    ->groupBy('country')
                    ->orderBy('users_count', 'desc')
                    ->get();
    }
    */

        // Create Contact Form
        public function edit($id) {
            $user_obj = User::findOrFail($id);
            return view('update_user', $user_obj);
            //return $user_obj;
          }
      
          // Store Contact Form data
        public function update(Request $request, $id) {
            
              // Form validation
              $this->validate($request, [
                    'name' => ['required', 'string', 'min: 5', 'max:100'],
                    'lastname' => ['required', 'string', 'min: 5', 'max:100'],
                    'cc_number' => ['required|numeric', 'string', 'max:10', 'unique:users'],
                    'country' => ['required', 'string', 'max:50'],
                    'address' => ['required', 'string', 'max:180'],
                    'cellphone' => ['required|numeric', 'string', 'max:10'],
                    'email' => ['required', 'string', 'email', 'max:150', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'id_categories' => ['required', 'string', 'max:20'],
               ]);

              //  Store data in database
                    $id = $request->get('id');
                    User::where('id', $id)
                    ->update([
                              'name' => $request->name,
                              'lastname' => $request->lastname,
                              'cc_number' => $request->cc_number,
                              'country' => $request->country,
                              'address' => $request->address,
                              'cellphone' => $request->cellphone,
                              'email' => $request->email,
                              'password' => $request->password,
                              'id_categories' => $request->id_categories,
                    ]);
                    //print_r($req->input());
                    return redirect('/users')/*->with('updated', 'Usuario actualizado')*/;
            }        

    public function deleteUser($id){
        $user = User::find($id);
            $user->delete();
        return redirect('/users')/*->with('deleted', 'Usuario eliminado')*/;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request){
        
        $search = trim($request->get('search'));

        if($search){
            $usrs = User::where('id_categories', '=', $search)
                    ->orderBy('id')
                    ->paginate(10);
        }else{
            $usrs = User::orderBy('id')->paginate(10);
        }   
        return view('list_user', compact('usrs'));
    }
}
