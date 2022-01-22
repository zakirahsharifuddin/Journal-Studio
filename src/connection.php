 <?php
 
 class connection
 {
	 public $pdo;
	 
	 public function __construct()
	 { 
		 $this->pdo = new PDO('mysql:server=localhost;dbname=note', 'root', '');
		 $this->pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 }
	 
	 public function getNotes()
	 {
		 $statement = $this->pdo->prepare("SELECT * FROM note ORDER BY create_date DESC");
		 $statement -> execute();
		 return $statement->fetchAll(PDO::FETCH_ASSOC);
	 }
	 
	 public function addNote($note1)
	 {
		$statement = $this->pdo->prepare("INSERT INTO note (title, description, create_date)
								VALUES (:title, :description, :date)");
		$statement->bindValue('title', $note1['title']);
		$statement->bindValue('description', $note1['description']);
		$statement->bindValue('date', date('Y-m-d H:i:s'));
		return $statement->execute();
	 }
	 
	 public function getNoteById($id)
	 {
		 $statement = $this->pdo->prepare("SELECT * FROM note WHERE id = :id");
		 $statement->bindValue('id', $id);
		 $statement->execute();
		 return $statement->fetch(PDO::FETCH_ASSOC);
	 }
	 
	 public function updateNote($id, $note1)
	 {
		$statement = $this->pdo->prepare("UPDATE  note SET title = :title, description = :description WHERE id = :id ");
		$statement->bindValue('id', $note1['id']);
		$statement->bindValue('title', $note1['title']);
		$statement->bindValue('description', $note1['description']);
		return $statement->execute();
	 }
	 
	 public function removeNote($id)
	 {
		$statement = $this->pdo->prepare("DELETE FROM note WHERE id = :id ");
		$statement->bindValue('id', $id);
		return $statement->execute();
	 }
 }

return new connection();