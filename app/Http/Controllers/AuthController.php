<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // validate the request
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:200|min:5',
            'lastName' => 'required|string|max:200|min:5',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|max:200|confirmed',
        ]);

        if ($validator->fails()) {

            return response(['errors' => $validator->errors()], 422);
        }

        $user = new User();
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);


        // save the user to users table in database
        $user->save();
        // create token for that user
        return $this->getRepsonse($user);
    }

    public function login(Request $request)
    {
        // validate the request

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password'  => 'required'
        ]);

        // validator fails

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        // user credentials

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // if the attempt is true the user is successfuly logged in
        if (Auth::attempt($credentials)) {

            // accessing the logged in user object
            $user = $request->user();
            // create token for that user
            return $this->getRepsonse($user);
        } else {
            return response([
                'errors' => 'there is errors'
            ], 422);
        }
    }

    public function authFailed()
    {

        return response("sorry you are not allowed here", 422);
    }

    public function logout(Request $request)
    {

        $request->user()->token()->revoke();

        return response('successfuly logout', 200);
    }

    public function user(Request $request)
    {

        // return the authanticated user

        return $request->user();
    }

    // get the reponse

    private function getRepsonse(User $user)
    {

        // create token for that user
        $tokenResult = $user->createToken('personal access token');
        // create token
        $token = $tokenResult->token;

        // make the token expires after one week
        $token->expires_at = Carbon::now()->addWeek(1);

        // save the token to users table
        $token->save();

        return response([
            "accessToken" => $tokenResult->accessToken,
            "tokenType" => "Bearer",
            "expiresAt" => Carbon::parse($token->expires_at)->toDateTimeString()
        ], 200);
    }
}
