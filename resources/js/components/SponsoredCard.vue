<template>
  <!--   <div class="col d-flex justify-content-center"> -->
  <div class="card px-0 shadow-lg mb-5 bg-body rounded" style="width: 18rem">
    <!-- <img :src="img" class="card-img-top" alt="..." /> -->
    <img v-if="img.substr(0, 4) === 'http'" :src="img" class="card-img-top" alt="cover" />
    <img v-if="img.substr(0, 4) !== 'http'" :src="'../storage/' + img" class="card-img-top" alt="cover" />
    <div class="card-body text-center">
      <h5 style="color: #d48166">{{ title }}</h5>

      <hr class="mt-3 mb-3" style="width: 25%; margin: auto" />

      <p class="card-text text-center">
        <i class="fas fa-map-marker-alt fs-5" style="color: #d48166"></i>
        {{ via }}, {{ civico }} ({{ citta }})
      </p>
    </div>
  </div>
  <!--  </div> -->
</template>

<script>
export default {
  name: "SponsoredCard",
  props: {
    // apartments: Array,
    // search: Object,
    title: String,
    img: String,
    via: String,
    civico: Number,
    citta: String,
  },
  methods: {},
};
</script>

<style lang="scss" scoped>
</style>