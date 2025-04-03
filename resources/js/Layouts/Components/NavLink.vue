<script setup>

    defineProps({
        routeName: String,
        componentName: String
    })
</script>

<template>
    <Link 
        :href="route(routeName)" 
        class="block md:w-auto w-full  py-2 px-3 my-2 dark:text-white dark:bg-gray-700 md:bg-blue-200 bg-gray-300 hover:dark:bg-blue-950 hover:bg-blue-600 hover:text-gray-100  md:rounded-lg rounded-lg md:bg-transparent  md:p-3 " 
        :class = "{'md:dark:bg-blue-950 md:bg-blue-600 md:text-gray-100 ': $page.component === componentName}"
    >
        <slot/>
    </Link>
</template>