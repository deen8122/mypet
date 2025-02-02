<script setup>
import {onMounted, reactive} from 'vue';
import { ref } from 'vue'

const items = reactive({
  data: [],
});
const loading = ref(false)

function check(params) {
  loading.value = true;
  axiosInstance.get('api/runService', {
    params: params,
  }).then(r => {
    items.data = r;
    loading.value = false;
    console.log(items.data)
  });
}

onMounted(() => {

});

</script>
<template>
  <a href="http://localhost:15672/" target="_blank">Открыть панель RabbitMQ</a>
  <br>
  <el-button @click="check({class:'RabbitMQ'})" type="success">Проверить работу</el-button>
  <pre>{{items.data}}</pre>
</template>
