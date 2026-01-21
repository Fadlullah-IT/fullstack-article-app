<script setup>
import { useArticleStore } from "@/stores/Article";
import { useAuthStore } from "@/stores/auth";
import { onMounted, ref } from "vue";
import { RouterLink, useRoute } from "vue-router";

const route = useRoute();
const authStore = useAuthStore();

const { getArticle, deleteArticle } = useArticleStore();
const article = ref(null);

onMounted(async () => {
  article.value = await getArticle(route.params.id);
});

// Helper: time ago formatter
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
  <main class="min-h-screen bg-white text-black p-6 flex justify-center items-start">
    <div class="w-full max-w-3xl border border-gray-200 rounded-lg p-8 space-y-6">
      <h1 class="text-2xl font-semibold tracking-tight">📄 Article Details</h1>

      <div v-if="article" class="space-y-4">
        <div class="border-l-2 border-gray-400 pl-4">
          <h2 class="text-xl font-bold">{{ article.title }}</h2>
          <p class="text-sm text-gray-500">
            Posted by {{ article.user.name }}
            <span v-if="article.created_at"> · {{ timeAgo(article.created_at) }}</span>
          </p>

          <p class="mt-4 leading-relaxed text-gray-800 whitespace-pre-line">
            {{ article.body }}
          </p>
        </div>

        <div
          v-if="authStore.user && authStore.user.id === article.user.id"
          class="flex gap-4 pt-4 border-t border-gray-200"
        >
          <form @submit.prevent="deleteArticle(article)">
            <button
              class="px-4 py-2 border border-red-500 text-red-600 rounded hover:bg-red-50 transition"
            >
              Delete
            </button>
          </form>

          <RouterLink
            :to="{ name: 'update', params: { id: article.id } }"
            class="px-4 py-2 border border-gray-500 text-gray-700 rounded hover:bg-gray-100 transition"
          >
            Update
          </RouterLink>
        </div>
      </div>

      <div v-else class="text-center text-gray-500 text-lg">Page not found</div>
    </div>
  </main>
</template>
