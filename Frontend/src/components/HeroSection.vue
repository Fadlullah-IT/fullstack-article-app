<script setup>
import { RouterLink } from "vue-router";
import { useAuthStore } from "@/stores/auth";

const authStore = useAuthStore();
</script>

<template>
  <section
    class="body relative bg-[#f9f7f3] px-6 md:px-16 flex flex-col md:flex-row items-center justify-between overflow-hidden"
    style="
      background-image: url('/images/download.png');
      background-size: cover;
      background-position: center;
    "
  >
    <!-- Left side  -->
    <div class="mb-20 relative z-10 max-w-xl md:w-1/2 space-y-6 animate-fadeIn">
      <h1 class="text-4xl md:text-6xl font-extrabold leading-tight text-black">
        We are changing the way people
        <span class="text-orange-400">connect</span>
      </h1>

      <p class="text-lg md:text-xl leading-relaxed">
        Fuel your curiosity, one story at a time.
      </p>

      <div v-if="authStore.user" class="flex flex-wrap gap-4">
        <RouterLink
          :to="{ name: 'create' }"
          class="px-6 py-3 bg-black border border-black text-white rounded-md font-semibold text-lg hover:bg-transparent hover:text-black hover:shadow-md transition-all duration-300 ease-in-out"
        >
          Get started
        </RouterLink>

        <RouterLink
          :to="{ name: 'about' }"
          class="px-6 py-3 bg-transparent border border-black text-black rounded-md font-semibold text-lg hover:bg-black hover:text-white hover:shadow-md transition-all duration-300 ease-in-out"
        >
          Learn more
        </RouterLink>
      </div>
      <div v-else class="flex flex-wrap gap-4">
        <RouterLink
          :to="{ name: 'register' }"
          class="px-6 py-3 bg-black border border-black text-white rounded-md font-semibold text-lg hover:bg-transparent hover:text-black hover:shadow-md transition-all duration-300 ease-in-out"
        >
          Get started
        </RouterLink>

        <RouterLink
          :to="{ name: 'about' }"
          class="px-6 py-3 bg-transparent border border-black text-black rounded-md font-semibold text-lg hover:bg-black hover:text-white hover:shadow-md transition-all duration-300 ease-in-out"
        >
          Learn more
        </RouterLink>
      </div>
    </div>

    <!-- Right side Img -->
    <div class="relative md:w-1/2 md:mt-0 flex justify-center md:justify-end py-10">
      <img
        src="/images/images.jpg"
        alt="Hero Section Image"
        class="rounded-2xl shadow-md max-w-full md:max-w-md object-cover hover:scale-105 transition-transform duration-500 ease-out"
      />
    </div>
    <div class="border"></div>
  </section>
</template>

<style scoped></style>
