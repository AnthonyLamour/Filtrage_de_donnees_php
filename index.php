<?php
    
    //début de session
    session_start();
    
    //si l'utilisateur n'a pas choisi une équipe
    if(!isset($_POST["ChoixEquipe"])){
        //définition d'une équipe par défaut
        $_SESSION["Team"]="Phantom Thieves";
    }
    //sinon
    else
    {
        //enregistrement de l'équipe dans la session
        $_SESSION["Team"]=$_POST["ChoixEquipe"];
    }
?>

<!DOCTYPE HTML5>
<!--ceci est une page web visant à répondre à un TP sur le filtrage de données en php-->
<html>

<!--head-->
	<head>
		<!--titre de la page web-->
		<title>TP PHP filtrage de données</title>
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
        <!--Lien au javascript-->
		<script type="text/javascript" src="JS/Fichier_Script.js"></script>
		
	</head>

<!--body-->
	<body id="BODY" name="body">

        <!--formulaire du choix d'un groupe-->
        <form action="#" method="post" id="TEAMCHOICE" name="TeamChoice">
            <p id="TEXTCHOIXEQUIPE" name="textchoixequipe">Choisissez votre équipe : </p>
            <select name="ChoixEquipe">
                <option value="Phantom Thieves">Phantom Thieves (persona 5)</option>
                <option value="Investigation Team">Investigation Team (persona 4)</option>
                <option value="SEES">SEES (persona 3)</option>
            </select><br/><br/>
            <input type="submit" value="Valider" id="BOUTONCHOIXTEAM" name="boutonchoixteam" /><br/>
        </form>

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
        
        <!--fieldset contenant le formulaire de la page-->
        <fieldset id="FORMINSCRIPTIONCONTENU">
        
            <!--legende du fieldset-->
            <legend>Formulaire de recrutement</legend>
            
            <!--formulaire de la page-->
            <form action="traitement.php" method="POST" id="FORMINSCRIPTION" name="FormInscription">
                <!--Label de Nom-->
                <label for="Nom">Nom	:</label>
                <!--input du Nom-->
                <input type="text" id="Nom" name="VarNom" size="20" placeholder="Votre nom en 20 lettres max" required />
                <!--Place des érreurs lié à Nom-->
                <span id="SpanErreurNom"></span><br/><br/>
                        
                <!--Label de Prenom-->
                <label for="Prenom">Prénom	:</label>
                <!--input du prénom-->
                <input type="text" id="Prenom" name="VarPrenom" size="20" placeholder="Votre prénom en 20 lettres max" required />
                <!--Place des érreurs lié à Prenom-->
                <span id="SpanErreurPrenom"></span><br/><br/>
                        
                <!--sélcetion du sexe-->
                <p>Vous êtes :</p>
                <!--input du bouton Homme-->
                <input type="radio" id="RadioHomme" name="VarRadioSexe" value="Homme" required />
                <!--Label de RadioHomme-->
                <label for="RadioHomme">Un homme</label>
                <!--input du bouton Femme-->
                <input type="radio" id="RadioFemme" name="VarRadioSexe" value="Femme" required />
                <!--Label de RadioFemme-->
                <label for="RadioFemme">Une femme</label>
                <!--input du bouton Autre-->
                <input type="radio" id="RadioAutre" name="VarRadioSexe" value="Autre" required />
                <!--Label de RadioAutre-->
                <label for="RadioAutre">Autre</label>
                <!--Place des érreurs lié à VarRadioSexe-->
                <span id="SpanErreurRadioSexe"></span><br/><br/>
                
                <!--Label de Email-->
                <label for="Email">Email	:</label>
                <!--input du mail-->
                <input type="email" id="Email" name="VarEmail" placeholder="prenom.nom@mail.com" required />
                <!--Place des érreurs lié à Email-->
                <span id="SpanErreurEmail"></span><br/><br/>
                
                <?php
                    //si l'équipe est celle des Phantom Thieves
                    if($_SESSION["Team"]=="Phantom Thieves"){
                        //ajout d'un input nom de code
                        echo("<!--Label de CodeName-->
                            <label for=\"CodeName\">Nom de code	:</label>
                            <input type=\"text\" id=\"CodeName\" name=\"VarCodeName\" placeholder=\"Joker\" required />
                            <!--Place des érreurs lié à CodeName-->
                            <span id=\"SpanErreurCodeName\"></span><br/><br/>");
                    }
                ?>
                
                <!--Label de Site-->
                <label for="Site">Site favori	:</label>
                <!--input du site favori-->
                <input type="text" id="Site" name="VarSite" size="20" placeholder="http://monsitefavori.com" required />
                <!--Place des érreurs lié à Site-->
                <span id="SpanErreurSite"></span><br/><br/>
                
                <!--Label de Pays-->
                <label for="Pays">Pays	:</label>
                <!--select du pays-->
                <select name="Pays">
                    <option value="USA">USA</option>
                    <option value="France">France</option>
                    <option value="Japon">Japon</option>
                </select><br/><br/>
                <!--Place des érreurs lié à Pays-->
                <span id="SpanErreurPays"></span><br/><br/>
                
                <!--Label de Pays-->
                <label for="Element">Elément(s)	:</label>
                <!--select des éléments-->
                <select name="Element[]" multiple>
                <?php
                    //ajout des options en fonction de l'équipe
                    switch($_SESSION["Team"]){
                        case"Phantom Thieves":
                            echo("<option value=\"Physical\">Physical</option>");
                            echo("<option value=\"Gun\">Gun</option>");
                            echo("<option value=\"Fire\">Fire</option>");
                            echo("<option value=\"Ice\">Ice</option>");
                            echo("<option value=\"Elec\">Electricity</option>");
                            echo("<option value=\"Wind\">Wind</option>");
                            echo("<option value=\"Psychic\">Psychic</option>");
                            echo("<option value=\"Nuclear\">Nuclear</option>");
                            echo("<option value=\"Bless\">Bless</option>");
                            echo("<option value=\"Curse\">Curse</option>");
                            break;
                        case"Investigation Team":
                            echo("<option value=\"Physical\">Physical</option>");
                            echo("<option value=\"Fire\">Fire</option>");
                            echo("<option value=\"Ice\">Ice</option>");
                            echo("<option value=\"Elec\">Electricity</option>");
                            echo("<option value=\"Air\">Air</option>");
                            echo("<option value=\"Light\">Light</option>");
                            echo("<option value=\"Darkness\">Darkness</option>");
                            break;
                        case"SEES":
                            echo("<option value=\"Slash\">Slash</option>");
                            echo("<option value=\"Strike\">Strike</option>");
                            echo("<option value=\"Pierce\">Pierce</option>");
                            echo("<option value=\"Fire\">Fire</option>");
                            echo("<option value=\"Ice\">Ice</option>");
                            echo("<option value=\"Elec\">Electricity</option>");
                            echo("<option value=\"Wind\">Wind</option>");
                            echo("<option value=\"Light\">Light</option>");
                            echo("<option value=\"Darkness\">Darkness</option>");
                            break;
                    }
                ?>
                </select>
                <!--Place des érreurs lié aux éléments-->
                <span id="SpanErreurElement"></span><br/><br/>
                
                <?php
                    //ajout de checkbox en fonction de l'équipe
                    switch($_SESSION["Team"]){
                        case"Phantom Thieves":
                            echo("<!--sélcetion des objets volés-->
                                <p>Vous avez volé :</p>
                                <input type=\"checkbox\" id=\"vole1\" name=\"vole[]\" value=\"une medaille\">
                                <label for=\"vole1\"> une médaille olympique</label><br>
                                <input type=\"checkbox\" id=\"vole2\" name=\"vole[]\" value=\"un tableau\">
                                <label for=\"vole2\"> un tableau </label><br>
                                <input type=\"checkbox\" id=\"vole3\" name=\"vole[]\" value=\"une valise\">
                                <label for=\"vole3\"> une valise pleine d'argent</label><br>");
                            break;
                        case"Investigation Team":
                            echo("<!--sélcetion des télés à disposition-->
                                <p>Vous avez une télé :</p>
                                <input type=\"checkbox\" id=\"tele1\" name=\"tele[]\" value=\"votre salon\">
                                <label for=\"tele1\"> dans votre salon</label><br>
                                <input type=\"checkbox\" id=\"tele2\" name=\"tele[]\" value=\"votre chambre\">
                                <label for=\"tele2\"> dans votre chambre </label><br>
                                <input type=\"checkbox\" id=\"tele3\" name=\"tele[]\" value=\"un centre commercial\">
                                <label for=\"tele3\"> dans votre centre commercial le plus proche</label><br>");
                            break;
                        case"SEES":
                            echo("<!--sélcetion du moment de la journée préféré-->
                                <p>Vous préféré :</p>
                                <input type=\"checkbox\" id=\"moment1\" name=\"moment[]\" value=\"le matin\">
                                <label for=\"moment1\"> le matin</label><br>
                                <input type=\"checkbox\" id=\"moment2\" name=\"moment[]\" value=\"l'après midi\">
                                <label for=\"moment2\"> l'après midi </label><br>
                                <input type=\"checkbox\" id=\"moment3\" name=\"moment[]\" value=\"la darkhour\">
                                <label for=\"moment3\"> la dark hour</label><br>");
                            break;
                    }
                ?>

            <input type="button" value="Valider" id="BOUTONVALIDFORM" name="boutonvalidfrom" onclick="ValideForm();" />
        </fieldset>
        
	</body>

<!--footer-->
	<footer id="FOOTER" name="footer">
        <p>Anthony Lamour</p>
	</footer>

</html>