<?php
 
 $connection = require_once './connection.php';

$note = $connection->getNOtes();

$currentNote = [
	'id' => '',
	'title' => '',
	// nama user
	'description' => ''
	// unit
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
	<br><br><br><br>
		<form class="new-note" action="save.php" method="post">
			<input type="hidden" name="id" value="<?php echo $currentNote['id']?>">
			<input type="text" name="title" placeholder="Note title" 
			autocomplete="off" value="<?php echo $currentNote['title']?>">
			<textarea name="description" cols="30" rows="4"
				placeholder="text here"><?php echo $currentNote['description']?>
			</textarea>
			<button>
					New Note
			</button>
		</form>
		

</body>
</html> 


<?php

 
 // $connection = require_once './connection.php';
 
 // $connection->addNote($_POST);
 
 // header('Location: index1.php');
 
 ?>


