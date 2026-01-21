<script setup>
import { RouterLink } from "vue-router";
</script>

<template>
  <RouterLink
    :to="{ name: 'home' }"
    class="text-2xl font-bold tracking-tight text-gray-900"
  >
    Eloquent<span class="text-gray-400">®</span>
  </RouterLink>
</template>

<style scoped>
/* Logo specific styles can go here if needed */
</style>
