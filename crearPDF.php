<?php
/**
 * Emmanuel Lucio Urbina
 * 08/10/2018
 * Tutorial
 */
require_once "pdf_class/fpdf.php";
$data = array(
    array("Nombre" => iconv('UTF-8', 'windows-1252', 'Emmanuel')),
    array("Nombre" => iconv('UTF-8', 'windows-1252', 'José')),
    array("Nombre" => iconv('UTF-8', 'windows-1252', 'Mayra')),
    array("Nombre" => iconv('UTF-8', 'windows-1252', 'Francisco')),
    array("Nombre" => iconv('UTF-8', 'windows-1252', 'Guadalupe')),
    array("Nombre" => iconv('UTF-8', 'windows-1252', 'María')),
);

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

//  numero de registro
$id = 0;
//  bucle que recorre el arreglo
foreach ($data as $value) {
    $id += 1;
    //  La funcion ln() crea un salto de linea le damos el tamaño de ancho de la celda para que empiece desde ahi
    $pdf->ln(5);
    $pdf->Cell(15, 5, $id, '1', 0, 'C');
    $pdf->Cell(40, 5, $value['Nombre'], '1', 0, 'C');
}

$pdf->Output();
