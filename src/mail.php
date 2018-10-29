<?php
namespace src\mail;
/**
 * Incluimos la libreria y hacemos uso de los nombres de espacio
 */

require "mail/PHPMailer.php";
require "mail/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

class EnvioMail
{
    public function Envio($pdf, $destino)
    {
        $email = new PHPMailer();
        $email->SetFrom('<tu mail>'); //Quien lo envia
        $email->Subject = 'Nuevo reporte PDF';
        $email->Body = 'Adjunto Lista de Nombres';
        $email->AddAddress($destino);
        $filename = "reporte.pdf";
        $pdfdoc = $pdf->Output("", "S");
        $email->addStringAttachment($pdfdoc, $filename);
        $email->Send();
    }
}
