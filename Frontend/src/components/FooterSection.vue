<template>
  <footer class="bg-white border-t border-gray-300 py-8 text-gray-600 text-sm">
    <div class="max-w-7xl mx-auto flex flex-wrap justify-center gap-x-6 gap-y-2 px-4">
      <a href="#" class="hover:text-black transition-colors duration-200">Help</a>
      <a href="#" class="hover:text-black transition-colors duration-200">Status</a>
      <RouterLink
        :to="{ name: 'about' }"
        class="hover:text-black transition-colors duration-200"
        >About</RouterLink
      >
      <a href="#" class="hover:text-black transition-colors duration-200">Careers</a>
      <a href="#" class="hover:text-black transition-colors duration-200">Press</a>
      <a href="#" class="hover:text-black transition-colors duration-200">Blog</a>
      <a href="#" class="hover:text-black transition-colors duration-200">Privacy</a>
      <a href="#" class="hover:text-black transition-colors duration-200">Rules</a>
      <a href="#" class="hover:text-black transition-colors duration-200">Terms</a>
    </div>
  </footer>
</template>

<style scoped>
footer {
  font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
    Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
}
</style>
