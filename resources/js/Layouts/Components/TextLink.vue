<script setup>
    defineProps({
        routeName:String,
        label:String
    })
</script>

<template>
    <Link :href="route(routeName)" class="text-blue-700 hover:underline dark:text-blue-500">{{ label }}</Link>
</template>