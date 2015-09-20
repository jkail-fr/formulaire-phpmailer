<?php 
if(!empty($_POST)){

	if (!empty($_POST['name']) AND !empty($_POST['email'])  AND !empty($_POST['subject'])  AND !empty($_POST['message']))
	 {
		require_once ('./includes/class.phpmailer.php');

		$mail = new PHPMailer();

	   // De qui vient le message, e-mail puis nom
	   $mail->From = $_POST['email'];
	   $mail->FromName = $_POST['name'];
	 
	   // Définition du sujet/objet
	   $mail->Subject = $_POST['subject'];
	 
	   // On définit le corps du message
	   $mail->Body = $_POST['message'];
	 
	   // Il reste encore à ajouter au moins un destinataire
	   // (ou plus, par plusieurs appel à cette méthode)
	   $mail->AddAddress("boutaultbenoit@yahoo.fr", "BenoitBoutault");
	 
	   //personnalisation :
	   $mail->Mailer = 'mail';
	   $mail->Host = 'smtp';
	   $mail->Port = '465';
	    $mail->SMTPSecure = "ssl";
	    $mail->SMTPAuth = true;
	    $mail->Username = 'username';
		$mail->Password = 'password';


	   // Pour finir, on envoi l'e-mail
	   $mail->send();
		$envoi = "Votre email a été envoyé, je vous remercie de votre intérêt";	}
	else if (empty($_POST['name']) OR empty($_POST['subject']) OR empty($_POST['email']) OR empty($_POST['message'])) {
			$envoi = "Un des champs du formulaire est incomplet";	}
		
	}	
else {
		$envoi = null;	}
   ?>
   
<!--Votre page HTML-->

		
<?php //si le formulaire est utilisé on indique si le mail est partit ou non
if(envoi != null)
{
	echo '<div class="mail-send"><p> '.$envoi.'</p></div>';
}
?>

<form method="post" action="#">
	<input type="text" name="name" id="name" placeholder="Nom" />
	<input type="text" name="email" id="email" placeholder="Email" />
	<input type="text" name="subject" id="subject" placeholder="Sujet" />
	<textarea name="message" id="message" placeholder="Message"></textarea>
	<input type="submit" value="Envoyer" />
	<input type="reset" value="Réinitialiser" class="alt" />
</form>
							