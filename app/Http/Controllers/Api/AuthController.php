<?php
   
namespace App\Http\Controllers\Api;
   
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
   
class AuthController extends BaseController
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $authUser = Auth::user(); 
            $result['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken; 
            $result['name'] =  $authUser->name;
   
            return $this->sendResponse($result, 'User signed in');
        } 
        else { 
            return $this->sendError('Unauthorised.', ['error'=>'incorrect Email/Password']);
        } 
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
   
        if ($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());       
        }
   
        try {
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $result['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
            $result['name'] =  $user->name;
       
            return $this->sendResponse($result, 'User created successfully.');
        } catch (\Exception $e) {
            return $this->sendError('Registration Error' , $e->getMessage());
        }
    }
    public function logout(Request $request)
    {
        
        // Get user who requested the logout
        $user = request()->user(); //or Auth::user()
        // Revoke current user token
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        $success['name'] =  $user->name;
        // return response()->json(['message' => 'User successfully signed out']);
        return $this->sendResponse($success, 'User successfully signed out.');
    }
   
}