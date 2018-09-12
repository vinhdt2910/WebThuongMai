<?php
class Report extends Application {

	
	private $_table = 'cthoadon';
	private $_table_2 = 'hoadon';
	public $_id;
	
	
	
	
	
	
	public function isUser($email = null, $password = null) {
		if (!empty($email) && !empty($password)) {
			$password = Login::string2hash($password);
			$sql = "SELECT * FROM `{$this->_table}`
					WHERE `email` = '".$this->db->escape($email)."'
					AND `password` = '".$this->db->escape($password)."'";
			$result = $this->db->fetchOne($sql);
			if (!empty($result)) {
				$this->_id = $result['id'];
				return true;
			}
			return false;
		}
	}
	
	
	public function revenueByDate($fromDate = null, $toDate = null) {
		if (!empty($fromDate) && !empty($toDate)){
			$sql = "SELECT Sum(ct.Giamua * ct.Soluong) as Doanhthu From `{$this->_table}` as ct Join `{$this->_table_2}` as hd on ct.Mahd = hd.Mahd where hd.Tinhtrang = 2 and hd.Ngaydat >= '$fromDate' and hd.Ngaydat <= '$toDate'";
			return $this->db->fetchOne($sql);
		}
		else return 0;
	}


	public function numberOfOrderConfirm($fromDate = null, $toDate = null) {
		if (!empty($fromDate) && !empty($toDate)){
			$sql = "SELECT count(Mahd) as numberOfOrder From `{$this->_table_2}` where Ngaydat >= '$fromDate' and Ngaydat <= '$toDate' and Tinhtrang = 2";
			return $this->db->fetchOne($sql);
		}
		else return 0;
	}

	public function numberOfOrderCancel($fromDate = null, $toDate = null) {
		if (!empty($fromDate) && !empty($toDate)){
			$sql = "SELECT count(Mahd) as numberOfOrder From `{$this->_table_2}` where Ngaydat >= '$fromDate' and Ngaydat <= '$toDate' and Tinhtrang = 1";
			return $this->db->fetchOne($sql);
		}
		else return 0;
	}

	public function numberOfOrderProcess($fromDate = null, $toDate = null) {
		if (!empty($fromDate) && !empty($toDate)){
			$sql = "SELECT count(Mahd) as numberOfOrder From `{$this->_table_2}` where Ngaydat >= '$fromDate' and Ngaydat <= '$toDate' and Tinhtrang = 0";
			return $this->db->fetchOne($sql);
		}
		else return 0;
	}

	public function numberOfClient($fromDate = null, $toDate = null) {
		if (!empty($fromDate) && !empty($toDate)){
			$sql = "SELECT count(distinct (Makh)) as numberOfClient From `{$this->_table_2}` where Ngaydat >= '$fromDate' and Ngaydat <= '$toDate'";
			return $this->db->fetchOne($sql);
		}
		else return 0;
	}

}