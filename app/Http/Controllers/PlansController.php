<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $plans = Plan::orderBy('created_at', 'desc')->paginate(10);
        return view('plans.index',['plans' => $plans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('plans.create');
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
        $data=$request->all();
        Plan::create($data);
        return redirect()->route('plans.create')->with('message', 'Item criado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        ///
        $rtn = Plan::where("name",'LIKE',"%$busca%")->get();

 
        if($rtn->count() > 0){
            
            echo json_encode(["status"=>true,"msg"=>'Achamos!', "rtn"=> $rtn]);exit; 
        }else{
            
            echo json_encode(["status"=>false,"msg"=>'Não encontramos resultados para a busca: '.$busca."<br> Por favor revise e tente novamente..."]);exit; 

        }    
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
        $plan = Plan::findOrFail($id);
        return view('plans.edit',compact('plan'));
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
        $data=$request->all();
        $plan = Plan::findOrFail($id);
        $plan->name        = $data['name'];
        $plan->save();

        return redirect()->route('plans.index')->with('message', 'Item Atualizado com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function find($key,$busca) //busca no adminitrador
    {
        //
        $rtn = Plan::where("$key",'LIKE',"%$busca%")->get();

 
        if($rtn->count() > 0){
            
            echo json_encode(["status"=>true,"msg"=>'Achamos!', "rtn"=> $rtn]);exit; 
        }else{
            
            echo json_encode(["status"=>false,"msg"=>'Não encontramos resultados para a busca: '.$busca."<br> Por favor revise e tente novamente..."]);exit; 

        }    

     
    }
    public function destroy($id)
    {
        //
    }
}
