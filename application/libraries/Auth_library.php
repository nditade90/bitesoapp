<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_library
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }
    
    function login($email, $password) {
		$this->ci->session->unset_userdata('user');
		$query = $this->ci->db->query("SELECT * FROM admin_users WHERE usr_email = ? AND usr_authorized = ? GROUP BY usr_id", array($email, 1));
		if($query->num_rows() > 0) {
			$user = $query->row();

			//echo "Log ".password_hash($password,PASSWORD_DEFAULT);
			//echo "<br>System ".$user->usr_password;

			if(password_verify($password, $user->usr_password)) {
				$this->connect($user->usr_id);
				return TRUE;
			}			
		}
		return FALSE;
	}


	function connect($usr_id) {
		$this->ci->session->set_userdata('user', $usr_id);

		$token_connection = sha1(uniqid($usr_id, 1).mt_rand());
		$this->ci->db->set('token_connection', $token_connection);
		$this->ci->db->set('usr_id', $usr_id);
		$this->ci->db->set('cnt_ip', $this->ci->input->ip_address());
		$this->ci->db->set('cnt_agent', $this->ci->input->user_agent());
		$this->ci->db->set('cnt_datecreated', date('Y-m-d H:i:s'));
		$this->ci->db->insert('_connections');

		$this->ci->input->set_cookie('user', $token_connection, 0, NULL, '/', NULL, NULL);
	}

	function logout() {
		
		if($this->ci->session->userdata('user') && $this->ci->input->cookie('user')) {
			$this->ci->db->where('token_connection', $this->ci->input->cookie('user'));
			$this->ci->db->where('usr_id', $this->ci->session->userdata('user'));
			$this->ci->db->delete('_connections');
		}
		$this->ci->input->set_cookie('user', NULL, 0, NULL, '/', NULL, NULL);
		$this->ci->session->unset_userdata('user');
		
		session_regenerate_id();
	}

	function permission($per_code) {
		
		if(isset($this->get()->permissions_array[$per_code]) == 1 && $this->get()->permissions_array[$per_code]) {
			return true;
		} else if(!array_key_exists($per_code, $this->get()->permissions_array)) {
			$this->ci->db->set('per_code', $per_code);
			$this->ci->db->set('per_datecreated', date('Y-m-d H:i:s'));
			$this->ci->db->insert('admin_permissions');
		}
		return false;
	}


	function get() {
		$user = FALSE;
		$query = $this->ci->db->query("SELECT cnt.* FROM _connections AS cnt WHERE cnt.usr_id = ? AND cnt.token_connection = ? GROUP BY cnt.cnt_id", array($this->ci->session->userdata('user'), $this->ci->input->cookie('user')));
		if($query->num_rows() > 0) {
			$query = $this->ci->db->query("SELECT usr.*,rol.*  FROM admin_users AS usr LEFT JOIN admin_roles AS rol ON rol.rol_id = usr.rol_id WHERE usr.usr_id = ? AND usr.usr_authorized = ? GROUP BY usr.usr_id", array($this->ci->session->userdata('user'), 1));
			if($query->num_rows() > 0) {
				$user = $query->row();


				$user->permissions_array = array();
				$query = $this->ci->db->query("SELECT per.*, count(rol_per.rol_per_id) as total_saved FROM admin_permissions AS per LEFT JOIN admin_roles_permissions AS rol_per ON rol_per.per_id = per.per_id AND rol_per.rol_id = ? GROUP BY per.per_id", array($user->rol_id));
				foreach($query->result() as $row) {
					if($row->total_saved > 0) {
						$user->permissions_array[$row->per_code] = true;
					} else {
						$user->permissions_array[$row->per_code] = false;
					}
				}
			}
		}

		// echo "<pre>";
		// print_r($user);
		// echo "</pre>";
		return $user;
	}
    

}

/* End of file backend_auth_library.php */


?>