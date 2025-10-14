<script setup>
import { RouterLink } from "vue-router";
</script>

<template>
  <section
    class="relative bg-white py-20 px-6 md:px-16 flex flex-col items-center text-center overflow-hidden border-b border-gray-200"
  >
    <!-- Hero Content -->
    <div class="relative z-10 max-w-3xl animate-fadeIn">
      <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-6">
        Discover Stories, <span class="text-gray-700">Share Ideas</span>, Inspire the
        World.
      </h1>

      <p class="text-gray-600 text-lg md:text-xl mb-10">
        Join a community of passionate writers and readers. Explore thought-provoking
        articles, insightful stories, and creative minds shaping the world — one post at a
        time.
      </p>

      <!-- Action Btn -->
      <div class="flex flex-wrap justify-center gap-4">
        <RouterLink
          :to="{ name: 'create' }"
          class="px-6 py-3 bg-gray-900 text-white rounded-full font-semibold text-lg shadow-sm hover:bg-gray-800 transition"
        >
          Start Writing
        </RouterLink>

        <RouterLink
          :to="{ name: 'home' }"
          class="px-6 py-3 bg-white text-gray-900 border border-gray-800 rounded-full font-semibold text-lg hover:bg-gray-100 transition"
        >
          Read Articles
        </RouterLink>
      </div>
    </div>
  </section>
</template>

<style scoped>
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fadeIn {
  animation: fadeIn 1s ease-out forwards;
}
</style>
