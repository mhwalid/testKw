@php
    // Fonction Redimension Image
function redimimage($dimension, $file_name, $dst){
    $image_size = getimagesize($file_name);
    $width = $image_size[0];
    $height = $image_size[1];
    $ratio = $width / $height;
    if ($ratio > 1)
    {
        $new_width = $dimension;
        $new_height = $dimension / $ratio;
    }
    else
    {
        $new_height = $dimension;
        $new_width = $dimension * $ratio;
    }
    $src = imagecreatefromstring(file_get_contents($file_name));
    $destination = imagecreatetruecolor($new_width, $new_height);
    imagecopyresampled($destination, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    imagejpeg($destination, $dst);
    }
    // // // Récupération image // // //
    $i=1;
    $j=0;
    $iditem=$_POST['iditem'];
    mkdir("asset/item/images/$iditem", 0700);
    foreach ($_POST['image'] as $key => $image) {
        //Medium
       $foldermedium = 'asset/item/images/'.$iditem.'/Medium'.$i.'.jpg';
       redimimage(500,$key, $foldermedium);
        //Small
        $foldersmall = 'asset/item/images/'.$iditem.'/Small'.$i.'.jpg';
        redimimage(243,$key, $foldersmall);
        //Cart
        $foldercart = 'asset/item/images/'.$iditem.'/Cart'.$i.'.jpg';
        redimimage(212,$key, $foldercart);
        $i++;
    }
    if(count($_FILES['manualadd_images']['name'])>0){
        while($j<count($_FILES['manualadd_images']['name'])){
            redimimage(212,$_FILES['manualadd_images']['tmp_name'][$j], 'asset/item/images/'.$iditem.'/Cart'.$i.'.jpg');
            redimimage(243,$_FILES['manualadd_images']['tmp_name'][$j], 'asset/item/images/'.$iditem.'/Small'.$i.'.jpg');
            redimimage(500,$_FILES['manualadd_images']['tmp_name'][$j], 'asset/item/images/'.$iditem.'/Medium'.$i.'.jpg');
            $j++;
            $i++;
        }
    }
    // // // Fin récupération image // // //
@endphp