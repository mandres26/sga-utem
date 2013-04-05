<?php
/* incluimos primeramente el archivo que contiene la clase fpdf */

include ('fpdf/fpdf.php');
include ('phpmailer/class.phpmailer.php');
include ('phpmailer/class.smtp.php'); 

/* tenemos que generar una instancia de la clase */

class PDF extends FPDF
{
   //Cabecera de página 165,
   function Header()
   {

      $this->Image('fpdf/header.png',27,8,165,22.5,'');
      $this->SetFont('times','U',16);
      $this->SetXY(70,35);
	  $this->Write(10,'FORMULARIO ATENCION ESCUELA');
	  $this->Ln(15);
   }

function Footer()
{
      $this->SetXY(30,-105);
      $this->SetFont('times', 'B', 16);
      $this->Write (7,"Respuesta al Problema Planteado");
      $this->Ln();
      $this->MultiCell(135,45,"",1,'J');
	  $this->SetFont('times','I',12);
      $this->SetXY(30,-50);
	  $this->Write(10,'Sistema de Gestión Académica');
	  $this->Ln(5);
	  $this->Write(10,'CHEP Soluciones Informáticas');
	  $this->Ln(5);
	  $this->Cell(40,10,date('d/m/Y'),0,1,'L');
	  $this->Ln(10);
      $this->Cell(0,10,'Página '.$this->PageNo(),0,0,'C');
   }
}
       
	    $pdf = new PDF();
		$pdf->AddPage();
		$pdf->SetTopMargin(15);
        $pdf->SetLeftMargin(30);
		$pdf->SetRightMargin(30);
		$pdf->SetFont('times', 'B', 18);
		$txt1 = $_POST['nombre_alumno'];
		$txt2 = $_POST['email'];
		$txt3 = $_POST['carrera'];
		$txt4 = $_POST['problema_planteado'];
/* seleccionamos el tipo, estilo y tamaño de la letra a utilizar*/
$pdf->Write (7,"Datos Personales");
$pdf->Ln(15);
$pdf->SetFont('times', 'B', 16);
$pdf->Write (7,"Nombre: ");
$pdf->SetFont('times','I', 16);
$pdf->Write (7,$txt1 = utf8_decode($txt1));
$pdf->Ln();
$pdf->SetFont('times', 'B', 16);
$pdf->Write (7,"RUT: ");
$pdf->SetFont('times','I', 16);
$pdf->Write(7,$_POST['rut_demo_5']);
$pdf->Ln();
$pdf->SetFont('times', 'B', 16);
$pdf->Write (7,"Fecha de Reunión: ");
$pdf->SetFont('times','I', 16);
$pdf->Write (7,$_POST['fecha']);
$pdf->Ln();
$pdf->SetFont('times', 'B', 16);
$pdf->Write (7,"Correo Electrónico: ");
$pdf->SetFont('times','I', 16);
$pdf->Write (7,$txt2 = utf8_decode($txt2));
$pdf->Ln();
$pdf->SetFont('times', 'B', 16);
$pdf->Write (7,"Teléfono: ");
$pdf->SetFont('times','I', 16);
$pdf->Write(7,$_POST['telefono']);
$pdf->Ln();
$pdf->SetFont('times', 'B', 16);
$pdf->Write (7,"Carrera: ");
$pdf->SetFont('times','I', 16);
$pdf->Write (7,$txt3 = utf8_decode($txt3));
$pdf->Ln(15);
$pdf->SetFont('times', 'B', 16);
$pdf->Write (7,"Problema Planteado: ");
$pdf->Ln();
$pdf->SetFont('times','I', 16);
//$pdf->Write (7,$txt4 = utf8_decode($txt4));
$pdf->MultiCell(135,7,$txt4 = utf8_decode($txt4),0,'J');
$pdf->Ln();
//$pdf->Output("enviar_justificativo/2140/justificativo2140.pdf",'D');
$pdf->Output("enviar_justificativo/atencion/atencion_escuela.pdf",'F');		

$mail = new PHPMailer(); 
$mail->IsSMTP(); 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com"; 
$mail->Port = 465; 
$mail->Username = "correodepruebasga@gmail.com"; 
$mail->Password = "sgautem2013";
$mail->From = "correodepruebasga@gmail.com"; 
$mail->FromName = "Sistema de Gestión Académica"; 
$mail->Subject = "Formulario Atencion Escuela"; 
$mail->AltBody = "Este correo sirve como respaldo en el caso que existan problemas en validar la oportuna entrega del Formulario de atencion. Recuerda solicitar el timbre y respuesta correspondiente en la Escuela de Industria"; 
$mail->MsgHTML("<b>Este correo sirve como respaldo en el caso que existan problemas en validar la oportuna entrega del Formulario. Recuerda solicitar el timbre y respuesta correspondiente en la Escuela de Industria</b>."); 
$mail->AddAttachment("enviar_justificativo/atencion/atencion_escuela.pdf"); 
$mail->AddAddress("thirdanswer_18@hotmail.com"); 
$mail->AddCC("correodepruebasga@gmail.com");
$mail->IsHTML(true);
if(!$mail->Send()) { 
echo "Error: " . $mail->ErrorInfo; 
} else { 
echo'<div style="background-image:url(imagenes/fondo_contenido.jpg);background-position:center">';
echo'<div style=" padding:5px;border: 2px solid red; text-align:justify">';
echo'<p style="text-align:center;font-weight:bold">IMPORTANTE</p>';
echo'<p style="padding:10px">Documento enviado correctamente a tu dirección de correo registrada en el sitio con copia a la secretaria de la Escuela de Industria, quien imprimirá el documento y lo timbrará para hacerlo válido. Es tu responsabilidad velar por la validez del documento.</p>';
echo'</div>';
echo'</div>';
}
?>
