<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SmokingRecord;

use App\User;

use Sentinel;

class SmokingRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


    	if(Sentinel::check()){
			//dd(Sentinel::getUser()->id);



			$id = Sentinel::getUser()->id;
        	$user = User::whereUserId($id);
        	$records = SmokingRecord::whereUserId($id)->orderBy('date', 'desc')->get();
        	return view('records.index',compact('user','records'));
    	}

		
        //$users = User::All();

    	//$users = User::whereId('1');

		

        //dd($user);

       	//$records = SmokingRecord::whereUserId('1')->orderBy('date', 'desc')->get();
        
        
        //$records = SmokingRecord::All();
       	//return view('records.index',compact('user','records'));
    	//return dd($records);

    }


    public function timeline()
    {
        //

    	if(Sentinel::check()){
    		$id = Sentinel::getUser()->id;
        	$user = User::whereUserId($id);
        	$records = SmokingRecord::whereUserId($id)->orderBy('date','desc')->get();
        	return view('records.timeline',compact('records'),['c'=>true]);
		}


			//dd(Sentinel::getUser()->id);




/*
        $users = User::All();
        $records = SmokingRecord::whereUserId('1')->orderBy('date')->get();
        //$records = SmokingRecord::All();
       	return view('records.timeline',compact('records'),['c'=>true]);
    	//return dd($records);
*/
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

        if(Sentinel::check()){

        	//dd($request->segment(0));
		
		$id = Sentinel::getUser()->id;
		
		$record = new SmokingRecord();

		$record->user_id=$id;
	 	$record->smoking_statuses_id=$request->smoking_statuses_id;
        $record->date=$request->date;
        $record->note=$request->note;
        $record->save(); 
        
        return response()->json([
         			'id'=>$record->id,
	    			'user_id' => $record->user_id,
	    			'smoking_statuses_id' => $record->smokingStatus->id,
	    			'date'=>$record->date,
	    			'note'=>$record->note=$request->note
				]);

        }

       /* $product = App\Product::create($request->input());
    	return response()->json($product);*/

       /* $record = new SmokingRecord();

       // $record->user_id=$request->user_id;

       // dd(Sentinel::getUser()->id);

        $record->user_id=Sentinel::getUser()->id;


         $record->smoking_statuses_id=$request->smoking_statuses_id;
         $record->date=$request->date;
         $record->note=$request->note;
         $record->save(); 

         //return response()->json($record);

         return response()->json([
         			'id'=>$record->id,
	    			'user_id' => $record->user_id,
	    			'smoking_statuses_id' => $record->smokingStatus->name,
	    			'date'=>$record->date,
	    			'note'=>$record->note=$request->note
				]);

*/
/*
        $record = SmokingRecord::create($request->input());
    	return response()->json(['responseText' => 'Success!'], 200);
*/



         //return dd($record);


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

    	$record=SmokingRecord::find($id);
    	$record->smoking_statuses_id=$request->smoking_statuses_id;
        $record->date=$request->date;
        $record->note=$request->note;
        $record->save(); 
		//dd($record);

        //return response()->json($record);	

         return response()->json([
         			'id'=>$record->id,
	    			'user_id' => $record->user_id,
	    			'smoking_statuses_id' => $record->smokingStatus->name,
	    			'date'=>$record->date,
	    			'note'=>$record->note=$request->note
				]);

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
        // SmokingRecord::find($id)->delete();
        //return response()->json();

         $record = SmokingRecord::destroy($id);
    	return response()->json();
    }
}
