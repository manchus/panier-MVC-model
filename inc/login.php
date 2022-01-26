<form id="guardarDatos"  method="post" action="mvc_pr/client">
<div class="modal fade" id="datalogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Bonjour</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_register"></div>
          <div class="form-group">
            <label for="codigo0" class="control-label">COURRIEL:</label>
            <input type="text" class="form-control" id="email" name="email" required maxlength="40">
		  </div>
		  <div class="form-group">
            <label for="nombre0" class="control-label">MOT DE PASSE:</label>
            <input type="password" class="form-control" id="password" name="password" required maxlength="20">
          </div>
          <input type="hidden" name="register" value="olduser">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ANNULER</button>
        <button type="submit" class="btn btn-primary">SE CONNECTER</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#dataregister">CRÉER UN COMPTE</button>
      </div>
    </div>
  </div>
</div>
</form>


<div class="modal fade" id="pastrouve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <input type="hidden" id="id_pais" name="id_pais">
      <h2 class="text-center text-muted">Données incorrectes</h2>
	  <p class="lead text-muted text-center" style="display: block;margin:10px">L'utilisateur n'est pas enregistré!!!</p>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">ANNULER</button>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="reg_erroremail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <input type="hidden" id="id_pais" name="id_pais">
      <h2 class="text-center text-muted">Données incorrectes</h2>
	  <p class="lead text-muted text-center" style="display: block;margin:10px">L'email est déjà enregistré!!!</p>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">ANNULER</button>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="reg_errorpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <input type="hidden" id="id_pais" name="id_pais">
      <h2 class="text-center text-muted">Données incorrectes</h2>
	  <p class="lead text-muted text-center" style="display: block;margin:10px">Le mot de passe et la vérification ne correspondent pas</p>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">ANNULER</button>
        
      </div>
    </div>
  </div>
</div>



<form id="safeData"  method="post" action="mvc_pr/client">
<div class="modal fade" id="dataregister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">ACCUEIL</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_register"></div>
      <table class="table table-responsive">
           <tbody> 
            <tr>
              <td><label for="nom" class="control-label">NOM:</label></td>
              <td class="col-2"><input type="text" class="form-control" id="nom" name="nom" required maxlength="40"></td>
            </tr>
            <tr>
              <td><label for="prenom" class="control-label">PRENOM:</label></td>
              <td class="col-2"><input type="text" class="form-control" id="prenom" name="prenom" required maxlength="20"></td>
            </tr>
            <tr>
              <td><label for="email" class="control-label">EMAIL:</label></td>
              <td class="col-2"><input type="text" class="form-control" id="email" name="email" required maxlength="40"></td>
            </tr>
            <tr>
              <td><label for="adresse" class="control-label">ADRESSE:</label></td>
              <td class="col-2"><input type="text" class="form-control" id="adresse" name="adresse" required maxlength="20"></td>
            </tr>
            <tr>
              <td><label for="phone" class="control-label">TÉLÉPHONE:</label></td>
              <td class="col-2"><input type="text" class="form-control" id="phone" name="phone" required maxlength="20"></td>
            </tr>
            <tr>
              <td><label for="nombre0" class="control-label">MOT DE PASSE:</label></td>
              <td class="col-2"><input type="password" class="form-control" id="password" name="password" required maxlength="20"></td>
            </tr>
            <tr>
              <td><label for="nombre0" class="control-label">VÉRIFIER MOT DE PASSE:</label></td>
              <td class="col-2"><input type="password" class="form-control" id="password_2" name="password_2" required maxlength="20"></td>
            </tr>
           </tbody>
           </table> 
     
           <input type="hidden" name="register" value="newuser">
      
      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-default" data-dismiss="modal">ANNULER</button>
        <button type="submit" class="btn btn-primary">SE CONNECTER</button>
        
      </div>
    </div>
  </div>
</div>
</form>


<form id="guardarDatos"  method="post" action="mvc_pr/client">
<div class="modal fade" id="dataadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Bonjour</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_register"></div>
          <div class="form-group">
            <label for="codigo0" class="control-label">COURRIEL:</label>
            <input type="text" class="form-control" id="email" name="email" required maxlength="40">
		  </div>
		  <div class="form-group">
            <label for="nombre0" class="control-label">MOT DE PASSE:</label>
            <input type="password" class="form-control" id="password" name="password" required maxlength="20">
          </div>
          <input type="hidden" name="register" value="admin">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ANNULER</button>
        <button type="submit" class="btn btn-primary">SE CONNECTER</button>
        </div>
    </div>
  </div>
</div>
</form>
