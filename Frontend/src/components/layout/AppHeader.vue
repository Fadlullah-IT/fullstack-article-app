<script setup>
import AppLogo from "./AppLogo.vue";
import DesktopNav from "./DesktopNav.vue";
import MobileMenuButton from "../navigation/MobileMenuButton.vue";

defineProps({
  isMobileMenuOpen: {
    type: Boolean,
    required: true,
  },
});

const emit = defineEmits(["toggle-mobile-menu"]);

const handleToggle = () => {
  emit("toggle-mobile-menu");
};
</script>

<template>
  <header class="bg-white/80 backdrop-blur-sm border-b border-gray-200 sticky top-0 z-50">
    <nav class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
      <!-- Logo  -->
      <AppLogo />

      <!-- Desktop Nav -->
      <DesktopNav />

      <!-- Mobile Menu Btn -->
      <MobileMenuButton :is-open="isMobileMenuOpen" @toggle="handleToggle" />
    </nav>
  </header>
</template>

<style scoped>
/* Header styles */
header {
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
}

nav {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 2rem;
}
</style>
