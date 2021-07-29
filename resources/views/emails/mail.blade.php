
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mail.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->

</head>
<body>


<div class="container-fluid">
    <div id="milieumail">
        <img id="kw"  src="{{asset('asset/img/kw.png')}}" alt="">
        <h4 id="titre"><strong>Votre commande a bien été enregistrée</strong>
        </h4>
        <div class="col-lg-6 col-md-6 col-10">
        <p >Bonjour FFFFF; nous vous remercions pour votre commande et espérons que vous avez apprécié votre shopping sur notre site.
        </p>
    </div>
    </div>


    <div id="emailcouleur">
        <div>
            <p>Nom et adresse du client</p>
        </div>
        <div style="padding-top: 20px; padding-bottom: 20px;">
            <p class="m-0">Coût de la livraison</p>

            <p class="m-0"> Colis estimé le XX/XX/XXXX</p>
        </div>
    </div>

    <div id="remerci">
        <p>Lien de la facture</p>

        <p> Nous vous remercions pour votre confiance</p>
        <p>L'équipe KW DISTRIBUTION</p>
    </div>

    <img  class="w-100" src="{{asset('asset/img/informatique.png')}}" alt="">


</div>

<!--- Footer -->
{{-- id="footer" --}}
<footer style="background-color: #969281 ; " class=" text-center text-lg-start text-light"  >
    <!-- Grid container -->
    <div class="container-fluid p-md-4 m-lg-4 pt-4">
       <!--Grid row-->
       <div class="row">


         <!--Grid column-->
         <div class="col-lg-3 col-md-6 mb-4 mb-md-0 mt-md-5 mt-lg-0  ">
           <h5 id="footerjaune"><a {{--href="{{ route('kw') }}"--}} id="footerjaune">Kw-distribution</a></h5>

           <ul class="list-unstyled mb-0">
             <li id="footerpad">
               <i class="fas fa-map-marker-alt"></i> <a href="https://www.google.com/maps/place/12t+Avenue+Eug%C3%A8ne+H%C3%A9naff,+69120+Vaulx-en-Velin/data=!4m2!3m1!1s0x47f4c0f1865b7ab1:0x25f997f1e5d4679e?sa=X&ved=2ahUKEwitstTSjfbwAhWwx4UKHXJyA40Q8gEwAHoECAoQAQ" id="footerjaune">12T Avenue Eugène Hénaff, 69120 Vaulx-en-Velin</a>
             </li>
             <li>
               <i style="font-size: 15px;" class="fas fa-envelope"></i> <a href="mailto:vente@kw-distribution.com" id="footerjaune">vente@kw-distribution.com</a>
             </li>

             <li>
               <i class="fas fa-phone-alt"></i> <a href="tel:0486800800" id="footerjaune">04 86 80 08 00</a>
             </li>
             <li>
               <a {{--href="{{ route('qui') }}"--}} id="footerjaune">Qui sommes-nous ?</a>
             </li>

             <li>
               <a href="{{ route('contact') }}" id="footerjaune">Contactez-nous</a>
             </li>

           </ul>
         </div>
         <!--Grid column-->

         <!--Grid column-->
         <div class="col-lg-3 col-md-6 mb-4 mb-md-0">


               <!-- Facebook -->
               <a
                 class="btn btn-link btn-floating btn-lg text-dark mt-lg-5 mt-md-5 "
                 href="https://fr-fr.facebook.com/kwdistribution/"
                 role="button"
                 data-mdb-ripple-color="light" style="font-size: 3rem"
                 ><i class="fab fa-facebook-f"></i
               ></a>


               <!-- Instagram -->
               <a
                 class="btn btn-link btn-floating btn-lg text-dark mt-lg-5 mt-md-5"
                 href="https://www.instagram.com/kwdistribution/?hl=fr"
                 role="button"
                 data-mdb-ripple-color="light" style="font-size: 3rem"
                 ><i class="fab fa-instagram"></i
               ></a>

               <!-- Linkedin -->
               <a
                 class="btn btn-link btn-floating btn-lg text-dark mt-lg-5 mt-md-5"
                 href="https://www.linkedin.com/company/kw-distribution/?originalSubdomain=fr"
                 role="button"
                 data-mdb-ripple-color="light" style="font-size: 3rem"
                 ><i class="fab fa-linkedin"></i
               ></a>












         </ul>
       </div>
       <!--Grid column-->
     </div>
     <!--Grid row-->
   </div>



   </footer>

   <!-- Fin Footer -->





</body>
</html>




