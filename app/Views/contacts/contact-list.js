//fonction pour charger les fiches dynamiquement
function loadAllContact()
{
  $.getJSON("<?= $this->url('allContact') ?>", function(data)
  {
    console.log(data);
    var res = "";
      $.each(data, function(index, val) 
      {
        var color = "";
        var vu    = "";
        if(val.statut == 0)
        {
          color = "danger";
          vu    = "Non lu";
        }
        else
        {
          color ="success";
          vu    ="Lu"
        }

        res += '<tr class='+color+'>'; 
        res += '<td>'+vu+'</td>';
        res += '<td>'+val.title+'</td>';
        res += '<td>'+val.mail+'</td>';
        res += '<td>'+val.date+'</td>';
        res += '<td><button type="button" class="btn btn-info data-toggle="modal" data-target="#myModal'+val.id+'>Détails</button></td>';

        res += '<!-- Modal -->';
        res += '<div class="modal fade" id="myModal'+val.id+'" role="dialog">';
        res += '<div class="modal-dialog">';
        res += '<!-- Modal content-->';
        res += '<div class="modal-content">';
        res += '<div class="modal-header">';
        res += '<button type="button" class="close" data-dismiss="modal">&times;</button>';
        res += '<h4 class="modal-title">Message en Détails :</h4>';
        res += '</div>';
        res += '<div class="modal-body">';
        res += '<ul>';
        res += '<li>Vue : '+val.statut+'></li>';
        // res += '<li>Id du message : '+val.id+'></li>'; //Inutile pour l'uilisateur
        res += '<li>Titre du message : '+val.title+'></li>';
        res += '<li>Contenu du message : '+val.content+'></li>';
        res += '<li>Email de l\'expediteur : '+val.mail+'></li>';
        res += '<li>Date de rérection : '+val.date+'></li>';
        res += '</ul>';
        res += '</div>';
        res += '<div class="modal-footer">';
        if(val.statut == 0)
        {
          res += '<form action="<?= $this->url("updateCheck") ?>" id=checkform4 method=post>';
          res += '<input type=hidden name="hidden" value="'+val.id+'">';
          res += '<button type=submit class="btn btn-default" id="submitform3">Marquer comme Lu</button>';
          res += ' </form>;'
        }

        res += '<a href="/alliance-sociale/public/deletecontact/'+val.id+'" class="delete btn btn-danger" data-id="'+val.id+'" >Supprimer</a>';
        res += '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';                         
        res += '</div>';                    
        res += '</div>';                    
        res += '</div>';                    
        res += '</div>';                    
        res += '</tr>'; 
      });  
      
    $('tbody').html(res);
  });
}
