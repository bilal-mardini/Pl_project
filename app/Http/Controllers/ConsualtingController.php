<?php

namespace App\Http\Controllers;

use App\Models\Consualting;
use App\Models\User;
use App\Models\BookAppiotment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsualtingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $consualtings = DB::table('consualtings')->get();
        $all_experts = array();
        foreach($consualtings as $con)
        {

            $experts= User::where('consualting_id',$con->id)->get();
            array_push($all_experts,$experts);
        }

        return response([$consualtings,$all_experts],200);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search(Request $request) {
        $data = $request->get('data');

        $search = Consualting::where('name', 'like', "%{$data}%")->get();
        $search = User::where('name', 'like', "%{$data}%")->where('role_id',2)->get();
        return response()->json([
            'data' => $search
        ]);
    }
    public function Date(){
        $dates=User::select('available_time','id')->get();
        return response ([$dates]);
    }
    public function BookAnAppointment(Request $request)
    {
    $book= new BookAppiotment();
    $book->create([
        'expert_id'=>$request->expert_id,
        'user_id'=>$request->user_id,
        'date'=>$request->date,
       ]);

       return response(['message' => ' create successfully !'], 201);
    }
    public function Appointments()
    {
    $appointments = DB::table('book_appiotments')->get();
    return response([ $appointments], 201);
}

}
