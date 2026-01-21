<script setup>
import { computed } from "vue";
import { RouterLink } from "vue-router";

const props = defineProps({
  mobile: {
    type: Boolean,
    default: false,
  },
});

// Navigation items configuration
const navItems = [
  {
    name: "home",
    label: "Home",
    icon:
      "M480-427ZM240-120q-50 0-85-35t-35-85v-240q0-24 9-46t26-39l240-240q17-18 39.5-26.5T480-840q23 0 45 8.5t40 26.5l240 240q17 17 26 39t9 46v240q0 50-35 85t-85 35H240Zm0-80h480q17 0 28.5-11.5T760-240v-240q0-8-3-15t-9-13L595-662l-59 58 144 144v180H280v-180l258-258-30-30q-8-8-15.5-10t-12.5-2q-5 0-12.5 2T452-748L212-508q-6 6-9 13t-3 15v240q0 17 11.5 28.5T240-200Zm120-160h240v-67L480-547 360-427v67Z",
  }, 

  { 
    name: "about",
    label: "Categories",
    icon:
      "M680-160v-640q33 0 56.5 23.5T760-720v480q0 33-23.5 56.5T680-160ZM160-80q-33 0-56.5-23.5T80-160v-640q0-33 23.5-56.5T160-880h360q33 0 56.5 23.5T600-800v640q0 33-23.5 56.5T520-80H160Zm680-160v-480q25 0 42.5 17.5T900-660v360q0 25-17.5 42.5T840-240Zm-680 80h360v-640H160v640Zm0-640v640-640Z",
  },
  {
    name: "about",
    label: "About",
    icon:
      "M710-150q-63 0-106.5-43.5T560-300q0-63 43.5-106.5T710-450q63 0 106.5 43.5T860-300q0 63-43.5 106.5T710-150Zm0-80q29 0 49.5-20.5T780-300q0-29-20.5-49.5T710-370q-29 0-49.5 20.5T640-300q0 29 20.5 49.5T710-230Zm-550-30v-80h320v80H160Zm90-250q-63 0-106.5-43.5T100-660q0-63 43.5-106.5T250-810q63 0 106.5 43.5T400-660q0 63-43.5 106.5T250-510Zm0-80q29 0 49.5-20.5T320-660q0-29-20.5-49.5T250-730q-29 0-49.5 20.5T180-660q0 29 20.5 49.5T250-590Zm230-30v-80h320v80H480Zm230 320ZM250-660Z",
  },
  {
    name: "about",
    label: "Contact",
    icon:
      "M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z",
  },
];

// Compute classes based on mobile prop
const linkClass = computed(() => {
  return props.mobile ? "block nav-link" : "nav-link flex items-center gap-2";
});
</script>

<template>
  <ul
    :class="mobile ? 'space-y-4' : 'flex items-center space-x-8 font-bold text-gray-900'"
  >
    <li v-for="item in navItems" :key="item.name">
      <RouterLink :to="{ name: item.name }" :class="linkClass">
        <svg
          v-if="!mobile"
          xmlns="http://www.w3.org/2000/svg"
          height="20px"
          viewBox="0 -960 960 960"
          width="20px"
          fill="currentColor"
          class="nav-icon"
        >
          <path :d="item.icon" />
        </svg>
        {{ item.label }}
      </RouterLink>
    </li>
  </ul>
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

/* Fix icon alignment */
.nav-icon {
  flex-shrink: 0;
  display: inline-block;
  vertical-align: middle;
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
