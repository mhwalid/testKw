
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
                console.log(response.data.data)
                const ret = response.data.data
                let results = document.querySelector('#results')
                results.innerHTML = ''
                let test=''
                Object.keys(ret).forEach(key => {
                    let Card = document.createElement('div');
                    var pathcart="{{ route('cart.store') }}";
                    var pathId="{{ route('product.index') }}";
                    var pathImage = "asset/item/images/"+ret[key].Id+"/Cart1.jpg";
                    test+='<div class=" p-4 d-flex border rounded overflow-hidden flex-md-row mb-4 shadow-sm  " id="test">\
                        <img class="img-responsive mr-4" src='+pathImage+' alt=" " class="bd-placeholder-img" style="width: 80px ;heigth:60px" >\
                        <a href='+pathId+'/'+ret[key].Id+'><strong class="d-inline-block mb-2 text-primary">'+ ret[key].Caption +'</strong> </a>\
                        @guest\
                        <em class=" ml-4">Connectez-vous pour voir les prix !</em>\
                        @else\
                        <h5 style="position: absolute; margin-left:991px" class="mb-0"> '+ Math.round(parseFloat(ret[key].CostPrice)*100)/100 +'€</h5>\
                        @endguest'
                    if(ret[key].RealStock>0){
                        test+='@guest\
                            @else \
                            <form action='+pathcart+' method="POST" style="position: absolute; margin-left:921px">\
                            <input   name="_token" value="'+csrf+'" type="hidden">\
                            <input type="hidden" name="item_id" value="'+ret[key].Id+'">\
                            <input type="hidden" name="price" value="'+Math.round(parseFloat(ret[key].CostPrice)*100)/100+'">\
                            <input type="hidden" name="quantity" value="1">\
                            <button type="submit" class="btn btn-success"><i class="fa fa-shopping-cart mr-2"></i></button>\
                            </form>\
                            @endguest'
                    }
                    test+='</div>';
                });
                results.innerHTML=test
            })
            .catch(function(error) {
                console.log(error);
            });
    });
</script>

