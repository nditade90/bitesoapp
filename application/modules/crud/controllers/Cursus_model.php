
		<?php

		class Cursus_model extends CI_Model {

			function __construct() {
				parent::__construct();
			}

			public function dropdown_ec_filier( $get = false)
			{
				if($get) {
					$query = $this->db->query('SELECT * FROM '.$this->db->dbprefix('ec_filier').' WHERE id='.$get)->row();
					return !empty($query)?$query->nom:"";
				} else {
					$query = $this->db->query('SELECT * FROM '.$this->db->dbprefix('ec_filier'));
					$select[0] = "-"; 
					foreach($query->result() as $row) {
						$select[$row->id] = $row->nom;
					}
					asort($select);
					return $select;
				}
			}
		}
			