<?php

namespace App\Models;
use File;
use Storage;

class FileUpload
{
    public static function photo($request,$fileName,$folder='logo',$field_id=""){
        
        if($field_id === null){
            $photo = $request->logo;
        }else{
            $photo = $request->logo[$field_id];
        }  

        $name = "";
        $extension = $photo->getClientOriginalExtension();
        $name = $field_id."_".time()."_".rand(111111,999999).".".$extension;
        $ans = Storage::disk($folder)->put($name,file_get_contents($photo));
        $name = Storage::disk($folder)->url($name);


        return $name;
    }
}


