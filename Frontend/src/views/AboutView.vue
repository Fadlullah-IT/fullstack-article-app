<script setup>
import { RouterLink } from "vue-router";
import FooterSection from "@/components/FooterSection.vue";
</script>

<template>
  <section
    class="bg-neutral-900 text-white min-h-screen flex flex-col items-start justify-start px-6 md:px-24 pt-24 pb-0 overflow-x-hidden"
  >
    <!-- Hero -->
    <div class="max-w-4xl space-y-8">
      <h1 class="text-6xl md:text-7xl font-serif leading-tight">
        Every idea deserves to be heard
      </h1>

      <div class="space-y-6 text-gray-300 text-lg md:text-xl leading-relaxed">
        <p>
          Our platform is built for real stories and real people. Here, anyone can share
          ideas, insights, or experiences — without needing a big following. The internet
          is crowded and chaotic, but your voice should rise above the noise. We make
          sharing your thoughts simple, beautiful, and human. Whether you write to teach,
          inspire, or explore, your words can shape perspectives and connect people across
          the world.
        </p>
        <p>
          We believe that what you read and write matters. Words can divide or empower us,
          inspire or discourage us. In a world where the most sensational and
          surface-level stories often win, we’re building a system that rewards depth,
          nuance, and time well spent. A space for thoughtful conversation more than
          drive-by takes, and substance over packaging.
        </p>
        <p>
          Over 100 million people connect and share their wisdom on Eloquent every month.
          They’re software developers, amateur novelists, product designers, CEOs, and
          anyone burning with a story they need to get out into the world. They write
          about what they’re working on, what’s keeping them up at night, what they’ve
          lived through, and what they’ve learned that the rest of us might want to know
          too.
        </p>

        <p>
          Instead of selling ads or selling your data, we’re supported by a growing
          community of over a million Medium members who believe in our mission. If you’re
          new here, start reading. Dive deeper into whatever matters to you. Find a post
          that helps you learn something new, or reconsider something familiar—and then
          write your story.
        </p>
      </div>
    </div>

    <!-- CTA -->
    <div class="w-screen border-t border-white mt-24 ml-[-1.5rem] md:ml-[-6rem]">
      <div
        v-for="(item, index) in actions"
        :key="index"
        class="group flex items-center justify-between w-full py-24 px-8 md:px-20 border-b border-white cursor-pointer transition-colors duration-300 hover:bg-white"
      >
        <RouterLink :to="{ name: 'home' }"
          ><span
            class="text-4xl md:text-6xl font-serif group-hover:text-black transition-colors duration-300"
          >
            {{ item.text }}
          </span></RouterLink
        >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-10 h-10 md:w-14 md:h-14 transition-transform duration-300 group-hover:translate-x-3"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M8.25 4.5l7.5 7.5-7.5 7.5"
          />
        </svg>
      </div>
    </div>
  </section>
  <FooterSection />
</template>

<script>
export default {
  data() {
    return {
      actions: [
        { text: "Discover inspiring stories" },
        { text: "Share your own voice" },
        { text: "Join our community" },
      ],
    };
  },
};
</script>

<style scoped>
svg {
  transition: transform 0.3s ease;
}
.group:hover svg {
  transform: translateX(10px);
}
</style>
