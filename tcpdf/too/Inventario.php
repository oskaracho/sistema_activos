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
    require_once $_SERVER['DOCUMENT_ROOT']."/sistema_activos/clases/inventario.php";

// get data from users table
		if(isset($_GET['inv'])){
			$id=$_GET['inv'];
		}
      $inv=Inventario::inventario_por_id($id);
     $idInventario_am=$inv->idInventario_am;
     $idAmbiente=$inv->idAmbiente;
     $fecha_ejecucion=$inv->fecha_ejecucion;
     $idUsuario=$inv->idUsuario;
     $idEstado_in=$inv->idEstado_in;

        $mov=Ambiente::encontrar_activos($inv->idAmbiente);
                $c=0;
        foreach ($mov as $pre) {
          $num=$pre->idActivo;
        $resultados[$c]=array(
          'idact'=>$num,
          'nombre_ac'=>$pre->nombre_ac,
          'cantidad'=>$pre->cantidad);
          $c++;
       }
       $s=$resultados[0]['nombre_ac'];
$result = count($resultados);

     
    
     $fecha_ejecucion = date("d-m-Y", strtotime($fecha_ejecucion));


      $nomb=Usuario::encontrar_por_id($idUsuario);
      $ci=$nomb->ci;
      $nombre=$nomb->nombre;
      $apellido=$nomb->apellido;


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
            <h2 style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INVENTARIO<br><br></h2>
  <table style="width:100%;">
  <tr>
    <td colspan="3" style="text-align: center;"><h2>&nbsp;N°FORMULARIO '.$idInventario_am.' </h2></td>
  </tr>
  <tr>
    <td><b>Solicitud de:</b> '.$result.'</td>
  </tr>
 
 <br><br>
  <tr>
    <td colspan="3" style="text-align: center;"><h2>&nbsp;DATOS TECNICOS DE LA SOLICITUD</h2></td>
  </tr>
 <br><br>

  
  <br><br><br><br><br>
  <br><br><br><br><br>
  <br><br><br><br><br>
  <tr>
    <td style="width:200px; text-decoration: overline;"><p style="text-align: center;"><strong>FIRMA DEL JEFE DE ALMACEN</strong></p></td>
    <td style="width:200px; text-decoration: overline;"><p style="text-align: center;"><strong>FIRMA DEL JEFE DE AREA</strong></p></td>
  </tr>
  
  </table>



';
$htmlcontent.='<table style="border: 1px solid black;">
<tr>
    <th><b>Codigo</b></th>
    <th><b>Nombre</b></th>
    <th><b>Cantidad</b></th>
  </tr></table>';
for($i=0;$i<18;$i++){
$htmlcontent .='
<table style="border: 1px solid black;">
<tr>
<td>'.$resultados[$i]['idact'].'</td><td> '.$resultados[$i]['nombre_ac'].'</td><td>'.$resultados[$i]['cantidad'].'</td>
</tr>
</table>
'; 
}
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