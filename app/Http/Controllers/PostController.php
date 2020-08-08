<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function showAllPosts()
    {
        return response()->json(Posts::all());
    }

    public function showOnePost($id)
    {
        return response()->json(Posts::where('POST_ID', $id)->get());
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

        return response()->json($post, 201);
    }

    public function update($id, Request $request)
    {

        $data = $request->all();
        $post = Posts::findOrFail($id);

        $author->update($data);

        return response()->json($post, 200);
    }

    public function delete($id)
    {
        Posts::findOrFail($id)->delete();
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