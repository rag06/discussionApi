<?php

namespace App\Http\Controllers;

use App\Replies;
use Illuminate\Http\Request;

class RepliesController extends Controller
{

    public function showAllreplies()
    {
        return response()->json(Replies::all());
    }

    public function showOnereply($id)
    {
        return response()->json(Replies::where('REPLY_ID', $id)->get());
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

        return response()->json($reply, 201);
    }

    public function update($id, Request $request)
    {

        $data = $request->all();
        $reply = Replies::findOrFail($id);

        $author->update($data);

        return response()->json($reply, 200);
    }

    public function delete($id)
    {
        Replies::findOrFail($id)->delete();
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