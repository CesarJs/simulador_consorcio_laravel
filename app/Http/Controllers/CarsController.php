<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CarRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProviderRepository;
use App\Car;
use App\Product;
use App\Category;
use App\Provider;
use App\Condition;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $repository;
    private $categoryRepository;
    private $providerRepository;

    public function __construct(CarRepository $repository, CategoryRepository $categoryRepository, ProviderRepository $providerRepository){
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
        $this->providerRepository = $providerRepository;

    }

    public function index()
    {
        //
        $cars = Car::orderBy('created_at', 'desc')->paginate(10);
        return view('cars.index',['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = $this->categoryRepository->getCategories();
        $providers =  $this->providerRepository->getProviders();
        return view('cars.create',compact('categories','providers'));
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
        if(isset($data['primeira_parcela_pf'])){$data['primeira_parcela_pf']=$this->rtnFloat($data['primeira_parcela_pf']);}
        if(isset($data['primeira_parcela_pj'])){$data['primeira_parcela_pj']=$this->rtnFloat($data['primeira_parcela_pj']);}
        //condicoes valores
        if(isset($data['condicao_um']['\'valor_parcela\''])){$data['condicao_um']['\'valor_parcela\'']=$this->rtnFloat($data['condicao_um']['\'valor_parcela\'']);}
        if(isset($data['condicao_dois']['\'valor_parcela\''])){$data['condicao_dois']['\'valor_parcela\'']=$this->rtnFloat($data['condicao_dois']['\'valor_parcela\'']);}
        if(isset($data['condicao_tres']['\'valor_parcela\''])){$data['condicao_tres']['\'valor_parcela\'']=$this->rtnFloat($data['condicao_tres']['\'valor_parcela\'']);}

        if(isset($data['condicao_um_pj']['\'valor_parcela\''])){$data['condicao_um_pj']['\'valor_parcela\'']=$this->rtnFloat($data['condicao_um_pj']['\'valor_parcela\'']);}
        if(isset($data['condicao_dois_pj']['\'valor_parcela\''])){$data['condicao_dois_pj']['\'valor_parcela\'']=$this->rtnFloat($data['condicao_dois_pj']['\'valor_parcela\'']);}
        if(isset($data['condicao_tres_pj']['\'valor_parcela\''])){$data['condicao_tres_pj']['\'valor_parcela\'']=$this->rtnFloat($data['condicao_tres_pj']['\'valor_parcela\'']);}


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

        if(isset($data['condicao_tres']['\'valor_parcela\'']) && $data['condicao_tres']['\'valor_parcela\''] != '' && isset($data['condicao_tres']['\'name\'']) && $data['condicao_tres']['\'name\''] != ''){
            $cd_um = Condition::create([
                        'valor_parcela'=>$data['condicao_tres']['\'valor_parcela\''],
                        'name'=>$data['condicao_tres']['\'name\'']
                    ]);
            unset($data['condicao_tres_pf']);
            $data['condicao_tres_pf']=$cd_um->id;
        }else{
            unset($data['condicao_tres']);
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

        if(isset($data['condicao_tres_pj']['\'valor_parcela\'']) && $data['condicao_tres_pj']['\'valor_parcela\''] != '' && isset($data['condicao_tres_pj']['\'name\'']) && $data['condicao_tres_pj']['\'name\''] != ''){
            $cd_um = Condition::create([
                        'valor_parcela'=>$data['condicao_tres_pj']['\'valor_parcela\''],
                        'name'=>$data['condicao_tres_pj']['\'name\'']
                    ]);
            unset($data['condicao_tres_pj']);
            $data['condicao_tres_pj']=$cd_um->id;
        }else{
            unset($data['condicao_tres_pj']);
        }

 
        Car::create($data);
        return redirect()->route('cars.index')->with('message', 'Item criado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buscar(Request $request){
        $data = $request->all();
        $valores = explode(';', $data['range']);
        switch ($data['keyTipo']) {
            case 'credito':
                # code...
                $resultados = Car::whereBetween('credito', $valores)->where('category_id',$data['categoria'])->get();
                break;
            case 'parcela':
                # code...
                $resultados = Car::whereBetween('primeira_parcela_pf', $valores)->where('category_id',$data['categoria'])->get();
                break;
            default:
                # code...
                break;
        }
        
        return view('resultados',compact('resultados'),['categoria'=>$data['categoria']]);
        
    }
    public function retornaValoresLimite(Request $request){
        $data = $request->all();

        $cat = $data['cat'];
        $cars  = Product::whereHas('bem', function ($query) use ($cat) {
                        $query->where('category_id',  $cat);
                    })->get();


        switch ($data['keyTipo']) {
            case 'credito':
                $rtn = [
                    'min'=>$cars->min('credito'),
                    'max'=>$cars->max('credito')
                    ];
                break;
            case 'parcela':
                $rtn =[
                    'min' => $cars->min('primeira_parcela_pj'),
                    'max' => $cars->max('primeira_parcela_pj')
                ];
                break;
            default:
                # code...
                break;
        }
        if(isset($rtn['min'])){}else{$rtn['min']=0;}
        if(isset($rtn['max'])){}else{$rtn['max']=500000;}
        

        echo json_encode(["status"=>true,"msg"=>'Valores encontrados!', "rtn"=> $rtn]);exit; 
    }
    public function find($key,$busca) //busca no adminitrador
    {
        //
        $rtn = Car::where("$key",'LIKE',"%$busca%")->with('category')->with('provider')->get();

 
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
        $car = Car::findOrFail($id);
        $categories = $this->categoryRepository->getCategories();
        $providers =  $this->providerRepository->getProviders();
        return view('cars.edit',compact('car','categories','providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rtnFloat($number){
        $temp = str_replace(',', '.', str_replace('.', '', $number));

        return $temp;
    }
    public function update(Request $request, $id)
    {   $data=$request->all();
        if(isset($data['credito'])){$data['credito']= $this->rtnFloat($data['credito']);}

        if(isset($data['primeira_parcela_pf'])){$data['primeira_parcela_pf']= $this->rtnFloat($data['primeira_parcela_pf']);}
        if(isset($data['primeira_parcela_pj'])){$data['primeira_parcela_pj']= $this->rtnFloat($data['primeira_parcela_pj']);}

        //condicoes valores
        if(isset($data['condicao_um']['\'valor_parcela\''])){$data['condicao_um']['\'valor_parcela\'']= $this->rtnFloat($data['condicao_um']['\'valor_parcela\'']);}
        if(isset($data['condicao_dois']['\'valor_parcela\''])){$data['condicao_dois']['\'valor_parcela\'']= $this->rtnFloat($data['condicao_dois']['\'valor_parcela\'']);}
        if(isset($data['condicao_tres']['\'valor_parcela\''])){$data['condicao_tres']['\'valor_parcela\'']= $this->rtnFloat($data['condicao_tres']['\'valor_parcela\'']);}

        if(isset($data['condicao_um_pj']['\'valor_parcela\''])){$data['condicao_um_pj']['\'valor_parcela\'']= $this->rtnFloat($data['condicao_um_pj']['\'valor_parcela\'']);}
        if(isset($data['condicao_dois_pj']['\'valor_parcela\''])){$data['condicao_dois_pj']['\'valor_parcela\'']=$this->rtnFloat($data['condicao_dois_pj']['\'valor_parcela\'']);}
        if(isset($data['condicao_tres_pj']['\'valor_parcela\''])){$data['condicao_tres_pj']['\'valor_parcela\'']=$this->rtnFloat($data['condicao_tres_pj']['\'valor_parcela\'']);}


        $car = Car::findOrFail($id);
        $car->codigo        = $data['codigo'];
        $car->descricao_do_bem = $data['descricao_do_bem'];
        $car->category_id    = $data['category_id'];
        $car->provider_id       = $data['provider_id'];
        $car->credito       = $data['credito'];
        $car->primeira_parcela_pf       = $data['primeira_parcela_pf'];
        $car->primeira_parcela_pj       = $data['primeira_parcela_pj'];


        // condicção 1 pf
         if(isset($data['condicao_um']['\'valor_parcela\'']) && $data['condicao_um']['\'valor_parcela\''] != '' && isset($data['condicao_um']['\'name\'']) && $data['condicao_um']['\'name\''] != ''){

            if(isset($car->um_pj)){
                $car->um_pf->name = $data['condicao_um']['\'name\''];
                $car->um_pf->valor_parcela = $data['condicao_um']['\'valor_parcela\''];
                $car->um_pf->save();
                //$car->um_pj->name='teste';
            }else{
                $cd_um = Condition::create([
                'valor_parcela'=>$data['condicao_um']['\'valor_parcela\''],
                'name'=>$data['condicao_um']['\'name\'']]);
       
                $car->condicao_um_pf=$cd_um->id;
                $car->save();
            }
            
        }else{
            unset($data['condicao_um']);
        }
        if(isset($data['condicao_dois']['\'valor_parcela\'']) && $data['condicao_dois']['\'valor_parcela\''] != '' && isset($data['condicao_dois']['\'name\'']) && $data['condicao_dois']['\'name\''] != ''){
            if(isset($car->dois_pj)){
                $car->dois_pf->name = $data['condicao_dois']['\'name\''];
                $car->dois_pf->valor_parcela = $data['condicao_dois']['\'valor_parcela\''];
                $car->dois_pf->save();
            }else{
                $cd_um = Condition::create([
                'valor_parcela'=>$data['condicao_dois']['\'valor_parcela\''],
                'name'=>$data['condicao_dois']['\'name\'']]);
       
                $car->condicao_dois_pf=$cd_um->id;
                $car->save();
            }
            
        }else{
            unset($data['condicao_dois']);
        }

        if(isset($data['condicao_tres']['\'valor_parcela\'']) && $data['condicao_tres']['\'valor_parcela\''] != '' && isset($data['condicao_tres']['\'name\'']) && $data['condicao_tres']['\'name\''] != ''){
            if(isset($car->tres_pj)){
                $car->tres_pf->name = $data['condicao_tres']['\'name\''];
                $car->tres_pf->valor_parcela = $data['condicao_tres']['\'valor_parcela\''];
                $car->tres_pf->save();
            }else{
                $cd_um = Condition::create([
                'valor_parcela'=>$data['condicao_tres']['\'valor_parcela\''],
                'name'=>$data['condicao_tres']['\'name\'']]);
       
                $car->condicao_tres_pf=$cd_um->id;
                $car->save();
            }
            
        }else{
            unset($data['condicao_tres']);
        }
        /*
                dd($car->tres_pj);
                dd($car->dois_pj);
                dd($car->um_pj);*/

        if(isset($data['condicao_um_pj']['\'valor_parcela\'']) && $data['condicao_um_pj']['\'valor_parcela\''] != '' && isset($data['condicao_um_pj']['\'name\'']) && $data['condicao_um_pj']['\'name\''] != ''){
            if(isset($car->um_pj)){
                $car->um_pj->name = $data['condicao_um_pj']['\'name\''];
                $car->um_pj->valor_parcela = $data['condicao_um_pj']['\'valor_parcela\''];
                $car->um_pj->save();
            }else{
                $cd_um = Condition::create([
                'valor_parcela'=>$data['condicao_um_pj']['\'valor_parcela\''],
                'name'=>$data['condicao_um_pj']['\'name\'']]);
       
                $car->condicao_um_pj=$cd_um->id;
                $car->save();
            }
            
        }else{
            unset($data['condicao_um_pj']);
        }

        if(isset($data['condicao_dois_pj']['\'valor_parcela\'']) && $data['condicao_dois_pj']['\'valor_parcela\''] != '' && isset($data['condicao_dois_pj']['\'name\'']) && $data['condicao_dois_pj']['\'name\''] != ''){
            if(isset($car->dois_pj)){
                $car->dois_pj->name = $data['condicao_dois_pj']['\'name\''];
                $car->dois_pj->valor_parcela = $data['condicao_dois_pj']['\'valor_parcela\''];
                $car->dois_pj->save();
            }else{
                $cd_um = Condition::create([
                'valor_parcela'=>$data['condicao_dois_pj']['\'valor_parcela\''],
                'name'=>$data['condicao_dois_pj']['\'name\'']]);
       
                $car->condicao_dois_pj=$cd_um->id;
                $car->save();
            }
            
        }else{
            unset($data['condicao_dois_pj']);
        }

        if(isset($data['condicao_tres_pj']['\'valor_parcela\'']) && $data['condicao_tres_pj']['\'valor_parcela\''] != '' && isset($data['condicao_tres_pj']['\'name\'']) && $data['condicao_tres_pj']['\'name\''] != ''){

            if(isset($car->tres_pj)){
                $car->tres_pj->name = $data['condicao_tres_pj']['\'name\''];
                $car->tres_pj->valor_parcela = $data['condicao_tres_pj']['\'valor_parcela\''];
                $car->tres_pj->save();
            }else{
                $cd_um = Condition::create([
                'valor_parcela'=>$data['condicao_tres_pj']['\'valor_parcela\''],
                'name'=>$data['condicao_tres_pj']['\'name\'']]);
       
                $car->condicao_tres_pj=$cd_um->id;
                $car->save();
            }
            
        }else{
            unset($data['condicao_tres_pj']);
        }


        $car->save();
        return redirect()->route('cars.index')->with('message', 'Item Atualizado com sucesso!!');
       
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('cars.index')->with('alert-success','Item bem deletado!!');
    }
}
