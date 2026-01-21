<script setup>
import { watch } from "vue";
import { RouterLink } from "vue-router";
import { useRouter } from "vue-router";
import { useAuthStore } from "@/stores/auth";
import NavLinks from "./NavLinks.vue";
import AuthButtons from "../layout/AuthButtons.vue";

const props = defineProps({
  isOpen: {
    type: Boolean,
    required: true,
  },
});

const emit = defineEmits(["close"]);
const authStore = useAuthStore();
const router = useRouter();

// Close menu when route changes
watch(
  () => router.currentRoute.value,
  () => {
    if (props.isOpen) {
      emit("close");
    }
  }
);

const handleLogout = async () => {
  try {
    await authStore.Logout();
    emit("close");
  } catch (error) {
    console.error("Logout failed:", error);
  }
};
</script>

<template>
  <transition name="fade">
    <div
      v-if="isOpen"
      class="md:hidden bg-white border-t border-gray-200 px-6 py-4 space-y-4 text-sm font-medium"
    >
      <!-- Nav Links -->
      <NavLinks :mobile="true" />

      <!-- Auth Sect -->
      <div v-if="authStore.user" class="space-y-2 pt-4 border-t border-gray-200">
        <p class="text-black hover:font-bold">Welcome, {{ authStore.user.name }}</p>

        <RouterLink :to="{ name: 'create' }" class="block nav-link">
          Create Article
        </RouterLink>

        <form @submit.prevent="handleLogout">
          <button type="submit" class="nav-link w-full text-left">Logout</button>
        </form>
      </div>

      <div v-else class="pt-4 border-t border-gray-200">
        <AuthButtons :mobile="true" />
      </div>
    </div>
  </transition>
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

/* Fade animation */
.fade-enter-active,
.fade-leave-active {
  transition: all 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  transform: translateY(-10px);
}
</style>
