<?php $this->load->view('restrita/layout/topbar'); ?> 
<?php $this->load->view('restrita/layout/navbar'); ?>
<?php $this->load->view('restrita/layout/sidebar'); ?>

			<div class="page-inner">
                <div class="page-title">
                    <h3 class="breadcrumb-header"><?php echo $titulo; ?></h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb breadcrumb-with-header">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active"><?php echo $titulo; ?></li>
                        </ol>
                    </div>
                </div>
				<div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title"><?php echo $titulo; ?></h4>
                                </div>
                                <div class="panel-body">
									<form method="post" name="form_core" accept-charset="utf-8" enctype="multpart/form-data">
										<div class="form-row">
											<div class="form-group col-md-4">
                                            	<label class="col-sm-2 control-label">Nome</label>
												<div class="input">
                                            		<input type="text" class="form-control" placeholder="Nome"
													name="first_name" value="<?php echo (isset($usuario) ? $usuario->first_name : set_value('first_name')); ?>">
												</div>
												<span class="col-sm-12"><?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?></span>													
                                        	</div>
											<div class="form-group col-md-4">																								
                                            	<label class="col-sm-2 control-label">Sobrenome</label>
												<div class="input">	
                                            		<input type="text" class="form-control" placeholder="Sobrenome"
													name="last_name" value="<?php echo (isset($usuario) ? $usuario->last_name : set_value('last_name')); ?>">
												</div>
												<span class="col-sm-12"><?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?></span>													
                                        	</div>
											<div class="form-group col-md-4">																								
                                            	<label class="col-sm-2 control-label">CPF</label>
												<div class="input">	
                                            		<input type="text" class="form-control cpf" placeholder="CPF"
													name="user_cpf" value="<?php echo (isset($usuario) ? $usuario->user_cpf : set_value('user_cpf')); ?>">
												</div>
												<span class="col-sm-12"><?php echo form_error('user_cpf', '<div class="text-danger">', '</div>'); ?></span>													
                                        	</div>											
										</div>
										<div class="form-row">
											<div class="form-group col-md-2">																								
                                            	<label class="col-sm-2 control-label">Telefone</label>
												<div class="input">	
                                            		<input type="text" class="form-control sp_celphones" placeholder="Telefone"
													name="phone" value="<?php echo (isset($usuario) ? $usuario->phone : set_value('phone')); ?>">
												</div>
												<span class="col-sm-12"><?php echo form_error('phone', '<div class="text-danger">', '</div>'); ?></span>													
                                        	</div>
											<div class="form-group col-md-3">
                                            	<label class="col-sm-4 control-label">E-mail</label>
												<div class="input">
                                            		<input type="email" class="form-control" placeholder="E-mail"
													name="email" value="<?php echo (isset($usuario) ? $usuario->email : set_value('email')); ?>">
												</div>
												<span class="col-sm-12"><?php echo form_error('email', '<div class="text-danger">', '</div>'); ?></span>													
                                        	</div>
											<div class="form-group col-md-2">
                                            	<label class="col-sm-4 control-label">CEP</label>
												<div class="input">
                                            		<input type="text" class="form-control cep" placeholder="CEP"
													name="user_cep" value="<?php echo (isset($usuario) ? $usuario->user_cep : set_value('user_cep')); ?>">
												</div>
												<span class="col-sm-12"><?php echo form_error('user_cep', '<div class="text-danger">', '</div>'); ?></span>	
												<div id="user_cep"></div>												
                                        	</div>
											<div class="form-group col-md-5">																								
                                            	<label class="col-sm-2 control-label">Endereço</label>
												<div class="input">	
                                            		<input type="text" class="form-control" placeholder="Endereço"
													name="user_endereco" value="<?php echo (isset($usuario) ? $usuario->user_endereco : set_value('user_endereco')); ?>" readonly>
												</div>
												<span class="col-sm-12"><?php echo form_error('user_endereco', '<div class="text-danger">', '</div>'); ?></span>													
                                        	</div>											
										</div>
										<div class="form-row">
											<div class="form-group col-md-2">																								
                                            	<label class="col-sm-2 control-label">Número</label>
												<div class="input">	
                                            		<input type="text" class="form-control" placeholder="Número"
													name="user_numero_endereco" value="<?php echo (isset($usuario) ? $usuario->user_numero_endereco : set_value('user_numero_endereco')); ?>">
												</div>
												<span class="col-sm-12"><?php echo form_error('user_numero_endereco', '<div class="text-danger">', '</div>'); ?></span>													
                                        	</div>	
											<div class="form-group col-md-4">																								
                                            	<label class="col-sm-2 control-label">Bairro</label>
												<div class="input">	
                                            		<input type="text" class="form-control" placeholder="Bairro"
													name="user_bairro" value="<?php echo (isset($usuario) ? $usuario->user_bairro : set_value('user_bairro')); ?>" readonly>
												</div>
												<span class="col-sm-12"><?php echo form_error('user_bairro', '<div class="text-danger">', '</div>'); ?></span>													
                                        	</div>											
										</div>
										<div class="form-row">
											<div class="form-group col-md-4">
                                            	<label class="col-sm-4 control-label">Cidade</label>
												<div class="input">
                                            		<input type="text" class="form-control" placeholder="Cidade"
													name="user_cidade" value="<?php echo (isset($usuario) ? $usuario->user_cidade : set_value('user_cidade')); ?>" readonly>
												</div>
												<span class="col-sm-12"><?php echo form_error('user_cidade', '<div class="text-danger">', '</div>'); ?></span>													
                                        	</div>
											<div class="form-group col-md-2">																								
                                            	<label class="col-sm-2 control-label">UF</label>
												<div class="input">	
                                            		<input type="text" class="form-control uf" placeholder="UF"
													name="user_uf" value="<?php echo (isset($usuario) ? $usuario->user_uf : set_value('user_uf')); ?>" readonly>
												</div>
												<span class="col-sm-12"><?php echo form_error('user_uf', '<div class="text-danger">', '</div>'); ?></span>													
                                        	</div>
										<div class="form-row">
											<div class="form-group col-md-3">
												<label class="col-sm-2 control-label">Ativo</label>
                                            	<select class="form-control" name="active">

													<?php if (isset($usuario)) : ?>
														<option value="0" <?php echo ($usuario->active == 0 ? 'selected' : ''); ?>>Não</option>
														<option value="1" <?php echo ($usuario->active == 1 ? 'selected' : ''); ?>>Sim</option>														
													<?php else: ?>	
														<option value="0">Não</option>
														<option value="1">Sim</option>		
													<?php endif; ?>	

												</select>
												<span class="col-sm-12"><?php echo form_error('active', '<div class="text-danger">', '</div>'); ?></span>	
                                        	</div>
											<div class="form-group col-md-3">
												<label class="col-sm-10 control-label">Perfil de Acesso</label>
                                            	<select class="form-control" name="perfil">

													<?php foreach($grupos as $grupo) : ?>
														<?php if (isset($usuario)) : ?>
															<option value="<?php echo $grupo->id; ?>" <?php echo ($perfil->id == $grupo->id ? 'selected' : ''); ?>><?php echo $grupo->description; ?></option>													
														<?php else: ?>	
															<option value="<?php echo $grupo->id; ?>"><?php echo $grupo->description; ?></option>
														<?php endif; ?>	
													<?php endforeach; ?>			
												</select>
												<span class="col-sm-12"><?php echo form_error('perfil', '<div class="text-danger">', '</div>'); ?></span>	
                                        	</div>
											<div class="form-group col-md-3">
                                            	<label class="col-sm-10 control-label">Senha</label>
												<div class="input">
                                            		<input type="password" class="form-control password" placeholder="Senha" name="password">
												</div>
												<span class="col-sm-12"><?php echo form_error('password', '<div class="text-danger">', '</div>'); ?></span>													
                                        	</div>
											<div class="form-group col-md-3">
                                            	<label class="col-sm-10 control-label">Confirmar Senha</label>
											<div class="input">
                                            	<input type="password" class="form-control" placeholder="Confirmar Senha" name="confirma_senha"> 
											</div>
												<span class="col-sm-12"><?php echo form_error('confirma_senha', '<div class="text-danger">', '</div>'); ?></span>													
                                        	</div>											
										</div>
										<div class="form-row">																																	
										<div class="form-group col-md-4">																								
                                            	<label class="col-sm-2 control-label">Avatar</label>
												<div class="input">	
                                            		<input type="file" class="form-control" name="user_foto_file">
												</div>
												<span class="col-sm-12"><?php echo form_error('user_foto', '<div class="text-danger">', '</div>'); ?></span>
												<div id="user_foto"></div>													
                                        	</div>
											<div class="clearfix col-md-8"></div>
											<div class="form-group col-md-3">	
											<?php if (isset($usuario)) : ?>
												<div id="box-foto-usuario">
													<input type="hidden" name="user_foto" value="<?php echo $usuario->user_foto; ?>">
													<img src="<?php echo base_url('uploads/usuarios/'.$usuario->user_foto); ?>" class="img-circle" width="80" alt="Foto do Usuário">
												</div>
												<?php else: ?>
													<div id="box-foto-usuario">
													<img src="<?php echo base_url('uploads/usuarios/sem-foto.jpg'); ?>" class="img-circle" width="80" alt="Foto do Usuário">
												</div>
												<?php endif; ?>
												<?php if (isset($usuario)): ?>
													<input type="hidden" name="usuario_id" value="<?php echo $usuario->id; ?>">
												<?php endif; ?>	
                                        	</div>
										</div>
											<div class="clearfix"></div>
										</div>
										<div><button type="submit" class="btn btn-success">Salvar</button>
										<a href="<?php echo base_url('restrita/' . $this->router->fetch_class()); ?>" class="btn btn-danger">Voltar</a>
										</div>
									</form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->

                <div class="page-footer">
                    <p class="no-s">Made with <i class="fa fa-heart"></i> by stacks</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        <nav class="cd-nav-container" id="cd-nav">
            <header>
                <h3>DEMOS</h3>
            </header>
            <div class="col-md-6 demo-block demo-selected demo-active">
                <p>Dark<br>Design</p>
            </div>
            <div class="col-md-6 demo-block">
                <a href="../admin2/index.html"><p>Light<br>Design</p></a>
            </div>
            <div class="col-md-6 demo-block">
                <a href="../admin3/index.html"><p>Material<br>Design</p></a>
            </div>
            <div class="col-md-6 demo-block demo-coming-soon">
                <p>Horizontal<br>(Coming)</p>
            </div>
            <div class="col-md-6 demo-block demo-coming-soon">
                <p>Coming<br>Soon</p>
            </div>
            <div class="col-md-6 demo-block demo-coming-soon">
                <p>Coming<br>Soon</p>
            </div>
        </nav>
        <div class="cd-overlay"></div>
	</div>

