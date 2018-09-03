<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscription;
use Illuminate\Support\Facades\Log;
use Validator;

class SubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetch all subscriptions details.
        $subscriptions = Subscription::all();
        Log::info('Showing subscriptions: '.$subscriptions);
        return response()->json($subscriptions);

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
        // store subscription details to the table.
        $validator = Validator::make($request->all(),[

            'device_id'=>'required',
            'date'=>'required',

        ]);
        if($validator->fails())
        {

            $response = array('response'=>$validator->messages(),'success'=>false);

            return $response;

        }
        else{

            // insert into DB.
            $subscriptions = new Subscription;
            $subscriptions->device_id = $request->input('device_id');
            $subscriptions->subscription_end = $request->input('date');
            $subscriptions->save();


            return response()->json($subscriptions);


        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //fetch by ID subscription details.
        $subscriptions = Subscription::find($id);
        $subscriptions->subscription_end = $request->input();
        return response()->json($subscriptions);

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
        // update the subscription details.
          // store subscription details to the table.
          $validator = Validator::make($request->all(),[

            'device_id'=>'required',    
            'date'=>'required',

        ]);
        if($validator->fails())
        {

            $response = array('response'=>$validator->messages(),'success'=>false);

            return $response;

        }
        else{

            // insert into DB.
            $subscriptions = Subscription::find($id);
            $subscriptions->device_id = $request->input('device_id');
            $subscriptions->subscription_end = $request->input('date');
            $subscriptions->save();


            return response()->json($subscriptions);


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete the subscription.
        $subscriptions = Subscription::find($id);
        $subscriptions->delete();
        $response = array('response'=>'Item Deleted','success'=>true);
         return $response;
    }
}
