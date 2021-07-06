<link href="{{ asset('css/admin.css') }}" rel="stylesheet">

@php

    include '../config/config.php';
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
      }
    if((isset($_POST['search-ean']))&&(preg_match('/^[0-9]{13}$/', $_POST['search-ean']))){
        $url = "http://khezla:fr156221$@data.icecat.biz/xml_s3/xml_server3.cgi?ean_upc=".htmlspecialchars(trim($_POST['search-ean'])).";lang=fr;output=productxml";
        libxml_use_internal_errors(true);
        $xml = simplexml_load_file($url);
        if ($xml === false) {
            echo "Erreur lors du chargement du XML\n <br>";
            foreach(libxml_get_errors() as $error) {
                echo "\t", $error->message;
            }
        }else{
            foreach ($xml->Product->ProductFeature as $key => $value) {
                foreach ($value as $valeur) {
                    if(($valeur->Name['Value'] == 'Hauteur du colis')||($valeur->Name['Value'] == 'Hauteur')){
                        $hauteur = $value[is_numeric($key)-1]['Presentation_Value'];

                    }
                    if(($valeur->Name['Value'] == 'Poids du paquet')||($valeur->Name['Value'] == 'Poids')){
                        $poids = $value[is_numeric($key)-1]['Presentation_Value'];
                    }
                    if(($valeur->Name['Value'] == 'Profondeur du colis')||($valeur->Name['Value'] == 'Profondeur')){
                        $profondeur = $value[is_numeric($key)-1]['Presentation_Value'];
                    }
                    if(($valeur->Name['Value'] == 'Largeur du colis')||($valeur->Name['Value'] == 'Largeur')){
                        $largeur = $value[is_numeric($key)-1]['Presentation_Value'];
                    }
                    if(($valeur->Name['Value'] == "Taille de l'écran")){
                        $taille_ecran = $value[is_numeric($key)-1]->LocalValue['Value'];
                    }
                    if(($valeur->Name['Value'] == "Résolution de l'écran")){
                        $resolution_ecran = $value[is_numeric($key)-1]['Value'];
                    }
                    if(($valeur->Name['Value'] == "Famille de processeur")){
                        $famille_proc = $value[is_numeric($key)-1]->LocalValue['Value'];
                    }
                    if(($valeur->Name['Value'] == "Modèle de processeur")){
                        $modele_proc = $value[is_numeric($key)-1]->LocalValue['Value'];
                    }
                    if(($valeur->Name['Value'] == "Socket de processeur")||($valeur->Name['Value'] == "Socket de processeur (réceptable de processeur)")){
                        $socket_proc = $value[is_numeric($key)-1]->LocalValue['Value'];
                    }
                    if(($valeur->Name['Value'] == "Système d'exploitation")||($valeur->Name['Value'] == "Système d'exploitation installé")){
                        $syst_exploit = $value[is_numeric($key)-1]['Presentation_Value'];
                    }
                    if(($valeur->Name['Value'] == "Capacité SDD totale")){
                        $ssd = $value[is_numeric($key)-1]['Presentation_Value'];
                    }
                    if(($valeur->Name['Value'] == "Capacité totale de stockage")){
                        $stockage = $value[is_numeric($key)-1]['Presentation_Value'];
                    }
                    if(($valeur->Name['Value'] == "Mémoire interne")){
                        $memoire = $value[is_numeric($key)-1]['Presentation_Value'];
                    }
                    if(($valeur->Name['Value'] == "Fréquence de la mémoire")){
                        $freq_memoire = $value[is_numeric($key)-1]['Presentation_Value'];
                    }
                    if(($valeur->Name['Value'] == "Puissance totale")){
                        $puissance = $value[is_numeric($key)-1]['Presentation_Value'];
                    }
                    if(($valeur->Name['Value'] == "Modèle d'adaptateur graphique distinct")){
                        $cg = $value[is_numeric($key)-1]['Presentation_Value'];
                    }
                    if(($valeur->Name['Value'] == "Modèle d'adaptateur graphique inclus")){
                        $chipset = $value[is_numeric($key)-1]['Presentation_Value'];
                    }
                    if(($valeur->Name['Value'] == "Maximum RAM supportée")){
                        $ram = $value[is_numeric($key)-1]['Presentation_Value'];
                    }
                    if(($valeur->Name['Value'] == "Puissance totale")){
                        $puissance = $value[is_numeric($key)-1]['Presentation_Value'];
                    }
                    if(($valeur->Name['Value'] == "Processeur graphique")){
                        $gpu = $value[is_numeric($key)-1]['Presentation_Value'];
                    }
                    if(($valeur->Name['Value'] == "Disposition de la mémoire (modules x dimensions)")){
                        $nb_barrette = substr($value[is_numeric($key)-1]['Presentation_Value'],0,1);
                    }
                    $fabricant = $xml->Product->Supplier['Name'];
                }
            }
        }
    }elseif((isset($_POST['search-ean']))&&(!preg_match('/^[0-9]{13}$/', $_POST['search-ean']))){

        //header(index.php);
        echo "Veuillez saisir un EAN à 13 chiffres";
    }
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title><?php if(isset($xml->Product['Title'])){echo $xml->Product['Title'];}?></title>
    <script>

        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).css("maxWidth", "400px").appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#manualadd_img').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <form action="{{ route('admin.submitdata') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <fieldset>
                <legend>Article : <?php if(isset($xml->Product['Title'])){echo $xml->Product['Title'];}?></legend>
            </fieldset>
            <table>
                <tr>
                    <td colspan=5>
                        <div class="form-group">
                            <label for="title" class="form-label">Libellé</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php if(isset($xml->Product['Title'])){echo substr(htmlspecialchars($xml->Product['Title']),0,80);}?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan=5 >
                        <div class="form-group">
                            <label for="descom" class="form-label">Description Commerciale</label> <br>
                            <textarea class="form-control" id="descom" name="descom" rows="7"><?php if(isset($xml->Product->SummaryDescription->LongSummaryDescription)){echo htmlspecialchars($xml->Product->SummaryDescription->LongSummaryDescription);}?></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="ean13" class="form-label">Code EAN</label>
                            <input type="text" class="form-control" id="ean13" required name="ean13" value="<?php if(isset($xml->Product->EANCode['EAN'])){echo $xml->Product->EANCode['EAN'];}?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="iditem" class="form-label">ID Item</label>
                            <input type="text"  class="form-control" required id="iditem" name="iditem">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="manufreference" class="form-label">Référence Fabricant</label>
                            <input type="text" class="form-control" required id="manufreference" name="manufreference" value="<?php if(isset($xml->Product['Prod_id'])){echo $xml->Product['Prod_id'];}?>">
                        </div>
                    </td>
                    <td>
                    <p>
                        <label for="family">Famille : </label>
                        <select name="family" require id="family">
                        <option></option>
                            <?php
                                $families_request = sqlsrv_query($connexion_ebp, "Select Id, Caption from ItemFamily");
                                while($row = sqlsrv_fetch_array($families_request, SQLSRV_FETCH_ASSOC)){
                                    echo '<option value="'.$row['Id'].'">'.utf8_encode($row['Caption']).'</option>';
                                }
                            ?>
                        </select>
                    </p>
                </td>
                <td>
                    <p>
                        <label for="subfamily">Sous Famille: </label>
                        <select name="subfamily" id="subfamily">
                            <option></option>
                            <?php
                                $families_request = sqlsrv_query($connexion_ebp, "Select Id, Caption from ItemSubFamily");
                                while($row = sqlsrv_fetch_array($families_request, SQLSRV_FETCH_ASSOC)){
                                    echo '<option value="'.$row['Id'].'">'.utf8_encode($row['Caption']).'</option>';
                                }
                            ?>
                        </select>
                    </p>
                </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="fabricant" class="form-label">Fabricant</label>
                            <input type="text" class="form-control"  name="fabricant" value="<?php if(isset($fabricant)){echo $fabricant;}echo ''?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="hauteur" class="form-label">Hauteur</label>
                            <input type="text" step="any"  class="form-control"  name="hauteur" value="<?php if(isset($hauteur)){echo $hauteur;}echo ''?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="profondeur" class="form-label">Profondeur</label>
                            <input type="text" step="any"  class="form-control"  name="profondeur" value="<?php if(isset($profondeur)){echo $profondeur;}echo ''?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="largeur" class="form-label">Largeur</label>
                            <input type="text" step="any"  class="form-control"  name="largeur" value="<?php if(isset($largeur)){echo $largeur;}echo ''?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="resolution_ecran" class="form-label">Résolution d'écran </label>
                            <input type="text" step="any"  class="form-control"  name="resolution_ecran" value="<?php if(isset($resolution_ecran)){echo $resolution_ecran;}echo ''?>">
                        </div>
                    </td>
                </tr>
                <tr>
                <td>
                        <div class="form-group">
                            <label for="taille_ecran" class="form-label">Taille écran</label>
                            <input type="text" class="form-control"   name="taille_ecran" value="<?php if(isset($taille_ecran)){echo $taille_ecran;}echo ''?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="famille_proc" class="form-label">Famille processeur</label>
                            <input type="text" class="form-control"  name="famille_proc" value="<?php if(isset($famille_proc)){echo $famille_proc;}echo ''?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="modele_proc" class="form-label">Modèle processeur</label>
                            <input type="text" class="form-control"  required id="modele_proc" name="modele_proc" value="<?php if(isset($modele_proc)){echo $modele_proc;}echo ''?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="socket_proc" class="form-label">Socket processeur</label>
                            <input type="text" class="form-control"   name="socket_proc" value="<?php if(isset($socket_proc)){echo $socket_proc;}echo ''?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="syst_exploit" class="form-label">Système d'exploitation</label>
                            <input type="text" class="form-control"   name="syst_exploit" value="<?php if(isset($syst_exploit)){echo $syst_exploit;}echo ''?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                         <div class="form-group">
                            <label for="ssd" class="form-label">SSD</label>
                            <input type="text" class="form-control"   name="ssd" value="<?php if(isset($ssd)){echo $ssd;}echo ''?>">
                        </div>
                     </td>
                     <td>
                         <div class="form-group">
                            <label for="stockage" class="form-label">Stockage</label>
                            <input type="text" class="form-control"  name="stockage" value="<?php if(isset($stockage)){echo $stockage;}echo ''?>">
                        </div>
                     </td>
                     <td>
                         <div class="form-group">
                            <label for="memoire" class="form-label">Mémoire</label>
                            <input type="text" class="form-control"  name="memoire" value="<?php if(isset($memoire)){echo $memoire;} echo ''?>">
                        </div>
                     </td>
                     <td>
                         <div class="form-group">
                            <label for="puissance" class="form-label">Puissance</label>
                            <input type="text" class="form-control" name="puissance" value="<?php if(isset($puissance)){echo $puissance;} echo ''?>">
                        </div>
                     </td>
                     <td>
                         <div class="form-group">
                            <label for="freq_memoire" class="form-label">Fréquence mémoire</label>
                            <input type="text" class="form-control"  name="freq_memoire" value="<?php if(isset($freq_memoire)){echo $freq_memoire;}echo ''?>">
                        </div>
                     </td>
                </tr>
                <tr>
                    <td>
                         <div class="form-group">
                            <label for="cg" class="form-label">Carte graphique</label>
                            <input type="text" class="form-control"   name="cg" value="<?php if(isset($cg)){echo $cg;}echo ''?>">
                        </div>
                     </td>
                     <td>
                         <div class="form-group">
                            <label for="chipset" class="form-label">Chipset</label>
                            <input type="text" class="form-control"   name="chipset" value="<?php if(isset($chipset)){echo $chipset;}echo ''?>">
                        </div>
                     </td>
                     <td>
                         <div class="form-group">
                            <label for="ram" class="form-label">RAM</label>
                            <input type="text" class="form-control"   name="ram" value="<?php if(isset($ram)){echo $ram;} echo ''?>">
                        </div>
                     </td>
                     <td>
                        <div class="form-group">
                           <label for="gpu" class="form-label">GPU</label>
                           <input type="text" class="form-control"   name="gpu" value="<?php if(isset($gpu)){echo $gpu;} echo ''?>">
                       </div>
                    </td>
                    <td>
                        <div class="form-group">
                           <label for="nb_barrette" class="form-label">Nombres de barrettes</label>
                           <input type="text" class="form-control"   name="nb_barrette" value="<?php if(isset($nb_barrette)){echo $nb_barrette;} echo ''?>">
                       </div>
                    </td>
                </tr>
                <tr>
                    <td colspan=5>
                    <div class="form-group">
                            <label for="description" class="form-label">Description Longue</label><br>
                            <div contenteditable="True" class="form-control"  id="description" name="description" style="width:100%;height:auto;margin:3px 0 5px 0">
                                <?php if(!empty($xml->Product->ReasonsToBuy)){foreach ($xml->Product->ReasonsToBuy as $key => $value) {
                                    foreach ($value as $valeur) {
                                        echo '<img width="150" src="'.$valeur["HighPic"].'"><br>'.$valeur['Title'].'<br><p>'.str_replace('\n', '<br/>' , $valeur['Value']).'</p><br>';
                                    }
                                }}elseif(isset($xml->Product->SummaryDescription->LongSummaryDescription)){echo htmlspecialchars($xml->Product->SummaryDescription->LongSummaryDescription);}?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan=5>
                        <div class="form-group">
                        <label for="imageslist" class="form-label">Images</label><br>
                        <div class="form-control" id="imageslist" name="imageslist" style="width:100%;height:auto;margin:3px 0 5px 0">
                            <?php
                                echo '<ul>';
                                foreach ($xml->Product->ProductGallery as $key => $value)
                                {
                                    foreach ($value as $valeur) {
                                        if ($valeur['Pic500x500']!='') {
                                            echo '
                                            <li>
                                                <label><input type="checkbox" name="image['.$valeur['Pic500x500'].']" id="'.$valeur['Pic500x500'].'" checked="true"><img width="150" src="'.$valeur['Pic500x500'].'"></label>
                                            </li>
                                        ';

                                        };
                                    };
                                };
                                echo '</ul>';
                            ?>
                        </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan=5>
                        <label for="manualadd_img">Autres images:</label>
                        <input type="file" name="manualadd_images[]" id="manualadd_img" src="'.$valeur['Pic500x500'].'" accept="image/png, image/jpeg, image/bmp" multiple>
                        <div class="gallery"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <input type="submit" value="Enregistrer">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
