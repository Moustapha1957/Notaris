<?PHP
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "monnotaire";
//$date_enregistr= date("Y/m/d");

$email_user = ($_SESSION['email_user']);
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // définir le mode exception d'erreur PDO 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $sql = "INSERT INTO pv(date,message,email_user) VALUES ( '$_POST[date]', '$_POST[message]','$email_user')";
  // utiliser la fonction exec() car aucun résultat n'est renvoyé
  $conn->exec($sql);
  echo "Nouveaux enregistrement ajoutés avec sucéés";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
  
}
$conn = null;
header("Location:Pv.php");

?>