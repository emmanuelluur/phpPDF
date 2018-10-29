<?php
/**
 * Emmanuel Lucio Urbina
 * 08/10/2018
 * Tutorial
 * Update 
 * SQL consulta
 * 15/10/2018
 * Update
 * Envio De PDF por e-mail
 * 29/10/2018
 */
require_once "pdf_class/fpdf.php";
require_once "src/nombres.php";//   incluimos el archivo que devuelve los nombres
require "src/mail.php";
use src\mail\EnvioMail;
use src\nombres\Nombres;//   usamos el nombre de espacio de Nombres para poder usar la clase
//  Variable que contiene el correo de destino
$destino = "<mail destino>";
//  Instanciamos clase para enviar 
$envioMail = new EnvioMail;
// variable data para los valores de la bd
$data_bd = array();
//  llamamos a la clase Nombres
$nombres_bd = new Nombres;
//  obtenemos los nombres de la bd
$data_bd = $nombres_bd->Listar();
$pdf = new FPDF;
//  Nuevo documento
$pdf->AddPage();

//  Cabecera tabla
// Usando la funcion SetFont que requiere 3 argumentos
//  el primero es la fuente, el segundo es el estilo B bold, I italic y U underline, vacio para estandar
//  el tercero es el tamaño de la fuente
$pdf->SetFont('Arial', '', 9);
//  Con la funcion setFillCollor definimos el colo de fondo de las celdas
$pdf->setFillColor(230, 230, 230);
// Texto centrado en una celda con cuadro 15*5 mm y sin salto de linea
//  Con true le decimos que use el color definido anteriormente
$pdf->Cell(15, 5, '#', 1, 0, 'C', true);
$pdf->Cell(40, 5, iconv('UTF-8', 'windows-1252', 'Nombre'), 1, 0, 'C', true);

//  bucle que recorre los datos de la consulta sql, generara error si no tiene datos
foreach ($data_bd as $value) {
    //  La funcion ln() crea un salto de linea le damos el tamaño de ancho de la celda para que empiece desde ahi
    $pdf->ln(5);
    $pdf->Cell(15, 5, $value['id'], '1', 0, 'C');
    $pdf->Cell(40, 5, $value['nombre'], '1', 0, 'C');
}
//  Enviamos PDF 
$envioMail->Envio($pdf, $destino);
//  Mostramos el pdf despues de enviar
$pdf->Output();


