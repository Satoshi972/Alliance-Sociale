<?php


namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \vendor\phpmailer\phpmailer\PHPMailerAutoload;
use \Model\Reset_pswModel;
use \W\Security\StringUtils;

use Respect\Validation\Validator as v;
//namespace Model;
date_default_timezone_set('America/Martinique');


class TokenController extends Controller
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
        
        
if(!empty($_POST)){

	// équivalent au foreach de nettoyage
	$post = array_map('trim', array_map('strip_tags', $_POST));         
     echo 'lol';
$checked = $checkemail->emailExists($post['email']);
if($checked === true){
    
    $token = $maketoken->randomString($length = 80);
        
    $dateAndTime = date('Y/m/d H:i:s');
    $datas = ["token" => $token, 
              "email" => $post["email"],
              "date" => $dateAndTime ];
    
    $inserttoken->insert($datas);
        
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
    $checktoken = $check->findall3($_GET["token"]);
    
    if (!empty($checktoken)){
        
        $this->show('token/resetpsw', ['$checktoken["firstname"]' =>                                                                    $checktoken["firstname"],
                                       '$checktoken["lastname"]' =>  $checktoken["lastname"],
                                      '$checktoken["id"]' =>                                                                    $checktoken["id"],]);
                                      
                                
        
    } else {
        $this->show('token/resetpsw');
        
    }
    
    }
    
    public function ajax_resetpsw()
	{
        $update = new UsersModel();
        $delete = new UsersModel();
        $check = new Reset_pswModel();  
       
        $post = [];
        $errors = [];
        
if(!empty($_POST)){

	// équivalent au foreach de nettoyage
	$post = array_map('trim', array_map('strip_tags', $_POST));
    
    $checktoken = $check->findall3($post["token"]);
    
if(empty($post['password'])){
     
    $errors[] = 'Le mot de passe doit être complété';
            }

            if(count($errors) === 0){
            $updatepsw = $update->update(["password" => $post['password'], $checktoken['id']
                                         ]);   
                
            $deletetoken = $delete->delete($checktoken['id']);
                
                
            $result = '<div class="alert alert-success">Le mot de passe a bien été changé</div>';
	

	           
                
                
            } else {
            $result = '<div class="alert alert-danger">'.implode('<br>', $errors).'</div>';
            
            }
            echo $result; 
            
}
        
        $this->show('token/ajax_resetpsw');
        
    }
}
