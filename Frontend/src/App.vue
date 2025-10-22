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
    <!-- Nav -->
    <header
      class="bg-white/80 backdrop-blur-sm border-b border-gray-200 sticky top-0 z-50"
    >
      <nav class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <RouterLink
          :to="{ name: 'home' }"
          class="text-2xl font-bold tracking-tight text-gray-900"
        >
          Eloquent<span class="text-gray-400">®</span>
        </RouterLink>

        <!-- Desktop  -->
        <ul class="hidden md:flex items-center space-x-8 font-bold text-gray-900">
          <li>
            <RouterLink :to="{ name: 'home' }" class="nav-link flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                height="20px"
                viewBox="0 -960 960 960"
                width="20px"
                fill="currentColor"
              >
                <path
                  d="M480-427ZM240-120q-50 0-85-35t-35-85v-240q0-24 9-46t26-39l240-240q17-18 39.5-26.5T480-840q23 0 45 8.5t40 26.5l240 240q17 17 26 39t9 46v240q0 50-35 85t-85 35H240Zm0-80h480q17 0 28.5-11.5T760-240v-240q0-8-3-15t-9-13L595-662l-59 58 144 144v180H280v-180l258-258-30-30q-8-8-15.5-10t-12.5-2q-5 0-12.5 2T452-748L212-508q-6 6-9 13t-3 15v240q0 17 11.5 28.5T240-200Zm120-160h240v-67L480-547 360-427v67Z"
                />
              </svg>
              Home
            </RouterLink>
          </li>

          <li>
            <RouterLink :to="{ name: 'about' }" class="nav-link flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                height="20px"
                viewBox="0 -960 960 960"
                width="20px"
                fill="currentColor"
              >
                <path
                  d="M680-160v-640q33 0 56.5 23.5T760-720v480q0 33-23.5 56.5T680-160ZM160-80q-33 0-56.5-23.5T80-160v-640q0-33 23.5-56.5T160-880h360q33 0 56.5 23.5T600-800v640q0 33-23.5 56.5T520-80H160Zm680-160v-480q25 0 42.5 17.5T900-660v360q0 25-17.5 42.5T840-240Zm-680 80h360v-640H160v640Zm0-640v640-640Z"
                />
              </svg>
              Categories
            </RouterLink>
          </li>
          <li>
            <RouterLink :to="{ name: 'about' }" class="nav-link flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                height="20px"
                viewBox="0 -960 960 960"
                width="20px"
                fill="currentColor"
              >
                <path
                  d="M710-150q-63 0-106.5-43.5T560-300q0-63 43.5-106.5T710-450q63 0 106.5 43.5T860-300q0 63-43.5 106.5T710-150Zm0-80q29 0 49.5-20.5T780-300q0-29-20.5-49.5T710-370q-29 0-49.5 20.5T640-300q0 29 20.5 49.5T710-230Zm-550-30v-80h320v80H160Zm90-250q-63 0-106.5-43.5T100-660q0-63 43.5-106.5T250-810q63 0 106.5 43.5T400-660q0 63-43.5 106.5T250-510Zm0-80q29 0 49.5-20.5T320-660q0-29-20.5-49.5T250-730q-29 0-49.5 20.5T180-660q0 29 20.5 49.5T250-590Zm230-30v-80h320v80H480Zm230 320ZM250-660Z"
                />
              </svg>
              About
            </RouterLink>
          </li>
          <li>
            <RouterLink :to="{ name: 'about' }" class="nav-link flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                height="20px"
                viewBox="0 -960 960 960"
                width="20px"
                fill="currentColor"
              >
                <path
                  d="M480-480q-17 0-28.5-11.5T440-520q0-17 11.5-28.5T480-560q17 0 28.5 11.5T520-520q0 17-11.5 28.5T480-480Zm0-240q-17 0-28.5-11.5T440-760q0-17 11.5-28.5T480-800q17 0 28.5 11.5T520-760q0 17-11.5 28.5T480-720Zm80 120q-17 0-28.5-11.5T520-640q0-17 11.5-28.5T560-680q17 0 28.5 11.5T600-640q0 17-11.5 28.5T560-600Zm40 120q-17 0-28.5-11.5T560-520q0-17 11.5-28.5T600-560q17 0 28.5 11.5T640-520q0 17-11.5 28.5T600-480Zm0-240q-17 0-28.5-11.5T560-760q0-17 11.5-28.5T600-800q17 0 28.5 11.5T640-760q0 17-11.5 28.5T600-720Zm80 120q-17 0-28.5-11.5T640-640q0-17 11.5-28.5T680-680q17 0 28.5 11.5T720-640q0 17-11.5 28.5T680-600Zm40 120q-17 0-28.5-11.5T680-520q0-17 11.5-28.5T720-560q17 0 28.5 11.5T760-520q0 17-11.5 28.5T720-480Zm0-240q-17 0-28.5-11.5T680-760q0-17 11.5-28.5T720-800q17 0 28.5 11.5T760-760q0 17-11.5 28.5T720-720Zm80 120q-17 0-28.5-11.5T760-640q0-17 11.5-28.5T800-680q17 0 28.5 11.5T840-640q0 17-11.5 28.5T800-600Zm40 120q-17 0-28.5-11.5T800-520q0-17 11.5-28.5T840-560q17 0 28.5 11.5T880-520q0 17-11.5 28.5T840-480Zm0-240q-17 0-28.5-11.5T800-760q0-17 11.5-28.5T840-800q17 0 28.5 11.5T880-760q0 17-11.5 28.5T840-720Zm-42 600q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z"
                />
              </svg>
              Contact
            </RouterLink>
          </li>
        </ul>

        <!-- Auth Desktop -->
        <div class="hidden md:flex items-center space-x-6">
          <template v-if="authStore.user">
            <div class="relative user-dropdown">
              <div class="cursor-pointer p-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  height="24px"
                  viewBox="0 -960 960 960"
                  width="24px"
                  fill="#000000"
                >
                  <path
                    d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z"
                  />
                </svg>
              </div>

              <div class="user-name-dropdown">
                <p class="text-sm font-medium whitespace-nowrap">
                  Welcome, {{ authStore.user.name }}
                </p>
              </div>
            </div>
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

        <!-- Mobile Btn -->
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

      <!-- Mobile  -->
      <transition name="fade">
        <div
          v-if="isOpen"
          class="md:hidden bg-white border-t border-gray-200 px-6 py-4 space-y-4 text-sm font-medium"
        >
          <RouterLink :to="{ name: 'home' }" class="nav-link">Home</RouterLink>

          <RouterLink :to="{ name: 'about' }" class="block nav-link"
            >Categories</RouterLink
          >
          <RouterLink :to="{ name: 'about' }" class="block nav-link">About</RouterLink>
          <RouterLink :to="{ name: 'about' }" class="block nav-link">Contact</RouterLink>

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

/* User dropdown styles */
.user-dropdown {
  position: relative;
}

.user-name-dropdown {
  position: absolute;
  top: 100%;
  left: 50%;
  transform: translateX(-50%) translateY(10px);
  background: white;
  border: 1px solid #e5e7eb;
  border-radius: 8px;
  padding: 8px 16px;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
  opacity: 0;
  visibility: hidden;
  transition: all 0.3s ease;
  pointer-events: none;
  margin-top: 8px;
}

.user-dropdown:hover .user-name-dropdown {
  opacity: 1;
  visibility: visible;
  transform: translateX(-50%) translateY(0);
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
