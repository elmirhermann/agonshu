<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Alterar Imagem do Associado</h4>
      </div>
      <div class="modal-body">
		<form id="frm1" name="frm1" method="POST" action="library/upload-img.php" enctype="multipart/form-data">
			<input type="file" id="arquivo" name="arquivo" value="" >
			<input type="hidden" id="idAssoc" name="idAssoc" value="<?=$result?>" >
			
		</form>
      </div>
      <div class="modal-footer">
        <button form="frm1" class="btn btn-primary" id="enviaimg">envia</button>
      </div>
    </div>
  </div>
</div>