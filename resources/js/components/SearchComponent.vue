<template>
    <nav id="Nav" class="navbar navbar-expand-lg navbar-dark indigo mb-4">
  <a class="navbar-brand" href="#">Navbar</a>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">

  <form  class="form-inline ml-auto">
      <div class="md-form my-0">
      <input class="form-control" type="text" placeholder="Search" id="search" >
      </div>
      <button href="#!" class="btn btn-outline-white btn-md my-0 ml-sm-2" type="submit">Search</button>
    </form>

  </div>
  <!-- Collapsible content -->

</nav>
</template>
<script>
export default {
    data() {
        return {
            keywords: null,
            items: []
        };
    },
   
    methods: {
        fetchItems() {
            axios.get('/boutique')
                .then(response => {  this.items = response.data })
              
                .catch(error => { console.log(error)})
        }
    },
    mounted() {
        this.fetchItems();
    },
}
</script>


