<?php

// $pdo = new PDO('mysql:server=localhost;dbname=note', 'root', '');
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
//tulis note kt ats
// echo '<pre>';
// var_dump($currentNote);
// echo '</pre>';
?>


<html>
<head>
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>My Memories</title>
   <link rel="stylesheet" href="style1.css" />
   <link href='http://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link  href="http://fonts.googleapis.com/css?family=Reenie+Beanie:regular" rel="stylesheet"type="text/css">
<link  href="http://fonts.googleapis.com/css?family=Reenie+Beanie:regular" rel="stylesheet" type="text/css"> 

</head>

<body>
	<br>
	<div class="box">
    <header>   
		<h1><strong>JOURNAL STUDIO</strong><br /><small>Memory is the diary that we all carry about with us.</small></h1>
		
	</header>
	<br><br>
	

<form>
<a href="index.html?" class="btn"><i class="fa fa-home"></i></a>
<a href="add.php?" class="btn"><i class="fa fa-plus"></i></i></a>
<a href="update.php?" class="btn"><i class="fa fa-pencil"></i></a>

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
</div>	


</html>