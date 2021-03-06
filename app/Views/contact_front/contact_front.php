<?php $this->layout('layout_front', ['title' => 'Contactez-nous']) ?>

<?php $this->start('main_content') ?>

<div class="row">

	<div class="col-lg-12">

		<div class="col-sm-12 text-center">
			<h1>CONTACT</h1>
		</div>

		<div class="row">
			<div class="col-md-6 col-md-offset-3" id="result">
			</div>
		</div>

		<div class="col-md-6 col-md-offset-3">
	
			<div class="col-md-12 text-center">	
				<h2>Formulaire de contact</h2>
			</div>
			
			<div class="col-md-12 text-center">
				<form method="post" action="<?= $this->url('contactfront') ?>" class="form-horizontal" enctype="multipart/form-data">

					<div class="form-group">
						<div class="col-md-12">
							<input type="text" id="title" name="title" placeholder="Saisissez votre Titre" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<input type="mail" id="mail" name="mail" placeholder="Saisissez votre email" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<textarea type="text" id="content" name="content" rows="5" placeholder="Saisissez votre Contenu"  class="form-control"></textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<input type="submit" id="submitForm" class="btn btn-primary" value="Envoyer message">
						</div>
					</div>

				</form>
			</div>

		</div>
		
		<div class="row">
			<div class="col-md-6 col-md-offset-3">

				<div class="col-md-12 text-center">
					<h2>Adresse</h2>
				</div>
				
				<div class="col-md-12 text-center">
	                <h3>Centre Social Alliance sociale</h3>
	                <p>LCR Résidence Gaïac<br>
	                Quartier Cédalise<br>
	                97290 LE MARIN<br></p>
                </div>
            </div>
		</div>

        <div class="row">
        	<div class="col-md-12">
        		
				<div class="col-md-6">
					
					<div class="col-md-12 text-center">
						<h2>Nos horaires</h2>
					</div>

                    <div class="table-responsive col-md-12 text-center">          
                        <table class="table table-condensed">
                                        
                            <tr>
                                <th>Lundi</th>
	                                <td>8h - 12h</td>
	                                <td>13h - 17h</td>
                            </tr>

                            <tr>
                                <th>Mardi</th>
                                    <td>8h</td> 
                                    <td>17h</td> 
                            </tr>

                            <tr>
                                <th>Mercredi</th>
                                    <td>8h</td> 
                                    <td>17h</td> 
                            </tr>

                            <tr>
                                <th>Jeudi</th>
                                    <td>8h</td>  
                                    <td>17h</td>  
                            </tr>

                            <tr>
                                <th>Vendredi</th>
                                    <td>8h</td>
                                    <td>17h</td>
                            </tr>

                            <tr>
                                <th>Samedi</th>
                                    <td>9h - 12h</td>
                                    <td>14h - 17h</td>
                            </tr>
                        </table>
                    </div>

				</div>

				<div class="col-md-6">
					<div class="col-md-12 text-center">
						<h2>Nous trouver</h2>
					</div>

					 <div class="col-sm-12 text-center">
            			<iframe src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d8567.76622421761!2d-60.883391124781355!3d14.475283333856556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d14.474780099999998!2d-60.877898099999996!5e0!3m2!1sfr!2s!4v1492000624835" width="100%" height="auto" frameborder="0" style="border:0" allowfullscreen></iframe>
            		</div>
					
				</div>

			</div>

			<div class="row">
				<div class="col-md-6 col-md-offset-3">

					<div class="col-md-12 text-center">
						<h2>Téléphones</h2>
					</div>
					
					<div class="col-md-12 text-center">
		                <p>0596 74 76 58<br>
		                0696 27 65 85<br>
		               </p>
	                </div>
	            </div>
			</div>

        </div>
    </div>

</div>

<?php $this->stop('main_content') ?>
<?php $this->start('script') ?>
<script>
$(function()
{
	//gestion de mon formulaire d'envoi
	$('form').on('submit',function(e)
	{
	    e.preventDefault();

	    var myForm = $('form');

	    $.ajax(
	    {
	        method: myForm.attr('method'),
	        url: myForm.attr('action'),
	        data: myForm.serialize(),
	        success: function(res)
	        {
	        	// $('#result').html(res);
	        	// $('#result').removeClass();
	         //    console.log(res);

	            if(res == "success")
	            {
	            	$('#result').html("Votre formulaire a bien été envoyé").addClass('alert-dismissable alert-success').fadeIn(2000).fadeOut(5000);
	            	$('form')[0].reset();
	            }
	            else
	            {
	            	$('#result').html(res).fadeIn(2000).fadeOut(5000);
	            }
	        }
	    });
	});           
})
</script>
<?php $this->stop('script') ?>