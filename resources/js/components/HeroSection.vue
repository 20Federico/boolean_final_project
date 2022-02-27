<template>
  <div class="hero_container">
    <div class="container py-5">
      <div class="title rounded p-3 p-md-5 text-center">
        <h1 class="mb-3">Benvenuto su BoolBnB</h1>
        <h3 class="mb-5">
          Quale sarà la tua prossima meta? Scegli una città, e inizia
          l'avventura!
        </h3>

          <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
              <div class="col-12 col-md-8 mb-5">
                <div class="search"> 
                  <input v-on:keyup.enter="search(searchQuery)" v-model="searchQuery" id="query" type="text" class="form-control" placeholder="type city or address..."> 
                  <button  @click="search(searchQuery)" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
            <search-filters v-show="searching == true"></search-filters>
          </div>
        </div>
      </div>
    </div>
  <!-- </div> -->
</template>

<script>
import {mapActions} from "vuex";
export default {

  name: 'HeroSection',
  
  
  data() {
    return {
      searchQuery: '',
      searching:false,
    }

  },
  
  methods: {
    ...mapActions(['GET_FILTER_ADRESSES']),
    search(value){
      if (this.searchQuery !== '') {
          this.searching = true;
          this.$emit('search');
        }
        this.GET_FILTER_ADRESSES(value);
    }
  }
}

</script>

<style lang="scss" scoped>
.hero_container {
  background-image: url(https://www.telegraph.co.uk/content/dam/Travel/Destinations/Europe/Italy/Rome/rome-sunset-tiber-river-overview-city-guide-xlarge.jpg);
  background-size: cover;
  background-position: center;
  aspect-ratio: 3.2;
}
</style>