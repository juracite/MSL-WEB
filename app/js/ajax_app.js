function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }

    var pre = document.createElement('pre');
    pre.innerHTML = out;
    document.body.appendChild(pre);
}

$("#connexionForm").submit( function(e) {	
	e.preventDefault();
    $.ajax({
       url : 'verif.php',
       cache: false,
       type : 'POST',
	   data: "username="+$("#username").val()+"&password="+$("#password").val(),
	   dataType: 'json',
			success: function(json)
			{ 
				if (json["etat"] == "Success")
				{
					document.location.href="membre.php";
				}
				else
				{
					$("span#erreur").html("<span class=\"glyphicon glyphicon-warning-sign\" aria-hidden=\"true\"></span>&nbsp;Erreur lors de la connexion, veuillez v&eacute;rifier votre login et votre mot de passe.");
				}
		    }
		});
		return false;
});