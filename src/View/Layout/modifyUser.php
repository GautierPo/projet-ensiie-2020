<?php
$token = md5(rand(0,99999999));
$_SESSION['post.token']=$token;

?>

<!-- cette page permet de changer un compte 
envoie les informations à /public/Forms/modifyUserAccount.php
-->

<!--modifier le compte -->

<form name= "formChangeUser" action="Forms/modifyUserAccount.php" onsubmit="return validationFormulaireiChangeUser();" method="POST">
  <label for="newUsername"> votre nom de compte :</label></br>
    <?php
      if (isset($_GET['newUsername']))
      {
          $newUsername=$_GET['newUsername'];
	  echo '<input type="text" name="newUsername" placeholder="newUsername" maxlength="20" value="'.$newUsername.'"></br>';

          if (strpos($fullUrl, "username=alreadyUsed"))
          {
              echo "<p>ERROR, this username is already taken</p></br>";
          } 
      }

      else 
      {
          echo '<input type="text" name="newUsername" placeholder="newUsername" maxlength="20" value="'.$_SESSION['username'].'"></br>';
          $fullUrl= "http;//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

          if (strpos($fullUrl, "username=notGiven"))
          {
              echo "<p>ERROR, no new username given</p></br>";
          }

      }
    ?>
  <label for="newEmail">votre adresse mail:</label></br>
    <?php
      if (isset($_GET['newEmail']))
      {
          $newEmail=$_GET['newEmail'];
          echo '<input type="text" name="newEmail" placeholder="newEmail adress" maxlength="50" value="'.$newEmail.'"></br>';
      }
      else {
          $fullUrl= "http;//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	  echo '<input type="text" name="newEmail" placeholder="newEmail adress" maxlength="50"  value="'.$_SESSION['email'].'"></br>';
      }
      if (strpos($fullUrl, "email=invalid")){
          echo "<p>ERROR, invalid newEmail adress</p></br>";
      }
      elseif (strpos($fullUrl, "email=alreadyUsed")){
          echo "<p>ERROR, this email is already taken</p></br>";
      }
      
    ?>
  <label for="newPassword"> change password: </label></br>
    <input type="password" name="newPassword" placeholder="Enter newPassword" minlength="8" ></br>
    <?php
          $fullUrl= "http;//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

          if (strpos($fullUrl, "password=noMatch"))
          {
              echo "<p>ERROR, these passwords do not match</p></br>";
          }
          elseif (strpos($fullUrl, "password=tooSmall"))
          {
              echo "<p>ERROR, your new password must be at least 8 characters long</p></br>";
          } 
    ?>
 <br/>
    <input type="password" name="newPasswordCheck" placeholder="confirm new password" minlength="8" ></br>
  
  <input type="hidden" id="post.token" name="post.token" value="{$token}" />
  <label for="currentPassword">Confirm current password </label></br>
    <input type="password" name="currentPassword" placeholder="confirm current pasword" minlength="8"></br>

    <?php
          $fullUrl= "http;//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

          if (strpos($fullUrl, "password=wrongPsw"))
          {
              echo "<p>ERROR: wrong password</p></br>";
	  }
    ?>
<button type="submit">modifier le compte</button>
</br>

<script type="text/javascript" src="scripts/formulaire.js"></script>