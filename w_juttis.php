
<!DOCTYPE html>
<html>
<head>
	<title></title>

<style type="text/css">

   body{background: url("login3.jpg");background-repeat: no-repeat;background-size:1600px 700px ;}
	#container{border: 0px solid;width: 500px;height: 500px;margin-top: 70px;margin-left: 400px;background: rgb(234,214,28);border-radius: 10%;overflow: auto;}
	 #price{font-size: 25px;font-family: cursive;font-weight: bolder;margin-top: 10px;margin-left: 200px;}
	  #descrip{font-size: 25px;font-family: cursive;font-weight: bolder;margin-left: 20px;}
</style>

</head>
<body>

<div id="container">
 <?php 


{
	
	

$a=$_POST['id'];
$b=$_POST['user_id_for'];

$db=mysqli_connect("localhost","root","","jutti");
$sql="SELECT * from wjutti where id=$a  ";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result))
{
   ?> 
    <img src="<?php echo $row['image']; ?>" width="400"  height="300" style="border-radius: 10%;margin-left:50px;margin-top: 20px" >
   <br>
   <label id="price">₹<?php echo $row['price']; ?> </label>
   <br>
   <textarea rows="3" cols="28" id="descrip" style="background:rgb(234,214,28) "><?php echo $row['description'];?></textarea>
   </div>
   <button onclick="cart('<?php echo $b; ?>','<?php echo $a; ?>')" style="width: 230px;color:rgb(234,214,28);border:2px solid;border-color:rgb(234,214,28);height: 60px;font-size: 25px;font-family: cursive;position: relative;bottom: 250px;float: right;right: 213px;font-weight: bolder;background-color: rgba(0,0,0,0.7);border-radius: 10px">Add to cart</button>
   <?php echo "";
}






$sql2="SELECT *  from recommend where user_id=$b ";
$result2=mysqli_query($db,$sql2);
$row3=mysqli_fetch_row($result2);
 $reco="wjutti";  

  
//if(($row3[1]!=$a && $row3[2]!=$reco) || ($row3[3]!=$a && $row3[4]!=$reco) || ($row3[5]!=$a && $row3[6]!=$reco)|| ($row3[7]!=$a && $row3[8]!=$reco) || ($row3[9]!=$a && $row3[10]!=$reco))

   if(($row3[1]==$a  || $row3[3]==$a || $row3[5]==$a || $row3[7]==$a  || $row3[9]==$a ) && ($row3[2]==$reco  || $row3[4]==$reco || $row3[6]==$reco || $row3[8]==$reco  || $row3[10]==$reco))
{
}

else{





   if($row3[1]==0)
   {
    $sql3="UPDATE recommend SET id1='$a' , reco1='$reco' WHERE user_id=$b "; 
    mysqli_query($db,$sql3);
   }

    else if($row3[3]==0)
   { echo $row[3];
    $sql3="UPDATE recommend SET id2='$a' , reco2='$reco' WHERE user_id=$b "; 
    mysqli_query($db,$sql3);
   }

     else if($row3[5]==0)
   {
    $sql3="UPDATE recommend SET id3='$a' , reco3='$reco' WHERE user_id=$b "; 
    mysqli_query($db,$sql3);
   }

     else if($row3[7]==0)
   {
    $sql3="UPDATE recommend SET id4='$a' , reco4='$reco' WHERE user_id=$b "; 
    mysqli_query($db,$sql3);
   }

    else  if($row3[9]==0)
   {
    $sql3="UPDATE recommend SET id5='$a' , reco5='$reco' WHERE user_id=$b "; 
    mysqli_query($db,$sql3);
   }

   else if($row3[1]!=0 && $row3[3]!=0 && $row3[5]!=0 && $row3[7]!=0 && $row3[9]!=0)
  {
   $sql3="UPDATE recommend SET id1='$row3[3]' , reco1='$row3[4]' WHERE user_id=$b ";
   $sql4="UPDATE recommend SET id2='$row3[5]' , reco2='$row3[6]' WHERE user_id=$b ";
   $sql5="UPDATE recommend SET id3='$row3[7]' , reco3='$row3[8]' WHERE user_id=$b ";
   $sql6="UPDATE recommend SET id4='$row3[9]' , reco4='$row3[10]' WHERE user_id=$b ";
   $sql7="UPDATE recommend SET id5='$a' , reco5='$reco' WHERE user_id=$b ";
   

   mysqli_query($db,$sql3);
   mysqli_query($db,$sql4);
   mysqli_query($db,$sql5);
   mysqli_query($db,$sql6);
   mysqli_query($db,$sql7);


}   

  }

}
?>
 



<script type="text/javascript">
   function cart(x,y)
   {
         var xhttp=new XMLHttpRequest();
         xhttp.onreadystatechange=function(){

            if(this.readystate==4 && this.status==200)
            {}
         };

         xhttp.open("GET",'w_jutti_cart.php?v='+x+"&sec="+y,true);
         xhttp.send();



 
   }
</script> 

</body>
</html>