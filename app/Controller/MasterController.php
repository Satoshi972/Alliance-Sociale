<?php

namespace Controller;

use \W\Controller\Controller;
use Respect\Validation\Validator as v;
use Intervention\Image\ImageManagerStatic as i;

class MasterController extends Controller
{
	/**
	*@param $files = tableau de fichier attendu
	* doc : http://php.net/manual/en/features.file-upload.multiple.php
	* doc : http://www.w3bees.com/2013/02/multiple-file-upload-with-php.html
	*/
	public function checkMedia($files)
	{
		$mimeTypeAvailable = ['video/mp4', 'video/avi', 'video/mov', 'video/mpeg4', 'image/jpeg', 'image/jpeg', 'image/jpg', 'image/png', 'image/gif']; //Extension acceptée
		$uploadDir = 'assets/medias/'; // Répertoire d'upload
		$maxSize = (1024 * 1000) * 500; // Taille maximum du fichier
		$filesClean = []; // Tableau final qui contiendras les chemin respectifs des médias
		$nbMedias = count($files);//contient le nombre de medias
		$filesKey = array_keys($files);//contient les entètes de chaque entrée du tableau

	
		// var_dump($nbMedias).'<br>';
		// var_dump($filesKey).'<br>';
		for ($i=0; $i < $nbMedias; $i++)
		{ 
			$finfo = new \finfo();

			foreach ($filesKey as $key) 
			{
				// var_dump($key).'br>';
	            $filesClean[$i][$key] = $files[$key][$i];
	        }

	        //var_dump($filesClean[$i]);
	        $mimeType = $finfo->file($filesClean[$i]['tmp_name'], FILEINFO_MIME_TYPE); //récupere le mimetype de mo médias
	        $extension = pathinfo($filesClean[$i]['name'], PATHINFO_EXTENSION); //récupère l'extension de mon fichier
	        // var_dump($mimeType).'<br>';
	        // var_dump($extension).'<br>';

	        if(in_array($mimeType, $mimeTypeAvailable))
			{

				if($filesClean[$i]['size'] <= $maxSize)
				{

					if(!is_dir($uploadDir))
					{
						mkdir($uploadDir, 0755);
					}

					$newMediaName = uniqid('media').'.'.$extension;
					//var_dump($newMediaName).'<br>';

					if(!move_uploaded_file($filesClean[$i]['tmp_name'], $uploadDir.$newMediaName))
					{
						#$errors[] = 'Erreur lors de l\'upload de la vidéo';
						//return false;
						continue; //ignore le fichier avec l'erreur
					}
					else
					{
						$datas[$i] = $uploadDir.$newMediaName;
						//var_dump($datas[$i]);
					}

				}
				else 
				{
					#$errors[] = 'La taille du fichier excède 50 Mo';
					//return false;
					continue;
				}

			}
			else 
			{
				#$errors[] = 'Le fichier n\'est pas une Vidéo valide';
				//return false;
				continue;
			}
		}

		//return $filesClean;
		return (!empty($datas)) ? $datas : null;
	}

	/**
	* Permet l'envoi de mail
	* @param $mail = mail attendu
	* @param $token a envoyer via le mail, par défaut null
	*/
	public function mailTo($email, $token = null)
	{
		//Create a new PHPMailer instance
		$mail = new \PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 2;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = 'smtp.mailtrap.io';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 2525;
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "912e93c76442cd";
		//Password to use for SMTP authentication
		$mail->Password = "505965f06bf856";
		//Set who the message is to be sent from
		$mail->setFrom('from@example.com', 'First Last');
		//Set an alternative reply-to address
		$mail->addReplyTo('replyto@example.com', 'First Last');
		//Set who the message is to be sent to
		$mail->addAddress($email);
		//Set the subject line
		$mail->Subject = 'Reset password';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
		//Replace the plain text body with one created manually
		//$lien = $this->generateUrl('login');

		$lien = 'http://127.0.0.1/Alliance-Sociale/public/resetpsw?token=';

		$mail->Body = 'Voici votre <a href="'.$lien.$token.'">lien</a> de pour changer votre mot de passe ';
		//$mail->Body = 'Voici votre lien de pour changer votre mot de passe <a href="'.$_SERVER['DOCUMENT_ROOT'].$lien.'/'.$token.'">lien</a>';
		$mail->AltBody = "Voici votre lien de pour changer votre mot de passe ";
		//Attach an image file
		//$mail->addAttachment('images/phpmailer_mini.png');
		//send the message, check for errors
		if (!$mail->send()) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		    return true;
		}

	}

	#Permet de check s'il y a un utilisateur connecté et s'il a les droit pour accéder a cette page
	public function checkSession()
	{
		if(!getUser())
		{
			redirectToRoute('login');
		}

		allowTo(['admin','editor']);

	}
}