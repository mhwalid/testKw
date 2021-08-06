
<script>
    function showOld(event) {
        event.preventDefault()
    }
    $.ajaxSetup({
        headers:
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $(document).on('keyup', '#search', function() {
        var $value = $(this).val();
        const url = document.querySelector('#SearchFrom').getAttribute('action');
        var ur = document.querySelector('#url').innerText;
        var csrf = document.querySelector('meta[name="csrf-token"]').content;
        var _token= document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        if($value=='') document.location.reload();
        axios.post(`${url}`, {
                value: $value,
                ur: ur,
                items: []
            })
            .then(function(response) {
                // console.log(response.data.data)
                const ret = response.data.data
                var Z = window.matchMedia("(max-width: 600px)")
                myFunction(Z) // Call listener function at run time
                Z.addListener(myFunction)

                function myFunction(Z) {
                    if (Z.matches) { // If media querZ matches
                        // results.hide();
                        let results = document.querySelector('#result')
                        console.log('mobile')
                        
                        
                    }else{let results = document.querySelector('#results')
                    console.log('pc')
                    // console.log('pc2')
                    
                }}
                function checkFileExist(urlToFile) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('HEAD', urlToFile, false);
                    xhr.send();
                    
                    if (xhr.status == "404") {
                        return false;
                    } else {
                        return true;
                    }
                }
               

                results.innerHTML = ''
                let test=''
                // console.log(ret)
                Object.keys(ret).forEach(key => {
                    let Card = document.createElement('div');
                    var pathcart="{{ route('cart.store') }}";
                    var pathId="{{ route('product.index') }}";
                    
                    var pathImage = "{{ asset('asset/item/images/') }}/"+ret[key].Id+"/Cart1.jpg";
                    var testimg = '"asset/item/images/'+ret[key].Id+'/Cart1.jpg"';
                    var pathImgStock = "{{asset('asset/img/en_stock.svg')}}";
                    var pathImgNStock = "{{asset('asset/img/plus_en_stock.svg')}}";
                    var pathImgCart = "{{asset('asset/img/Ajouter_au_panier.svg')}}";
                    // console.log(pathImgStock);
                    
                    // var imgr = checkFileExist(pathImage);
                    // if (imgr == true) {
                    //     alert('yay, file exists!');
                    // } else {
                    //     alert('file does not exist!');
                    // }
                    // test+='<div class="border-bottom  overflow-hidden flex-md-row mb-4" id="test"> <div>'
                    // if(imgr){
                    //     test+='<img style="margin-bottom: 8px; width: 80px; height: 60px; "class="img-responsive mr-4" src='+pathImage+' alt=" " class="bd-placeholder-img">'
                    // }else{
                    //     test+='<img style="margin-bottom: 8px; width: 80px; height: 60px; "class="img-responsive mr-4" src="{{asset('asset/img/img-indispo-80x60.jpg')}}" alt=" " class="bd-placeholder-img">'
                    // }

                    test+='<div class="border-bottom  overflow-hidden flex-md-row mb-4" id="test"> <div>\
                    <img style="margin-bottom: 8px; width: 80px; height: 60px;" class="img-responsive mr-4" src='+pathImage+' alt="Image not found"class="bd-placeholder-img">'

                    if (ret[key].RealStock>0) {
                        test+='<p>En stock <img style=" width: 15px; height: 15px;"   src='+pathImgStock+'></p>'
                    }else{
                        test+='<p>En stock <img style=" width: 15px; height: 15px;"   src='+pathImgNStock+'></p>'
                    }
                    test+='</div>\
                        <a id="Catégorie" href='+pathId+'/'+ret[key].Id+'><strong class="d-inline-block mb-2 text-primary">'+ ret[key].Caption +'</strong> </a>\
                        @auth\
                        <h5 style="position: absolute; margin-left:991px" class="mb-0"> '+ Math.round(parseFloat(ret[key].SalePriceVatExcluded)*100)/100 +'€</h5>\
                        @endauth' 
                    if(ret[key].RealStock>0){
                        test+='<form action="{{ route('cart.store') }}" method="POST" >\
                                @csrf\
                                <input type="hidden" name="item_id" value="'+ret[key].Id+'">\
                                <input type="hidden" name="price" value='+ Math.round(parseFloat(ret[key].SalePriceVatExcluded)*100)/100 +'>\
                                <input type="hidden" name="quantity" value="1">\
                                <button style="background-color: #FFD600; border-radius:20px;     padding-right: 0px;   padding-left: 0px;  padding-top: 0px; padding-bottom: 0px; height: 34px; width: 50px; " type="submit" id="panier" class="btn  ">\
                                    <img style="width: 20px; height:20px; "   class="" src='+pathImgCart+' alt="Certification"></button>\
                                </form>'
                    }
                    test+='</div>';
                });
                results.innerHTML=test
            })
            .catch(function(error) {
                // console.log(error);
            });
    });
</script>

