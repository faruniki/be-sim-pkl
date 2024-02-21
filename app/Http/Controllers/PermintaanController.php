<?php

namespace App\Http\Controllers;

Use App\Models\Permintaan;
// use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ApiFormatter;

class permintaanController extends Controller
{

    public function index()
    {
        $data = Permintaan::get();
        return response()->json(['data' => $data], 200);
    }

    public function create(Request $request)
    {
        $validator = Permintaan::make($request->all(), [
            'name' => 'required',
            'jabatan' => 'required',
            'pt' => 'required',
            'alamat' => 'required',
            'pic' => 'required',
            'kontak_pic' => 'required',
            'email' => 'required|email',
            'kebutuhan' => 'required',
           
        ]);
        Permintaan::create([
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'pt' => $request->pt,
            'alamat' => $request->alamat,   
            'pic' => $request->pic,
            'kontak_pic' => $request->kontak_pic,
            'email' => $request->email,
            'kebutuhan' => $request->kebutuhan,
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

    public function show($id)
    {
        $data = Permintaan::find($id);

        if (!$data) {
            return response()->json(['message' => 'Data not found'], 400);
        }
        return response()->json(['data' => $data], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Permintaan::make($request->all(),[
            'name' => 'required',
            'jabatan'=> 'required',
            'pt' => 'required',
            'alamat' => 'required',
            'pic' => 'required',
            'kontak_pic' => 'required',
            'email' => 'required|email',
            'kebutuhan' => 'required',
        ]);

        $data = Permintaan::find($id);

        if (!$data) {
            return response()->json(['message' => 'Data not found'], 400);
        }
        $data->update([
            'name' => $request->name,
            'jabatan'=> $request->jabatan,
            'pt' => $request->pt,
            'alamat' => $request->alamat,
            'pic' => $request->pic,
            'kontak_pic' => $request->kontak_pic,
            'kebutuhan' => $request->kebutuhan,
        ]);
        return response()->json(['message' => 'Data updated successfully'], 200);
    }
    public function delete($id)
    {
        $data = Permintaan::find($id);
        if (!$data) {
            return response()->json(['message' => 'Data not Found'], 400);
        }
        $data->delete();
        return response()->json(['message' => 'Data deleted successfully'], 200);
    }
}
