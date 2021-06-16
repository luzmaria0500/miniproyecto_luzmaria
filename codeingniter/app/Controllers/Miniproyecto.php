<?php

namespace App\Controllers;
use App\Models\GeneralModel;

class Home extends BaseController
{
	public function index()
	{
$gModel = new GeneralModel( );
$mensaje = session('mensaje')
$datos = $gModel->listarTodo( );
$data = ["datos" => $datos,
"mensaje" => $mensaje ];
return view ('listado' ,$data);
}

Public function obtenerDatos($id){

$gModel = new GeneralModel( );
$datos = ["id" => $id];
$respuesta = $gModel->obtenerInformacion($data);


$datos = ["datos" => $respuesta];
return view('actualizar, $datos);
}

Public function insertar(){
$gModel = new GeneralModel( );
$data = [
"nombre" => $_POST['nombre'], " a_paterno" => $_POST['apaterno'],
"a_materno" => $_POST['amaterno'],

];

$respuesta = $gModel -> insertar($data);
if ( $respuesta > 0){
return redirect( )->to(base_url('/index.php'))->With('mensajes','0');
}else{

return redirect( )->to(base_url('/index.php'))->With('mensajes','1');
}
}

Public function actualizar(){
$gModel = new GeneralModel( );
$data = [
"nombre" => $_POST['nombre'], " a_paterno" => $_POST['apaterno'],
"a_materno" => $_POST['amaterno'],

];

$id = ["id" => $_POST['id']];
$respuesta = $gModel->actualizar ($data,$id);

if ($respuesta){
return redirect( )->to(base_url('/index.php'))->With('mensajes','2');
}else{

return redirect( )->to(base_url('/index.php'))->With('mensajes','3');
}
}

Public function eliminar($dPersona){
$gModel = new GeneralModel( );
$id =["id" => $idPersona];
$respuesta = $gModel->eliminar ($id);

if ($respuesta){
return redirect( )->to(base_url('/index.php'))->With('mensajes','4');
}else{

return redirect( )->to(base_url('/index.php'))->With('mensajes','5');
}
}
}
