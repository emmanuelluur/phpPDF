<?php
function Titulo($pdf, $text)
{
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(80);
    $pdf->Cell(30, 10, iconv('UTF-8', 'windows-1252', $text), 0, 0, 'C');
    $pdf->Ln(20);

}
function loadData($pdf, $valores)
{
    $id = 0;
    foreach ($valores as $value) {
        $id += 1;
        $pdf->ln(5);
        $pdf->Cell(15, 5, $id, 'R,L', 0, 'C');
        $pdf->Cell(40, 5, $value['Nombre'], 'R,L', 0, 'C');
    }

}

function CierraTabla($pdf)
{
    $pdf->ln(0);
    $pdf->Cell(15, 5, '', 'B', 0, 'C'); //    cierra linea de id
    $pdf->Cell(40, 5, '', 'B', 0, 'C'); //    cierra linea de nomnre
}
