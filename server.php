 <?PHP
 
 $link = mysqli_connect("localhost", "root", "", "slides");
 
 $f = $_POST["f"];
 
 if($f == 1){
  $resultado = mysqli_query($link, "SELECT * FROM users ORDER BY points DESC, id ASC");
  
  while($rows=mysqli_fetch_array($resultado)){
      echo "<div class='res'><h4 class='usrName'>".$rows[1]."</h4><h4 class='usrPoints'>".$rows[2]."pts</h4></div>";
    } 
 }
 if($f == 2){
   mysqli_query($link, "DELETE FROM controls");
   mysqli_query($link, "INSERT INTO controls (next) VALUES ('go')");
   
 }
 if($f == 3){
   mysqli_query($link, "DELETE FROM controls");
   mysqli_query($link, "INSERT INTO controls (next) VALUES ('stop')");
 }
 if($f == 4){
    $resultado = mysqli_query($link, "SELECT * FROM controls");
 while($rows=mysqli_fetch_array($resultado)){
          echo $rows[0];
      } 
} 
if($f == 5){
   $name = $_POST["name"];
   $points = $_POST["points"];
   mysqli_query($link, "INSERT INTO users (id,name,points) VALUES ('', '".$name."', '".$points."')");
}
 mysqli_close($link);

 ?>