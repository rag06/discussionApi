<?php

namespace App\Http\Controllers;

use App\Replies;
use App\Users;
use Illuminate\Http\Request;

class RepliesController extends Controller
{

    public function showAllreplies($id)
    {

        $result = array(
            "records" =>  Replies::where('POST_ID', $id)->get(),
            "objects" => array()
        );
        if (!empty($result['records'])) {
            $userIds = array();
            foreach ($result['records'] as $key => $value) {
                if ($value->REPLY_USER_ID && !in_array($value->REPLY_USER_ID, $userIds)) {
                    array_push($userIds, $value->REPLY_USER_ID);
                }
            }
            $userObjects = Users::whereIn('USER_ID', $userIds)->get();
            if (!empty($userObjects)) {

                foreach ($userObjects as $key => $value) {
                    $result['objects'][$value->USER_ID] = $value;
                }
            }

        }

        $res = array(
            "status" => 200,
            'success' => true,
            "result" => $result
        );
        return response()->json($res);
    }

    public function showOnereply($id)
    {

        $result = array(
            "records" =>  Replies::where('REPLY_ID', $id)->get(),
            "objects" => array()
        );
        if (!empty($result['records'])) {
            $userIds = array();
            foreach ($result['records'] as $key => $value) {
                if ($value->REPLY_USER_ID && !in_array($value->REPLY_USER_ID, $userIds)) {
                    array_push($userIds, $value->REPLY_USER_ID);
                }
            }
            $userObjects = Users::whereIn('USER_ID', $userIds)->get();
            if (!empty($userObjects)) {

                foreach ($userObjects as $key => $value) {
                    $result['objects'][$value->USER_ID] = $value;
                }
            }

        }

        $res = array(
            "status" => 200,
            'success' => true,
            "result" => $result
        );
        return response()->json($res);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'POST_ID' => 'required',
            'REPLY_TEXT' => 'required',
            'REPLY_USER_ID' => 'required',
        ]);

        $data = $request->all();
        $data['REPLY_ID'] = $this->uuid();
        $data['REPLY_STATUS'] = 1;
        $reply = Replies::create($data);

        $res = array(
            "status" => 200,
            'success' => true,
            "result" => $reply->REPLY_ID
        );

        return response()->json($res, 201);
    }

    public function update($id, Request $request)
    {

        $data = $request->all();
        $reply = Replies::where('REPLY_ID', $id)->firstOrFail();
        $reply->where('REPLY_ID', $id)->update($data);

        $res = array(
            "status" => 200,
            'success' => true,
            "result" => $reply->REPLY_ID
        );

        return response()->json($res, 200);
    }

    public function delete($id)
    {
        Replies::where('REPLY_ID', $id)->delete();

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