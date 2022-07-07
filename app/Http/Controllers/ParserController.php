<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Services\ParserService;

class ParserController extends Controller
{
//    public array $vehicles = array();
//    public array $arr = array();

    public function __invoke(ParserService $service)
    {
        $service->setLink(asset('/assets/data.xml'))->parsing();
        $goods = Good::select()->get();
        return view('content/goods', ['goods' => $goods]);
//        $this->vehicles = $vehicles;
//        return $this->vehicles;
    }

//    public function showRes()
//    {
//        echo '<pre>';
//        var_dump($this->vehicles);
//    }

//    public function findEquipment()
//    {
//        if (is_array($this->vehicles)) {
//            echo 'ya';
//        } else {
//            echo 'no';
//        }
//        $data = json_encode($this->vehicles);
//        var_dump($data);
//        $arr = [];
//            foreach ($this->vehicles as $elem){
//                if(is_array($elem)){
//                    for($i = 0; count($elem); $i++){
//                        $arr[] =  $elem[$i];
//                    }
//                }
//            }
//            var_dump($arr);
//        for($i = 0; $i < count($this->vehicles); $i++){
//            echo $i;
//        }
//    }
}
