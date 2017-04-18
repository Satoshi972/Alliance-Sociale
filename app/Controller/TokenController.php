<?php


namespace Controller;

use \Controller\MasterController;
use \W\Controller\Controller;
use \W\Model\UsersModel;
use \vendor\phpmailer\phpmailer\PHPMailerAutoload;
use \Model\Reset_pswModel;
use \W\Security\StringUtils;

use Respect\Validation\Validator as v;
//namespace Model;
date_default_timezone_set('America/Martinique');


class TokenController extends MasterController
{
    
    public function ask_token()
	{
        


 
 

                $this->show('token/ask_token');
            }
        
public function ajax_ask_token()
	{
      
$checkemail = new UsersModel();
$maketoken = new StringUtils;
$inserttoken = new Reset_pswModel();
$mailto = new MasterController;        
        
if(!empty($_POST)){

	// équivalent au foreach de nettoyage
	$post = array_map('trim', array_map('strip_tags', $_POST));         
    // echo 'lol';
$checked = $checkemail->emailExists($post['email']);
if($checked === true){
    
    $token = $maketoken->randomString($length = 80);
        
    $dateAndTime = date('Y/m/d H:i:s');
    $datas = ["token" => $token, 
              "email" => $post["email"],
              "date" => $dateAndTime ];
    
    $inserttoken->insert($datas);
        

    $mailto->mailTo($post["email"], $token);
    
    $result = '<div class="alert alert-success">Un email vous a été envoyé pour redéfinir le mot de passe</div>';
	

	echo $result;

    
} else {
    echo "Cet identifiant n'existe pas";
    
}  
}
       
        
         $this->show('token/ajax_ask_token');
        
    }
   
 public function resetpsw()
	{
        
    $check = new Reset_pswModel(); 
    if (isset($_GET['token'])){    
    $checktoken = $check->findAll3($_GET["token"]);
    //foreach($checktoken as $check):
    }
    if (!empty($checktoken)){
        
        
        foreach($checktoken as $check):
        $this->show('token/resetpsw', ['checkfirstname' => $check["firstname"],
                                       'checklastname' => $check["lastname"],
                                      'checkid' => $check["id"],]);
        endforeach; 
                                
        
    } else {
        $this->show('token/resetpsw');
        
    }
   // endforeach; 
       
    }
    
    public function ajax_resetpsw()
	{
        $update = new UsersModel();
        $delete = new Reset_pswModel();
        $check = new Reset_pswModel();  
        $check2 = new Reset_pswModel();
       
        $post = [];
        $errors = [];
        
if(!empty($_POST)){

	// équivalent au foreach de nettoyage
	$post = array_map('trim', array_map('strip_tags', $_POST));
    
        
        
            
            
    $checktoken = $check->findAll3($post["token"]);
    $checktoken2 = $check2->findAll4($post["token"]);
//foreach($checktoken as $check):
    
    $err = [
        //On vérifie que la taille du mot de passe soit comprise entre 8 et 30 caractères
            (!v::notEmpty()->length(8, 30)->validate($post['password'])) ? 'Le mot de passe est doit contenir entre 8 et 30 caractères' : null,
            
        ];
        
        $errors = array_filter($err);


            if(count($errors) === 0){
            
            foreach($checktoken as $check):
                
            $update->update(["password" => password_hash($post['password'], PASSWORD_DEFAULT)], $check['id']
                                         );   
                
            endforeach; 
                
                
            foreach($checktoken2 as $check2):    
                
            $delete->delete($check2['id']);
                
            endforeach;
                
            echo $result = '<div class="alert alert-success">Le mot de passe a bien été changé</div>';
	

	     
                
                
            } else {
            echo $result = '<div class="alert alert-danger">'.implode('<br>', $errors).'</div>';
            
            }
            //endforeach;
            //echo $result; 
            
}
        
        $this->show('token/ajax_resetpsw');
        
    }
}
