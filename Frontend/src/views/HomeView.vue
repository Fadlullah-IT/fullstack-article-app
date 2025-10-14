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
    <main class="min-h-screen py-10 px-4 md:px-12">
      <!-- Page title -->
      <h1 class="text-3xl md:text-4xl font-extrabold text-center text-gray-800 mb-10">
        Latest Articles
      </h1>

      <!-- No Articles -->
      <div v-if="articles.length === 0" class="text-center text-gray-500 text-lg">
        <p>No articles yet. Be the first to write one!</p>
      </div>

      <!-- Articles Grid -->
      <div v-else class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <div
          v-for="article in articles"
          :key="article.id"
          class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-100 overflow-hidden"
        >
          <div class="p-6 flex flex-col justify-between h-full">
            <div>
              <h2
                class="font-bold text-xl text-gray-800 hover:text-blue-600 transition-colors duration-200"
              >
                {{ article.title }}
              </h2>
              <p class="text-sm text-gray-500 mt-1 mb-4">
                by {{ article.user.name }}
                <span v-if="article.created_at">
                  · {{ timeAgo(article.created_at) }}</span
                >
              </p>

              <p class="text-gray-700 text-sm leading-relaxed mb-6">
                {{ article.body.slice(0, 120) }}...
              </p>
            </div>

            <RouterLink
              :to="{ name: 'show', params: { id: article.id } }"
              class="text-blue-600 font-semibold text-sm hover:underline mt-auto"
            >
              Read More →
            </RouterLink>
          </div>
        </div>
      </div>
    </main>
    <footer>
      <FooterSection />
    </footer>
  </div>
</template>
