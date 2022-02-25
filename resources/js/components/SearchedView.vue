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

/*
    <div>
        <div class="row me-0">
            <div class="col-5">
                <div class="p-4">
                    <div>
                        <button @click="resetAll" class="btn btn-primary py-2">
                            Reset All
                        </button>
                    </div>
                    <button
                        @click="$emit('back')"
                        type="button"
                        class="btn btn-outline-dark mb-4"
                    >
                        <i class="fas fa-arrow-left"></i> Homepage
                    </button>
                    <!-- {{apartments}} -->

                    <div
                        class="card mb-1 p-3"
                        v-for="apartment in filteredApartments"
                        :key="apartment.id"
                    >
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img v-if="apartment['cover_img'].substr(0, 4) === 'http'" :src="apartment.cover_img" class="card_img" alt="cover" />
                                <img v-if="apartment['cover_img'].substr(0, 4) !== 'http'" :src="'../storage/' + apartment.cover_img" class="card_img" alt="cover" />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text mb-0">
                                        <small class="text-muted">{{
                                            apartment.shared
                                                ? "Camera condivisa"
                                                : "Intero alloggio"
                                        }}</small>
                                    </p>
                                    <h5 class="card-title">
                                        {{ apartment.title }}
                                    </h5>
                                    <hr class="w-25" />
                                    <div class="card-text">
                                        <ul
                                            class="list-unstyled text-secondary mb-4"
                                        >
                                            <li class="d-inline-block">
                                                Mq:
                                                {{ apartment.square_meters }} |
                                            </li>
                                            <li class="d-inline-block">
                                                Stanze:
                                                {{ apartment.n_rooms }} |
                                            </li>
                                            <li class="d-inline-block">
                                                Letti: {{ apartment.n_beds }} |
                                            </li>
                                            <li class="d-inline-block">
                                                Bagni: {{ apartment.n_baths }} |
                                            </li>
                                            <li
                                                class="d-inline-block"
                                                v-for="(
                                                    service, i
                                                ) in apartment.services"
                                                :key="i"
                                            >
                                                {{ service.name }} |&#160;
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                */
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
                                    <span class="badge rounded-pill px-3"><i class="fas fa-ribbon"></i> Sponsored</span>
                                </div>

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

/*
            <div class="col-7">
                <div class="map_container">
                    <div class="mymap" id="map"></div>
                </div>
            </div>
      */
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
export default {
    name: "SearchedView",
    data() {
        return {
            markers: [],
            map: undefined,
            sortedApartments: [],
            sorted: false,
            myLocation: undefined,
        };
    },
    methods: {
        ...mapActions(["GET_APARTMENTS_FROM_API", "GET_FILTER_ADRESSES"]),
        ...mapMutations([
            "SET_FILTER_ROOM",
            "SET_FILTER_BED",
            "SET_FILTER_SERVICE",
            "SET_FILTER_ADRESSES",
            "SET_FILTER_KM",
        ]),

        searchApartmentsByAll() {
            this.sorted = true;
            this.sortedApartments = [...this.APARTMENTS];
            let services = this.SEARCHARRSERVICES;
            let room = parseInt(this.SEARCHNUMROOMS);
            let bed = parseInt(this.SEARCHNUMBEDS);
            let address = this.SEARCHADDRESS;
            let km = this.SEARCHKM;


            

            if (room !== 1) {
                this.sortedApartments = this.sortedApartments.filter((item) => {
                    return item.n_rooms >= room;
                });
            }

            if (bed !== 1) {
                this.sortedApartments = this.sortedApartments.filter((item) => {
                    return item.n_beds >= bed;
                });
            }

            if (services.length > 0) {
                services.forEach((serviceId) => {
                    this.sortedApartments = this.sortedApartments.filter(
                        (item) =>
                            item.services.some((serv) => serv.id === serviceId)
                    );
                });
            }

            if (address || km) {
                if (address && km == 0) {
                    this.getPosition()
                        .then(async () => {
                            this.sortedApartments =
                                this.sortedApartments.filter((item) => {
                                    let dist = this.calcCrow(
                                        item.address.latitude,
                                        item.address.longitude,
                                        this.myLocation.lat,
                                        this.myLocation.lng
                                    );
                                    if (dist <= 200) {
                                        return item;
                                    }
                                });
                        })
                        .then(async () => {
                            this.deleteMarkers().then(async () => {
                                this.createMarkers();
                            });
                        });
                } else if (address && km > 0) {
                    this.getPosition()
                        .then(async () => {
                            this.sortedApartments =
                                this.sortedApartments.filter((item) => {
                                    let dist = this.calcCrow(
                                        item.address.latitude,
                                        item.address.longitude,
                                        this.myLocation.lat,
                                        this.myLocation.lng
                                    );

                                    if (dist < km) {
                                        return item;
                                    }
                                });
                        })
                        .then(async () => {
                            this.deleteMarkers().then(async () => {
                                this.createMarkers();
                            });
                        });
                }
            }
        },

        async deleteMarkers() {
            for (let index = 0; index < this.markers.length; index++) {
                this.markers[index].remove();
            }

            this.markers = [];
        },

        async createMarkers() {
            if(this.filteredApartments == undefined && this.sortedApartments.length == 0){
                return;
            }
            if (this.sortedApartments.length == 0) {
                this.filteredApartments.forEach((element) => {
                    let marker = new tt.Marker()
                        .setLngLat([
                            element.address.longitude,
                            element.address.latitude,
                        ])
                        .addTo(this.map);
                    this.markers.push(marker);
                });
            } else {
                this.sortedApartments.forEach((element) => {
                    let marker = new tt.Marker()
                        .setLngLat([
                            element.address.longitude,
                            element.address.latitude,
                        ])
                        .addTo(this.map);
                    this.markers.push(marker);
                });
            }
        },

        async handlePosition(result) {
            if (result) {
                this.myLocation = await result.results[0].position;
                this.moveMap(this.myLocation);
            }
        },

        calcCrow(lat1, lon1, lat2, lon2) {
            var R = 6371; // km
            var dLat = this.toRad(lat2 - lat1);
            var dLon = this.toRad(lon2 - lon1);
            var lat1 = this.toRad(lat1);
            var lat2 = this.toRad(lat2);
            var a =
                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.sin(dLon / 2) *
                    Math.sin(dLon / 2) *
                    Math.cos(lat1) *
                    Math.cos(lat2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            var d = R * c;
            return d;
        },

        toRad(Value) {
            return (Value * Math.PI) / 180;
        },
        moveMap(location) {
            this.map.flyTo({
                center: location,
                zoom: 10,
            });
        },
        resetMap() {
            this.map.flyTo({
                center: [12.494689, 41.899783],
                zoom: 2,
            });
        },
        async getPosition() {
            await tt.services
                .fuzzySearch({
                    key: "hwUAMJjGlcfAD2Yd3w1owWJqbrrLpfoo",
                    query: document.getElementById("query").value,
                })
                .then(this.handlePosition);
        },

        resetAll() {
            this.SET_FILTER_ROOM(1);
            this.SET_FILTER_BED(1);
            this.SET_FILTER_SERVICE([]);
            this.SET_FILTER_ADRESSES("");
            this.SET_FILTER_KM(0);
            this.resetMap();
            this.sortedApartments = [];
            this.deleteMarkers();
            this.sorted = false;
        },
    },
    computed: {
        ...mapGetters([
            "APARTMENTS",
            "SEARCHNUMROOMS",
            "SEARCHNUMBEDS",
            "SEARCHARRSERVICES",
            "SEARCHADDRESS",
            "SEARCHKM",
        ]),

        filteredApartments() {
            if (this.sortedApartments.length) {
                return this.sortedApartments;
            } else if (!this.sortedApartments.length && !this.sorted) {
                return this.APARTMENTS;
            }
        },
    },
    mounted() {
        this.GET_APARTMENTS_FROM_API();
        this.map = tt.map({
            key: "hwUAMJjGlcfAD2Yd3w1owWJqbrrLpfoo",
            container: "map",
            center: [12.494689, 41.899783],
            zoom: 2,
        });

        this.map.addControl(new tt.FullscreenControl());
        this.map.addControl(new tt.NavigationControl());
    },

    watch: {
        SEARCHNUMROOMS() {
            this.searchApartmentsByAll();
        },
        SEARCHNUMBEDS() {
            this.searchApartmentsByAll();
        },
        SEARCHARRSERVICES() {
            this.searchApartmentsByAll();
        },
        SEARCHADDRESS() {
            this.searchApartmentsByAll();
        },
        SEARCHKM() {
            this.searchApartmentsByAll();
        },
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

.badge {
  position: absolute;
  top: 5px;
  right: 5px;
  background-color: #d48166;
}
</style>
