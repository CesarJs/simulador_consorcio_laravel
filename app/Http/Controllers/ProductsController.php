<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\PlanRepository;
use App\Repositories\ThemeRepository;
use App\Product;
use App\Plan;
use App\Theme;
use App\Condition;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $repository;
    private $busca;
    private $planRepository;
    private $themeRepository;

    public function __construct(ProductRepository $repository, PlanRepository $planRepository, ThemeRepository $themeRepository){
        $this->repository = $repository;
        $this->planRepository = $planRepository;
        $this->themeRepository = $themeRepository;

    }
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('products.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar(Request $request){
        $data = $request->all();
        $categoria = $data['categoria'];
        $valores = explode(';', $data['range']);
        switch ($data['keyTipo']) {
            case 'credito':
                # code...
                $resultados = Product::whereBetween('credito', $valores)->whereHas('bem', function ($query) use ($categoria){    
                        $query->where('category_id', $categoria);
                    })->with(['bem','plano'])->get();//->where('category_id',$data['categoria'])->get();
                break;
            case 'parcela':
                # code...
                $resultados = Product::whereBetween('primeira_parcela_pf', $valores)->whereHas('bem', function ($query) use ($categoria){
                        $query->where('category_id',  $categoria);
                    })->with(['bem','plano'])->get();
                break;
            default:
                # code...
                break;
        }
        
        return view('resultados',compact('resultados'),['categoria'=>$data['categoria']]);
        
    }
    public function create()
    {
        //
        $plans = $this->planRepository->getPlans();
        $themes =  $this->themeRepository->getThemes();
        return view('products.create',compact('plans','themes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function rtnFloat($number){
        $temp = str_replace(',', '.', str_replace('.', '', $number));

        return $temp;
    }

    public function store(Request $request)
    {
         $data=$request->all();
        if(isset($data['_token'])){unset($data['_token']);}

        //formatendo valores para float
        
        if(isset($data['credito'])){$data['credito']=$this->rtnFloat($data['credito']);}
        if(isset($data['primeira_parcela_pf'])){$data['primeira_parcela_pf']=$this->rtnFloat($data['primeira_parcela_pf']);}
        if(isset($data['primeira_parcela_pj'])){$data['primeira_parcela_pj']=$this->rtnFloat($data['primeira_parcela_pj']);}
        //condicoes valores
        if(isset($data['condicao_um']['\'valor_parcela\''])){$data['condicao_um']['\'valor_parcela\'']=$this->rtnFloat($data['condicao_um']['\'valor_parcela\'']);}
        if(isset($data['condicao_dois']['\'valor_parcela\''])){$data['condicao_dois']['\'valor_parcela\'']=$this->rtnFloat($data['condicao_dois']['\'valor_parcela\'']);}
        

        if(isset($data['condicao_um_pj']['\'valor_parcela\''])){$data['condicao_um_pj']['\'valor_parcela\'']=$this->rtnFloat($data['condicao_um_pj']['\'valor_parcela\'']);}
        if(isset($data['condicao_dois_pj']['\'valor_parcela\''])){$data['condicao_dois_pj']['\'valor_parcela\'']=$this->rtnFloat($data['condicao_dois_pj']['\'valor_parcela\'']);}
       

        // condicao 1

        if(isset($data['condicao_um']['\'valor_parcela\'']) && $data['condicao_um']['\'valor_parcela\''] != '' && isset($data['condicao_um']['\'name\'']) && $data['condicao_um']['\'name\''] != ''){
            $cd_um = Condition::create([
                'valor_parcela'=>$data['condicao_um']['\'valor_parcela\''],
                'name'=>$data['condicao_um']['\'name\'']]);
            unset($data['condicao_um']);
            $data['condicao_um_pf']=$cd_um->id;
        }else{
            unset($data['condicao_um']);
        }
        if(isset($data['condicao_dois']['\'valor_parcela\'']) && $data['condicao_dois']['\'valor_parcela\''] != '' && isset($data['condicao_dois']['\'name\'']) && $data['condicao_dois']['\'name\''] != ''){
            $cd_um = Condition::create([
                'valor_parcela'=>$data['condicao_dois']['\'valor_parcela\''],
                'name'=>$data['condicao_dois']['\'name\'']]);
            unset($data['condicao_dois']);
            $data['condicao_dois_pf']=$cd_um->id;
        }else{
            unset($data['condicao_dois']);
        }

        
        if(isset($data['condicao_um_pj']['\'valor_parcela\'']) && $data['condicao_um_pj']['\'valor_parcela\''] != '' && isset($data['condicao_um_pj']['\'name\'']) && $data['condicao_um_pj']['\'name\''] != ''){
            $cd_um = Condition::create([
                'valor_parcela'=>$data['condicao_um_pj']['\'valor_parcela\''],
                'name'=>$data['condicao_um_pj']['\'name\'']]);
            unset($data['condicao_um_pj']);
            $data['condicao_um_pj']=$cd_um->id;
        }else{
            unset($data['condicao_um_pj']);
        }
        if(isset($data['condicao_dois_pj']['\'valor_parcela\'']) && $data['condicao_dois_pj']['\'valor_parcela\''] != '' && isset($data['condicao_dois_pj']['\'name\'']) && $data['condicao_dois_pj']['\'name\''] != ''){
            $cd_um = Condition::create([
                'valor_parcela'=>$data['condicao_dois_pj']['\'valor_parcela\''],
                'name'=>$data['condicao_dois_pj']['\'name\'']]);
            unset($data['condicao_dois_pj']);
            $data['condicao_dois_pj']=$cd_um->id;
        }else{
            unset($data['condicao_dois_pj']);
        }

       
 
        Product::create($data);
        return redirect()->route('products.create')->with('message', 'Item criado com sucesso!!');
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
        $product = Product::findOrFail($id);
        $plans = $this->planRepository->getPlans();
        $themes =  $this->themeRepository->getThemes();
 
        return view('products.edit',compact('product','plans','themes'));
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
        if(isset($data['primeira_parcela_pf'])){$data['primeira_parcela_pf']= $this->rtnFloat($data['primeira_parcela_pf']);}
        if(isset($data['primeira_parcela_pj'])){$data['primeira_parcela_pj']= $this->rtnFloat($data['primeira_parcela_pj']);}

        //condicoes valores
        if(isset($data['condicao_um']['\'valor_parcela\''])){$data['condicao_um']['\'valor_parcela\'']= $this->rtnFloat($data['condicao_um']['\'valor_parcela\'']);}
        if(isset($data['condicao_dois']['\'valor_parcela\''])){$data['condicao_dois']['\'valor_parcela\'']= $this->rtnFloat($data['condicao_dois']['\'valor_parcela\'']);}
        

        if(isset($data['condicao_um_pj']['\'valor_parcela\''])){$data['condicao_um_pj']['\'valor_parcela\'']= $this->rtnFloat($data['condicao_um_pj']['\'valor_parcela\'']);}
        if(isset($data['condicao_dois_pj']['\'valor_parcela\''])){$data['condicao_dois_pj']['\'valor_parcela\'']=$this->rtnFloat($data['condicao_dois_pj']['\'valor_parcela\'']);}
       


        $product = product::findOrFail($id);
        $product->plan_id    = $data['plan_id'];
        $product->theme_id       = $data['theme_id'];
        $product->primeira_parcela_pf       = $data['primeira_parcela_pf'];
        $product->primeira_parcela_pj       = $data['primeira_parcela_pj'];


        // condicção 1 pf
         if(isset($data['condicao_um']['\'valor_parcela\'']) && $data['condicao_um']['\'valor_parcela\''] != '' && isset($data['condicao_um']['\'name\'']) && $data['condicao_um']['\'name\''] != ''){

            if(isset($product->um_pj)){
                $product->um_pf->name = $data['condicao_um']['\'name\''];
                $product->um_pf->valor_parcela = $data['condicao_um']['\'valor_parcela\''];
                $product->um_pf->save();
                //$product->um_pj->name='teste';
            }else{
                $cd_um = Condition::create([
                'valor_parcela'=>$data['condicao_um']['\'valor_parcela\''],
                'name'=>$data['condicao_um']['\'name\'']]);
       
                $product->condicao_um_pf=$cd_um->id;
                $product->save();
            }
            
        }else{
            unset($data['condicao_um']);
        }
        if(isset($data['condicao_dois']['\'valor_parcela\'']) && $data['condicao_dois']['\'valor_parcela\''] != '' && isset($data['condicao_dois']['\'name\'']) && $data['condicao_dois']['\'name\''] != ''){
            if(isset($product->dois_pj)){
                $product->dois_pf->name = $data['condicao_dois']['\'name\''];
                $product->dois_pf->valor_parcela = $data['condicao_dois']['\'valor_parcela\''];
                $product->dois_pf->save();
            }else{
                $cd_um = Condition::create([
                'valor_parcela'=>$data['condicao_dois']['\'valor_parcela\''],
                'name'=>$data['condicao_dois']['\'name\'']]);
       
                $product->condicao_dois_pf=$cd_um->id;
                $product->save();
            }
            
        }else{
            unset($data['condicao_dois']);
        }

       
        /*
                dd($product->tres_pj);
                dd($product->dois_pj);
                dd($product->um_pj);*/

        if(isset($data['condicao_um_pj']['\'valor_parcela\'']) && $data['condicao_um_pj']['\'valor_parcela\''] != '' && isset($data['condicao_um_pj']['\'name\'']) && $data['condicao_um_pj']['\'name\''] != ''){
            if(isset($product->um_pj)){
                $product->um_pj->name = $data['condicao_um_pj']['\'name\''];
                $product->um_pj->valor_parcela = $data['condicao_um_pj']['\'valor_parcela\''];
                $product->um_pj->save();
            }else{
                $cd_um = Condition::create([
                'valor_parcela'=>$data['condicao_um_pj']['\'valor_parcela\''],
                'name'=>$data['condicao_um_pj']['\'name\'']]);
       
                $product->condicao_um_pj=$cd_um->id;
                $product->save();
            }
            
        }else{
            unset($data['condicao_um_pj']);
        }

        if(isset($data['condicao_dois_pj']['\'valor_parcela\'']) && $data['condicao_dois_pj']['\'valor_parcela\''] != '' && isset($data['condicao_dois_pj']['\'name\'']) && $data['condicao_dois_pj']['\'name\''] != ''){
            if(isset($product->dois_pj)){
                $product->dois_pj->name = $data['condicao_dois_pj']['\'name\''];
                $product->dois_pj->valor_parcela = $data['condicao_dois_pj']['\'valor_parcela\''];
                $product->dois_pj->save();
            }else{
                $cd_um = Condition::create([
                'valor_parcela'=>$data['condicao_dois_pj']['\'valor_parcela\''],
                'name'=>$data['condicao_dois_pj']['\'name\'']]);
       
                $product->condicao_dois_pj=$cd_um->id;
                $product->save();
            }
            
        }else{
            unset($data['condicao_dois_pj']);
        }

        

        $product->save();
        return redirect()->route('products.index')->with('message', 'Item Atualizado com sucesso!!');
       
     
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
        switch ($key) {
            case 'credito':
                $rtn = Product::where("$key",'>=',$busca)->with('bem')->with('plano')->orderBy('credito')->get();

                break;
            case 'credito':
                $rtn  = Product::whereHas('plano', function ($query) use ($busca) {
                        $query->where('name', 'like', "%$busca%");
                    })->with(['bem','plano'])->get();

                break;
            
            default:
                $rtn  = Product::whereHas('bem', function ($query) use ($busca){
                        $query->where('codigo', 'like', "%$busca%");
                    })->with(['bem','plano'])->get();
     
                break;
        }

 
        if($rtn->count() > 0){
            
            echo json_encode(["status"=>true,"msg"=>'Achamos!', "rtn"=> $rtn]);exit; 
        }else{
            
            echo json_encode(["status"=>false,"msg"=>'Não encontramos resultados para a busca: '.$busca."<br> Por favor revise e tente novamente..."]);exit; 

        }    

     
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('alert-success','Item bem deletado!!');
    }
}
