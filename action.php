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
  </tr>
  
<?php

$dbms='mysql';     
$host='localhost'; 
$dbName='uniprot_reviewed';    
$user='root';      
$pass='qq65123235!';          
$dsn="$dbms:host=$host;dbname=$dbName";

$ac = $_POST["ac"];
print $ac;

try {
    $db = new PDO($dsn, $user, $pass); 
    echo "连接成功<br/>";
    
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}
$sql = "SELECT id, ac FROM entry where ac REGEXP '". $ac."'" ;

$result = $db->query($sql);
if (is_array($result) || is_object($result))
{
	
    foreach ( $result as $row) {
        echo "<tr><td>".$row['id']."</td><td>".$row['ac']."</td></tr>\n";
    }
}
?>
</table>

</body>
</html>