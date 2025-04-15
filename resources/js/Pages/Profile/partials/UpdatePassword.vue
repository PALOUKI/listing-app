<script setup>

import { router, useForm } from '@inertiajs/vue3';
import Container from '../../../Layouts/Components/Auth/Container.vue';
import Title from '../../../Layouts/Components/Auth/Title.vue';
import InputField from '../../../Layouts/Components/InputField.vue';
import PrimaryBtn from '../../../Layouts/Components/PrimaryBtn.vue';
import SessionMessage from '../../../Layouts/Components/SessionMessage.vue';

const props = defineProps({
    status:String
})

const form = useForm({
    current_password: "",
    password:   "",
    password_confirmation:""
    
})

const submit = () => {
    form.put(route('profile.password'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => form.reset(),
    })
}


</script>

<template>
    <div class="mt-4">
        <Title>Modifier votre mot de passe</Title>
    <p class="">
                Vous avez la possibilité de modifer votre
                mot de passe pour des raisons de sécurité.
    </p>
    </div>
    <Container screen="3xl" class="mt-4">
        <div class="my-2">

            

            <div
                v-if="form.recentlySuccessful"
                class="flex items-center p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                role="alert"
            >
                <svg
                    class="w-5 h-5 mr-2"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                    fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 5.707 8.293a1 1 0 10-1.414 1.414l4 4a1 1 0 001.414 0l7-7a1 1 0 000-1.414z"
                    clip-rule="evenodd"
                    ></path>
                </svg>
                <span class="font-medium"> Enregistré ! </span>
            </div>

            
        </div>
        <form 
            @submit.prevent="submit" 
            action=""
        >

            <SessionMessage :status="status"/>

            <InputField
                label="Mot de passe actuel"
                placeholder="Entrez le mot de passe actuel"
                icon="key"
                type="password"
                v-model="form.current_password"
                :errorMessage="form.errors.current_password"
            />

            <InputField
                label="Nouveau mot de passe"
                placeholder="Entrez le nouveau mot de passe"
                icon="key"
                type="password"
                v-model="form.password"
                :errorMessage="form.errors.password"
            />

            <InputField
                label="Confirmer votre mot de passe"
                placeholder="Confirmer votre mot de passe"
                icon="key"
                type="password"
                v-model="form.password_confirmation"
                :errorMessage="form.errors.password_confirmation"
            />

            <PrimaryBtn 
                :disabled="form.processing" 
                class="mt-4"
            >
                Enregistrer
            </PrimaryBtn>
        </form>
    </Container>






    
</template>