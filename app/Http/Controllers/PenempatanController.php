<?php

namespace App\Http\Controllers;

use App\Models\Penempatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ApiFormatter;

class PenempatanController extends Controller
{

    public function index()
    {
        $data = Penempatan::get();
        return response()->json(['data' => $data], 200);
    }
    public function create(Request $request)
    {
        $validator = penempatan::make($request->all(), [
            'nis' => 'required',
            'name' => 'required',
            'rayon' => 'required',
            'rombel' => 'required',
            'industri' => 'required',
            'pemetaan' => 'required',
            'pembimbing' => 'required',
            'kontak_pic' => 'required',
            'keterangan' => 'required',
           
        ]);
        penempatan::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rayon' => $request->rayon,
            'rombel' => $request->rombel,
            'industri' => $request->industri,   
            'pemetaan' => $request->pemetaan,
            'pembimbing' => $request->pembimbing,
            'kontak_pic' => $request->kontak_pic,
            'keterangan' => $request->keterangan,
        ]);

        if ($request) {
            return response()->json([
                'student_data' => $validator,
                'status' => 200,
                'message' => 'create successfully',
            ]);
        }else {
            return response()->json([
                'student_data' => $validator,
                'status' => 400,
                'message' => 'create not found',
            ]);
        }

        // return redirect()->route('/')->with('success', 'Berhasil menambahakan ');
    }
    // show sesuai id
    public function show($id)
    {
        $data = Penempatan::find($id);

    if (!$data) {
        return response()->json(['message' => 'Data not found'], 400);
    }
    return response()->json(['data' => $data], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Penempatan::make($request->all(),[
            'nis' => 'required',
            'name' => 'required',
            'rayon' => 'required',
            'rombel' => 'required',
            'industri' => 'required',
            'pemetaan' => 'required',
            'pembimbing' => 'required',
            'kontak_pic' => 'required',
            'keterangan' => 'required',
           
        ]);

        $data = Penempatan::find($id);


        if (!$data) {
            return response()->json(['message' => 'Data not found'], 400);
        }
        $data->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rayon' => $request->rayon,
            'rombel' => $request->rombel,
            'industri' => $request->industri,
            'pemetaan' => $request->pemetaan,
            'pembimbing' => $request->pembimbing,
            'kontak_pic' => $request->kontak_pic,
            'keterangan' => $request->keterangan,
        ]);
        return response()->json(['message' => 'Data updated successfully'], 200);
        // return redirect()->route('');
    }
    public function delete($id)
    {
        $data = Penempatan::find($id);
    if (!$data) {
        return response()->json(['message' => 'Data not found'], 400);
    }
    $data->delete();
    return response()->json(['message' => 'Data deleted successfully'], 200);
   }

}
