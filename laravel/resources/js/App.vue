<script setup>
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue"
</script>

<template>
  <div style="max-width: 900px; margin:20px auto">
    <LayoutAuthenticated>
      <RouterView/>
    </LayoutAuthenticated>
  </div>
</template>