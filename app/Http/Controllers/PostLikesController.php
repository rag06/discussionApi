<?php

namespace App\Http\Controllers;

use App\PostLikes;
use Illuminate\Http\Request;

class PostLikesController extends Controller
{

    public function getPostLikesCount($postid) {

        $postLike = PostLikes::where('POST_LIKE_POST_ID', $postid)->get();
        $res = array(
            "status" => 200,
            'success' => true,
            "result" => $postLike->count()
        );

        return response()->json($res, 200);
    }

    public function showAllPostLikes()
    {
        return response()->json(PostLikes::all());
    }

    public function showOneSubcriber($id)
    {
        return response()->json(PostLikes::where('id', $id)->get());
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'POST_LIKE_USER_ID' => 'required',
            'POST_LIKE_POST_ID' => 'required',
        ]);

        $data = $request->all();
        $postLike = PostLikes::create($data);
        $res = array(
            "status" => 200,
            'success' => true,
            "result" => $postLike
        );

        return response()->json($res, 201);
    }

    public function update($id, Request $request)
    {

        $data = $request->all();
        $postLike = PostLikes::findOrFail($id);

        $postLike->update($data);

        return response()->json($postLike, 200);
    }

    public function delete($id, $userId)
    {
        PostLikes::where(['POST_LIKE_POST_ID'=> $id,
        'POST_LIKE_USER_ID'=> $userId])->delete();
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