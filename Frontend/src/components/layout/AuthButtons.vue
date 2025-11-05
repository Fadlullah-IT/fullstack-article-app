<script setup>
import { computed } from "vue";
import { RouterLink } from "vue-router";

const props = defineProps({
  mobile: {
    type: Boolean,
    default: false,
  },
});

const containerClass = computed(() => {
  return props.mobile ? "space-y-2" : "flex items-center space-x-6";
});

const linkClass = computed(() => {
  return props.mobile ? "block nav-link" : "nav-link";
});
</script>

<template>
  <div :class="containerClass">
    <RouterLink :to="{ name: 'register' }" :class="linkClass"> Register </RouterLink>
    <RouterLink :to="{ name: 'login' }" :class="linkClass"> Login </RouterLink>
  </div>
</template>

<style scoped>
.nav-link {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu,
    Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
  font-weight: 600;
  color: #111;
  position: relative;
  transition: color 0.3s ease;
}

.nav-link::after {
  content: "";
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0%;
  height: 1px;
  background: black;
  transition: width 0.3s ease;
}

.nav-link:hover::after {
  width: 100%;
}

.nav-link:hover {
  color: black;
}
</style>
