<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\TypeModel;
use Session;
use Cookie;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class ProductController extends Controller
{
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
            $temp = "";
            $title = "";
            $model = TypeModel::get_type($row[1]);
            foreach($model as $roww)
            {
                $title=$roww->title_name;
            }
            switch($row[0]){
                case 1: $temp = "Cà phê đen"; break;
                case 2: $temp = "Cà phê sữa"; break;
                case 3: $temp = "Bạc xỉu"; break;
                case 4: $temp = "Trà sen vàng"; break;
                case 5: $temp = "Trà đào sả"; break;
                case 6: $temp = "Trà đào sữa"; break;
                case 7: $temp = "Bánh tiramisu"; break;
                case 8: $temp = "Bánh Mouse Đào"; break;
                case 9: $temp = "Bánh Mouse Chanh dây"; break;
                case 10: $temp = "Trà xanh đá xay"; break;
                case 11: $temp = "Socola đá xay"; break;
                case 12: $temp = "Cookie&Cream"; break;
            }
            $arrayResult[] = array($row[0],
                                   $title,
                                   $row[2],
                                   $row[3],                             
                                   $row[4],
                                   $temp);
        }
        return $arrayResult;
    }
    //Hiện giao diện 
    public function open_class(){                
        if(CheckController::check_session()) {
            return view('pages.product_management')
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
}

?>