<script>
      $('.filter_all').on('click', function() {
        let ucan = false

        filter_data();

        function filter_data() {
            $('.filter_data');
            var action = 'fetch_data';
            var minimum_price = $('#min_price_hide').val();
            var maximum_price = $('#max_price_hide').val();
            var FamilyId = $('#FamilyId').val();
            var Stockage = get_filter('Stockage');
            var marque = get_filter('marque');
            var ram = get_filter('ram');
            var disque = get_filter('disque');
            var mrq = get_filter('mrq');
            var CGType = get_filter('CGType');
            var size = get_filter('size');
            const url = document.querySelector('#filter').getAttribute('action');
            var search = document.getElementById("search")
            var ur = document.querySelector('#url').innerText;
            // console.log(FamilyId);
            axios.post(`${url}`, {
                    action: action,
                    minimum_price: minimum_price,
                    maximum_price: maximum_price,
                    Stockage: Stockage,
                    FamilyId: FamilyId,
                    // proc: proc,
                    // disque: disque,
                    // url: ur,
                    marque: marque,
                    // search: search,
                    // ram: ram,
                    // CGType: CGType,
                    // size: size,
                })
                .then(function(response) {
                    console.log(response.data)
                    const ret = response.data
                    let results = document.querySelector('#results')
                    // console.log(ret)
                    if (ret) {
                        ucan = true
                        results.innerHTML = ''
                        for (let i = 0; i < ret.length; i++) {
                            let Card = document.createElement('div')
                            Card.classList.add('p-4', 'd-flex', 'border', 'rounded', 'overflow-hidden',
                                'flex-md-row', 'mb-4', 'shadow-sm')
                            let titile = document.createElement('a')
                            titile.innerHTML = ret[i].Caption
                            titile.href = "http://localhost:8000/boutique/" + ret[i].Id
                            let price = document.createElement('h5')
                            price.style.position = 'absolute'
                            price.style.marginLeft = '991px'
                            let n = parseFloat(ret[i].CostPrice)
                            price.innerHTML = n.toFixed(2) + " €"
                            Card.appendChild(titile)
                            Card.appendChild(price)
                            results.appendChild(Card)
                        }

                        if (response.data.total == 0) {
                            let Card = document.createElement('div')
                            Card.classList.add('p-4', 'd-flex', 'border', 'rounded', 'overflow-hidden',
                                'flex-md-row', 'mb-4', 'shadow-sm', 'bg-danger', 'text-white')
                            let vide = document.createElement('h5')
                            vide.innerHTML = "Il existe pas dans le Stock  Pour l'instant"
                            Card.appendChild(vide)
                            results.appendChild(Card)
                        }
                    } else {
                        if (ucan) {
                            // location.reload(true)
                        }
                        
                    }

                })
                .catch(function(error) {
                    console.log(error.data);
                });

        };

        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function() {
                filter.push($(this).val());
            });
            return filter;
        }

        $('.filter_all').click(function() {
            filter_data();
        });

        // $('#price_range').slider({
        //     range: true,
        //     min: 10,
        //     max: 300,
        //     values: [10, 300],
        //     step: 10,
        //     stop: function(event, ui) {
        //         $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
        //         $('#min_price_hide').val(ui.values[0]);
        //         $('#max_price_hide').val(ui.values[1]);
        //         filter_data();
        //     }
        // });

    });
</script>