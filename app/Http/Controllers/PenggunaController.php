<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Validator;
use App\Helpers\ApiFormatter;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // login
    public function indexLogin()
    {
        return redirect(login);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $auth = Auth::user();
            $success['token'] = $auth->createToken('auth_token')->plainTextToken;
            $success['email'] = $auth->email;
            $success['password'] = $auth->password;

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Login Successfully',
                'data' => $success
            ]);
        }else{
            return response()->json([
                'status' => 401,
                'success' => false,
                'message' => 'Invalid email or password',
                'data' => null
            ]);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'There is a mistake',
                'data' => $validator->errors()
            ]);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user =User::create($input);

        $token = $user->createToken('auth_token')->plainTextToken;

        $success['token'] = $token;
        $success['name'] = $user->name;

        return response()->json([
            'success' => true,
            'message' => 'Register successfully',
            'data' => $success
        ]);

    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    // endlogin
    /**
     * 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // jadwal create
    public function jadwalcreate(Request $request)
    {
        $validator = Gelombang::make($request->all(), [
            'nis' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'rombel' => 'required',
            'rayon' => 'required',
            'pt' => 'required',
            'priode' => 'required',
           
        ]);
        Gelombang::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'email' => $request->email,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
            'pt' => $request->pt,   
            'priode' => $request->priode,
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

        // return redirect()->route('/')->with('success', 'Berhasil menambahakan prestasi');
    }

    // show semua data
    public function index()
    {
        $data = Gelombang::get();
        return response()->json(['data' => $data], 200);
    }

    // show sesuai id
    public function jadwalshow($id)
    {
        $data = Gelombang::find($id);

    if (!$data) {
        return response()->json(['message' => 'Data not found'], 400);
    }
    return response()->json(['data' => $data], 200);
    }

 
    public function jadwaldelete($id)
    {
        $data = Gelombang::find($id);
    if (!$data) {
        return response()->json(['message' => 'Data not found'], 400);
    }
    $data->delete();
    return response()->json(['message' => 'Data deleted successfully'], 200);
        // return redirect()->route('');
    }

    public function jadwalupdate(Request $request, $id)
    {
        $validator = Gelombang::make($request->all(),[
            'nis' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'rombel' => 'required',
            'rayon' => 'required',
            'pt' => 'required',
            'priode' => 'required',
           
        ]);

        $data = Gelombang::find($id);


        if (!$data) {
            return response()->json(['message' => 'Data not found'], 400);
        }
        $data->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'email' => $request->email,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
            'pt' => $request->pt,
            'priode' => $request->priode,
        ]);
        return response()->json(['message' => 'Data updated successfully'], 200);
        // return redirect()->route('');
    }

    // end jadwal pemberangkatan

}
