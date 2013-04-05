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
	  $this->Write(10,'JUSTIFICATIVO 2140');
	  $this->Ln(15);
   }

function Footer()
{
      $this->SetXY(100,-80);
	  $this->Write(10,'Johanna Palominos Marín');
	  $this->SetXY(113,-72);
	  $this->Write(10,'Jefe de Carrera');
      $this->SetY(-50);
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
		$txt1 = $_POST['nombre_profesor'];
		$txt2 = $_POST['nombre_alumno'];
		$txt3 = $_POST['justificativo'];
		$txt4 = $_POST['nombre_asignatura'];
/* seleccionamos el tipo, estilo y tamaño de la letra a utilizar*/

$pdf->Write (7,"A: Señor(a) Profesor(a) ");
$pdf->Write (7,$txt1 = utf8_decode($txt1));
$pdf->Ln();
$pdf->Write (7,"De: Johanna Palominos Marín");
$pdf->Ln();
$pdf->Write (7,"Jefe de Carrera Ing. Civil Industrial men. Agroindustria");
$pdf->Ln();
$pdf->Write (7,"Ref: Justifica Asistencia");
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('times', 'B', 16);
$pdf->Write (7,"Señor(a) Profesor(a):");
$pdf->Ln();
$pdf->Write (7,"Por intermedio del presente informo a usted que el alumno de    la    carrera    Ingeniería   Civil    Industrial   mención Agroindustria, Sr(a) ");
$pdf->Write(7,$txt2 = utf8_decode($txt2));
$pdf->Write (7," con C.I.N° ");
$pdf->Write(7,$_POST['rut_demo_5']);
$pdf->Write (7,", ha justificado debidamente en esta Jefatura de Carrera su   inasistencia   a  ");
$pdf->Write(7,$txt3 = utf8_decode($txt3));
$pdf->Write (7,"  el  día ");
$pdf->Write (7,$_POST['fecha']);
$pdf->Write (7,", correspondiente a la Asignatura ");
$pdf->Write (7,$txt4 = utf8_decode($txt4));
$pdf->Write (7,".");
$pdf->Ln();
$pdf->Write (7,"Por lo que solicito a usted, tenga a bien considerar  las  medidas necesarias  para  que  el  alumno   pueda   recuperar  dicha  actividad.");
$pdf->Ln();
$pdf->Ln();
$pdf->Write (7,"Desde ya agradezco su disposición para poder resolver esta situación. ");
$pdf->Write (7,"Saluda atentamente");
//$pdf->Output("enviar_justificativo/2140/justificativo2140.pdf",'D');
$pdf->Output("enviar_justificativo/2140/justificativo2140.pdf",'F');		

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
$mail->Subject = "Justificativo 2140"; 
$mail->AltBody = "Este correo sirve como respaldo en el caso que existan problemas en validar la oportuna entrega del justificativo. Recuerda solicitar el timbre del justificativo en la Escuela de Industria"; 
$mail->MsgHTML("<b>Este correo sirve como respaldo en el caso que existan problemas en validar la oportuna entrega del justificativo. Recuerda solicitar el timbre del justificativo en la Escuela de Industria</b>."); 
$mail->AddAttachment("enviar_justificativo/2140/justificativo2140.pdf"); 
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
