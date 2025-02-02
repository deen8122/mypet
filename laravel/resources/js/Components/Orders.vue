<script setup>
import {onMounted, reactive} from 'vue';
import Filter from './Filter.vue';
import { ref } from 'vue'

const items = reactive({
  data: [],
});
const loading = ref(false)

function getData(params) {
  loading.value = true;
  axiosInstance.get('orders', {
    params: params,
  }).then(r => {
    items.data = r.data.data;
    loading.value = false;
  });
}

onMounted(() => {
  getData([]);
});

</script>
<template>
  <Filter @filter="getData"></Filter>
  <el-table
      v-loading="loading"
      :data="items.data"
      style="width: 100%">
    <el-table-column prop="id" label="ID"></el-table-column>
    <el-table-column prop="name" label="Name"></el-table-column>
    <el-table-column prop="price" label="Price"></el-table-column>
    <el-table-column prop="bedrooms" label="Bedrooms"></el-table-column>
    <el-table-column prop="bathrooms" label="Bathrooms"></el-table-column>
    <el-table-column prop="storeys" label="Storeys"></el-table-column>
    <el-table-column prop="garages" label="Garages"></el-table-column>
  </el-table>
</template>
