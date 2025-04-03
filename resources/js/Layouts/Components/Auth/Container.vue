<script setup>
import { ref, onMounted } from "vue";

const isVisible = ref(false);

onMounted(() => {
  setTimeout(() => {
    isVisible.value = true;
  }, 100); // Léger délai pour un effet plus naturel
});
</script>

<template>
  <div class="flex justify-center pt-24">
    <div
      class="w-full max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700
             transition-all duration-700 ease-out transform opacity-0 scale-90 hover:scale-100 hover:shadow-md"
      :class="isVisible ? 'opacity-100 scale-100' : ''"
    >
      <slot />
    </div>
  </div>
</template>
