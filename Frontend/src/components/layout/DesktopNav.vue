<script setup>
import { useAuthStore } from "../../stores/auth";
import NavLinks from "../navigation/NavLinks.vue";
import UserDropdown from "./UserDropdown.vue";
import AuthButtons from "./AuthButtons.vue";

const authStore = useAuthStore();
</script>

<template>
  <div class="hidden md:flex items-center justify-between flex-1">
    <!-- Nav Links (Center-Left) -->
    <div class="flex-1 flex justify-center">
      <NavLinks :mobile="false" />
    </div>

    <!-- Auth Section (Right) -->
    <div class="flex items-center space-x-6">
      <UserDropdown v-if="authStore.user" />
      <AuthButtons v-else :mobile="false" />
    </div>
  </div>
</template>

<style scoped></style>
