<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\MaterialModel;
use App\Models\TypeModel;
use App\Models\ConvertModel;
use Session;
use Cookie;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    //Hamf get dữ liệu nguyên liệu
    public function material(){
        $arrayMate = array();
        $model = MaterialModel::get_all();
        foreach ($model as $row){
            $arrayMate[] = array($row->id,
                              $row->producer_id,
                              $row->title_name,
                              $row->quantity,
                              $row->importprice,
                              $row->importdate,                              
                              "Kg",
                              $row->status);
        }     
        return $arrayMate;
    }
    //Hàm get dữ liệu  
    public function product(){
        $arrayMate = array();
        $model = ProductModel::get_all();
        foreach ($model as $row){
            $arrayMate[] = array($row->id,
                                $row->name,
                              $row->type_id,                                                        
                              $row->saleprice,
                              $row->dates,
                              $row->status);
        }     
        return $arrayMate;
    }
    //Convert id sang name
    public function convert_to_name(){        
        $arraymain = $this->product();
        $arrayResult = array();
        foreach($arraymain as $row)
        {            
            $title = "";
            $model = TypeModel::get_type($row[2]);
            foreach($model as $roww)
            {
                $title=$roww->title_name;
            }
           
            $arrayResult[] = array($row[0],                                   
                                    $row[1],
                                   $title,                                                                      
                                   $row[3],                             
                                   $row[4],
                                   $row[5]);
        }
        return $arrayResult;
    }
    //Hiện giao diện 
    public function open_class(){                
        if(CheckController::check_session()) {
            return view('pages.Product.product_management')
                ->with('arrayMate', $this->convert_to_name());
        }else{
            return view('admin_login');
        }
    }
    
    public function hidden_type(Request $request){
        ProductModel::set_status_product($request->get('id'),0);
        return $this->open_class();
    }

    public function unhidden_type(Request $request){
        ProductModel::set_status_product($request->get('id'),1);
        return $this->open_class();
    }

    //Hàm thêm sản phẩm
    public function add_product(){
        $id = ProductModel::select_product_end() + 1;
        if(CheckController::check_session()) {
            return view('pages.Product.product_add_management')
                        ->with('arrayMate', $id);
        }else{
            return view('admin_login');
        }
    }

    public function add_product_save(Request $request){
        $id         = $request->input('id');
        $name       = $request->input('name');
        $type       = $request->input('type_id');
        $saleprice  = $request->input('saleprice');
        $datepicker = $request->input('datepicker');
        $arrayproduct=array($id,
                            $name,
                            $type,
                            $saleprice,
                            $datepicker ,
                            $this->material());
        $request->session()->put('id',$id);
        $request->session()->put('name',$name);
        $request->session()->put('type',$type);
        $request->session()->put('saleprice',$saleprice);
        $request->session()->put('datepicker',$datepicker);
        return view('pages.Product.product_add_consume')
                ->with('arrayMate', $arrayproduct);
    }

    public function save(Request $request){
        $id = $request->session()->pull('id');
        $name = $request->session()->pull('name');
        $type = $request->session()->pull('type');
        $saleprice = $request->session()->pull('saleprice');
        $datepicker = $request->session()->pull('datepicker');
        ProductModel::insert($id,$name,$type,$saleprice,$datepicker,1);
        $i = 0;
        $count = MaterialModel::select_material_end();
        for($i;$i<$count;$i++)
        {
            $materialid = $i+1;
            $quantity = $request->input(''.$i);
            if($quantity == 0 )
                continue;
            ConvertModel::insert($id,$materialid,$quantity);
        }
        return $this->open_class();
    }
}

?>