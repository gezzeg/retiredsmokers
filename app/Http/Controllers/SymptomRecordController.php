<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Sentinel;
use App\Symptom;
use App\SymptomRecord;

class SymptomRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Sentinel::check()){

            $id=Sentinel::getUser()->id;
            //$user = User::whereUserId($id);
            
            //get all user symptoms
            $userSymptoms = SymptomRecord::whereUserId($id)
            				->get();

            //get all symptom registered
            $symptoms = Symptom::All();

            
            //get all symptom user doesnt have
            $userSymptomList = SymptomRecord::whereUserId($id)
            				->pluck('symptom_records_id');

            $freeSymptoms = Symptom::whereNotIn('id',$userSymptomList)->get();
            $registeredSymptoms = Symptom::whereIn('id',$userSymptomList)->get();

            //$userSymptoms = SymptomRecord::where('id' ,'=' ,$id)->pluck('symptom_records_id')->toArray();
            //$userSymptoms = SymptomRecord::select('symptom_records_id')->where('id' ,'=' ,$id)->all();
            //$userSymptoms = SymptomRecord::select('symptom_records_id')->where('id' ,'=' ,$id)->all();

            //dd($symptoms);
           //dd($userSymptoms);

            return view('symptoms.index-jquery',compact('symptoms','userSymptoms','userSymptomList','registeredSymptoms','freeSymptoms'));

        }
        
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
        if(Sentinel::check()){

            //$symptom = $request->input('symptom_records_id');

           // echo $symptom;

            //dd($symptoms);
            //dd($request->input('symptoms')['1']);
            $id = Sentinel::getUser()->id;
        
            //$SymtomLists = Symtom::All();

           /* foreach ($symptoms as $symtom){

                 
                $symptomRecord = new SymptomRecord();
                $symptomRecord->user_id = $id;
                $symptomRecord->symptom_records_id=
                $symtom;   
                $symptomRecord->note=$request->note;
                $symptomRecord->save(); 
                 
            }


        return redirect()->back()->with('status','Update Successful !');
       
        }else
            return redirect()->back()->withErrors('Update Failed !');   */ 

                $symptomRecord = new SymptomRecord();
                $symptomRecord->user_id = $id;
                $symptomRecord->symptom_records_id=
                $request->symptom_records_id;   
                $symptomRecord->note=$request->note;
                $symptomRecord->save();

                return response()->json([
                    'id'=>$symptomRecord->id,
                    'user_id' => $symptomRecord->user_id,
                    'symptom_records_id' => $symptomRecord->symptom->name,
                    'note'=>$symptomRecord->note=$request->note
                ]);

               
            }

            /*$record->user_id=$id;
            $record->symptom_records_id=$request->symptom_records_id;
            $record->note=$request->note;
            $record->save(); 
        
            return response()->json([
                        'id'=>$record->id,
                        'user_id' => $record->user_id,
                        'smoking_statuses_id' => $record->smokingStatus->id,
                        'date'=>$record->date,
                        'note'=>$record->note=$request->note
                    ]);

        */


        
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
    public function edit()
    {
        //
        if(Sentinel::check()){

            $id=Sentinel::getUser()->id;
            //$user = User::whereUserId($id);
            
            //get all symptom registered
            $symptoms = Symptom::All();


            if($symptoms){
            //get all user symptoms
            $userSymptoms = SymptomRecord::whereUserId($id)->get();
            //$userSymptoms = SymptomRecord::where('id' ,'=' ,$id)->pluck('symptom_records_id')->toArray();
            //$userSymptoms = SymptomRecord::select('symptom_records_id')->where('id' ,'=' ,$id)->all();
            //$userSymptoms = SymptomRecord::select('symptom_records_id')->where('id' ,'=' ,$id)->all();

            //dd($symptoms);
           //dd($userSymptoms);
           }else{

           }

            return view('symptoms.edit',compact('symptoms','userSymptoms'));

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         if(Sentinel::check()){

            //$symptoms = $request->input('symptoms');

            //dd($symptoms);
            //dd($request->input('symptoms')['1']);
            $id = Sentinel::getUser()->id;
        
          // $SymtomLists = Symtom::All()

           /* foreach ($symptoms as $symtom){

               // $record=SymptomRecord::find($symptom); 
                $symptomRecord = new SymptomRecord();
                $symptomRecord->user_id = $id;
                $symptomRecord->symptom_records_id=
                $symtom;   
                $symptomRecord->note=$request->note;
                $symptomRecord->save(); 
                 
            }


        return redirect()->back()->with('status','Update Successful !');
       
        }else
            return redirect()->back()->withErrors('Update Failed !');  */
            	$recordId = $request->input('id');
            	$symptom_records_id = $request->symptom_records_id;
				//dd($id);
                
                $symptomRecord=SymptomRecord::find($recordId); 
                //$symptomRecord->user_id = $id;
                // $symptomRecord->symptom_records_id=
                // $request->symptom_records_id;   
                $symptomRecord->note=$request->note;
                $symptomRecord->save();

                return response()->json([
                    'id'=>$symptomRecord->id,
                    'user_id' => $symptomRecord->user_id,
                    'symptom_records_id' => $symptomRecord->symptom->name,
                    'note'=>$symptomRecord->note=$request->note
                ]);

               
            }  


            /*$record->user_id=$id;
            $record->symptom_records_id=$request->symptom_records_id;
            $record->note=$request->note;
            $record->save(); 
        
            return response()->json([
                        'id'=>$record->id,
                        'user_id' => $record->user_id,
                        'smoking_statuses_id' => $record->smokingStatus->id,
                        'date'=>$record->date,
                        'note'=>$record->note=$request->note
                    ]);

        */


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        
        //$symptom = SymptomRecord::find($id)->delete();
       $symptom = SymptomRecord::destroy($id);
        // return response()->json([
        //             'id'=>$id
        //         ]);
    }
}
