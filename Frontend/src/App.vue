<script setup>
import { ref, onMounted } from "vue";
import { RouterView } from "vue-router";
import { useAuthStore } from "./stores/auth";
import AppHeader from "./components/layout/AppHeader.vue";
import MobileNav from "./components/navigation/MobileNav.vue";

const authStore = useAuthStore();
const isMobileMenuOpen = ref(false);

const toggleMobileMenu = () => {
  isMobileMenuOpen.value = !isMobileMenuOpen.value;
};

const closeMobileMenu = () => {
  isMobileMenuOpen.value = false;
};

// start auth on app mount
onMounted(async () => {
  try {
    const token = localStorage.getItem("token");
    if (token) {
      await authStore.getUser();
    }
  } catch (error) {
    console.error("Failed to fetch user:", error);
    // Remove invalid token
    localStorage.removeItem("token");
  }
});
</script>

<template>
  <div>
    <!-- Header  -->
    <AppHeader
      :is-mobile-menu-open="isMobileMenuOpen"
      @toggle-mobile-menu="toggleMobileMenu"
    />

    <!-- Mobile  -->
    <MobileNav :is-open="isMobileMenuOpen" @close="closeMobileMenu" />

    <!-- Main  -->
    <main>
      <RouterView />
    </main>
  </div>
</template>

<style scoped>
main {
  min-height: calc(100vh - 73px);
}
</style>
