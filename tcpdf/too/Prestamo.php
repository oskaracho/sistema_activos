<?php
//============================================================+
// File name   : example_048.php
// Begin       : 2009-03-20
// Last Update : 2013-05-14
//
// Description : Example 048 for TCPDF class
//               HTML tables and table headers
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: HTML tables and table headers
 * @author Nicola Asuni
 * @since 2009-03-20
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
    require_once $_SERVER['DOCUMENT_ROOT']."/sistema_activos/clases/activo.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/sistema_activos/clases/ambiente.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/sistema_activos/clases/movimientos.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/sistema_activos/clases/usuario.php";

// get data from users table
		if(isset($_GET['mov'])){
			$id=$_GET['mov'];
		}
      $pre=Solicitud_movimiento::solicitud_por_id($id);
        $mov=Ambiente::encontrar_ambiente($pre->idAmbiente);
        $activo=Activo::encontrar_activo($pre->idActivo);
     $Sol_movimiento=$pre->idSol_movimiento;
     $cantidad=$pre->cantidad;
     $idSolicitante=$pre->idSolicitante;
     $fecha_generada=$pre->fecha_generada;
     $fecha_requerida=$pre->fecha_requerida;
     $idEstado=$pre->idEstado;
     $fecha_realizada=$pre->fecha_realizada;
     $idUsuario=$pre->idUsuario;
     $fecha_generada = date("d-m-Y", strtotime($fecha_generada));
     $fecha_requerida = date("d-m-Y", strtotime($fecha_requerida));
     $fecha_realizada = date("d-m-Y", strtotime($fecha_realizada));


     $nombre_ac=$activo->nombre_ac;
     $id_ac=$activo->idActivo;

      $nomb=Usuario::encontrar_por_id($idUsuario);
      $ci=$nomb->ci;
      $nombre=$nomb->nombre;
      $apellido=$nomb->apellido;

      $nom_am=$mov->nombre_am;
      $ubi_am=$mov->idLocal;

      if($idEstado==1){$estado="Urgente";}
      if($idEstado==2){$estado="Moderado";}
      if($idEstado==5){$estado="Aceptado";}

      if($ubi_am==1){$ubicacion="Piso 1";}
      if($ubi_am==2){$ubicacion="Piso 2";}
      if($ubi_am==3){$ubicacion="Piso 3";}
      if($ubi_am==4){$ubicacion="Piso 4";}
      if($ubi_am==5){$ubicacion="Piso 5";}
      if($ubi_am==6){$ubicacion="Piso 6";}
      if($ubi_am==7){$ubicacion="Penhouse";}
      if($ubi_am==8){$ubicacion="Planta Alta";}
      if($ubi_am==9){$ubicacion="Planta Baja";}
      if($ubi_am==10){$ubicacion="Sub suelo";}

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetMargins(30,10,25,50);

// ---------------------------------------------------------
// set margins
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);// add a page
$pdf->AddPage();
$image_file = K_PATH_IMAGES.'alpha.png';


$pdf->SetFont('helvetica', '', 10);


// set default header data
$htmlcontent = '
<style>
table, tr, td {
    border: 1px solid black;
    border-collapse: collapse;
}
table, tr, td {
    padding: 5px;
}
</style>
            <h1 style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"HOTEL IMPERIAL"</h1>
            <h2 style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SOLICITUD MOVIMIENTO DE ACTIVO<br><br></h2>
  <table style="width:100%;">
  <tr>
    <td colspan="3" style="text-align: center;"><h2>&nbsp;N°Solicitud '.$Sol_movimiento.'</h2></td>
  </tr>
  <tr>
    <td><b>Solicitud de:</b></td>
  </tr>
  <tr>
    <td >Codigo: '.$id_ac.' </td>
    <td >Nombre: '.$nombre_ac.'</td>
    <td >Cantidad: '.$cantidad.'</td>
  </tr>
  <tr>
    <td ><b>Destino:</b> </td>
  </tr>
  <tr>
    <td >Ambiente: '.$nom_am.' </td>
    <td >Ubicacion: '.$ubicacion.' </td>
    <td >De caracter: '.$estado.' </td>
  </tr>
 <br><br>
  <tr>
    <td colspan="3" style="text-align: center;"><h2>&nbsp;DATOS TECNICOS DE LA SOLICITUD</h2></td>
  </tr>
 <br><br>

  <tr>
    <td ><b>Fecha Generada:</b> </td>
    <td > '.$fecha_generada.'</td>
  </tr>
  <tr>
    <td ><b>Fecha Requerida:</b> </td>
    <td >'.$fecha_requerida.' </td>
  </tr>
  <tr>
    <td ><b>Fecha Ejecutada:</b> </td>
    <td >'.$fecha_realizada.' </td>
  </tr>
  <tr>
    <td ><b>Ejecutado por:</b> </td>
  </tr>
  <tr>
    <td >Ci:'.$ci.' </td>
    <td >Nombre:'.$nombre.' </td>
    <td >Apellido:'.$apellido.' </td>
  </tr>
  <br><br><br><br><br>
  <br><br><br><br><br>
  <br><br><br><br><br>
  <tr>
    <td style="width:200px; text-decoration: overline;"><p style="text-align: center;"><strong>FIRMA DEL JEFE DE ALMACEN</strong></p></td>
    <td style="width:200px; text-decoration: overline;"><p style="text-align: center;"><strong>FIRMA DEL JEFE DE AREA</strong></p></td>
  </tr>
  
  </table>



'; 

$w = 30;
$h = 30;
// Example of Image from data stream ('PHP rules')
$ser='images/hotel.jpg';
$pdf->Image($ser, 20, 17, $w, $h, 'JPG', '', '', false, 300, '', false, false, 0, 0, false, false);
//$image_mask = $pdf->Image("images/image_alpha.png", 50, 50, 100, '', '', '', '', false, 300, '', true, false);
//$pdf->Image("images/image.png", 50, 50, 100, '', '', '', '', false, 300, '', false, $image_mask);

$pdf->writeHTML($htmlcontent, true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();


// -----------------------------------------------------------------------------
//Close and output PDF document
$pdf->Output('prestamo.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+