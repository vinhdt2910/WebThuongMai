<?php
class Catalogue extends Application {

	private $_table = 'book_category';
	private $_table_2 = 'book';
	private $_table_3 = 'publisher';
	public $_path = 'image';
	public static $_currency = '&pound;';
	
	
	
	
	
	
	
	
	public function getCategories() {
		$sql = "SELECT * FROM `{$this->_table}`
				ORDER BY `Tenloai` ASC";
		return $this->db->fetchAll($sql);
	}
	
	public function getPublishers() {
		$sql = "SELECT * FROM `{$this->_table_3}`
				ORDER BY `Tennhaphathanh` ASC";
		return $this->db->fetchAll($sql);
	}
	
	
	
	
	
	
	public function getCategory($id) {
		$sql = "SELECT * FROM `{$this->_table}`
				WHERE `Maloaisach` = '".$this->db->escape($id)."'";
		return $this->db->fetchOne($sql);
	}
	
	public function getPublisher($id) {
		$sql = "SELECT * FROM `{$this->_table_3}`
				WHERE `Manhaphathanh` = '".$this->db->escape($id)."'";
		return $this->db->fetchOne($sql);
	}
	
	
	
	
	
	
	public function addCategory($name = null) {
		if (!empty($name)) {
			$sql = "INSERT INTO `{$this->_table}`
					(`Tenloai`, `Tinhtrang`) VALUES ('".$this->db->escape($name)."', '1')";
			return $this->db->query($sql);
		}
	}
	
	public function addPublisher($tennhaphathanh = null) {
		if (!empty($tennhaphathanh)) {
			$sql = "INSERT INTO `{$this->_table_3}`
					(`Tennhaphathanh`) VALUES ('".$this->db->escape($tennhaphathanh)."')";
			return $this->db->query($sql);
		}
	}
	
	
	
	
	
	
	
	public function updateCategory($name = null, $id = null) {
		if (!empty($name) && !empty($id)) {
			$sql = "UPDATE `{$this->_table}`
					SET `Tenloai` = '".$this->db->escape($name)."'
					WHERE `Maloaisach` = '".$this->db->escape($id)."'";
			return $this->db->query($sql);
		}
		return false;
	}
	
	
	public function updatePublisher($tennhaphathanh = null, $id = null) {
		if (!empty($tennhaphathanh) && !empty($id)) {
			$sql = "UPDATE `{$this->_table_3}`
					SET `Tennhaphathanh` = '".$this->db->escape($tennhaphathanh)."'
					WHERE `Manhaphathanh` = '".$this->db->escape($id)."'";
			return $this->db->query($sql);
		}
		return false;
	}
	
	
	
	
	
	
	
	
	public function duplicateCategory($name = null, $id = null) {
		if (!empty($name)) {
			$sql  = "SELECT * FROM `{$this->_table}`
					WHERE `Tenloai` = '".$this->db->escape($name)."'";
			$sql .= !empty($id) ? 
					" AND `Maloaisach` != '".$this->db->escape($id)."'" : 
					null;
			return $this->db->fetchOne($sql);
		}
		return false;
	}
	
	public function duplicatePublisher($tennhaxuatban = null, $id = null) {
		if (!empty($name)) {
			$sql  = "SELECT * FROM `{$this->_table_3}`
					WHERE `Tennhaphathanh` = '".$this->db->escape($tennhaxuatban)."'";
			$sql .= !empty($id) ? 
					" AND `Manhaphathanh` != '".$this->db->escape($id)."'" : 
					null;
			return $this->db->fetchOne($sql);
		}
		return false;
	}
	
	
	
	
	
	
	
	public function removeCategory($id = null) {
		if (!empty($id)) {
			$sql = "DELETE FROM `{$this->_table}`
					WHERE `Maloaisach` = '".$this->db->escape($id)."'";
			$this->db->query($sql);
		}
		return false;
	}
	
	public function removePublisher($id = null) {
		if (!empty($id)) {
			$sql = "DELETE FROM `{$this->_table_3}`
					WHERE `Manhaphathanh` = '".$this->db->escape($id)."'";
			$this->db->query($sql);
		}
		return false;
	}
	
	
	
	
	
	
	
	
	
	public function getProducts($cat) {
		$sql = "SELECT * FROM `{$this->_table_2}`
				WHERE `Loaisach` = '".$this->db->escape($cat)."'
				ORDER BY `Ngayxuatban` DESC";
		return $this->db->fetchAll($sql);
	}
	
	public function getProductsByPublisher($publisher) {
		$sql = "SELECT * FROM `{$this->_table_2}`
				WHERE `Nhaphathanh` = '".$this->db->escape($publisher)."'
				ORDER BY `Ngayxuatban` DESC";
		return $this->db->fetchAll($sql);
	}
	
	
	
	
	
	
	
	public function getProduct($id) {
		$sql = "SELECT * FROM `{$this->_table_2}`
				WHERE `Masach` = '".$this->db->escape($id)."'";
		return $this->db->fetchOne($sql);
	}
	
	
	public function getProductsByIdList($arr) {
		
		$st = implode(',', $arr);	

		$sql = "SELECT * FROM `{$this->_table_2}` WHERE `Masach` in ($st 0)";
		return $this->db->fetchAll($sql);
	}
	
	public function getProductsByCatalogueList($arr, $number=null) {
		
	
		$sql = "SELECT * FROM `{$this->_table_2}`";
		
		if($arr!=null)
		{ 	
			$st = implode(',', $arr);	
			$sql .= " WHERE `Loaisach` in ($st, 0)";
		} 

		if($number!=null) $sql .= " limit 0,$number";
		;
		return $this->db->fetchAll($sql);
	}
	
	
	
	public function getProductsByViewed($number=null) {

		$sql = "SELECT * FROM `{$this->_table_2}`";
		if($number!=null) $sql .= " limit 0,$number";

		return $this->db->fetchAll($sql);
	}
	
	
	
	
	public function getAllProducts($srch = null) {
		$sql = "SELECT * FROM `{$this->_table_2}`";
		if (!empty($srch)) {
			$srch = $this->db->escape($srch);
			$sql .= " WHERE `Tensach` LIKE '%{$srch}%' || `Masach` = '{$srch}'";
		}
		$sql .= " ORDER BY `Ngayxuatban` DESC";
		return $this->db->fetchAll($sql);
	}
	
	
	
	
	
	public function addProduct($params = null) {
		if (!empty($params)) {
			$this->db->prepareInsert($params);
			$out = $this->db->insert($this->_table_2);
			$this->_id = $this->db->_id;
			return $out;
		}
		return false;
	}
	
	
	
	
	public function updateProduct($params = null, $id = null) {
		if (!empty($params) && !empty($id)) {
			$this->db->prepareUpdate($params);
			return $this->db->updateTest($this->_table_2, $id);
		}
	}
	
	
	
	
	
	
	
	
	public function removeProductLogic($id = null) {
		if (!empty($id)) {
			$sql = "UPDATE book set Trangthai = 0 WHERE Masach = $id";
			return $this->db->query($sql);
		}
		return false;
	}
	


	public function removeProduct($id = null) {
		if (!empty($id)) {
			$product = $this->getProduct($id);
			if (!empty($product)) {
				if (is_file(CATALOGUE_PATH.DS.$product['image'])) {
					unlink(CATALOGUE_PATH.DS.$product['image']);
				}
				$sql = "DELETE FROM `{$this->_table_2}`
						WHERE `Masach` = '".$this->db->escape($id)."'";
				return $this->db->query($sql);
			}
			return false;
		}
		return false;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	

}