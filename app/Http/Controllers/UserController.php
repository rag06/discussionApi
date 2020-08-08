<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function showAllUsers()
    {
        return response()->json(Users::all());
    }

    public function showOneUser($id)
    {
        return response()->json(Users::where('USER_ID', $id)->get());
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'USER_EMAIL' => 'required|email|unique:users',
            'USER_FIRST_NAME' => 'required',
            'USER_PASSWORD' => 'required',
        ]);

        $data = $request->all();
        $data['USER_ID'] = $this->uuid();
        $data['USER_STATUS'] = 1;
        $data['USER_PASSWORD'] = Hash::make($data['USER_PASSWORD']);
        $user = Users::create($data);

        return response()->json($user, 201);
    }

    public function update($id, Request $request)
    {

        $data = $request->all();
        $channel = Users::findOrFail($id);

        $author->update($data);

        return response()->json($channel, 200);
    }

    public function delete($id)
    {
        Users::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }

    private function uuid()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
    }

}