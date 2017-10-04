<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;

class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $providers = Provider::orderBy('created_at', 'desc')->paginate(10);
        return view('providers.index',['providers' => $providers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('providers.create');
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
        if(!(isset($data['email'])) || $data['email']==''){
            $data['email'] = env('EMAIL_DEFAULT_CONTATO');
        }
        $rtn = Provider::create($data);
        return redirect()->route('themes.create')->with('message', 'Item criado com sucesso!!');
        //return redirect()->route('providers.create')->with('message', 'Item criado com sucesso!!');
        /*if($rtn->id > 0){
            
            echo json_encode(["status"=>true,"msg"=>'Providers Adicionada!', "rtn"=> $rtn]);exit; 
        }else{
            
            echo json_encode(["status"=>false,"msg"=>'Não conseguimos cadastrar: '.$busca."<br> Por favor revise e tente novamente..."]);exit; 

        } */
    }

    public function providerAlter($id, $newProviderName,$newProviderEmail)
    {
        $rtn = Provider::where("id",$id)->get();
        if($rtn[0]->id){
            $rtn[0]->name = $newProviderName;
            $rtn[0]->email = $newProviderEmail;
            $rtn[0]->save();
        }
    
        if($rtn[0]->name == $newProviderName){
            
            echo json_encode(["status"=>true,"msg"=>'Alteramos!', "rtn"=> $rtn[0], 'all'=>Provider::all(['id','name'])]);exit; 
        }else{
            
            echo json_encode(["status"=>false,"msg"=>'Não conseguimos alterar'."<br> Por favor revise e tente novamente..."]);exit; 

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
        ///
        $rtn = Provider::where("name",'LIKE',"%$busca%")->get();

 
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
        $category = Provider::findOrFail($id);
        return view('providers.edit',compact('category'));
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
        $category = Provider::findOrFail($id);
        $category->name        = $data['name'];
        $category->save();

        return redirect()->route('providers.index')->with('message', 'Item Atualizado com sucesso!!');
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
        $rtn = Provider::where("$key",'LIKE',"%$busca%")->get();

 
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
