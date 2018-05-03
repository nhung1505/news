<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
class AjaxController extends Controller
{
    public function get_types($id_category){
        $types = Type::where('id_category',$id_category)->get();
        foreach($types as $type){
            echo "<option value='".$type->id."'>".$type->name."</option>";
        }
    }
}
