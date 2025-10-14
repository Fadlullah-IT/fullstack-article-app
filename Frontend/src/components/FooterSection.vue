<template>
  <footer
    class="bg-neutral-900 text-gray-400 pt-16 pb-10 px-6 md:px-20 border-t border-neutral-700 relative"
  >
    <div class="max-w-7xl mx-auto grid md:grid-cols-4 gap-12">
      <!-- Brand Sect -->
      <div>
        <div class="flex items-center gap-3 mb-6">
          <h1 class="text-5xl font-extrabold text-white tracking-tight">Eloquent</h1>
        </div>

        <p class="text-sm leading-relaxed">
          Get insights, stories, and creative thoughts straight to your inbox.
        </p>

        <form
          @submit.prevent
          class="mt-6 flex items-center border-b border-gray-600 max-w-xs"
        >
          <input
            type="email"
            placeholder="Your email here"
            class="bg-transparent text-gray-300 w-full py-2 outline-none placeholder-gray-500"
          />
          <button type="submit" class="text-gray-400 hover:text-white transition">
            →
          </button>
        </form>

        <p class="text-xs mt-3 max-w-xs text-gray-500">
          By signing up, you agree to our
          <a href="#" class="underline hover:text-white">Privacy Policy</a>.
        </p>
      </div>

      <div>
        <h3 class="text-white font-semibold mb-4">Company</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:text-white">Home</a></li>
          <li><a href="#" class="hover:text-white">About</a></li>
          <li><a href="#" class="hover:text-white">Work</a></li>
          <li><a href="#" class="hover:text-white">Contact</a></li>
        </ul>
      </div>

      <div>
        <h3 class="text-white font-semibold mb-4">Discover</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:text-white">Articles</a></li>
          <li><a href="#" class="hover:text-white">Topics</a></li>
          <li><a href="#" class="hover:text-white">Community</a></li>
          <li><a href="#" class="hover:text-white">Events</a></li>
        </ul>
      </div>

      <div>
        <h3 class="text-white font-semibold mb-4">Learn</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:text-white">Blog</a></li>
          <li><a href="#" class="hover:text-white">FAQs</a></li>
          <li><a href="#" class="hover:text-white">Guides</a></li>
          <li><a href="#" class="hover:text-white">Careers</a></li>
        </ul>
      </div>
    </div>

    <div class="border-t border-neutral-700 my-10"></div>

    <div
      class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center text-sm"
    >
      <p class="text-gray-500">© 2025 Eloquent | Crafted by Fadlullah</p>

      <div class="flex space-x-4 mt-4 md:mt-0">
        <a href="#" class="hover:text-white"><i class="fab fa-linkedin"></i></a>
        <a href="#" class="hover:text-white"><i class="fab fa-github"></i></a>
        <a href="#" class="hover:text-white"><i class="fab fa-youtube"></i></a>
      </div>

      <button
        @click="scrollToTop"
        class="mt-6 md:mt-0 hover:text-white transition text-gray-400"
      >
        Back to top ↑
      </button>
    </div>
  </footer>
</template>

<script setup>
const scrollToTop = () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
};
</script>

<style scoped>
h1 {
  animation: fadeIn 1.2s ease-in-out;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
