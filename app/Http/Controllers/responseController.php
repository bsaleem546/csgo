<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\inventory;
use App\skin;
use URL;

class responseController extends Controller
{
    

    function upgradeInSelect($id){
        if(Auth::check()){
            $id = base64_decode($id);
            $data = inventory::find($id);
            $lbl = explode(' | ', $data->skin->hash_name);
            $price = empty($data->skin->skin_price) ? 'Free' : number_format($data->skin->skin_price, 2).' $';
            return '<img class="img-fluid removeStack" data-ski="'.base64_encode($data->skin->id).'" data-sk="'.$data->skin->id.'-'.$data->skin->thumbnail.'" data-label="'.$lbl[0].'" data-label2="'.$lbl[1].'" data-price="'.$data->skin->skin_price.'" data-id="'.base64_encode($data->id).'" src="'.URL::to('/dist/web/assets/images/skins/'.$data->skin->id.'-'.$data->skin->thumbnail).'">|'.$data->skin->hash_name.'|'.$price.'|'.base64_encode($data->id); 
        }else{
            return redirect('/')->with('error', 'Please login with Steam ID');
        }
    }

    function upgradeInSkin($price, $type){
        if(Auth::check()){
            $target = 0;
            if($type == 1){
            	$target = $price;
            }elseif($type == 2){
            	$target = $price+(($price/100)*50);
            }elseif($type == 3){
            	$target = $price*2;
            }elseif($type == 4){
            	$target = $price*5;
            }

            $skins = skin::where('skin_price', '>', $price)->where('skin_price', '<=', $target)->orderBy('skin_price', 'DESC')->limit(24)->get();
            $skcount = skin::count();

            return view('web.response.upgradeSkin', ['skins' => $skins, 'skcount' => $skcount]); 

            //return $price.'|'.$target;
        }else{
            return redirect('/')->with('error', 'Please login with Steam ID');
        }
    }

    function upgradeInSkinFil($price, $fprice){
        if(Auth::check()){

            $skins = skin::where('skin_price', '>', $price)->where('skin_price', '<=', $fprice)->orderBy('skin_price', 'DESC')->limit(24)->get();
            $skcount = skin::count();

            return view('web.response.upgradeSkin', ['skins' => $skins, 'skcount' => $skcount]); 

            //return $price.'|'.$target;
        }else{
            return redirect('/')->with('error', 'Please login with Steam ID');
        }
    }

    function upgradeUpSelect($id){
        if(Auth::check()){
            $id = base64_decode($id);

            $data = skin::find($id);
            $price = empty($data->skin_price) ? 'Free' : number_format($data->skin_price, 2).' $';
            
            return '<img class="img-fluid" src="'.URL::to('/dist/web/assets/images/skins/'.$data->id.'-'.$data->thumbnail).'">|'.$data->hash_name.'|'.$price.'|'.base64_encode($data->id); 
        }else{
            return redirect('/')->with('error', 'Please login with Steam ID');
        }
    }

    function upgradeResult($price, $items, $id2){
        if(Auth::check()){
            $itemsarr = explode('|', $items);
            $id2 = base64_decode($id2);
            $per = 99;
            $winodd = rand(1, 100);
            $winres = '0';

                $price1 = $price;

                $data2 = skin::find($id2);
                $price2 = $data2->skin_price;
                
                $space =  $price2/$price1;
                $per = 90/$space;
            
                $spoint = 1;
                $epoint = $per;

                if($winodd >= $spoint && $winodd <= $epoint){
                    $winres = '1';
                }

                if($winres == '1'){
                    foreach ($itemsarr as $key => $value) {
                        inventory::destroy(base64_decode($value));
                    }
                    inventory::addItem($id2);

                    return 'win';
                }else{
                    foreach ($itemsarr as $key => $value) {
                        inventory::destroy(base64_decode($value));
                    }

                    return 'loss';
                }
        }else{
            return redirect('/')->with('error', 'Please login with Steam ID');
        }
    }
}
