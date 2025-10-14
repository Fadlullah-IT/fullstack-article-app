<script setup>
import { useArticleStore } from "@/stores/Article";
import { useAuthStore } from "@/stores/auth";
import { storeToRefs } from "pinia";
import { onMounted, reactive, ref } from "vue";
import { useRoute, useRouter } from "vue-router";

const router = useRouter();
const route = useRoute();
const { user } = storeToRefs(useAuthStore());

const { errors } = storeToRefs(useArticleStore());
const { getArticle, updateArticle } = useArticleStore();

const article = ref(null);

const formData = reactive({
  title: "",
  body: "",
});

onMounted(async () => {
  article.value = await getArticle(route.params.id);

  if (user.value.id !== article.value.user_id) {
    router.push({ name: "home" });
  } else {
    formData.title = article.value.title;
    formData.body = article.value.body;
  }
});
</script>

<template>
  <main class="min-h-screen bg-white text-black p-6 flex justify-center items-start">
    <div class="w-full max-w-3xl border border-gray-200 rounded-lg p-8 space-y-8">
      <h1 class="text-2xl font-semibold tracking-tight">Update Article</h1>

      <form @submit.prevent="updateArticle(article, formData)" class="space-y-6">
        <div>
          <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
          <input
            id="title"
            type="text"
            v-model="formData.title"
            placeholder="Article title"
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-black"
          />
          <p v-if="errors.title" class="text-red-600 text-sm mt-1">
            {{ errors.title[0] }}
          </p>
        </div>

        <div>
          <label for="body" class="block text-sm font-medium text-gray-700"
            >Content</label
          >
          <textarea
            id="body"
            rows="10"
            v-model="formData.body"
            placeholder="Write your article..."
            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-black"
          ></textarea>
          <p v-if="errors.body" class="text-red-600 text-sm mt-1">{{ errors.body[0] }}</p>
        </div>

        <button
          type="submit"
          class="w-full bg-black text-white py-2 px-4 rounded-md hover:bg-gray-800 transition duration-150"
        >
          Update Article
        </button>
      </form>
    </div>
  </main>
</template>
