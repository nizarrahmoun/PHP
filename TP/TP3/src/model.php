<?php

function createDB(){
    try {

    $conn=new PDO("mysql:host=localhost; dbname=mydatabase1","root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $req="CREATE TABLE Comments(
        Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        post_id INT(6) UNSIGNED NOT NULL,
        firstname VARCHAR(30) NOT NULL,
        comment text NOT NULL,
        comment_date  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        CONSTRAINT FK_postComment FOREIGN KEY (post_id) REFERENCES myguests(ID))";
        $conn->exec( $req );
        echo "Table Comments created successfully";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null ;
}
function SaveInComment(){
try {
$servername="localhost";
$username= "root";
$password= "";
$dbname= "mydatabase1";
$conn=new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt=$conn->prepare("INSERT INTO Comments(post_id, firstname, comment) VALUES (:post_id, :firstname, :comment)");
$stmt->bindParam(":post_id", $post_id);
$stmt->bindParam(":firstname", $firstname);
$stmt->bindParam(":comment", $comment);
//iNSERT into a Row
$post_id=1;
$firstname="john";
$comment ="c'est fantastique";
$stmt->execute();
echo "L'enregistrement à été effectuée qvec succes";
} catch (PDOException $e) {
    echo "Error". $e->getMessage() ."<br>";
}
$conn=null;
}

function getPosts() {
	try
    {
 $bdd = new PDO('mysql:host=localhost;dbname=mydatabase1;charset=utf8', 'root', '');  }
    catch(Exception $e){
          die( 'Erreur : '.$e->getMessage()   );
         }

    $statement = $bdd->query('SELECT id, firstname, lastname, DATE_FORMAT(reg_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_visite_fr FROM myguests ORDER BY reg_date DESC LIMIT 0, 5');

	$posts = [];
	while (($row = $statement->fetch())) {
    	$post = [
        	'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
        	'french_visite_date' => $row['date_visite_fr'],
            'identifier' => $row['id'],
        	
    	];

    	$posts[] = $post;
	}

	return $posts;
}

function getPost($identifier) {
	// We connect to the database.
	try
    {
 $bdd = new PDO('mysql:host=localhost;dbname=mydatabase1;charset=utf8', 'root', '');  }
    catch(Exception $e){
          die( 'Erreur : '.$e->getMessage()   );
         }

     $statement = $bdd->query('SELECT id, firstname, lastname, DATE_FORMAT(reg_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_visite_fr FROM myguests WHERE id=:id');
         $statement->bindParam(':id',$identifier);
     $statement->execute();

     $row = $statement->fetch();
    	$post = [
            
        	'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
        	'french_visite_date' => $row['date_visite_fr'],
            'identifier' => $row['id'],
            
    	];
	return $post;
}

function getComments($identifier) {
	try
    {
 $bdd = new PDO('mysql:host=localhost;dbname=mydatabase1;charset=utf8', 'root', '');  }
    catch(Exception $e){
          die( 'Erreur : '.$e->getMessage() );
         }
try{
     $statement = $bdd->query('SELECT post_id,firstname,comment, comment_date  FROM Comments WHERE post_id= '.$identifier.'');
     $statement->execute();

	$comments = [];
	while (($row = $statement->fetch())) {
    	$comment = [
        	'firstname' => $row['firstname'],
        	'french_visite_date' => $row['comment_date'],
            'comment' => $row['comment'],	
    	];

    	$comments[] = $comment;
	}

	return $comments;
}catch (PDOException $e) {
    echo "Error <br>". $e->getMessage();
}
$conn = null;
}
?>