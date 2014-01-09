<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_user_login_model extends CI_Model {

	
	 
	public function cekUserLogin($data)
	{
		//$tipe 				= $data['tipe'];
		$username 			= $data['username'];
		$password 			= $data['password'];
		
			//$cek0 = $tipe;
			$cek1 	= mysql_real_escape_string($username);
			$cek2 	= md5(mysql_real_escape_string($password));
			//$q_cek_login = $this->db->get_where('tbl_users', $cek);
			$q_cek_login = $this->db->query("select a.*,b.*,c.*,d.*,e.* from tbl_users a join pegawai b on 
											a.pegawai_id = b.id_pegawai join unit_kerja c on
											b.fk_unit_kerja = c.id_unit_kerja
											join users_operators d on
											a.users_operators_id = d.id
											join users_groups e on
											d.users_groups_id = e.id where a.username='$cek1' and a.password='$cek2'");

			//and d.nama_users_operators='$cek0' 
			/*echo $this->db->last_query();
			die;*/
			if(count($q_cek_login->result())>0)
			{
				foreach($q_cek_login->result() as $qad)
				{
					$sess_data['logged_in'] = 'berhasil';
					$sess_data['nama'] = $qad->nama;
					$sess_data['username'] = $qad->username;
					$sess_data['id'] = $qad->id;
					$sess_data['tipe_user'] = $qad->nama_users_operators;
					$sess_data['pegawai_id'] = $qad->pegawai_id;
					$sess_data['id_unit_kerja'] = $qad->id_unit_kerja;
					$sess_data['nama_unit_kerja'] = $qad->nama_unit_kerja;
					$sess_data['hak_akses'] = $qad->hak_akses;
					//$sess_data['lolos'] = 'poli';
					$sess_data['operator'] = $qad->nama_users_operators;
				}

				$explodes = explode(',',$sess_data['hak_akses']);
				$sess_data['lolos'] = $explodes[0];
				$this->session->set_userdata($sess_data);
				redirect($explodes[0].'/'.$explodes[1]);
			}
			else
			{
				$this->session->set_flashdata("result_login","Gagal Login. Username Password dan Sebagai Tidak Cocok....");
				redirect("login/user_login");
			}
		}

	public function cekhakakses () {

		$tipe 				= $data['tipe'];
		$username 			= $data['username'];

		return $pisah = $this->db->query("select a.*,b.*,b.hak_akses
		from tbl_users a join users_operators b on
		a.users_operators_id = b.id
		where a.username = '$username' and b.nama_users_operators='$tipe'
		");

		
	}




}

