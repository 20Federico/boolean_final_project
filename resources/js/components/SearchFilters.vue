<template>
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
  </div>
</template>

<script>
export default {
  name: "SearchFilters",
};
</script>

<style lang="scss" scoped>
form {
  color: #373a36;
  background-color: #d48166bd;
  border-radius: 10px;
}
</style>