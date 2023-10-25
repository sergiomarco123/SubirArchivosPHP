
<?php
foreach($_FILES['image']['tmp_name'] as $key => $tmp_name){
 if($_FILES['image']["name"][$key]){
     $errors= array();
     $file_name = $_FILES['image']['name'][$key];
     $file_size = $_FILES['image']['size'][$key];
     $file_tmp = $_FILES['image']['tmp_name'][$key];
     $file_type = $_FILES['image']['type'][$key];
     $file_ext=strtolower(end(explode('.',$_FILES['image']['name'][$key])));
     $tamaño_archivos=0;
     
     $expensions= array("jpg","png");
     
     if(in_array($file_ext,$expensions)=== false){
         $errors[]="ERROR, no se ha subido el archivo:$file_name no permitido, elige un archivo JPG o PNG.";
     }
     $tamaño_archivos=$tamaño_archivos+$file_size;

     if($file_size > 200000 || $tamaño_archivos > 300000) {
         $errors[]="<b>ERROR. El archivo no puede pesar mas de 200kb o 300kb</b>";
     }
     if(file_exists($file_name)){
         $errors[]="<b>ERROR,no se ha subido el archivo:$file_name. El archivo ya existe</b>";
     }
     
     if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"./imgusers/".$file_name);
         echo "Success";
     }else{
         print_r($errors);
     }
 }
}
?>
    <html>
        <body>
         <ul>
            <li>SArchivo enviado: <?php echo $_FILES['image']['name'][$key];  ?>
            <li>Tamaño: <?php echo $_FILES['image']['size'][$key];  ?>
            <li>Tipo: <?php echo $_FILES['image']['type'][$key] ?>
         </ul>  
        </body>
    </html>



