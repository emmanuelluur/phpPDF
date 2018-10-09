<?php

require_once "pdf_class/fpdf.php";
require_once "funciones.php";
require_once "sendEmail.php";
$time = date('Y-m-d-H:i:s');
//datos arreglo (funciona igual con consultas a servidor)
$data = array(
    array("Nombre"=>iconv('UTF-8', 'windows-1252', 'Emmanuel')),
    array("Nombre"=>iconv('UTF-8', 'windows-1252', 'José')),
    array("Nombre"=>iconv('UTF-8', 'windows-1252', 'Mayra')),
    array("Nombre"=>iconv('UTF-8', 'windows-1252', 'Francisco')),
    array("Nombre"=>iconv('UTF-8', 'windows-1252', 'Guadalupe')),
    array("Nombre"=>iconv('UTF-8', 'windows-1252', 'María')),
);

$pdf = new FPDF;
//  Nuevo documento
$pdf->AddPage();
//  Titulo
Titulo($pdf,"Lista de Nombres");
//  cabecera tabla
$pdf->SetFont('Arial','',9);
$pdf->setFillColor(230,230,230); 
$pdf->Cell(15,5,'#',1,0,'C',TRUE);
$pdf->Cell(40,5,iconv('UTF-8', 'windows-1252', 'Nombre'),1,0,'C',TRUE);
//  Contendido tabla
loadData($pdf,$data);
//  cierra linea de tabla
CierraTabla($pdf);
//send mail
//  Descomente las siguientes dos lienas para enviar por correo *Asegurar que el servidor pueda enviar correos 
//  $to = "-- DESTINO --"; 
//  SendMail($pdf, $to);

$pdf->Output();