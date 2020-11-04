<?php

namespace App\Http\Controllers;

use App\depart;
use Illuminate\Http\Request;

class DepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $depart = depart::latest()->paginate(5);
  
        return view('depart.index',compact('depart'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('depart.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
              
           
        depart::create($request->all());
        
        return redirect()->route('depart.index')
        ->with('success','depart created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\depart  $depart
     * @return \Illuminate\Http\Response
     */
    public function show( depart $depart)
    {
        return view('depart.show',compact('depart'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\depart  $depart
     * @return \Illuminate\Http\Response
     */
    public function edit( depart $depart)
    {
       return view('depart.edit',compact('depart'));

       
      // return view('invoices.edit_invoice',compact('sections','invoices'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\depart  $depart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,depart $depart)
    { 
        
        
        $depart->update([
            'name'=>$request->name,
            'depart_id'=>$request->depart_id,

    
   ] );

            
        return redirect()->route('depart.index')
        ->with('success','depart updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\depart  $depart
     * @return \Illuminate\Http\Response
     */
    
    public function destroy( depart $depart){
        
        
        $depart->delete();

    }
    public function getdepart($id){

        $depart = depart::where('depart_id', $id);
        //return view('depart.v', compact('depart'));
        return $depart;
        
       
    }


}
