<?php

// Redirige l'utilisateur s'il est déjà identifié
if(isset($_COOKIE["ID_UTILISATEUR"]))
{
     header("Location: index.php");
}
else
{
     
     // Formulaire visible par défaut
     $masquer_formulaire = false;
     
     // Une fois le formulaire envoyé
     if(isset($_POST["BT_Envoyer"]))
     {
          
          // Vérification de la validité des champs
          if(!ereg("^[A-Za-z0-9_]{4,20}$", $_POST["TB_Nom_Utilisateur"]))
          {
               $message = "Votre nom d'utilisateur doit comporter entre 4 et 20 caractères<br />\n";
               $message .= "L'utilisation de l'underscore est autorisée";
          }
          elseif(!ereg("^[A-Za-z0-9]{4,}$", $_POST["TB_Mot_de_Passe"]))
          {
               $message = "Votre mot de passe doit comporter au moins 4 caractères";
          }
          elseif($_POST["TB_Mot_de_Passe"] != $_POST["TB_Confirmation_Mot_de_Passe"])
          {
               $message = "Votre mot de passe n'a pas été correctement confirmé";
          }
          elseif(!ereg("^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]{2,}[.][a-zA-Z]{2,4}$",
               $_POST["TB_Adresse_Email"]))
          {
               $message = "Votre adresse e-mail n'est pas valide";
          }
          else
          {
               
               // Connexion à la base de données
               // Valeurs à modifier selon vos paramètres configuration
               mysql_connect("localhost", "root", "");
               mysql_select_db("asp-php");
               
               // Vérification de l'unicité du nom d'utilisateur et de l'adresse e-mail
               $result = mysql_query("
                    SELECT Nom_Utilisateur
                         , Adresse_Email
                    FROM Comptes_Utilisateurs
                    WHERE Nom_Utilisateur = '" . $_POST["TB_Nom_Utilisateur"] . "'
                    OR Adresse_Email = '" . $_POST["TB_Adresse_Email"] . "'
               ");
               
               // Si une erreur survient
               if(!$result)
               {
                    $message = "Erreur d'accès à la base de données lors de la vérification d'unicité";
               }
               else
               {
                    
                    // Si un enregistrement est trouvé
                    if(mysql_num_rows($result) > 0)
                    {
                         
                         while($row = mysql_fetch_array($result))
                         {
                              
                              if($_POST["TB_Nom_Utilisateur"] == $row["Nom_Utilisateur"])
                              {
                                   $message = "Le nom d'utilisateur " . $_POST["TB_Nom_Utilisateur"];
                                   $message .= "est déjà utilisé";
                              }
                              elseif($_POST["TB_Adresse_Email"] == $row["Adresse_Email"])
                              {
                                   $message = "L'adresse e-mail " . $_POST["TB_Adresse_Email"];
                                   $message .= "est déjà utilisée";
                              }
                              
                         }
                         
                    }
                    else
                    {
                         
                         // Génération de la clef d'activation
                         $caracteres = array("a", "b", "c", "d", "e", "f", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
                         $caracteres_aleatoires = array_rand($caracteres, 8);
                         $clef_activation = "";
                         
                         foreach($caracteres_aleatoires as $i)
                         {
                              $clef_activation .= $caracteres[$i];
                         }
                         
                         // Création du compte utilisateur
                         $result = mysql_query("
                              INSERT INTO Comptes_Utilisateurs(
                                   Nom_Utilisateur
                                   , Mot_de_Passe
                                   , Adresse_Email
                                   , Date_Inscription
                                   , Clef_Activation
                              )
                              VALUES(
                                   '" . $_POST["TB_Nom_Utilisateur"] . "'
                                   , '" . md5($_POST["TB_Mot_de_Passe"]) . "'
                                   , '" . $_POST["TB_Adresse_Email"] . "'
                                   , '" . time() . "'
                                   , '" . $clef_activation . "'
                              )
                         ");
                         
                         // Si une erreur survient
                         if(!$result)
                         {
                              $message = "Erreur d'accès à la base de données lors de la création du compte utilisateur";
                         }
                         else
                         {
                              
                              // Envoi du mail d'activation
                              $sujet = "Activation de votre compte utilisateur";
                              
                              $message = "Pour valider votre inscription, merci de cliquer sur le lien suivant :\n";
                              $message .= "http://" . $_SERVER["SERVER_NAME"];
                              $message .= "/activer-compte-utilisateur.php?id=" . mysql_insert_id();
                              $message .= "&clef=" . $clef_activation;
                              
                              // Si une erreur survient
                              if(!@mail($_POST["TB_Adresse_Email"], $sujet, $message))
                              {
                                   $message = "Une erreur est survenue lors de l'envoi du mail d'activation<br />\n";
                                   $message .= "Veuillez contacter l'administrateur afin d'activer votre compte";
                              }
                              else
                              {
                                   
                                   // Message de confirmation
                                   $message = "Votre compte utilisateur a correctement été créer<br />\n";
                                   $message .= "Un email vient de vous être envoyer afin de l'activer";
                                   
                                   // On masque le formulaire
                                   $masquer_formulaire = true;
                                   
                              }
                              
                         }
                         
                    }
                    
               }
               
          }
          
          // Fermeture de la connexion à la base de données
          mysql_close();
          
     }
     
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>[PHP] Créer un espace membre</title>
     <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php if(isset($message)) { ?>
<p><?php echo $message; ?></p>
<?php } if($masquer_formulaire != true) { ?>
<form action="http://<?php echo $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"]; ?>" method="post">
     <p>
          Nom d'utilisateur : <input type="text" name="TB_Nom_Utilisateur" />
     </p>
     <p>
          Mot de passe : <input type="password" name="TB_Mot_de_Passe" />
     </p>
     <p>
          Confirmation du mot de passe : <input type="password" name="TB_Confirmation_Mot_de_Passe" />
     </p>
     <p>
          Adresse e-mail : <input type="text" name="TB_Adresse_Email" />
     </p>
     <p>
          <input type="submit" name="BT_Envoyer" value="Envoyer" />
     </p>
</form>
<?php } ?>
</body>
</html>