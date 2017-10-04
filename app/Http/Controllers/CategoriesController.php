<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        return view('categories.index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
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

        $rtn = Category::create($data);
        //return redirect()->route('categories.create')->with('message', 'Item criado com sucesso!!');
        if($rtn->id > 0){
            
            echo json_encode(["status"=>true,"msg"=>'Categoria Adicionada!', "rtn"=> $rtn]);exit; 
        }else{
            
            echo json_encode(["status"=>false,"msg"=>'Não conseguimos cadastrar: '.$busca."<br> Por favor revise e tente novamente..."]);exit; 

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
        $rtn = Category::where("name",'LIKE',"%$busca%")->get();

 
        if($rtn->count() > 0){
            
            echo json_encode(["status"=>true,"msg"=>'Achamos!', "rtn"=> $rtn]);exit; 
        }else{
            
            echo json_encode(["status"=>false,"msg"=>'Não encontramos resultados para a busca: '.$busca."<br> Por favor revise e tente novamente..."]);exit; 

        }    
    }

    public function categoryAlter($cat, $newCat)
    {
        ///
        $rtn = Category::where("id",$cat)->get();
        if($rtn[0]->id){
            $rtn[0]->name = $newCat;
            $rtn[0]->save();
        }
 
        if($rtn[0]->name == $newCat){
            
            echo json_encode(["status"=>true,"msg"=>'Alteramos!', "rtn"=> $rtn[0], 'all'=>Category::all(['id','name'])]);exit; 
        }else{
            
            echo json_encode(["status"=>false,"msg"=>'Não conseguimos alterar'."<br> Por favor revise e tente novamente..."]);exit; 

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
        $category = Category::findOrFail($id);
        return view('categories.edit',compact('category'));
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
        $category = Category::findOrFail($id);
        $category->name        = $data['name'];
        $category->save();

        return redirect()->route('categories.index')->with('message', 'Item Atualizado com sucesso!!');
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
        $rtn = Category::where("$key",'LIKE',"%$busca%")->get();

 
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
