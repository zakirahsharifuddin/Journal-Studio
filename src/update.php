 <?php
 
 $connection = require_once './connection.php';

$note = $connection->getNOtes();

$currentNote = [
	'id' => '',
	'title' => '',
	'description' => ''
];

if (isset($_GET['id']))
{
	$currentNote = $connection->getNoteById($_GET['id']);
}
 
 
 
 $connection = require_once './connection.php';
 
 // $connection->addNote($_POST);
 
 // header('Location: index.php');
 
 ?>




<html>
<head>
   <title>My New Memories</title>
   <link rel="stylesheet" href="style1.css" />

</head>
<body>
	<br>
	<div class="box">
    <header>   
		<h1><strong>JOURNAL STUDIO</strong><br /><small>Memory is the diary that we all carry about with us.</small></h1>
		
	</header>
	<br><br><br>
<form class="new-note" action="save.php" method="post">
			<input type="hidden" name="id" value="<?php echo $currentNote['id']?>">
			<input type="text" name="title" placeholder="Note title" 
			autocomplete="off" value="<?php echo $currentNote['title']?>">
			<textarea name="description" cols="30" rows="4"
				placeholder="text here"><?php echo $currentNote['description']?>
			</textarea>
			<button>
					Update Note
			</button>
		</form>
		
		<br><br>
		<div class="notes">
		
			<?php foreach ($note as $note1):?>
			<div class="note">
				<div class="title">
					<a href="?id=<?php echo $note1['id']?>"><?php echo $note1['title']?></a>
				</div>
				
				<div class="description">
					<?php echo $note1['description']?>
				</div>
				
				<small><?php echo $note1['create_date']?></small>
				<form action="delete.php" method="post">
					<input type="hidden" name="id" value="<?php echo $note1['id']?>">
					<button class="close"><i class="fa fa-trash"></i></button>
				</form>
			</div>
			<?php endforeach;?>
		</div>

</body>
</html> 


<?php

 
 // $connection = require_once './connection.php';
 
 // $connection->addNote($_POST);
 
 // header('Location: index1.php');
 
 ?>


