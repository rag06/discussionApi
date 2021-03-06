<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Users;
use App\Channels;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function showAllPosts($id)
    {
        $result = array(
            "records" =>  Posts::where('POST_CHANNEL_ID', $id)->get(),
            "objects" => array()
        );
        if (!empty($result['records'])) {
            $userIds = array();
            foreach ($result['records'] as $key => $value) {
                if ($value->POST_USER_ID && !in_array($value->POST_USER_ID, $userIds)) {
                    array_push($userIds, $value->POST_USER_ID);
                }
            }
            $userObjects = Users::whereIn('USER_ID', $userIds)->get();

            $channelIds = array();
            foreach ($result['records'] as $key => $value) {
                if ($value->POST_CHANNEL_ID && !in_array($value->POST_CHANNEL_ID, $channelIds)) {
                    array_push($channelIds, $value->POST_CHANNEL_ID);
                }
            }
            $channelObjects = Channels::whereIn('CHANNEL_ID', $channelIds)->get();


            if (!empty($channelObjects)) {
                $result['objects']['channels'] = array();
                foreach ($channelObjects as $key => $value) {
                    $result['objects']['channels'][$value->CHANNEL_ID] = $value;
                }
            }

            if (!empty($userObjects)) {
                $result['objects']['users'] = array();
                foreach ($userObjects as $key => $value) {
                    $result['objects']['users'][$value->USER_ID] = $value;
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

    public function showOnePost($id)
    {

        $result = array(
            "records" =>  Posts::where('POST_ID', $id)->get(),
            "objects" => array()
        );
        if (!empty($result['records'])) {
            $userIds = array();
            foreach ($result['records'] as $key => $value) {
                if ($value->POST_USER_ID && !in_array($value->POST_USER_ID, $userIds)) {
                    array_push($userIds, $value->POST_USER_ID);
                }
            }
            $userObjects = Users::whereIn('USER_ID', $userIds)->get();

            $channelIds = array();
            foreach ($result['records'] as $key => $value) {
                if ($value->POST_CHANNEL_ID && !in_array($value->POST_CHANNEL_ID, $channelIds)) {
                    array_push($channelIds, $value->POST_CHANNEL_ID);
                }
            }
            $channelObjects = Channels::whereIn('CHANNEL_ID', $channelIds)->get();


            if (!empty($channelObjects)) {
                $result['objects']['channels'] = array();
                foreach ($channelObjects as $key => $value) {
                    $result['objects']['channels'][$value->CHANNEL_ID] = $value;
                }
            }

            if (!empty($userObjects)) {
                $result['objects']['users'] = array();
                foreach ($userObjects as $key => $value) {
                    $result['objects']['users'][$value->USER_ID] = $value;
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
            'POST_NAME' => 'required',
            'POST_CHANNEL_ID' => 'required',
            'POST_USER_ID' => 'required',
        ]);

        $data = $request->all();
        $data['POST_ID'] = $this->uuid();
        $data['POST_STATUS'] = 1;
        $post = Posts::create($data);

        $res = array(
            "status" => 200,
            'success' => true,
            "result" => $post->POST_ID
        );

        return response()->json($res, 201);
    }

    public function update($id, Request $request)
    {

        $data = $request->all();
        $post = Posts::where('POST_ID', $id)->firstOrFail();

        $post->update($data);


        $res = array(
            "status" => 200,
            'success' => true,
            "result" => $channel->POST_ID
        );

        return response()->json($res, 200);
    }

    public function delete($id)
    {
        Posts::where('POST_ID', $id)->delete();
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