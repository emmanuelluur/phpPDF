<?php
require "mail/PHPMailer.php";
require "mail/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function SendMail($pdf, $destino)
{
    $email = new PHPMailer();
    $email->SetFrom('-- YOUR EMAIL --'); //Name is optional
    $email->Subject = 'Nuevo reporte PDF';
    $email->Body = 'Adjunto Lista de Nombres';
    $email->AddAddress($destino);
    $filename = "reporte.pdf";
    $pdfdoc = $pdf->Output("", "S");
    $email->addStringAttachment($pdfdoc, $filename);
    $email->Send();
}
