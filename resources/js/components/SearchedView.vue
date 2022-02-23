<template>
  <div>
    <div class="row d-flex flex-column flex-md-row py-3 g-0">
      <div class="col-12 col-md-5">
        <div class="p-4">
          <button
            @click="$emit('back')"
            type="button"
            class="btn btn-outline-dark mb-4"
          >
            <i class="fas fa-arrow-left"></i>
            <span class="d-none d-sm-inline">Homepage</span>
          </button>
          <!-- {{apartments}} -->

          <div
            class="card mb-1 p-3"
            v-for="(apartment, i) in apartments"
            :key="i"
          >
            <div class="row flex-column g-0">
              <div class="col">
                <img :src="apartment.cover_img" class="card_img" alt="cover" />
              </div>
              <div class="col">
                <div class="card-body">
                  <h5 class="card-title">{{ apartment.title }}</h5>
                  <hr class="w-25" />
                  <p class="card-text mb-1">
                    <small class="text-muted">{{
                      apartment.shared
                        ? "Appartamento condiviso"
                        : "Appartamento intero"
                    }}</small>
                  </p>
                  <div class="card-text">
                    <ul class="list-unstyled text-secondary mb-4">
                      <li class="d-inline-block">
                        Mq: {{ apartment.square_meters }} |
                      </li>
                      <li class="d-inline-block">
                        Stanze: {{ apartment.n_rooms }} |
                      </li>
                      <li class="d-inline-block">
                        Letti: {{ apartment.n_beds }} |
                      </li>
                      <li class="d-inline-block">
                        Bagni: {{ apartment.n_baths }} |
                      </li>
                      <li
                        class="d-inline-block"
                        v-for="(service, i) in apartment.services"
                        :key="i"
                      >
                        {{ service.name }} |&#160;
                      </li>
                    </ul>
                  </div>
                  <div class="d-flex justify-content-between">
                    <div>
                      <p class="card-text text-end">
                        €
                        <strong class="fs-4">{{ apartment.price_day }}</strong>
                        / notte
                      </p>
                    </div>
                    <div>
                      <a
                        :href="'apartments/' + apartment.id"
                        class="btn btn-orange mb-3"
                        >Dettagli</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-7 p-4">
        <div class="map_container">
          <div class="mymap" id="map"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SearchedView",
  data() {
    return {
      map: {},
      markers: [],
    };
  },
  props: {
    apartments: Array,
    search: Object,
  },
  methods: {
    moveMap(result) {
      this.map.flyTo({
        center: result,
        zoom: 14,
      });
    },
  },
  computed: {
    handleresults() {
      if (this.search.results) {
        if (this.markers.length > 0) {
          this.markers.forEach((element) => {
            element.remove();
            this.markers.splice(element);
          });
        }

        this.moveMap(this.search.results[0].position);

        this.apartments.forEach((element) => {
          var marker = new tt.Marker()
            .setLngLat([element.address.longitude, element.address.latitude])
            .addTo(this.map);

          this.markers.push(marker);
        });
      }
    },
  },
  mounted() {
    this.map = tt.map({
      key: "hwUAMJjGlcfAD2Yd3w1owWJqbrrLpfoo",
      container: "map",
      center: [12.494689, 41.899783],
      zoom: 10,
    });

    this.map.addControl(new tt.FullscreenControl());
    this.map.addControl(new tt.NavigationControl());
  },
};
</script>

<style lang="scss" scoped>
.mymap {
  height: 100% !important;
}
.map_container {
  height: 100vh;
  position: sticky;
  top: 0;
}
.card {
  border-right: none;
  border-left: none;
}
.card_img {
  width: 100%;
  height: 100%;
  border-radius: 10px;
}
.card-body {
  padding: 0 !important;
  padding-left: 20px !important;
}
</style>