<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("127.0.0.1", "root", "", "library");

$result = $conn->query("SELECT turnoverBooks.id_stud, count(*) c, student.id_st, name_stud 
FROM turnoverBooks JOIN student ON turnoverBooks.id_stud = student.id_st 
GROUP BY turnoverBooks.id_stud ORDER BY c DESC LIMIT 1");
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"id_stud":"'  . $rs["id_stud"] . '",';
    $outp .= '"name_stud":"'. $rs["name_stud"]     . '"}';
}
$outp .="]";



echo($outp);
?>





