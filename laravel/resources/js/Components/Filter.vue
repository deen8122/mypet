<script setup>
import {reactive} from 'vue';

const emit = defineEmits(["filter"]);

const paramsInit = {
  page: 1,
  name: null,
  price_min: null,
  price_max: null,
  bedrooms: null,
  storeys: null,
  garages: null,
  bathrooms: null,
};

var params = reactive({...paramsInit});

function resetForm() {
  for (const key in paramsInit) {
    params[key] = paramsInit[key]
  }
  filterForm();
}

function filterForm() {
  emit('filter',params);
}

</script>
<template>
  <el-input v-model="params.name" placeholder="Name" style="width: 240px"/>
  <el-input v-model="params.price_min" placeholder="Price min" style="width: 100px"/>
  <el-input v-model="params.price_max" placeholder="Price max" style="width: 100px"/>
  <el-input v-model="params.bedrooms" placeholder="Bedrooms" style="width: 100px"/>

  <el-input v-model="params.bathrooms" placeholder="Bathrooms" style="width: 100px"/>
  <el-input v-model="params.storeys" placeholder="Storeys" style="width: 100px"/>
  <el-input v-model="params.garages" placeholder="Garages" style="width: 100px"/>
  <hr>
  <el-button @click="filterForm()" type="success">Search</el-button>
  <el-button @click="resetForm()" type="info">Reset</el-button>
</template>
