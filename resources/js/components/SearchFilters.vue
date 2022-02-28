<template>
  <!-- 
  <div class="mb-3">
    <form action="#" class="p-4">
      <div class="row justify-content-center align-items-center">
        <div class="col-8">
          <label class="fw-bold" for="distance">5km - 100km</label>
          <input
            id="distance"
            class="form-range"
            type="range"
            min="5"
            max="100"
            step="5"
            value="20"
          />
        </div>
      </div>
      <div
        class="
          row
          d-flex
          flex-column flex-md-row
          justify-content-center
          align-items-center
          row-cols-md-3
          mb-3
        "
      >
        <div class="col mb-2 mb-sm-0">
          <label class="fw-bold" for="rooms">n° minimo stanze</label>
          <input
            id="rooms"
            class="form-control"
            type="number"
            min="1"
            max="20"
            value="1"
          />
        </div>
        <div class="col mb-2 mb-sm-0">
          <label class="fw-bold" for="beds">n° minimo bagni</label>
          <input
            id="beds"
            class="form-control"
            type="number"
            min="1"
            max="20"
            value="1"
          />
        </div>
        <div class="col mb-2 mb-sm-0">
          <label class="fw-bold" for="services">Servizi</label>
          <select id="services" class="form-select" multiple>
            <option value="1">Wi-fi</option>
            <option value="2">Posto Macchina</option>
            <option value="3">Piscina</option>
            <option value="4">Portineria</option>
            <option value="5">Sauna</option>
            <option value="6">Colazione inclusa</option>
            <option value="7">Vista mare</option>
          </select>
        </div>
        <div class="col mt-2 mt-md-0">
          <button class="btn btn-primary" style="background-color: #404040">
            Applica Filtri
          </button>
        </div>
      </div>
    </form>
  </div> -->

  <div class="mb-3">
    <form action="#" class="py-4">
      <div class="row justify-content-center align-items-center">
        <div class="col-8">
          <label class="fs-4" for="distance">{{ kmValue }} Km</label>
          <input
            id="distance"
            class="form-range"
            type="range"
            min="0"
            max="100"
            step="1"
            v-model="kmValue"
            v-on:change="searchByKm"
          />
        </div>
      </div>
      <div class="row justify-content-center align-items-center mb-3">
        <div class="col-2">
          <label class="fs-4" for="rooms">min. rooms</label>
          <input
            id="rooms"
            class="form-control"
            type="number"
            min="1"
            max="20"
            v-model="roomsValue"
            v-on:change="searchByRoom"
          />
        </div>
        <div class="col-2">
          <label class="fs-4" for="beds">min. beds</label>
          <input
            id="beds"
            class="form-control"
            type="number"
            min="1"
            max="20"
            v-model="bedsValue"
            v-on:change="searchByBed"
          />
        </div>
      </div>

      <div class="mt-3 mb-2"><strong>Services</strong></div>
      <div class="d-flex d-flex-wrap text-center justify-content-center">
        <div
          class="form-check px-3"
          v-for="service in services"
          :key="service.id"
        >
          <label
            class="form-check-label"
            :for="service.id"
            style="text-transform: capitalize"
          >
            {{ service.name }}
          </label>

          <input
            option.checked="true"
            class="form-check-input"
            type="checkbox"
            :value="service.id"
            :id="service.id"
            v-model="servicesIds"
            v-on:change="searchByService"
          />
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import { mapActions } from "vuex";
export default {
  name: "SearchFilters",
  data() {
    return {
      servicesIds: [],
      services: [],
      roomsValue: 1,
      bedsValue: 1,
      kmValue: 0,
    };
  },

  methods: {
    getShowServices() {
      axios.get("/api/apartments").then((resp) => {
        return (this.services = resp.data.services);
      });
    },

    ...mapActions([
      "GET_FILTER_ROOM",
      "GET_FILTER_BED",
      "GET_FILTER_SERVICE",
      "GET_FILTER_KM",
    ]),

    searchByRoom() {
      this.GET_FILTER_ROOM(this.roomsValue);
    },
    searchByBed() {
      this.GET_FILTER_BED(this.bedsValue);
    },
    searchByService() {
      this.GET_FILTER_SERVICE(this.servicesIds);
    },
    searchByKm() {
      this.GET_FILTER_KM(this.kmValue);
    },
  },

  mounted() {
    this.getShowServices();
  },
};
</script>

<style lang="scss" scoped>
form {
  color: #373a36;
  background-color: #d48166bd;
  border-radius: 10px;
}
</style>
