<?php
    /**
     *  @author POLAT Rojin
     *  @copyright  2020 KWD
     *
    */
    // include '../config/config.php';
    // if(!$connexion_prestashop){
    //     echo '
    //         <div>
    //             <table>
    //                 <tr>
    //                     <td style="background-color:#FF0000; color:#FFFFFF; font-weight: bold; text-align:center;">
    //                         Attention : Connexion prestashop non disponible.<br />
    //                     </td>
    //                 </tr>
    //             </table>
    //         </div>
    //     ';
    //     exit;
    // }elseif(!$connexion_ebp){
    //     echo '
    //         <div>
    //             <table>
    //                 <tr>
    //                     <td style="background-color:#FF0000; color:#FFFFFF; font-weight: bold; text-align:center;">
    //                         Attention : Connexion EBP non disponible.<br />
    //                     </td>
    //                 </tr>
    //             </table>
    //         </div>
    //     ';
    //     exit;
    // }else{
    //     // echo '<pre>';
    //     // $categories_request = mysqli_query($connexion_prestashop, "Select ps_category.id_category, ps_category_lang.name from ps_category inner join ps_category_lang on ps_category.id_category = ps_category_lang.id_category where ps_category.id_category>2");
    //     // while($row = mysqli_fetch_assoc($categories_request)){
    //     //     echo $row['id_category'].'&nbsp;'.utf8_encode($row['name']).'<br>';
    //     // }
    //     // echo '</pre>';
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
</head>
<body>
    <form action="{{ route('admin.product') }}" method="POST">
        @csrf
        <label for="search-ean">Recherchez un produit:</label>
        <input   required pattern = "[0-9]{13}" maxlength = '13' type="search" id="search-ean" name="search_ean" value="<?php if(isset($_POST['search-ean'])){
        echo $_POST['search-ean'];}?>">
        <input type="submit" value="Rechercher">
    </form>
    <br><br>
</body>
</html>
<?php
?>