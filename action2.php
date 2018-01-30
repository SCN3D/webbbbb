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
<h1>custom sequence input</h1>
  
<?php



$seqs = $_POST["seqs"];
print $seqs;
$seqs2 = explode(",", $seqs);
$sequence = '';
foreach ( $seqs2 as $seq) {

	$sequence .= "> custom | \n".$seq."\n";
}
$output = fopen("sequence.fasta","w") or die("Error creating file");
fwrite($output,$sequence);
fclose($output)


?>

</body>
</html>