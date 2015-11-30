<?
	$dbhost = 'localhost:3036';
	$dbuser = 'guest';
	$dbpass = 'guest123';

	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if (!$conn)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db('utilisateur');

	$sql = "SELECT * FROM utilisateur";
	$query = mysql_query( $sql, $conn );
	if (!$query )
	{
	  die ('Could not get data: ' . mysql_error());
	}
	while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
	{
	    echo "id :{$row['id']}  <br> ".
	         "Prénom: {$row['prenom']} <br> ".
	         "--------------------------------<br>";
	} 
	mysql_close($conn);
?>