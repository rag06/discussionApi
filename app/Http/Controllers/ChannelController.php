<?php

namespace App\Http\Controllers;

use App\Channels;
use Illuminate\Http\Request;

class ChannelController extends Controller
{

    public function showAllChannels()
    {
        return response()->json(Channels::all());
    }

    public function showOneChannel($id)
    {
        return response()->json(Channels::where('CHANNEL_ID', $id)->get());
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'CHANNEL_NAME' => 'required|unique:channels',
            'CHANNEL_ADMIN_ID' => 'required',
        ]);

        $data = $request->all();
        $data['CHANNEL_ID'] = $this->uuid();
        $data['CHANNEL_STATUS'] = 1;
        $channel = Channels::create($data);

        return response()->json($channel, 201);
    }

    public function update($id, Request $request)
    {

        $data = $request->all();
        $channel = Channels::findOrFail($id);

        $author->update($data);

        return response()->json($channel, 200);
    }

    public function delete($id)
    {
        Channels::findOrFail($id)->delete();
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