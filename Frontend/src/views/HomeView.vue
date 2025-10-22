<script setup>
import { useArticleStore } from "@/stores/Article";
import { onMounted, ref } from "vue";
import { RouterLink } from "vue-router";
import HeroSection from "@/components/HeroSection.vue";
import FooterSection from "@/components/FooterSection.vue";

const { getAllArticles } = useArticleStore();
const articles = ref([]);

onMounted(async () => {
  articles.value = await getAllArticles();
});

// time ago formatter
function timeAgo(dateString) {
  const now = new Date();
  const posted = new Date(dateString);
  const diffMs = now - posted;
  const diffSec = Math.floor(diffMs / 1000);
  const diffMin = Math.floor(diffSec / 60);
  const diffHr = Math.floor(diffMin / 60);
  const diffDay = Math.floor(diffHr / 24);

  if (diffDay > 0) return `${diffDay} day${diffDay > 1 ? "s" : ""} ago`;
  if (diffHr > 0) return `${diffHr} hour${diffHr > 1 ? "s" : ""} ago`;
  if (diffMin > 0) return `${diffMin} minute${diffMin > 1 ? "s" : ""} ago`;
  return `just now`;
}
</script>

<template>
  <div>
    <HeroSection />
    <main class="min-h-screen bg-[#f9f7f3] py-10 px-4 md:px-12">
      <h1 class="text-3xl md:text-4xl font-extrabold text-center text-gray-800 mb-10">
        Latest Articles
      </h1>

      <!-- No Articles -->
      <div v-if="articles.length === 0" class="text-center text-gray-500 text-lg">
        <p>No articles yet. Be the first to write one!</p>
      </div>

      <!-- Articles -->
      <div
        v-else
        class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 px-4 sm:px-8"
      >
        <RouterLink
          v-for="article in articles"
          :key="article.id"
          :to="{ name: 'show', params: { id: article.id } }"
          class="bg-white rounded-xl border border-gray-200 overflow-hidden transform transition-all duration-300 hover:shadow-lg hover:-translate-y-1 cursor-pointer flex flex-col justify-between group"
        >
          <div class="p-6 flex flex-col h-full">
            <!-- Author -->
            <div class="flex items-center gap-2 mb-3">
              <div
                class="w-7 h-7 flex items-center justify-center bg-black text-white rounded-full text-xs font-bold"
              >
                {{ article.user.name.charAt(0).toUpperCase() }}
              </div>
              <p class="text-sm font-medium text-gray-700">
                {{ article.user.name }}
              </p>
            </div>

            <!-- Title -->
            <h2
              class="font-semibold text-[1.05rem] text-gray-900 leading-snug group-hover:text-gray-700 transition-colors line-clamp-2"
            >
              {{ article.title }}
            </h2>

            <!-- Body -->
            <p class="text-gray-700 text-sm mt-2 mb-6 leading-relaxed line-clamp-3">
              {{ article.body }}
            </p>

            <!-- Footer -->
            <div class="flex items-center justify-between text-sm text-gray-700 mt-auto">
              <span v-if="article.created_at">
                {{ timeAgo(article.created_at) }}
              </span>
              <i class="fa-regular fa-bookmark group-hover:text-gray-700 transition"></i>
            </div>
          </div>
        </RouterLink>
      </div>
    </main>
    <footer>
      <FooterSection />
    </footer>
  </div>
</template>
