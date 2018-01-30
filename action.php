<html>
<body>
<head>Results
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<table>
  <tr>
    <th>ID</th>
    <th>AC</th>
	<th>seq</th>
  </tr>
  
<?php

$dbms='mysql';     
$host='localhost'; 
$dbName='uniprot_reviewed';    
$user='root';      
$pass='12345';          
$dsn="$dbms:host=$host;dbname=$dbName";

$acs = $_POST["acs"];
print $acs;
$acs2 = explode(",", $acs);
$sequence = '';
try {
    $db = new PDO($dsn, $user, $pass); 
    echo "连接成功<br/>";
    
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}
foreach($acs2 as $ac){
	$sql = "SELECT id, ac, seq FROM entry where ac REGEXP '". $ac."'" ;

	$result = $db->query($sql);
	if (is_array($result) || is_object($result))
	{	
		foreach ( $result as $row) {
			echo "<tr><td>".$row['id']."</td><td>".$row['ac']."</td><td>".$row['seq']."</td></tr>\n";
			$sequence .= "> ".$row['id']." | \n".$row['sequence']."\n";
		}
	}	
}
$output = fopen("sequence.fasta","w") or die("Error creating file");
fwrite($output,$sequence);
fclose($output)


?>
</table>

</body>
</html>