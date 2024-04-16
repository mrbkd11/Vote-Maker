<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Http\Request;
 
class UserController extends Controller
{
    /**
     * Show all application users.
     */
    public function index()
    {
       
        return User::paginate(5);
        
    }
    public function show($id)
    {
       
        return User::find($id);
        
    }
    public function store(Request $request)
    {
      $fields = $request ->validate([
        'name' => 'required|string',
        'email' => 'required|string|unique:users,email',
        'password' => 'required|string'    
       ]);
       $user = User::create([
        'name' => $fields['name'],
        'email' => $fields['email'],
        'password' => bcrypt($fields['password']),
    ]);
    $response = [
        'user' => $user,];

        return response($response,201);
        
    }
    
    public function update(Request $request ,$id)
    {
       
        $user = User::find($id);
        $request ->validate([
        
        'email' => 'unique:users,email',
         
       ]);
        $user ->update($request->all());
        $response = [
        'user' => $user,];
        return response($response,201); 
        
    }
    
    public function destroy($id)
    {
       
        User::destroy($id);
        $response = [
        'message' => 'successful deletion',];
        return response($response,201);
        
    }
}