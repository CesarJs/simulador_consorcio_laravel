<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ThemeRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProviderRepository;
use App\Theme;
use App\Category;
use App\Provider;
use App\Condition;
class ThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $repository;
    private $categoryRepository;
    private $providerRepository;

    public function __construct(ThemeRepository $repository, CategoryRepository $categoryRepository, ProviderRepository $providerRepository){
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
        $this->providerRepository = $providerRepository;

    }
    public function index()
    {
        $themes = Theme::orderBy('created_at', 'desc')->paginate(10);
        return view('themes.index',['themes' => $themes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->getCategories();
        $providers =  $this->providerRepository->getProviders();
        $providersAll =  $this->providerRepository->all();
        $categoriesAll =  $this->categoryRepository->all();
        return view('themes.create',compact('categories','providers','providersAll','categoriesAll'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data=$request->all();
        if(isset($data['_token'])){unset($data['_token']);}

        //formatendo valores para float
        if(isset($data['credito'])){$data['credito']= $this->rtnFloat($data['credito']);}

        Theme::create($data);
        return redirect()->route('themes.create')->with('message', 'Item criado com sucesso!!');
    }

public function rtnFloat($number){
        $temp = str_replace(',', '.', str_replace('.', '', $number));

        return $temp;
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

    public function credito()
    {      

        $id=$_GET['id'];
        $rtn = Theme::find($id);

        if($rtn->credito > 0){
            
            echo json_encode(["status"=>true,"msg"=>'Achamos!', "rtn"=> $rtn->credito]);exit; 
        }else{
            
            echo json_encode(["status"=>false,"msg"=>"Por favor revise e tente novamente..."]);exit; 

        }  
    }

    public function find($key,$busca) //busca no adminitrador
    {
        //
        $rtn = Theme::where("$key",'LIKE',"%$busca%")->with('category')->with('provider')->get();

 
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
        $theme = Theme::findOrFail($id);
        $categories = $this->categoryRepository->getCategories();
        $providers =  $this->providerRepository->getProviders();
        return view('themes.edit',compact('theme','categories','providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $data=$request->all();
        if(isset($data['credito'])){$data['credito']= $this->rtnFloat($data['credito']);}

        
        $theme = Theme::findOrFail($id);
        $theme->codigo        = $data['codigo'];
        $theme->description = $data['description'];
        $theme->category_id    = $data['category_id'];
        $theme->provider_id       = $data['provider_id'];
        $theme->credito       = $data['credito'];



        $theme->save();
        return redirect()->route('themes.index')->with('message', 'Item Atualizado com sucesso!!');
       
     
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
}
