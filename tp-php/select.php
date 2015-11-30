<?
	$dbhost = 'localhost:3036'; //nom du serveur
	$dbuser = 'guest'; // login
	$dbpass = 'guest123'; // password

	$conn = mysql_connect($dbhost, $dbuser, $dbpass); //connexion à la BDD
	if (!$conn)
	{
		//ERROR
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db('utilisateur'); // Choix de la table

	$sql = "SELECT * FROM utilisateur"; // Requête
	$query = mysql_query( $sql, $conn ); // exécution de la requête
	if (!$query )
	{
		//ERROR
	  die ('Could not get data: ' . mysql_error());
	}

	// Pas d'erruer, on parcours
	while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
	{
	    echo "id :{$row['id']}  <br> ".
	         "Prénom: {$row['prenom']} <br> ".
	         "--------------------------------<br>";
	} 
	//fermer la connection
	mysql_close($conn);
?>