<?php
class Records {	
   
	private $recordsTable = 'live_records';
	public $id;
    public $nama_kue;
    public $jenis_kue;
    public $deskripsi;
	public $rasa_kue;
	public $harga_kue;
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function listRecords(){
		
		$sqlQuery = "SELECT * FROM ".$this->recordsTable." ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR nama_kue LIKE "%'.$_POST["search"]["value"].'%" ';			
			$sqlQuery .= ' OR rasa_kue LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR deskripsi LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR jenis_kue LIKE "%'.$_POST["search"]["value"].'%") ';			
		}
		
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id ASC ';
		}
		
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();	
		
		$stmtTotal = $this->conn->prepare("SELECT * FROM ".$this->recordsTable);
		$stmtTotal->execute();
		$allResult = $stmtTotal->get_result();
		$allRecords = $allResult->num_rows;
		
		$displayRecords = $result->num_rows;
		$records = array();		
		while ($record = $result->fetch_assoc()) { 				
			$rows = array();			
			$rows[] = $record['id'];
			$rows[] = ucfirst($record['nama_kue']);
			$rows[] = $record['harga_kue'];		
			$rows[] = $record['jenis_kue'];	
			$rows[] = $record['deskripsi'];
			$rows[] = $record['rasa_kue'];					
			$rows[] = '<button type="button" name="update" id="'.$record["id"].'" class="btn btn-info btn-xs update">Update</button>';
			$rows[] = '<button type="button" name="delete" id="'.$record["id"].'" class="btn btn-primary btn-xs delete" >Delete</button>';
			$records[] = $rows;
		}
		
		$output = array(
			"draw"	=>	intval($_POST["draw"]),			
			"iTotalRecords"	=> 	$displayRecords,
			"iTotalDisplayRecords"	=>  $allRecords,
			"data"	=> 	$records
		);
		
		echo json_encode($output);
	}
	
	public function getRecord(){
		if($this->id) {
			$sqlQuery = "
				SELECT * FROM ".$this->recordsTable." 
				WHERE id = ?";			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("i", $this->id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$record = $result->fetch_assoc();
			echo json_encode($record);
		}
	}
	public function updateRecord(){
		
		if($this->id) {			
			
			$stmt = $this->conn->prepare("
			UPDATE ".$this->recordsTable." 
			SET nama_kue= ?, harga_kue = ?, jenis_kue = ?, deskripsi = ?, rasa_kue = ?
			WHERE id = ?");
	 
			$this->id = htmlspecialchars(strip_tags($this->id));
			$this->nama_kue = htmlspecialchars(strip_tags($this->nama_kue));
			$this->harga_kue = htmlspecialchars(strip_tags($this->harga_kue));
			$this->jenis_kue = htmlspecialchars(strip_tags($this->jenis_kue));
			$this->deskripsi = htmlspecialchars(strip_tags($this->deskripsi));
			$this->rasa_kue = htmlspecialchars(strip_tags($this->rasa_kue));
			
			
			$stmt->bind_param("sisssi", $this->nama_kue, $this->harga_kue, $this->jenis_kue, $this->deskripsi, $this->rasa_kue, $this->id);
			
			if($stmt->execute()){
				return true;
			}
			
		}	
	}
	public function addRecord(){
		
		if($this->nama_kue) {

			$stmt = $this->conn->prepare("
			INSERT INTO ".$this->recordsTable."(`nama_kue`, `harga_kue`, `jenis_kue`, `deskripsi`, `rasa_kue`)
			VALUES(?,?,?,?,?)");
		
			$this->nama_kue = htmlspecialchars(strip_tags($this->nama_kue));
			$this->harga_kue = htmlspecialchars(strip_tags($this->harga_kue));
			$this->jenis_kue = htmlspecialchars(strip_tags($this->jenis_kue));
			$this->deskripsi = htmlspecialchars(strip_tags($this->deskripsi));
			$this->rasa_kue = htmlspecialchars(strip_tags($this->rasa_kue));
			
			
			$stmt->bind_param("sisss", $this->nama_kue, $this->harga_kue, $this->jenis_kue, $this->deskripsi, $this->rasa_kue);
			
			if($stmt->execute()){
				return true;
			}		
		}
	}
	public function deleteRecord(){
		if($this->id) {			

			$stmt = $this->conn->prepare("
				DELETE FROM ".$this->recordsTable." 
				WHERE id = ?");

			$this->id = htmlspecialchars(strip_tags($this->id));

			$stmt->bind_param("i", $this->id);

			if($stmt->execute()){
				return true;
			}
		}
	}
}
?>