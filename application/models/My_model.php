<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}


	function get_one($table, $critere = []) {
		$this->db->where($critere);
		$query = $this->db->get($table);
		return $query->row();
	}

	function empty_one($table = NULL) {
		$request = new stdClass();

		$champs = $this->db->list_fields($table);
		foreach ($champs as $key => $value) {
			$request->$value =NULL;
		}
		return $request;
	}

	function get_all($table, $critere = []) {
		$this->db->where($critere);
		$query = $this->db->get($table);
		return $query->result();
	}
	
	function get_query($query){
        $query=$this->db->query($query);
      if ($query) {
         return $query->result();
      }
    }

    
     function get_query_one($query){
      $query=$this->db->query($query);
      if ($query) {
         return $query->row();
      }
    }
    

	public function insert_data($table,$data = [])
	{
		$query =$this->db->insert($table,$data);
        if($query){
        	return TRUE;
        }
	}

	function dropdown_pays($get = false, $filter = false) {
		if($get) {
		   return $this->db->query("SELECT title FROM countries_translations WHERE language = ? AND id = ? ORDER BY id", array($this->session->userdata('site_lang'), $get))->row()->title;
		} else {
			$select = array();
			$select[0] = '-';

			if($filter) {
				 $query = $this->db->query('SELECT id, title, SUBSTRING(title, 1, 1) AS letter FROM countries_translations WHERE language = ? AND id IN($filter) ORDER BY letter ASC, title ASC', array($this->session->userdata('site_lang')));
			} else {
			    $query = $this->db->query('SELECT id, title, SUBSTRING(title, 1, 1) AS letter FROM countries_translations WHERE language = ? ORDER BY letter ASC, title ASC', array($this->session->userdata('site_lang')));
			}
			foreach($query->result() as $row) {
				$select[$row->letter][$row->id] = $row->title;
			}

			return $select;
		}
	}

	public function dropdown_province($get = false){
			if($get){
				return  $this->db->query('SELECT province_name FROM '.$this->db->dbprefix('provinces').' WHERE province_id = ? ORDER BY province_name ASC',$get)->row()->province_name;

			}else{
				$query = $this->db->query('SELECT province_id, province_name FROM '.$this->db->dbprefix('provinces').' ORDER BY province_name ASC');
	      $select[null] = "-";
			  foreach($query->result() as $row) {
				   $select[$row->province_id] = $row->province_name;
			  }
			return $select;
			}

	}

	public function dropdown_commune($get = false, $filter = false)
	{
		if($get) {
			$query = $this->db->query('SELECT commune_id, commune_name FROM '.$this->db->dbprefix('communes').' WHERE commune_id='.$get)->row();
		    return $query->commune_name;
		} else {
			if($filter){
				$query = $this->db->query('SELECT commune_id, commune_name FROM '.$this->db->dbprefix('communes').' WHERE province_id='.$filter);
			    
				foreach($query->result() as $row) {
				   $select[$row->commune_id] = $row->commune_name;
			    }
			    asort($select);
			  	return $select;
			}
		}
	}

	public function dropdown_colline($get = false, $filter = false)
	{
		if($get) {
			$query = $this->db->query('SELECT colline_id, colline FROM '.$this->db->dbprefix('collines').' WHERE colline_id='.$get)->row();
		    return $query->colline;
		} else {
			if($filter){
				$query = $this->db->query('SELECT colline_id, colline FROM '.$this->db->dbprefix('collines').' WHERE commune_id='.$filter);
			    
				foreach($query->result() as $row) {
				   $select[$row->colline_id] = $row->colline;
			    }
			    asort($select);
			  	return $select;
			}
		}
	}

	public function dropdown_role($get = false)
	{
		if($get) {
			$query = $this->db->query('SELECT * FROM '.$this->db->dbprefix('admin_roles').' WHERE rol_id='.$get)->row();
		    return !empty($query)?$query->rol_description:"";
		} else {
			$query = $this->db->query('SELECT * FROM '.$this->db->dbprefix('admin_roles'));
			$select[0] = "-"; 
			foreach($query->result() as $row) {
				$select[$row->rol_id] = $row->rol_description;
			}
			asort($select);
			return $select;
		}
	}

	function nice_date($date) {
		list($year, $month, $day) = explode('-', substr($date, 0, 10));
		if($this->config->item('language') == 'fr') {
			return $day.'/'.$month.'/'.$year;
		}
		if($this->config->item('language') == 'en') {
			return $month.'/'.$day.'/'.$year;
		}
		return $date;
	}

	function dropdown_etat($get = 0) {
		$select = array();
		$select[''] = '-';
		$select[1] = 'Active';
		$select[2] = 'Desactive';

		if(in_array($get,[1,2])){
			return $select[$get];
		}else{	
			return $select;
		}
		
	}
	public function get_soldats($get = false)
    {
		if($get) {
			$query = $this->db->query("SELECT id_identification,matricule,nom, prenom FROM gr_fiche_identification WHERE id_identification= $get")->row();
			return !empty($query)?$query->nom." ".$query->prenom."-".$query->matricule:"";
		} else {
			$query = $this->db->query("SELECT id_identification,matricule,nom,prenom FROM gr_fiche_identification");
			$select[0] = "-"; 
			foreach($query->result() as $row) {
				$select[$row->id_identification] = $row->nom." ".$row->prenom."-".$row->matricule;
			}
			asort($select);
			return $select;
		}
	}
	public function multi_dropdown($table, $return_values=array(), $get = false)
    {
		$valuesPresent = (count($return_values) == 2);
		$id = ($valuesPresent)? $return_values[0]:'';
		$diplayed =  ($valuesPresent)? $return_values[1]:'';

		if(!$valuesPresent){
			print "<span class='text-danger'>Criteria not well defined or absent !</span>";
			return;
		}
		
		if($get) {
			$query = $this->db->query("SELECT $id , $diplayed FROM $table WHERE $id= $get")->row();
			return !empty($query)?array($get=>$query->$diplayed):"";
		} else {
			$query = $this->db->query("SELECT $id , $diplayed FROM $table");
			$select[0] = "-"; 
			foreach($query->result() as $row) {
				$select[$row->$id] = $row->$diplayed;
			}
			asort($select);
			return $select;
		}
	}

	public function make_query($table, $primary, $orders, $searchs, $selects, $criteres = []){
		$this->db->select($selects);
		$this->db->from($table);

		if(!empty($criteres)){
			$this->db->where($criteres);
		}

		if(trim($_POST['search']['value']) != ""){
			for ($i=0; $i < count($searchs); $i++) { 
				if($i == 0){
					$this->db->like($searchs[$i], $_POST['search']['value']);
				}else{
					$this->db->or_like($searchs[$i], $_POST['search']['value']);
				}
			}			
		}		

		if(isset($_POST['order'])){			
			$this->db->order_by($orders[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}else{
			$this->db->order_by($primary, "DESC");
		}
	}

	public function make_datatables($table, $primary, $orders, $searchs, $selects, $criteres = []){
		$this->make_query($table, $primary, $orders, $searchs, $selects, $criteres);

		if($_POST['length'] != -1){
			$this->db->limit($_POST["length"], $_POST["start"]);
		}
		$query = $this->db->get();

		// echo $this->db->last_query();
		return $query->result();
	}

	public function get_filtered_data($table, $primary, $orders, $searchs, $selects, $criteres = [])
	{
		$this->make_query($table, $primary, $orders, $searchs, $selects, $criteres);
		$query = $this->db->get();

		return $query->num_rows();
	} 

	public function get_all_data($table, $criteres = [])
	{
		$this->db->select("*");
		if(!empty($criteres)){
			$this->db->where($criteres);
		}
		$this->db->from($table);
		return $this->db->count_all_results();
	}
}