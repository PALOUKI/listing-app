<script setup>
import UpdateInfo from './partials/UpdateInfo.vue';
import UpdatePassword from './partials/UpdatePassword.vue';

defineProps({
    user:Object,
    status:String
})
</script>

<template>
    <Head title="- Profile"/>
    <UpdateInfo :user="user" :status="status"/>
    <UpdatePassword />
    
</template>