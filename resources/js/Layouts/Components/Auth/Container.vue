<script setup>
import { ref, onMounted } from "vue";

const isVisible = ref(false);

defineProps({
  screen:String
})

onMounted(() => {
  setTimeout(() => {
    isVisible.value = true;
  }, 100);
});
</script>

<template>
  <div class="flex justify-center">
    <div
      :class="[
        'w-full p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700',
        screen == 'sm' ? 'max-w-sm' : 'lg',
        screen == 'md' ? 'max-w-md' : 'lg',
        screen == 'xl' ? 'max-w-xl' : 'lg',
       isVisible ? 'opacity-100 scale-100' : 'opacity-0 scale-90',
        'transition-all duration-700 ease-out transform hover:scale-105 hover:shadow-md'
      ]"
    >
      <slot />
    </div>
  </div>
</template>
