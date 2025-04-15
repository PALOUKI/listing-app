<script setup>
import DeleteAccount from './partials/DeleteAccount.vue';
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
    <DeleteAccount />
    
</template>