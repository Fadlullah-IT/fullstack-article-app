<script setup>
defineProps({
  isOpen: {
    type: Boolean,
    required: true,
  },
});

const emit = defineEmits(["toggle"]);

const handleToggle = () => {
  emit("toggle");
};
</script>

<template>
  <button
    @click="handleToggle"
    class="md:hidden text-gray-900 focus:outline-none"
    aria-label="Toggle navigation menu"
    :aria-expanded="isOpen"
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
</template>

<style scoped>
button {
  transition: transform 0.2s ease;
}

button:active {
  transform: scale(0.95);
}
</style>
