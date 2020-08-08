<?php

namespace App\Http\Controllers;

use App\Subcribers;
use Illuminate\Http\Request;

class SubcribersController extends Controller
{

    public function showAllSubcribers()
    {
        return response()->json(Subcribers::all());
    }

    public function showOneSubcriber($id)
    {
        return response()->json(Subcribers::where('id', $id)->get());
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'SUBSCRIBER_USERID' => 'required',
            'SUBSCRIBER_CHANNEL_ID' => 'required',
        ]);

        $data = $request->all();
        $subcriber = Subcribers::create($data);

        return response()->json($subcriber, 201);
    }

    public function update($id, Request $request)
    {

        $data = $request->all();
        $subcriber = Subcribers::findOrFail($id);

        $author->update($data);

        return response()->json($subcriber, 200);
    }

    public function delete($id)
    {
        Subcribers::findOrFail($id)->delete();
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