<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>LITTERAE | Cadastro de Jurados</title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'><link rel="stylesheet" href="css/styleCad.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<?php
    if (isset($_GET["erro"])) {
      switch ($_GET["erro"]) {
        case 'erroU':
          echo "<script> Swal.fire({
      				  title: 'Usuário já existente!',
      				  text: 'O nome de usuário escolhido já está sendo usado.',
      				  type: 'error'
      				}) </script>";
          break;
        case 'erroE':
          echo "<script> Swal.fire({
      				  title: 'E-mail já existente!',
      				  text: 'Este endereço de e-mail já foi cadastrado.',
      				  type: 'error'
      				}) </script>";
          break;
          case 'erroS':
          echo "<script> Swal.fire({
                title: 'As senhas devem ser iguais!',
                text: '',
                type: 'warning'
              }) </script>";
          break;
      }
    }
    if (isset($_GET["sucesso"])) {
      switch ($_GET["sucesso"]) {
      case 'SucessoCadJ':
          echo "<script> Swal.fire({
                title: 'Cadastro realizado com sucesso!',
                text: '',
                width: 450,
                type: 'success',
                showConfirmButton: false,
                timer: 1500
              }) </script>";
          break;
      }
    }
  ?>
    <div class="image-container set-full-height" style="background-image: url(img/login01.jpg);">

	    <!--   Big container   -->
	    <div class="container">
	    	<form method="post" action="acaoJurado.php">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!-- Wizard container -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="red" id="wizard">
		                    
		                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

		                    	<div class="wizard-header">
		                        	<!--<h3 class="wizard-title">
		                        		Book a Room
		                        	</h3>
									<h5>This information will let us know more about you.</h5>-->
		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <!--<li><a href="#details" data-toggle="tab">&nbsp;</a></li>-->
			                            <li><a href="#cadastro" data-toggle="tab">Cadastro de Jurados</a></li>
			                            <!--<li><a href="#description" data-toggle="tab">&nbsp;</a></li>-->
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="cadastro">
		                            	<div class="row">
			                            	<div class="col-sm-12">
			                                	<h4 class="info-text"> Preencha os seguintes campos</h4>
			                            	</div>
		                                	<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">person_outline</i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Nome</label>
			                                          	<input name="nome" type="text" class="form-control" required="true">
			                                        </div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">account_circle</i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Usuário</label>
			                                          	<input name="usuario" type="text" class="form-control" required="true">
			                                        </div>
												</div>

		                                	</div>
		                                	<div class="col-sm-6">
		                                    	<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Email</label>
			                                          	<input name="email" type="email" class="form-control" required="true">
			                                        </div>
												</div>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">call</i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Telefone</label>
			                                          	<input name="telefone" type="tel" class="form-control" required="true">
			                                        </div>
												</div>
		                                	</div>
		                                	<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">vpn_key</i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Senha</label>
			                                          	<input name="senha" type="password" class="form-control" required="true">
			                                        </div>
												</div>
		                                	</div>

		                                	<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">vpn_key</i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Confirmar Senha</label>
			                                          	<input name="confirmS" type="password" class="form-control" required="true">
			                                        </div>
												</div>
		                                	</div>
		                            	</div>
		                            </div>
		                     
		                        </div>
	                        	<div class="wizard-footer">
	                            	<div class="pull-right">
	                                    <button class='btn btn-finish btn-fill btn-danger btn-wd' name='cadJ'>Cadastrar</button>
	                                    
	                                </div>
	                                <div class="pull-left">

										<div class="footer-checkbox">
											<div class="col-sm-12">
											  
										  </div>
										</div>
	                                </div>
	                                <div class="clearfix"></div>
	                        	</div>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div> <!-- row -->
	    </form>
		</div> <!--  big container -->

	    <div class="footer">
	        <div class="container text-center">
	             
	        </div>
	    </div>
	</div>
</body>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script><script  src="js/scriptCad.js"></script>
</html>