import axios from "axios";
import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

let store = new Vuex.Store({
  state: {
    apartments: [],
    searchNumRooms: 1,
    searchNumBeds: 1,
    searchNumServices: [],
    searchQuery : "",
    searchKm : 0,
  },
  

  mutations: {
    SET_APARTMENTS_TO_STATE: (state, apartments) => {
      state.apartments = apartments;
    },
    SET_FILTER_ROOM: (state, room) => {
      state.searchNumRooms = room;
    },
    SET_FILTER_BED: (state, bed) => {
      state.searchNumBeds = bed;
    },
    SET_FILTER_SERVICE: (state, service) => {
      state.searchNumServices = service;
    },
    SET_FILTER_ADRESSES: (state, address) => {
      state.searchQuery = address;
    },
    SET_FILTER_KM: (state, km) => {
      state.searchKm = km;
    },
  },

  getters: {
    APARTMENTS(state) {
      return state.apartments;
    },
    SEARCHNUMROOMS(state) {
      return state.searchNumRooms;
    },
    SEARCHNUMBEDS(state) {
      return state.searchNumBeds;
    },
    SEARCHARRSERVICES(state) {
      return state.searchNumServices;
    },
    SEARCHADDRESS(state) {
      return state.searchQuery;
    },
    SEARCHKM(state) {
      return state.searchKm;
    },

  },

  actions: {
    GET_APARTMENTS_FROM_API({ commit }) {
      return axios
        .get("/api/apartments")
        .then((resp) => {
          commit("SET_APARTMENTS_TO_STATE", resp.data.apartments);
          return resp.data.apartments;
        })
        .catch((error) => {
          console.log(error);
          return error;
        });
    },
    GET_FILTER_ROOM({ commit }, room) {
      commit("SET_FILTER_ROOM", room);
    },
    GET_FILTER_BED({ commit }, bed) {
      commit("SET_FILTER_BED", bed);
    },
    GET_FILTER_SERVICE({ commit }, service) {
      commit("SET_FILTER_SERVICE", service);
    }, 
    GET_FILTER_ADRESSES({ commit }, address) {
      commit("SET_FILTER_ADRESSES", address);
    },
    GET_FILTER_KM({ commit }, km) {
      commit("SET_FILTER_KM", km);
    },
  },
});

export default store;



