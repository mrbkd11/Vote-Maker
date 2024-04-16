<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Auth;
use App\Notifications\VerifyApiEmail;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;
use App\Http\Controllers\VerificationApiController;
class AuthController extends Controller 
{
    use VerifiesEmails;
public function register(Request $request){
    $fields = $request ->validate([
        'name' => 'required|string',
        'email' => 'required|string|unique:users,email',
        'password' => 'required|string|confirmed'
    ]);

    $user = User::create([
        'name' => $fields['name'],
        'email' => $fields['email'],
        'password' => bcrypt($fields['password']),
    ]);

    
    $token = $user->createToken('myapptoken')->plainTextToken;
     $response = [
        'user' => $user,
        'token' => $token,
     ];
     $user->sendApiEmailVerificationNotification();
     return response($response,201);
}
public function logout(Request $request){
    auth() ->user()->tokens()->delete();
    return [
        'message' => 'looged out'
    ];
}
public function login (Request $request){
    $fields = $request ->validate([
        
        'email' => 'required|string',
        'password' => 'required|string'
    ]);

    $user = User::where('email', $fields['email'])->first();

if(!$user || !Hash::check($fields['password'], $user->password)){
    return response(
        ['message'=> $user],401
    );
}

    $token = $user->createToken('myapptoken')->plainTextToken;
     $response = [
        'user' => $user,
        'token' => $token,
     ];
     return response($response,201);
}
public function register_admin(Request $request){
    $fields = $request ->validate([
        'name' => 'required|string',
        'email' => 'required|string|unique:users,email',
        'password' => 'required|string|confirmed'
    ]);

    $user = Admin::create([
        'name' => $fields['name'],
        'email' => $fields['email'],
        'password' => bcrypt($fields['password']),
    ]);

    $token = $user->createToken('myapptoken')->plainTextToken;
     $response = [
        'user' => $user,
        'token' => $token,
     ];
    
     return response($response,201);
}

public function login_admin (Request $request){
    $fields = $request ->validate([
        
        'email' => 'required|string',
        'password' => 'required|string'
    ]);

    $user = Admin::where('email', $fields['email'])->first();

if(!$user || !Hash::check($fields['password'], $user->password)){
    return response(
        ['message'=> $user],401
    );
}

    $token = $user->createToken('myapptoken')->plainTextToken;
     $response = [
        'admin' => $user,
        'token' => $token,
     ];
     return response($response,201);
}
public function logout_admin(Request $request){
    auth() ->user()->tokens()->delete();
    return [
        'message' => 'looged out'
    ];
}
public function getUserProfile($id)
{
  $authUserId = auth()->user()->id;
  if ($id != $authUserId) {
    return response()->json(['error' => 'Access denied'], 403);
  }

  $user = User::findOrFail($id);
  $data = [
    'id' => $user->id,
    'name' => $user->name,
    'email' => $user->email,
    'email_verified_at' => $user->email_verified_at,
    'created_at' => $user->created_at,
    'updated_at' => $user->updated_at
  ];
  
  // create the response with the user data
  $response = response($data);

  // add the header with the name of the user
  $response->header('X-User-Name', $user->name);

  return $response;
}}