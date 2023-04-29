<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AutController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' =>[
                'required',
                function($attribute, $value, $fail) use ($request) {
                    $email = $request->input('email');
                    $exist = User::select()->where('email', $email)->exists();
                    if (!$exist) {
                        $fail('Invalid email.');
                    }
                }
            ],
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email',
            ]);
        }

        //check eemail
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        //check password
        if (!($request->input('password')== $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid password.'
            ]);
        }

        // login successful, return response
        $accessToken = $user->createToken($user->email,["*"],Carbon::now()->addHours(24))->accessToken;
        return response()->json([
            'success' => true,
            'user' => ['id' => $user->id,'email' => $user->email,'nom'=>$user->nom,'prenom'=>$user->prenom],
            'access_token' => $accessToken,
            'token'=>$accessToken->token
        ]);

    }

    //logout
    public function logout(Request $request)
    {
        $getToken= DB::table('personal_access_tokens')->where('token',$request->token)->first();
        if (!$getToken) {
            return response()->json([
                'success' => false,
                'message' => 'Error in Log Out'
            ]);
        }
        DB::table('personal_access_tokens')->where('id',$getToken->id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully',
        ]);
    }

}
