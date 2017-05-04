<?php $this->layout('layout_front', ['title' => 'qui somme nous']) ?>

<?php $this->start('main_content') ?>


	<div class="row">
	    <div class="col-md-12">

	    	<div class="jumbotron text-center"> 
	    		<h1>L'équipe</h1>
	    	</div>

	    </div>
    </div>

<div tabindex="-1" class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3 class="modal-title"></h3>
	</div>
	<div class="modal-body">
		
	</div>
	<div class="modal-footer">
		<button class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
   </div>
  </div>
</div>

<?php $this->stop('main_content');
    
$this->start('script');

?>


<script>
$(document).ready(function() {
$('.thumbnail').click(function(){
      $('.modal-body').empty();
  	var title = $(this).parent('a').attr("title");
  	$('.modal-title').html(title);
  	$($(this).parents('div').html()).appendTo('.modal-body');
  	$('#myModal').modal({show:true});
});
});
           
</script> 


<?php
    $this->stop('script');
?>