<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use Response;

class CrudController extends Controller
{
    //
	
	public function index()
	{
		$info = Info::all();
		 return view('home')->with(compact('info'));
	}
	public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
        ]);
        $info = Info::create($data);
        return Response::json($info);
    }
	 public function update(Request $request, $id)
    {
        $data=$request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            
        ]);

        $info = Info::findOrFail($id);
        $info->update($data);

        return Response::json($info);
    }
	
	 public function edit($id)
    {
        $info = Info::findOrFail($id);

        if (!$info) {
            // Handle the case where the user does not exist
        }

        return response()->json($info);
    }
	public function destroy($id)
   {
    $info = Info::findOrFail($id);
    $info->delete();

    return response()->json($info);
}


    
}