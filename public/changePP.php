<?php session_start();
set_include_path('.:'.$_SERVER['DOCUMENT_ROOT'].'/../src');?>
<?php $_SESSION["username"] = "poupou";
?>
<?php include_once "../src/ViewPictures.php"?>

<?php include_once "View/Layout/head.php" ?>
<?php include_once "View/Layout/header.php"?>

<?php if (isset($_SESSION['username'])){
echo "<form action=\"Forms/modifyUserCosmetics.php\" method=\"post\">";
echo "<label for=\"newTitle\">Titre : </label>";
echo "<select id=\"newTitle\" name=\"cars\">";
choiceTitle();
echo "</select><br>";
for ($i = 1; $i<=16; $i++){
	echo '<span class="container">';
	choicePP("waifu".$i.".png", 200,200,20);
	echo '<span class="checkmark"></span>';
	echo "</span>";	
	if($i%4 == 0){echo "<br>";}
 	}
	

echo "<input class=\"subPP\" type=\"submit\"  value=\"Appliquer les changements\">";
echo "</form>";
}
else { include_once "Forms/error.php";
}
?>
