<?php

function compressImage($file,$resolution,$quality,$location){

    if (file_exists($file)) {
      $imageInfo = getimagesize($file);
      $imageFormat = $imageInfo['mime'];

     switch ($imageFormat) {
       case 'image/jpeg':
         $original_image = imagecreatefromjpeg($file);
         break;
       case 'image/png':
         $original_image = imagecreatefrompng($file);
         break;
       case 'image/gif':
         $original_image = imagecreatefromgif($file);
         break;

       default:
        $original_image = imagecreatefromjpeg($file);
         break;
     }
     $original_width = imagesx($original_image);
     $original_height = imagesy($original_image);

     $ratio = $resolution/$original_width;
     $new_width = $resolution;
     $new_height = $original_height * $ratio;

     if ($new_height > $resolution) {
     $ratio = $resolution/$new_height;
     $new_height = $resolution;
     $new_width = $new_width * $ratio;
     }

     $new_image = imagecreatetruecolor($new_width, $new_height);

     imagecopyresampled($new_image,$original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

     imagejpeg($new_image,$location,$quality);
    
    }
   
  }



function PostcompressVideo($video,$filename){
    $resolution = "400*350";

    $command = "ffmpeg/bin/ffmpeg -i $video -s $resolution \"tutorialuploads/".$filename."\" > logfile.txt 2>&1";
    shell_exec($command);
                
 }


?>