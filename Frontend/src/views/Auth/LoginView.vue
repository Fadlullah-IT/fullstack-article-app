<script setup>
import { useAuthStore } from "@/stores/auth";
import { storeToRefs } from "pinia";
import { reactive } from "vue";

const { errors } = storeToRefs(useAuthStore());
const { authenticate } = useAuthStore();

const formData = reactive({
  email: "",
  password: "",
});
</script>

<template>
  <main class="flex justify-center items-center min-h-screen bg-gray-50">
    <div
      class="bg-white shadow-xl rounded-2xl w-full max-w-md p-8 border border-gray-100 text-center"
    >
      <h1 class="text-2xl font-bold text-gray-900 mb-8">Login</h1>

      <form @submit.prevent="authenticate('login', formData)" class="space-y-5">
        <!-- Email -->
        <div class="text-left">
          <label class="text-sm font-semibold text-gray-700">Email</label>
          <input
            type="email"
            placeholder="you@example.com"
            v-model="formData.email"
            class="w-full mt-1 px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-black transition"
          />
          <p v-if="errors.email" class="text-red-500 text-sm mt-1">
            {{ errors.email[0] }}
          </p>
        </div>

        <!-- Password -->
        <div class="text-left">
          <label class="text-sm font-semibold text-gray-700">Password</label>
          <input
            type="password"
            placeholder="••••••••"
            v-model="formData.password"
            class="w-full mt-1 px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-black transition"
          />
          <p v-if="errors.password" class="text-red-500 text-sm mt-1">
            {{ errors.password[0] }}
          </p>
        </div>

        <!-- Button -->
        <button
          type="submit"
          class="w-full bg-black text-white py-3 rounded-lg font-semibold hover:bg-gray-800 transition"
        >
          Login
        </button>
      </form>

      <!-- Links -->
      <div class="mt-6 text-sm text-gray-600">
        <p>
          Don’t have an account?
          <RouterLink to="/register" class="font-semibold text-black hover:underline">
            Register
          </RouterLink>
        </p>
        <p class="mt-2">
          <RouterLink to="/forgot-password" class="text-gray-500 hover:text-black">
            Forgot Password?
          </RouterLink>
        </p>
      </div>
    </div>
  </main>
</template>
