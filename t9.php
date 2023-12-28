<?php
$score = $_GET['score'];
if($score >=100){
    echo"OVER SCORE";
   }
else if($score >=80){
 echo"A";
}
else if($score >=70){
    echo "B";
}
else if($score >=60){
    echo "C";
}
else if($score >=50){
    echo "D";
}
else {
    echo "F";
}
