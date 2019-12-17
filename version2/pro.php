<?php
$c=new mysqli("localhost","root","rootroot","webv2");
if($c->connect_error)
die($c->connect_error);
if($_POST['ob']){
    $p=json_decode($_POST['ob'][0],true);
    for($i=0;$i<count($p);$i++){
        $t=$p[$i]['Type'];
        $tg=$p[$i]['Target'];
        $tm=$p[$i]['Time'];
        $ev=$_POST['ob'][1];
        print_r($p[$i]);
        $sql="insert into study values('$t','$tg','$tm','$ev')";
        $c->query($sql);
        if($c->affected_rows>0){
            echo"done";
        }
        else
        echo "not done";
    }
}
if(isset($_GET['ob'])){
    $sql="select * from study";
    if($r=$c->query($sql)){
        $ar=array();
        while($y=$r->fetch_assoc()){
            array_push($ar,$y);
        }
        echo json_encode($ar);
    }
}
?>