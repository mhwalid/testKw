
@php
$path = Storage::path('CB\MoneticoPaiement_Config.php');
require_once($path);
$path1 = Storage::path('CB\MoneticoPaiement_Ept.inc.php');
require_once($path1);



$sReference = "FA28181718";
$sMontant = "645.12";
$sDevise  = "EUR";
$sTexteLibre = "KW DISTRIBUTION Reglement document n° ".$sReference;
$sDate =date("d/m/Y:H:i:s");
$sLangue = "FR";
$sEmail = "walid@kw-distribution.com";
$sOptions = ""; 



// =============================================================================================================================================================
// SECTION CODE : Cette section ne doit pas �tre modifi�e
// 
// CODE SECTION : This section must not be modified
// =============================================================================================================================================================
$oEpt = new MoneticoPaiement_Ept($sLangue);     		
$oHmac = new MoneticoPaiement_Hmac($oEpt);      	        

// Control String for support
$CtlHmac = sprintf(MONETICOPAIEMENT_CTLHMAC, $oEpt->sVersion, $oEpt->sNumero, $oHmac->computeHmac(sprintf(MONETICOPAIEMENT_CTLHMACSTR, $oEpt->sVersion, $oEpt->sNumero)));

// Data to certify
$phase1go_fields = sprintf(MONETICOPAIEMENT_PHASE1GO_FIELDS,$oEpt->sNumero,$sDate,$sMontant,$sDevise,$sReference,$sTexteLibre,$oEpt->sVersion,$oEpt->sLangue,$oEpt->sCodeSociete,$sEmail,"","","","","","","","","",$sOptions);

// MAC computation
$sMAC = $oHmac->computeHmac($phase1go_fields);

// =============================================================================================================================================================
// FIN SECTION CODE
//
// END CODE SECTION 
// =============================================================================================================================================================
@endphp

<!--============================================================================================================================================================
  SECTION PAGE HTML
  Ci-dessous se trouve un exemple de code html comprenant le formulaire de paiement. La partie importante est la section FORMULAIRE. Le reste de la section
  PAGE HTML est uniquement l� pour mettre en forme l'exemple.
  
  HTML PAGE SECTION
  Here after is an example of html code including the payment form. The important part is the FORM section. The rest of the HTML PAGE section is only here 
  for the example.
===========================================================================================================================================================-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<meta http-equiv="cache-control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0" />
<meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<title>Connexion au serveur de paiement</title>
<link type="text/css" rel="stylesheet" href="moneticopaiement.css" />
</head>

<body>
<!--============================================================================================================================================================
  SECTION FORMULAIRE : cette section doit �tre copi�e dans votre propre page afin d'afficher le bouton de paiement. Aucune modification n'est requise.
  
  FORM SECTION : this section must be copied into your own page in order to display payment button. No modification are needed.
=============================================================================================================================================================-->
<form name="f" action="<?php echo $oEpt->sUrlPaiement;?>" method="post" id="PaymentRequest">
<p>
	<input type="text" name="version"             id="version"        value="<?php echo $oEpt->sVersion;?>" />
	<input type="text" name="TPE"                 id="TPE"            value="<?php echo $oEpt->sNumero;?>" />
	<input type="text" name="date"                id="date"           value="<?php echo $sDate;?>" />
	<input type="text" name="montant"             id="montant"        value="<?php echo $sMontant . $sDevise;?>" />
	<input type="text" name="reference"           id="reference"      value="<?php echo $sReference;?>" />
	<input type="text" name="MAC"                 id="MAC"            value="<?php echo $sMAC;?>" />
	<input type="text" name="url_retour"          id="url_retour"     value="<?php echo $oEpt->sUrlKO;?>" />
	<input type="text" name="url_retour_ok"       id="url_retour_ok"  value="<?php echo $oEpt->sUrlOK;?>" />
	<input type="text" name="url_retour_err"      id="url_retour_err" value="<?php echo $oEpt->sUrlKO;?>" />
	<input type="text" name="lgue"                id="lgue"           value="<?php echo $oEpt->sLangue;?>" />
	<input type="text" name="societe"             id="societe"        value="<?php echo $oEpt->sCodeSociete;?>" />
    <input type="text" name="texte-libre"       id="texte-libre"  value="@php echo HtmlEncode($sTexteLibre) @endphp>" />
	<input type="text" name="mail"                id="mail"           value="<?php echo $sEmail;?>" />
	
</p>
</form>
 <script type="text/javascript">
    document.forms["f"].submit();
  </script>

<!--============================================================================================================================================================
  FIN SECTION FORMULAIRE
  
  END FORM SECTION
=============================================================================================================================================================-->
</body>
</html>
