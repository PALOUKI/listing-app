<script setup>
import UpdateInfo from './partials/UpdateInfo.vue';

defineProps({
    user:Object,
    status:String
})
</script>

<template>
    <Head title="- Profile"/>
    <UpdateInfo :user="user" :status="status"/>
</template>