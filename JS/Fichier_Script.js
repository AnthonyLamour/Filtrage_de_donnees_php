//fontcion permettant de validé le formulaire
function ValideForm(){
 
    //validation du nom
    if(document.getElementById("Nom").value=="")
    {
        document.getElementById("SpanErreurNom").innerHTML="Veuillez entrer un nom.";
        document.getElementById("Nom").focus();
        return;
    }
    else
    {
        document.getElementById("SpanErreurNom").innerHTML="";
    }
    
    //validation du prénom
    if(document.getElementById("Prenom").value=="")
    {
        document.getElementById("SpanErreurPrenom").innerHTML="Veuillez entrer un prénom.";
        document.getElementById("Prenom").focus();
        return;
    }
    else
    {
        document.getElementById("SpanErreurPrenom").innerHTML="";
    }
    
    //validation du choix du sexe
    if(document.getElementById("RadioHomme").checked==false && document.getElementById("RadioFemme").checked==false && document.getElementById("RadioAutre").checked==false)
    {
        document.getElementById("SpanErreurRadioSexe").innerHTML="Veuillez confirmer votre sexe.";
        return;
    }
    else
    {
        document.getElementById("SpanErreurRadioSexe").innerHTML="";
    }
    
    //validation de l'email
    email=document.getElementById("Email").value.toString();
    email=email.split(".");
    if(email.length!=3)
    {
        document.getElementById("SpanErreurEmail").innerHTML="Veuillez entrer un email valide.";
        document.getElementById("Email").focus();
        return;
    }
    else
    {
        if(email[0].indexOf("@")!=-1){
            document.getElementById("SpanErreurEmail").innerHTML="Veuillez entrer un email valide.";
            document.getElementById("Email").focus();
            return;
        }
        if(email[1].indexOf("@")==-1){
            document.getElementById("SpanErreurEmail").innerHTML="Veuillez entrer un email valide.";
            document.getElementById("Email").focus();
            return;
        }
        if(email[2].indexOf("@")!=-1){
            document.getElementById("SpanErreurEmail").innerHTML="Veuillez entrer un email valide.";
            document.getElementById("Email").focus();
            return;
        }
        document.getElementById("SpanErreurEmail").innerHTML="";
    }
    
    //validation du nom de code
    try{
        
        if(document.getElementById("CodeName").value=="")
        {
            document.getElementById("SpanErreurCodeName").innerHTML="Veuillez entrer un nom de code.";
            document.getElementById("CodeName").focus();
            return;
        }
        else
        {
            document.getElementById("SpanErreurCodeName").innerHTML="";
        }
    
    }catch{
        console.log("pas de non de code");
    }
    
    //validation du site favori
    site=document.getElementById("Site").value.toString();
    site=site.split(".");
    if(site.length<2){
        document.getElementById("SpanErreurSite").innerHTML="Veuillez entrer un site valide.";
        document.getElementById("Site").focus();
        return;
    }else{
        document.getElementById("SpanErreurSite").innerHTML="";
    }
    
    //envoie du formulaire
    document.getElementById("FORMINSCRIPTION").submit();
}