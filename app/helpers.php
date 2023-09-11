<?php


 /**
  * MAKE AVATAR FUNCTION
  */
  if(!function_exists('makeAvatar')){

       function makeAvatar($fontPath, $dest, $char){
           $path = $dest;
           $image = imagecreate(200,200);
           $red = random_int(0,255);
           $green = random_int(0,255);
           $blue = random_int(0,255);
           imagecolorallocate($image,$red,$green,$blue);
           $textcolor = imagecolorallocate($image,255,255,255);
           imagettftext($image,100,0,50,150,$textcolor,$fontPath,$char);
           imagepng($image,$path);
           imagedestroy($image);
           return $path;
       }
  }

?>