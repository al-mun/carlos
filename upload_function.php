<?php
/******
upload image 
******/

function upload_img(){
	
$originalFile= $_FILES['item_img']; //an object that holds the original file submitted by the user
if($originalFile['size']>0){        //Was something uploaded?
	//print_r($originalFile);
ini_set('memory_limit', '100M');///might have to be commented out on some php servers

$dimensions = getimagesize($originalFile['tmp_name']);



if($dimensions[0]>0){       //is it an image file? only images will return a width

    //print_r($dimensions); //dimensions will give array of width and height
    if($dimensions[0]>=$dimensions[1]){ //is it landscape or portrait?
	
	    $desiredW= 1000;        //my desired end width will be 1000 pixels       hot!
        $desiredH= number_format($dimensions[1] /$dimensions[0] * $desiredW, 2);          //
        
    }
	
    if($dimensions[1]>$dimensions[0]){                  //it is a portrait
	    $desiredH= 1000;                                    //
        $desiredW= number_format($dimensions[0] /$dimensions[1] * $desiredH, 2);
        //print_r($desiredW);
    }

$dest= imagecreatetruecolor($desiredW, $desiredH);      //"file new" a new empty canvas

imageantialias($dest, TRUE);
//smooth on resize.
switch($dimensions[2])                         
    {                                   //is it a........
       case 1:       //GIF
           $src = imagecreatefromgif($originalFile['tmp_name']);
           break;
       case 2:       //JPEG
           $src = imagecreatefromjpeg($originalFile['tmp_name']);
           break;
       case 3:       //PNG
           $src = imagecreatefrompng($originalFile['tmp_name']);
           break;
       default:
           return false;
           break;
    }
imagecopyresampled($dest, $src, 0, 0, 0, 0, $desiredW, $desiredH, $dimensions[0], $dimensions[1]);
//copy original into destination (name of dest, name of original, cropping, original dimesions )
//now the name
$shortname=substr($originalFile['name'], 0, -4);    //chair.png is now chair - lost extension.
	
		if (strlen($shortname)>8){          //if the name now is still longer than 8 characters
		$shortname=substr($shortname, 0, 7);    //leave only the first 8
	}
    
$timestamp=substr(time(), -4, 5);   //give me the last 4 characters of the time in seconds hot...
		
$imageNewName = $shortname.$timestamp;      //concatinate 
$imageNewName  = strtolower($imageNewName); //make lower case

$imageNewName =str_replace("&", "_",$imageNewName);
$imageNewName =str_replace("#", "_",$imageNewName);
$imageNewName =str_replace(" ", "_",$imageNewName); //
$imageNewName =str_replace(".", "_",$imageNewName); //replace unwanted characters hot...

$imageNewName=$imageNewName.".jpg";     //concatinate the extension .jpg


$destURL="item_images/".$imageNewName;  //compose a url for the destination to save to.

imagejpeg($dest,$destURL, 90);      //"save it as a jpg" 80 means quality.

}
else{                              //if the file not an image
$imageNewName="generic.jpg";        //assign a default one
}
return $imageNewName;               //

}
else{                                 //what if no file of any type? 
$imageNewName="generic.jpg";           // give it a default
return $imageNewName;
	
}

}