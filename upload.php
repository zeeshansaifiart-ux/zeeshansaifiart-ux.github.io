<?php
$uploadDir = "uploads/";
$jsonFile = "gallery.json";

if(!is_dir($uploadDir)){
    mkdir($uploadDir, 0777, true);
}

$imageName = time().'_'.basename($_FILES["image"]["name"]);
$targetFile = $uploadDir . $imageName;

if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){

    $images = [];
    if(file_exists($jsonFile)){
        $images = json_decode(file_get_contents($jsonFile), true);
    }

    $images[] = $imageName;
    file_put_contents($jsonFile, json_encode($images));

    echo "Image Uploaded Successfully <br><a href='addimg.html'>Upload More</a>";
}else{
    echo "Upload Failed";
}
?>
