<script setup>
import { ref, onMounted } from "vue";
import { RouterLink, RouterView } from "vue-router";
import { useAuthStore } from "./stores/auth";

const authStore = useAuthStore();
const isOpen = ref(false);

onMounted(() => {
  if (localStorage.getItem("token")) {
    authStore.getUser?.();
  }
});
</script>

<template>
  <div>
    <!-- Navbar -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
      <nav class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Logo -->
        <RouterLink
          :to="{ name: 'home' }"
          class="text-2xl font-bold tracking-tight text-gray-900"
        >
          Eloquent<span class="text-gray-400">®</span>
        </RouterLink>

        <!-- Desktop Menu -->
        <ul
          class="hidden md:flex items-center space-x-8 text-sm font-medium text-gray-900"
        >
          <li><RouterLink :to="{ name: 'home' }" class="nav-link">Home</RouterLink></li>
          <li>
            <RouterLink :to="{ name: 'home' }" class="nav-link">All Articles</RouterLink>
          </li>
          <li>
            <RouterLink :to="{ name: 'home' }" class="nav-link">Categories</RouterLink>
          </li>
          <li><RouterLink :to="{ name: 'home' }" class="nav-link">About</RouterLink></li>
          <li>
            <RouterLink :to="{ name: 'home' }" class="nav-link">Contact</RouterLink>
          </li>
        </ul>

        <!-- Auth Links (Desktop) -->
        <div class="hidden md:flex items-center space-x-6">
          <template v-if="authStore.user">
            <p class="text-sm hover:font-bold transition-all duration-300">
              Welcome, {{ authStore.user.name }}
            </p>
            <RouterLink :to="{ name: 'create' }" class="nav-link"
              >Create Article</RouterLink
            >
            <form @submit.prevent="authStore.Logout">
              <button type="submit" class="nav-link">Logout</button>
            </form>
          </template>

          <template v-else>
            <RouterLink :to="{ name: 'register' }" class="nav-link">Register</RouterLink>
            <RouterLink :to="{ name: 'login' }" class="nav-link">Login</RouterLink>
          </template>
        </div>

        <!-- Mobile Menu Button -->
        <button
          @click="isOpen = !isOpen"
          class="md:hidden text-gray-900 focus:outline-none"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              v-if="!isOpen"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"
            />
            <path
              v-else
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M6 18L18 6M6 6l12 12"
            />
          </svg>
        </button>
      </nav>

      <!-- Mobile Menu -->
      <transition name="fade">
        <div
          v-if="isOpen"
          class="md:hidden bg-white border-t border-gray-200 px-6 py-4 space-y-4 text-sm font-medium"
        >
          <RouterLink :to="{ name: 'home' }" class="nav-link">Home</RouterLink>
          <RouterLink :to="{ name: 'home' }" class="block nav-link"
            >All Articles</RouterLink
          >
          <RouterLink :to="{ name: 'home' }" class="block nav-link"
            >Categories</RouterLink
          >
          <RouterLink :to="{ name: 'home' }" class="block nav-link">About</RouterLink>
          <RouterLink :to="{ name: 'home' }" class="block nav-link">Contact</RouterLink>

          <div v-if="authStore.user" class="space-y-2">
            <p class="text-black hover:font-bold">Welcome, {{ authStore.user.name }}</p>
            <RouterLink :to="{ name: 'create' }" class="block nav-link"
              >Create Article</RouterLink
            >
            <form @submit.prevent="authStore.Logout">
              <button type="submit" class="nav-link">Logout</button>
            </form>
          </div>

          <div v-else class="space-y-2">
            <RouterLink :to="{ name: 'register' }" class="block nav-link"
              >Register</RouterLink
            >
            <RouterLink :to="{ name: 'login' }" class="block nav-link">Login</RouterLink>
          </div>
        </div>
      </transition>
    </header>

    <!-- Main Page -->
    <main>
      <RouterView />
    </main>
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

/* Animated underline */
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

/* Fade animation for mobile */
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
