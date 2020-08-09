<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * @SWG\Get(
     *     path="/api/v1/users",
     *     operationId="/api/v1/users",
     *     tags={"search all users"},
     *     @SWG\Response(
     *         response="200",
     *         description="Returns all users "
     *     ),
     * )
     */

    public function showAllUsers()
    {
        $res = array(
            "status" => 200,
            'success' => true,
            "result" => Users::all()
        );
        return response()->json($res);
    }


    /**
     * @SWG\Get(
     *     path="/api/v1/users/{userId}",
     *     operationId="/api/v1/users/{userId}",
     *     tags={"search one users"},
     *     @SWG\Response(
     *         response="200",
     *         description="Returns specific users "
     *     ),
     * )
     */

    public function showOneUser($id)
    {
        $res = array(
            "status" => 200,
            'success' => true,
            "result" => Users::where('USER_ID', $id)->get()
        );
        return response()->json($res);
    }



    /**
     * @SWG\Post(
     *     path="/api/v1/users",
     *     operationId="/api/v1/users",
     *     tags={"Create a new user"},
     *     @SWG\Parameter(
     *         name="USER_FIRST_NAME",
     *         in="body",
     *         description="The user first name parameter",
     *         required=true,
     *         @SWG\Schema(type="string")
     *     ),
     *     @SWG\Parameter(
     *         name="USER_LAST_NAME",
     *         in="body",
     *         description=" user last name parameter",
     *         required=false,
     *         @SWG\Schema(type="string")
     *     ),
     *     @SWG\Parameter(
     *         name="USER_EMAIL",
     *         in="body",
     *         description=" user email id parameter",
     *         required=true,
     *         @SWG\Schema(type="string")
     *     ),
     *     @SWG\Parameter(
     *         name="USER_PASSWORD",
     *         in="body",
     *         description=" user password parameter",
     *         required=true,
     *         @SWG\Schema(type="string")
     *     ),
     *     @SWG\Parameter(
     *         name="USER_TYPE",
     *         in="body",
     *         description=" user type parameter",
     *         required=true,
     *         @SWG\Schema(type="number")
     *     ),
     *     @SWG\Response(
     *         response="200",
     *         description="Returns user id"
     *     ),
     * )
     */

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

        $res = array(
            "status" => 200,
            'success' => true,
            "result" => $user->USER_ID
        );

        return response()->json($res, 201);
    }



    /**
     * @SWG\Put(
     *     path="/api/v1/users/{userId}",
     *     operationId="/api/v1/users/{userId}",
     *     tags={"Update  a  user"},
     *     @SWG\Parameter(
     *         name="USER_FIRST_NAME",
     *         in="body",
     *         description="The user first name parameter",
     *         required=false,
     *         @SWG\Schema(type="string")
     *     ),
     *     @SWG\Parameter(
     *         name="USER_LAST_NAME",
     *         in="body",
     *         description=" user last name parameter",
     *         required=false,
     *         @SWG\Schema(type="string")
     *     ),
     *     @SWG\Parameter(
     *         name="USER_EMAIL",
     *         in="body",
     *         description=" user email id parameter",
     *         required=true,
     *         @SWG\Schema(type="string")
     *     ),
     *     @SWG\Parameter(
     *         name="USER_PASSWORD",
     *         in="body",
     *         description=" user password parameter",
     *         required=true,
     *         @SWG\Schema(type="string")
     *     ),
     *     @SWG\Parameter(
     *         name="USER_TYPE",
     *         in="body",
     *         description=" user type parameter",
     *         required=true,
     *         @SWG\Schema(type="number")
     *     ),
     *     @SWG\Response(
     *         response="200",
     *         description="Returns user id"
     *     ),
     * )
     */

    public function update($id, Request $request)
    {

        $data = $request->all();
        $users = Users::where('USER_ID', $id)->firstOrFail();
        $users->where('USER_ID', $id)->update($data);


        $res = array(
            "status" => 200,
            'success' => true,
            "result" => $user->USER_ID
        );

        return response()->json($res, 200);
    }

    public function delete($id)
    {
        Users::where('USER_ID', $id)->delete();

        $res = array(
            "status" => 200,
            'success' => true,
            "result" => 'Deleted Successfully'
        );

        return response($res, 200);
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