<?php 
namespace Controller;

use \W\Controller\Controller;
use Respect\Validation\Validator as v;
use Intervention\Image\ImageManagerStatic as i;
use Model\ArticlesModel;
use Model\CommentModel;

class ActivityController extends MasterController
{

    public function add_activity()
    {
        #control, nettoyage puis traitement des données en fonction de leurs validitées

        $a = new ActivityModel(); //objet pour mon model d'article

        $post = [];
        $errors = [];

        #définition de quelques variables pour gerer les images
        $maxSize = (1024 * 1000) * 2; // Taille maximum du fichier
        $uploadDir = 'assets/uploads/'; // Répertoire d'upload

        if(!empty($_POST))
        {
            $post = array_map('trim', array_map('strip_tags', $_POST));

            if(!v::notEmpty()->alpha('-?!\'".')->length(2,50)->validate($post['subject']))
            {
                $errors[] = 'Votre titre doit faire entre 2 et 50 caractères';
            }

            if(!v::notEmpty()->alnum('#-_*<\'">?!.')->length(2,600)->validate($post['content']))
            {
                $errors[] = 'Votre post doit faire entre 2 et 600 caractères';
            }
            
            if(isset($_FILES['picture']) && $_FILES['picture']['error'] === 0)
            {

                $img = i::make($_FILES['picture']['tmp_name']);
                $size = $img->filesize();
                $mimetype = $img->mime();
                $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
                $newName = uniqid('img_').'.'.$ext;
                
                if($maxSize<$size)
                {
                    $errors[] = 'fichier trop gros, il doit faire 2 mo max';
                }
                else
                {
                    if(!v::image()->validate($_FILES['picture']['tmp_name']))
                    {
                        $errors[] = 'Le fichier n\'est pas une image valide';
                    }
                    else
                    {
                        if(!is_dir($uploadDir))
                        {
                            mkdir($uploadDir, 0755);
                        }

                        if(!$img->save($uploadDir.$newName))
                        {
                            
                            $errors[] = 'Erreur lors de l\'envoi de l\'image';
                        }
                        else
                        {
                            #ligne pour que mon image soit envoyée dans la base !!!!!!
                            $post['picture'] = $uploadDir.$newName;

                        }
                    }
                }
            }
            else
            {
                $errors[] = 'Erreur lors de la réception de l\'image';
            }


            if(count($errors)>0)
            {
                $textError = implode('<br>',$errors);
                $result = '<p class="alert alert-danger">'.$textError.'</p>';
            }
            else
            {   
                if($a->insert($post))
                {
                    var_dump($a->insert($post));
                    $result = '<p class="alert alert-success">Le formulaire a été correctement envoyé !</p>';
                }
                else
                {
                    var_dump($a->insert($post)->errorInfo());
                }
            }

            echo $result;
        }
        else
        {

            $this->show('post/add_activity', [
                'result' => (isset($result)) ? $result : null,
            ]);

        }
        
    }

    public function list_activity()
    {
        $a = new ActivityModel();
        $list = $a->findAll();
        $this->show('activity/list_activity', ['list' => $list]);

    }

    public function detail_activity($id)
    {
        $a = new ActivityModel();
        $com = new CommentModel();

        $comments = $com->listComment($id);
        $detail = $a->find($id);

        $post = [];
        $errors = [];

        if(empty($detail))
        {
            $this->showNotFound();
        }


        if(!empty($_POST))
        {
            $post = array_map('trim', array_map('strip_tags', $_POST));

            if(!v::notEmpty()->alnum('#-_*<\'">?!.')->length(1,600)->validate($post['content']))
            {
                $errors[] = 'Votre post doit faire entre 1 et 600 caractères';
            }

            if(count($errors) >0 )
            {
                $textError = implode('<br>', $errors);
                $result = '<p class="alert alert-danger">'.$textError.'</p>';
            }
            else
            {
                $data = [
                    'idARt' => $id,
                    'content' => $post['content'],
                    ];

                $insert = $com->insert($data);

                if(!$insert)
                {
                    var_dump($insert->errorInfo());
                }
            }


        }
        $this->showJson($comments);
        $this->show('post/detail_activity', [
                                    'detail'   => $detail,
                                    'comments' => (!empty($comments)) ? $comments : null,
                                    'result'   => (isset($result))  ? $result : null,
                                    ]);
    }

    public function delete_activity($id)
    {
        $a = new ArticlesModel();
        $a->delete($id);
        $list = $a->findAll();
        $this->show('activity/list_activity', ['list' => $list]);
    }
}
?>