<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\city;
class cityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $cities = city::select('cities.id', 'cities.city_name', 'cities.status', 'st.state_name AS state_name')
        ->join('states AS st', 'st.id', '=', 'cities.state_id')
        ->get();

    if ($cities) {
        return response()->json([
            'message' => "Data Found Successfully",
            'code' => 200,
            'data' => $cities
        ]);
    } else {
        return response()->json([
            'message' => "Internal Server Error",
            'code' => 500
        ]);
    }
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $city=new city();
        $city->state_id=$request->state_id;
        $city->city_name=$request->city_name;

        $result=$city->save();
        if($result){
            return response()->json([
                'message'=>"Data Insert Successfully",
                'code'=>200
            ]);
        }else{
                return response()->json([
                    'message'=>"Interal server Error",
                    'code'=>500
                ]);
            }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $result=city::where('id',$request->id)->first();
        if($result){
            return response()->json([
                'message'=>"Data found Successfully",
                'code'=>200,
                'data'=>$result
            ]);
        }else{
                return response()->json([
                    'message'=>"Interal server Error",
                    'code'=>500
                ]);
            }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $result=city::where('id',$request->id)->update([
            'state_id' =>$request->edit_state_id,
            'city_name' =>$request->edit_city_name,
            'status'   =>$request->edit_status,
        ]);
        if($result){
            return response()->json([
                'message'=>"Data updated Successfully",
                'code'=>200,
            ]);
        }else{
                return response()->json([
                    'message'=>"Interal server Error",
                    'code'=>500
                ]);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result=city::where('id',$request->id)->delete();
        if($result){
            return response()->json([
                'message'=>"Data Deleted Successfully",
                'code'=>200,
            ]);
        }else{
                return response()->json([
                    'message'=>"Interal server Error",
                    'code'=>500
                ]);
            }
    }
}
