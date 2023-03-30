<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends MX_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('form', 'url', 'file'));
		$this->load->library(array('session', 'form_validation'));

	}

	public function index() {

		$tables = array();
		foreach ($this->db->list_tables() as $table) {
			$tables[$table] = $table;
		}
		$data['tables'] = $tables;
		/*
		$sql = "SELECT TABLE_NAME, COLUMN_NAME, CONSTRAINT_NAME, REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_NAME = 'ec_cursus' AND COLUMN_NAME = 'filier_id'";
		$fields = $this->db->query($sql)->row();*/
		
		// echo "<pre>";
		// print_r($fields);
		// echo "</pre>";

		$this->load->view('crud/index', $data);
	}

	public function generate_module() {

		$this->form_validation->set_rules('table', 'Table', 'required');

		if ($this->form_validation->run()) {
			$table = $_POST['table'];

			//check for a primary_key
			$fields = $this->db->field_data($table);
			foreach ($fields as $field) {
				if ($field->primary_key == '1') {
					$primary_key = $field->name;
				}
			}
//			echo '<pre>';
//			var_dump($fields);
//			die;
			if (!isset($primary_key)) {
				$this->session->set_flashdata('crud', 'Your tables does not have a primary key');
				redirect(base_url('crud/index'));
			}

			$getcontroller = $this->My_model->get_one('admin_controllers',['table_name'=>$table]);
			if (!file_exists('application/modules/' . $getcontroller->module)) {
				mkdir('application/modules/' . $getcontroller->module . '/controllers/', 0777, TRUE);
				mkdir('application/modules/' . $getcontroller->module . '/models/', 0777, TRUE);
			}

			if (!file_exists('application/modules/' . $getcontroller->module. '/views/'.strtolower($getcontroller->controller))) {
				mkdir('application/modules/' . $getcontroller->module . '/views/'.strtolower($getcontroller->controller).'/', 0777, TRUE);
			}



			if (!$this->generate_controller($primary_key, $table, $fields)) {
				$this->session->set_flashdata('crud', 'Error while generating the controller');
				redirect(base_url('crud/index'));
			}

			if (!$this->generate_model($primary_key, $table)) {
				$this->session->set_flashdata('crud', 'Error while generating the model');
				redirect(base_url('crud/index'));
			}
			if (!$this->generate_index_view($primary_key, $table, $fields)) {
				$this->session->set_flashdata('crud', 'Error while generating the index view');
				redirect(base_url('crud/index'));
			}

			if (!$this->generate_add_view($primary_key, $table, $fields)) {
				$this->session->set_flashdata('crud', 'Error while generating the add view');
				redirect(base_url('crud/index'));
			}
			if (!$this->generate_view_view($primary_key, $table, $fields)) {
				$this->session->set_flashdata('crud', 'Error while generating the view view');
				redirect(base_url('crud/index'));
			}
			if (!$this->generate_edit_view($primary_key, $table, $fields)) {
				$this->session->set_flashdata('crud', 'Error while generating the edit view');
				redirect(base_url('crud/index'));
			}
			$this->session->set_flashdata('msg', 'Module generated succesfully.');
			redirect(base_url($getcontroller->module."/".$getcontroller->controller. '/index'));

		} else {
			redirect(base_url('crud'));
		}


	}


	protected function generate_controller($primary_key, $table, $fields) {
	$getcontroller = $this->My_model->get_one('admin_controllers',['table_name'=>$table]);
	$controller_code = "<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class " . ucfirst($getcontroller->controller) . " extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	\$this->data['page_title'] = '".$getcontroller->controller."';
	\$this->load->model('".$getcontroller->controller."_model');
	}

		public function index(){
			\$this->load->library( 'pagination' );
			\$config[ 'base_url' ]      = base_url( '" . $getcontroller->module."/".$getcontroller->controller . "/index' );
			\$config[ 'per_page' ]      = 10;
			\$config[ 'num_links' ]     = 2;
			\$config[ 'total_rows' ] = \$this->db->get( '" . $table . "' )->num_rows();
			\$this->pagination->initialize( \$config );
			\$this->data[ 'listing' ] = true;
			\$this->data[ 'datas' ]   = \$this->db->order_by( '" . $primary_key . "', 'DESC' )->get( '" . $table . "', \$config[ 'per_page' ],\$this->uri->segment( 4 ));
			\$this->data[ 'title' ] = '".$getcontroller->controller."';
			\$this->render_template('".strtolower($getcontroller->controller)."/index', \$this->data);

		}

		public function add(){\n";
//set some basic validation rules
		foreach ($fields as $field) {
			if ($field->primary_key != '1' && $field->name != 'created' && $field->name != 'modified') {
				if ($field->type == 'int') {
					$controller_code .= "\t\t\t\$this->form_validation->set_rules('" . $field->name . "', '" . ucfirst($field->name) . "', 'required|numeric');\n";
				} else {
					if ($field->name == 'email') {
						$controller_code .= "\t\t\t\$this->form_validation->set_rules('" . $field->name . "', '" . ucfirst($field->name) . "', 'required|valid_email');\n";
					} else {
						$controller_code .= "\t\t\t\$this->form_validation->set_rules('" . $field->name . "', '" . ucfirst($field->name) . "', 'required');\n";
					}
				}
			}
		};
		$controller_code .= "
			if(\$this->form_validation->run()){\n";
		//check for created field in db
		foreach ($fields as $field) {
			if ($field->name == 'created') {
				$controller_code .= "\t\t\t\$_POST['created'] = time();\n";
			} elseif ($field->name == 'modified') {
				$controller_code .= "\t\t\t\$_POST['modified'] = 0;\n";

			}
		}

		$controller_code .= "
				\$insert = \$this->db->insert('" . $table . "',\$_POST);

				if(!empty(\$insert)){
					\$this->session->set_flashdata('msg','Entry added succesfuly');
				}else{
					\$this->session->set_flashdata('msg','Error while inserting data');
				}
			redirect(base_url('" .$getcontroller->module."/". $getcontroller->controller . "/index'));
			}
			\$this->data[ 'title' ] = '".$getcontroller->controller."';
			\$this->render_template('".strtolower($getcontroller->controller)."/add', \$this->data);

		}

		public function view(\$id){
			\$this->data['data'] = \$this->db->get_where('" . $table . "',array('" . $primary_key . "'=>\$id))->row();
			\$this->data[ 'title' ] = 'Add". $getcontroller->controller."';
			\$this->render_template('".strtolower($getcontroller->controller) ."/view', \$this->data);
		}

		public function edit(\$id){
			\$this->data['data'] = \$this->db->get_where('" . $table . "',array('" . $primary_key . "'=>\$id))->row();\n\n";
//some basic validations
		foreach ($fields as $field) {
			if ($field->primary_key != '1' && $field->name != 'created' && $field->name != 'modified') {
				if ($field->type == 'int') {
					$controller_code .= "\t\t\t\$this->form_validation->set_rules('" . $field->name . "', '" . ucfirst($field->name) . "', 'required|numeric');\n";
				} else {
					if ($field->name == 'email') {
						$controller_code .= "\t\t\t\$this->form_validation->set_rules('" . $field->name . "', '" . ucfirst($field->name) . "', 'required|valid_email');\n";
					} else {
						$controller_code .= "\t\t\t\$this->form_validation->set_rules('" . $field->name . "', '" . ucfirst($field->name) . "', 'required');\n";
					}
				}
			}
		}

		$controller_code .= "
			if(\$this->form_validation->run()){\n";

		//check for created field in db
		foreach ($fields as $field) {
			if ($field->name == 'modified') {
				$controller_code .= "\t\t\t\$_POST['modified'] = time();\n\n";
			}
		}

		$controller_code .= "\t\t\t\$this->db->where('" . $primary_key . "',\$id);
					\$insert = \$this->db->update('" . $table . "',\$_POST);

					if(!empty(\$insert)){
						\$this->session->set_flashdata('msg','Entry updated succesfuly');
					}else{
						\$this->session->set_flashdata('msg','Error updating inserting data');
					}
				redirect(base_url('". $getcontroller->module."/" . $getcontroller->controller . "/index'));
				}
			\$this->data[ 'title' ] = 'Edit ".$getcontroller->controller."';
			\$this->render_template('".strtolower($getcontroller->controller) ."/edit', \$this->data);
		
		}

		public function delete(\$id){
			if(\$this->db->delete('" . $table . "',array('" . $primary_key . "'=>\$id))){
				\$this->session->set_flashdata('msg','Entry deleted succesfuly');
				redirect(base_url('".$getcontroller->module ."/" . ucfirst($getcontroller->controller) . "/index'));
			}
		}
}

			";

//create and populate the controller
		$controller = 'application/modules/' . $getcontroller->module . '/controllers/' . ucfirst($getcontroller->controller) . '.php';
		if (!write_file($controller, $controller_code)) {
			return false;
		} else {
			return true;
		}
	}


	protected function generate_model($primary_key, $table) {
		$getcontroller = $this->My_model->get_one('admin_controllers',['table_name'=>$table]);

		$model_code = "
		<?php

		class " . ucfirst($getcontroller->controller) . "_model extends CI_Model {

			function __construct() {
				parent::__construct();
			}


		}
			";

		$model = 'application/modules/' . $getcontroller->module . '/models/' . $getcontroller->controller. '_model.php';
		if (!write_file($model, $model_code)) {
			return false;
		} else {
			return true;
		}
	}

	protected function generate_index_view($primary_key, $table, $fields) {
		$getcontroller = $this->My_model->get_one('admin_controllers',['table_name'=>$table]);

		$index_view_code = "<?php echo \$this->session->flashdata('msg');?>
<h3>" . $getcontroller->controller . "</h3>

<a href='<?=base_url('" . $getcontroller->module."/".$getcontroller->controller. "/add')?>'>Add</a>

	<table class='table table-striped table-bordered'>
		<thead>\n";

		foreach ($fields as $k => $v) {
			if (count($fields) == $k + 1) {
				$index_view_code .= "\t\t\t<th>" . ucfirst($v->name) . "</th>";
			} else {
				$index_view_code .= "\t\t\t<th>" . ucfirst($v->name) . "</th>\n";
			}
		}
		$index_view_code .= "<th>View</th>";
		$index_view_code .= "<th>Edit</th>";
		$index_view_code .= "<th>Delete</th>";
		$index_view_code .= "
		</thead>
		<tbody>
			<?php foreach ( \$datas->result() as \$data ): ?>
				<tr>
";
		foreach ($fields as $k => $v) {
			if (count($fields) == $k + 1) {
				if ($v->name != 'created' && $v->name != 'modified') {
					$index_view_code .= "\t\t\t\t\t<td><?=\$data->" . $v->name . "?></td>\n";
					$index_view_code .= "\t\t\t\t\t<td><a href='<?=base_url('" . $getcontroller->module."/".$getcontroller->controller . '/view/' . "'." . '$data->' . $primary_key . ");?>'>View</a></td>\n";
					$index_view_code .= "\t\t\t\t\t<td><a href='<?=base_url('" . $getcontroller->module."/".$getcontroller->controller . '/edit/' . "'." . '$data->' . $primary_key . ");?>'>Edit</a></td>\n";
					$index_view_code .= "\t\t\t\t\t<td><a data-url='<?=base_url('" . $getcontroller->module."/".$getcontroller->controller . '/delete/' . "'." . '$data->' . $primary_key . ");?>' href='javascript:void(0)' class='delete'>Delete</a></td>";
				} else {
					$index_view_code .= "\t\t\t\t\t<td><?=date('Y-m-d-h:m',\$data->" . $v->name . ")?></td>\n";
					$index_view_code .= "\t\t\t\t\t<td><a href='<?=base_url('" . $getcontroller->module."/".$getcontroller->controller. '/view/' . "'." . '$data->' . $primary_key . ");?>'>View</a></td>\n";
					$index_view_code .= "\t\t\t\t\t<td><a href='<?=base_url('" . $getcontroller->module."/".$getcontroller->controller . '/edit/' . "'." . '$data->' . $primary_key . ");?>'>Edit</a></td>\n";
					$index_view_code .= "\t\t\t\t\t<td><a data-url='<?=base_url('" . $getcontroller->module."/".$getcontroller->controller . '/delete/' . "'." . '$data->' . $primary_key . ");?>' href='javascript:void(0)' class='delete'>Delete</a></td>";
				}
			} else {
				if ($v->name != 'created' && $v->name != 'modified') {

					$index_view_code .= "\t\t\t\t\t<td><?=\$data->" . $v->name . "?></td>\n";
				} else {
					$index_view_code .= "\t\t\t\t\t<td><?=date('Y-m-d-h:m',\$data->" . $v->name . ")?></td>\n";
				}
			}


		}

		$index_view_code .= "
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>

<?php echo \$this->pagination->create_links(); ?>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script>
		$(document).ready(function(){
			$('.delete').click(function(){
				var url = $(this).data('url');
				if (confirm('Are you sure you want to delete this entry?')) {
					window.location = url
				}
			});
		});
</script>
		";


		$index_view = 'application/modules/' . $getcontroller->module. '/views/'.strtolower($getcontroller->controller).'/index.php';
		if (!write_file($index_view, $index_view_code)) {
			return false;
		} else {
			return true;
		}
	}

	protected function generate_add_view($primary_key, $table, $fields) {
		$getcontroller = $this->My_model->get_one('admin_controllers',['table_name'=>$table]);
		$add_view_code = "<div class=\"content-wrapper\">
		<!-- Main content -->
		<section class=\"content\"><h3>Add " . $getcontroller->controller . "</h3>

		<?=form_open('" . $getcontroller->module."/".$getcontroller->controller. "/add')?>
		\n\n";
		foreach ($fields as $field) {
			//chef if is foreign key
			$sql_foreign = "SELECT TABLE_NAME, COLUMN_NAME, CONSTRAINT_NAME, REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_NAME = '".$table."' AND COLUMN_NAME = '".$field->name."'";
			$foreign = $this->db->query($sql_foreign)->row();

			if ($field->primary_key != '1' && $field->name != "created" && $field->name != 'modified') {
				$add_view_code .= "\t\t\t<div class='form-group col-md-3'><label>" . $field->name . "</label>\n";
				if(!empty($foreign)){
					$method = 'dropdown_'.$foreign->REFERENCED_TABLE_NAME;
					$add_view_code .= "\t\t\t<?=form_dropdown('" . $field->name . "',\$this->My_model->multi_dropdown('".$getcontroller->table_name."'),set_value('" . $field->name . "'),\"class='form-control' ,placeholder='" . $field->name . "'\")?>
					<?php echo form_error('" . $field->name . "','<div class=\"text-danger\">', '</div>'); ?></div>\n\n";

				}else{
					if($field->type == 'text'){
						$add_view_code .= "\t\t\t<?=form_textarea('" . $field->name . "',set_value('" . $field->name . "'),\"class='form-control' ,placeholder='" . $field->name . "'\")?>
						<?php echo form_error('" . $field->name . "','<div class=\"text-danger\">', '</div>'); ?></div>\n\n";
					}else{
						$add_view_code .= "\t\t\t<?=form_input('" . $field->name . "',set_value('" . $field->name . "'),\"class='form-control' ,placeholder='" . $field->name . "'\")?>
						<?php echo form_error('" . $field->name . "','<div class=\"text-danger\">', '</div>'); ?></div>\n\n";
					}
				}
			}
		}

		$add_view_code .= "<div class='row'>
		<?=form_submit('','Add " . $getcontroller->controller . "','class=\"btn btn-sm btn-primary\", style=\"margin-top:20px\"')?>
		</div></section></div>";
		$add_view = 'application/modules/' . $getcontroller->module. '/views/'.strtolower($getcontroller->controller).'/add.php';
		if (!write_file($add_view, $add_view_code)) {
			return false;
		} else {
			return true;
		}
	}

	protected function generate_view_view($primary_key, $table, $fields) {
		$getcontroller = $this->My_model->get_one('admin_controllers',['table_name'=>$table]);
		
		$view_view_code = "<div class=\"content-wrapper\">
		<!-- Main content -->
		<section class=\"content\">
		<h3>" .$getcontroller->controller . "</h3>

	<table class='table table-border'>

		<?php foreach(\$data as \$k => \$v):?>
			<tr><td><?=\$k?></td><td><?=\$v?></td></tr>
		<?php endforeach;?>
	</table></section></div>";

		$view_view = 'application/modules/' . $getcontroller->module. '/views/'.strtolower($getcontroller->controller).'/view.php';
		if (!write_file($view_view, $view_view_code)) {
			return false;
		} else {
			return true;
		}
	}

	protected function generate_edit_view($primary_key, $table, $fields) {
		$getcontroller = $this->My_model->get_one('admin_controllers',['table_name'=>$table]);
		$edit_view_code = "<div class='content-wrapper'>
		<!-- Main content -->
		<section class='content'>
<h3>Add " . $getcontroller->controller . "</h3>

		<?=form_open('" . $getcontroller->module."/".$getcontroller->controller. "/edit/'.\$data->$primary_key)?>\n\n";

		foreach ($fields as $field) {
			//chef if is foreign key
			$sql_foreign = "SELECT TABLE_NAME, COLUMN_NAME, CONSTRAINT_NAME, REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_NAME = '".$table."' AND COLUMN_NAME = '".$field->name."'";
			$foreign = $this->db->query($sql_foreign)->row();

			if ($field->primary_key != '1' && $field->name != 'created' && $field->name != 'modified') {
				$edit_view_code .= "\t\t\t<div class='form-group col-md-3'><label>" . $field->name . "</label><?php echo form_error('" . $field->name . "'); ?>\n";
				
				if(!empty($foreign)){
					$method = 'dropdown_'.$foreign->REFERENCED_TABLE_NAME;
					$edit_view_code .= "\t\t\t<?=form_dropdown('" . $field->name . "',\$this->My_model->multi_dropdown('".$getcontroller->table_name."'),set_value('" . $field->name . ",',\$data->$field->name),\"class='form-control' ,placeholder='" . $field->name . "'\")?>
					<?php echo form_error('" . $field->name . "','<div class=\"text-danger\">', '</div>'); ?></div>\n\n";

				}else{
					if($field->type == 'text'){
						$edit_view_code .= "\t\t\t<?=form_textarea('" . $field->name . "',set_value('" . $field->name . "',\$data->$field->name),\"class='form-control' ,placeholder='" . $field->name . "'\")?>
						<?php echo form_error('" . $field->name . "','<div class=\"text-danger\">', '</div>'); ?></div>\n\n";
					}else{
						$edit_view_code .= "\t\t\t<?=form_input('" . $field->name . "',set_value('" . $field->name . "',\$data->$field->name),\"class='form-control' ,placeholder='" . $field->name . "'\")?>
						<?php echo form_error('" . $field->name . "','<div class=\"text-danger\">', '</div>'); ?></div>\n\n";
					}
				}
			}
		}

		$edit_view_code .= "<div class='row'>
		<?=form_submit('','Update " . $getcontroller->controller . "','class=\"btn btn-primary\"')?>
		</div></section></div>";
		$edit_view = 'application/modules/' . $getcontroller->module . '/views/'.strtolower($getcontroller->controller).'/edit.php';
		if (!write_file($edit_view, $edit_view_code)) {
			return false;
		} else {
			return true;
		}
	}

}
