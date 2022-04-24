<?php

namespace App\Trait;

Trait ImageTrait{
    function saveImage($img, $path){
        $extenstion = $img->getClientOriginalExtension();
        $filename = time().'.'.$extenstion;
        $img->move($path, $filename);
        return $filename;
    }
}