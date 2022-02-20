<template>
  <div class="hero_container">
    <div class="container py-5">
      <div class="title rounded p-5 text-center">
          <h1 class="mb-3">Benvenuto su BoolBnB</h1>
          <h3 class="mb-5">Quale sarà la tua prossima meta? Scegli una città, e inizia l'avventura!</h3>

          <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
              <div class="col-md-4 mb-5">
                <div class="search"> 
                  <input type="text" class="form-control" placeholder="type city or address..."> 
                  <button @click="$emit('search')" class="btn btn-primary"><i class="fa fa-search"></i></button> 
                </div>
              </div>
              <search-filters v-if="searching"></search-filters>
            </div>
          </div>

      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HeroSection',
  props: {
    searching: Boolean
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