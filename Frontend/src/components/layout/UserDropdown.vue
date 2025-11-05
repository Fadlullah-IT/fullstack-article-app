<script setup>
import { ref, onMounted, onBeforeUnmount } from "vue";
import { useAuthStore } from "@/stores/auth";
import { RouterLink } from "vue-router";

const authStore = useAuthStore();
const isDropdownOpen = ref(false);
const dropdown = ref(null);

const toggleDropdown = (event) => {
  event.stopPropagation();
  isDropdownOpen.value = !isDropdownOpen.value;
};

// Close when clicking outside
const handleClickOutside = (event) => {
  if (dropdown.value && !dropdown.value.contains(event.target)) {
    isDropdownOpen.value = false;
  }
};

onMounted(() => {
  document.addEventListener("click", handleClickOutside);
});

onBeforeUnmount(() => {
  document.removeEventListener("click", handleClickOutside);
});

const handleLogout = async () => {
  try {
    await authStore.Logout();
    isDropdownOpen.value = false;
  } catch (error) {
    console.error("Logout failed:", error);
  }
};
</script>

<template>
  <div class="relative user-dropdown" @click.stop="toggleDropdown" ref="dropdown">
    <!-- User Icon + Arrow -->
    <div
      class="cursor-pointer flex items-center space-x-1 hover:bg-gray-100 rounded-lg px-2 py-1 transition"
      role="button"
      tabindex="0"
      aria-haspopup="true"
      :aria-expanded="isDropdownOpen"
    >
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

      <!-- Dropdown Arrow -->
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-4 w-4 transition-transform duration-300"
        :class="{ 'rotate-180': isDropdownOpen }"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        stroke-width="2"
      >
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
      </svg>
    </div>

    <!-- Dropdown Menu -->
    <div
      v-show="isDropdownOpen"
      class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-lg py-2 z-20 transition-all duration-300"
    >
      <p class="px-4 py-2 text-sm font-bold text-gray-700">
        Welcome, {{ authStore.user?.name }}
      </p>

      <RouterLink
        :to="{ name: 'create' }"
        class="block px-4 py-2 text-sm font-bold text-gray-700 hover:bg-gray-100 transition-colors"
        @click="isDropdownOpen = false"
      >
        Create Article
      </RouterLink>

      <form @submit.prevent="handleLogout">
        <button
          type="submit"
          class="group flex w-full items-center gap-2 px-4 py-2 text-sm font-bold text-gray-700 transition-colors duration-200 rounded-md hover:bg-gray-200"
        >
          <!-- Logout Icon -->
          <svg
            xmlns="http://www.w3.org/2000/svg"
            height="20"
            width="20"
            viewBox="0 -960 960 960"
            fill="currentColor"
            class="text-gray-700 group-hover:text-red-600 transition-colors duration-200"
          >
            <path
              d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"
            />
          </svg>
          <span class="group-hover:text-red-600 transition-colors duration-200">
            Logout
          </span>
        </button>
      </form>
    </div>
  </div>
</template>

<style scoped>
.user-dropdown {
  position: relative;
}
</style>
