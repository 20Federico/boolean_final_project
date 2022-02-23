<template>
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
                        step="10"
                        v-model="kmValue"
                        v-on:change="searchByKm
"
                      
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

            <div>Services</div>
            <div class="d-flex d-flex-wrap text-center justify-content-center">
                <div
                    class="form-check px-3"
                    v-for="service in services"
                    :key="service.id"
                >
                    <label class="form-check-label" :for="service.id">
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
        searchByKm(){
            this.GET_FILTER_KM(this.kmValue);
        }
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
