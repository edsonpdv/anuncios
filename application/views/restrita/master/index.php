<?php $this->load->view('restrita/layout/topbar'); ?>
<?php $this->load->view('restrita/layout/navbar'); ?>
<?php $this->load->view('restrita/layout/sidebar'); ?>

<div class="page-inner">
	<div class="page-title">
		<h3 class="breadcrumb-header">Data Tables</h3>
		<div class="page-breadcrumb">
			<ol class="breadcrumb breadcrumb-with-header">
				<li><a href="index.html">Home</a></li>
				<li><a href="#">Tables</a></li>
				<li class="active">Datatables</li>
			</ol>
		</div>
	</div>
	<div id="main-wrapper">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-white">

				<?php if ($mensagem = $this->session->flashdata('sucesso')) : ?>
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo $mensagem; ?>
						</div>
					<?php endif; ?>

					<?php if ($mensagem = $this->session->flashdata('erro')) : ?>
						<div class="alert alert-danger alert-dismissible" role="alert">
							<a href=""><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></a>
							<?php echo $mensagem; ?>
						</div>
					<?php endif; ?>

					<div class="panel-heading clearfix">
						<h4 class="panel-title">Basic example</h4>
						<a href="<?php echo base_url('restrita/' . $this->router->fetch_class() . '/core/'); ?>" class="btn btn-info m-b-sm" style="float: right; margin: 0px 0px 0px 30px;">Cadastrar</a>
						
					</div>
					<div class="d-block">
					
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
								<thead>
									<tr>
										<th>#</th>
										<th>Categoria</th>
										<th>Meta link da Categoria</th>
										<th>Ícone Categoria</th>
										<th>Ativo</th>
										<th>Ação</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>#</th>
										<th>Categoria</th>
										<th>Meta link da Categoria</th>
										<th>Ícone Categoria</th>
										<th>Ativo</th>
										<th>Ação</th>
									</tr>
								</tfoot>
								
								<?php foreach ($masters as $master) : ?>
									<tr>

										<td><?php echo $master->categoria_pai_id; ?></td>
										<td><?php echo $master->categoria_pai_nome; ?></td>
										<td><?php echo $master->categoria_pai_meta_link; ?></td>
										<td><?php echo $master->categoria_pai_classe_icone; ?></td>

										<td><?php echo ($master->categoria_pai_ativa == 1 ? '<button type="button" class="btn btn-success btn-xs">Sim</button>' : '<button type="button" class="btn btn-danger btn-xs">Não</button>'); ?> </td>
										<td>

											<a href="<?php echo base_url('restrita/' . $this->router->fetch_class() . '/core/' . $master->categoria_pai_id); ?>" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Editar"><span class="icon-note"></span></a>
											<a href="<?php echo base_url('restrita/' . $this->router->fetch_class() . '/delete/' . $master->categoria_pai_id); ?>" class="btn btn-danger btn-xs delete" data-confirm="Quer mesmo excluir essa categoria?" data-toggle="tooltip" data-placement="top" title="Excluir"><span class="icon-close"></span></a>

										</td>
									</tr>
								<?php endforeach; ?>
								
								</tbody>
							</table>
						</div>
					</div>
				</div>
