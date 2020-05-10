<?php
    //début de session
    session_start();
?>

<!DOCTYPE HTML5>
<!--ceci est une page web visant à réviser le html le php le javascript et le CSS-->
<html>

<!--head-->
	<head>
		<!--titre de la page web-->
		<title>TP PHP filtrage de données traitement</title>
		<!--encodage de la page-->
		<meta charset="UTF-8"/>
        <!--icone de la page-->
        <?php
            //définition de l'icone de la page en fonction de l'équipe choisi par l'utilisateur
            switch($_SESSION["Team"]){
                case "Phantom Thieves":
                    echo("<link rel=\"icon\" href=\"image/icon1.jpg\">");
                    break;
                case "Investigation Team":
                    echo("<link rel=\"icon\" href=\"image/icon3.jpg\">");
                    break;
                case "SEES":
                    echo("<link rel=\"icon\" href=\"image/icon2.png\">");
                    break;
            }
        ?>
		<!--lien au css (cascading styel sheet)-->
        <?php
            //définition du CSS de la page en fonction de l'équipe choisi par l'utilisateur
            switch($_SESSION["Team"]){
                case "Phantom Thieves":
                    echo("<link rel=StyleSheet href=\"CSS/stylePhantomThieves.css\" type=\"text/css\">");
                    break;
                case "Investigation Team":
                    echo("<link rel=StyleSheet href=\"CSS/styleInvestigationTeam.css\" type=\"text/css\">");
                    break;
                case "SEES":
                    echo("<link rel=StyleSheet href=\"CSS/styleSEES.css\" type=\"text/css\">");
                    break;
            }
        ?>
		
	</head>

<!--body-->
	<body id="BODYRECEPTION" name="body">

        <!--titre de la page-->
        <h1>Bienvenue chez 
        <?php
            //ajout du nom de l'équipe dans le titre
            switch($_SESSION["Team"]){
                case "Phantom Thieves":
                    echo("les Phantom Thieves !");
                    break;
                case "Investigation Team":
                    echo("l'Investigation Team !");
                    break;
                case "SEES":
                    echo("SEES !");
                    break;
            }
        ?></h1>
        
        <?php
            //si le formulaire a été envoyé
            if(isset($_POST['VarNom'])){
                //ajout du fieldset contenant la réception du formulaire
                echo("<fieldset id=\"RECEPTIONCONTENU\">
                        <legend>Merci d'avoir rempli le formulaire</legend>");
                //ajout de la réception du nom
                echo("<p>Votre nom avec les caractères spéciaux filtrés :</p>");
                echo(filter_input(INPUT_POST, 'VarNom',FILTER_SANITIZE_SPECIAL_CHARS));
                echo("<p>Votre nom avec les nombres filtrés :</p>");
                echo(filter_input(INPUT_POST, 'VarNom',FILTER_SANITIZE_NUMBER_INT));
                
                //ajout de la réception du prénom
                echo("<p>Votre prénom avec les caractères spéciaux filtrés :</p>");
                echo(filter_input(INPUT_POST, 'VarPrenom',FILTER_SANITIZE_SPECIAL_CHARS));
                echo("<p>Votre prénom avec les nombres filtrés :</p>");
                echo(filter_input(INPUT_POST, 'VarPrenom',FILTER_SANITIZE_NUMBER_INT));
                
                //ajout de la réception du sexe
                echo("<p>Vous êtes :</p>");
                echo($_POST["VarRadioSexe"]);
                
                //ajout de la réception de l'email
                echo("<p>Votre email avec les caractères spéciaux filtrés :</p>");
                echo(filter_input(INPUT_POST, 'VarEmail',FILTER_SANITIZE_SPECIAL_CHARS));
                echo("<p>Votre email avec les nombres filtrés :</p>");
                echo(filter_input(INPUT_POST, 'VarEmail',FILTER_SANITIZE_NUMBER_INT));
                if(!filter_input(INPUT_POST, 'VarEmail',FILTER_VALIDATE_EMAIL)){
                    echo("<p>Votre mail n'est pas valide.</p>");
                }else{
                    echo("<p>Votre mail est valide.</p>");
                }
                
                //ajout de la réception du nom de code
                if(isset($_POST['VarCodeName'])){
                    echo("<p>Votre nom de code avec les caractères spéciaux filtrés :</p>");
                    echo(filter_input(INPUT_POST, 'VarCodeName',FILTER_SANITIZE_SPECIAL_CHARS));
                    echo("<p>Votre nom de code avec les nombres filtrés :</p>");
                    echo(filter_input(INPUT_POST, 'VarCodeName',FILTER_SANITIZE_NUMBER_INT));
                }
                
                //ajout de la réception du site favori
                echo("<p>Votre site favoris avec les caractères spéciaux filtrés :</p>");
                echo(filter_input(INPUT_POST, 'VarSite',FILTER_SANITIZE_SPECIAL_CHARS));
                echo("<p>Votre site favoris avec les nombres filtrés :</p>");
                echo(filter_input(INPUT_POST, 'VarSite',FILTER_SANITIZE_NUMBER_INT));
                
                //ajout de la réception du pays
                if(isset($_POST["Pays"])){
                    echo("<p>Votre pays avec les caractères spéciaux filtrés :</p>");
                    echo(filter_input(INPUT_POST, 'Pays',FILTER_SANITIZE_SPECIAL_CHARS));
                    echo("<p>Votre pays avec les nombres filtrés :</p>");
                    echo(filter_input(INPUT_POST, 'Pays',FILTER_SANITIZE_NUMBER_INT));
                }
                
                //ajout de la réception des éléments
                if(isset($_POST["Element"])){
                    echo("<p>Vos éléments sont :</p>");
                    foreach($_POST["Element"] as &$value) {
                        echo("<p>");
                        echo($value);
                        echo("</p>");
                    }
                }
                
                //ajout de la réception des objets volés
                if(isset($_POST['vole'])){
                    echo("<p>Vous avez volé :</p>");
                    foreach($_POST["vole"] as &$value) {
                        echo("<p>");
                        echo($value);
                        echo("</p>");
                    }
                }
                
                //ajout de la réception des lieux possèdant un télé
                if(isset($_POST['tele'])){
                    echo("<p>Vous avez une télé dans :</p>");
                    foreach($_POST["tele"] as &$value) {
                        echo("<p>");
                        echo($value);
                        echo("</p>");
                    }
                }
                
                //ajout des moments préférés de la journée
                if(isset($_POST['moment'])){
                    echo("<p>Vous préféré:</p>");
                    foreach($_POST["moment"] as &$value) {
                        echo("<p>");
                        echo($value);
                        echo("</p>");
                    }
                }
                
                //fermeture du fieldset
                echo("</fieldset>");
            }
        ?>
        
	</body>

<!--footer-->
	<footer id="FOOTER" name="footer">
        <p>Anthony Lamour</p>
	</footer>

</html>