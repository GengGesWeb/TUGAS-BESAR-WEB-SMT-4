<?php
class Model_koordinator extends CI_Model {
	function data_kuota(){
		$query = $this->db->query("SELECT * FROM tb_dosen where kuota_bimbingan=0");
		return $query->result();
	}
	function update_kuota($data = array(),$id){
		$this->db->where('id_dosen',$id);
		return $this->db->update('tb_dosen',$data);
	}
	function data_kuota_isi(){
		$query = $this->db->query("SELECT * FROM tb_dosen where kuota_bimbingan>0");
		return $query->result();
	}
	function edit_kuota_isi($id){
		$query = $this->db->query("SELECT * FROM tb_dosen WHERE id_dosen = '$id'");
		return $query->result_array();
	}
	function data_usulan(){
		$query = $this->db->query("SELECT tb_mahasiswa.nim,tb_mahasiswa.nama,tb_mahasiswa.prodi,tb_mahasiswa.golongan , tb_judul_usulan.judul,tb_judul_usulan.deskripsi,tb_judul_usulan.kategori,tb_dosen.nama as pembimbing FROM `tb_judul_usulan` inner join tb_mahasiswa on tb_mahasiswa.nim = tb_judul_usulan.nim inner join tb_dosen on tb_dosen.id_dosen=tb_judul_usulan.id_dosen_pembimbing ORDER BY `tb_judul_usulan`.`id_judul_usulan` ASC");
		return $query->result();
	}
	function data_usulan_fik(){
		$query = $this->db->query("SELECT tb_mahasiswa.nim,tb_mahasiswa.nama,tb_mahasiswa.prodi,tb_mahasiswa.golongan , tb_final.judul,tb_final.deskripsi,tb_final.kategori,tb_final.saran,tb_dosen.nama as pembimbing FROM `tb_final` inner join tb_mahasiswa on tb_mahasiswa.nim = tb_final.nim inner join tb_dosen on tb_dosen.id_dosen=tb_final.id_dosen ORDER BY `tb_final`.`id_final` ASC");
		return $query->result();
	}
	function pembimbing_fik($id){
		$query = $this->db->query("SELECT tb_pembimbing_fix.nim,tb_mahasiswa.nama,tb_mahasiswa.prodi,tb_mahasiswa.golongan,tb_dosen.nama as pembimbing FROM tb_pembimbing_fix inner join tb_mahasiswa on tb_pembimbing_fix.nim = tb_mahasiswa.nim inner join tb_dosen on tb_pembimbing_fix.id_dosen = tb_dosen.id_dosen where tb_pembimbing_fix.nim ='$id'");
		return $query->result();
	}
}

?>