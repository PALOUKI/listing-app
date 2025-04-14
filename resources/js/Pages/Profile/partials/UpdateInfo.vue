<script setup>

import { router, useForm } from '@inertiajs/vue3';
import Container from '../../../Layouts/Components/Auth/Container.vue';
import Title from '../../../Layouts/Components/Auth/Title.vue';
import InputField from '../../../Layouts/Components/InputField.vue';
import PrimaryBtn from '../../../Layouts/Components/PrimaryBtn.vue';
import SessionMessage from '../../../Layouts/Components/SessionMessage.vue';

const props = defineProps({
    user:Object,
    status:String
})

const form = useForm({
    name:   props.user.name,
    email:  props.user.email,
})

const submit = () => {
    form.patch(route('profile.info'))
}

const resendEmail = (e) => {
    router.post(
        route('verification.send'), 
        {}, 
        {
        onStart: () => {
            e.target.disabled = true;
        },
        onFinish: () => {
            e.target.disabled = false;
        } 
    })
}

</script>

<template>
    <Container screen="3xl ">
        <div class="my-2">
            <Title>Modifier vos informations</Title>
            <p class="">
                Vous avez la possibilité de modifier vos informations
                ainsi que l'email associé à votre compte.
            </p>
        </div>
        <form 
            @submit.prevent="submit" 
            action="">

            <SessionMessage :status="status"/>

            <InputField
                label="Nom"
                icon="id-badge"
                v-model="form.name"
                :errorMessage="form.errors.name"
            />
            <InputField
                label="Email"
                icon="at"
                v-model="form.email"
                :errorMessage="form.errors.email"
            />

            <div v-if="props.user.email_verified_at === null" class="mt-4">
                <p>
                    Votre addresse email n'a pas été vérifié!        
                    <button
                    @click="resendEmail"
                        class="text-blue-700 underline hover:text-blue-300 dark:text-blue-500 
                        disabled:text-slate-400 disabled:cursor-wait"
                    >
                        Cliquez-ici pour reçevoir le nouveau lien de vérification
                    </button>
                </p>
            </div>

            <PrimaryBtn 
                :disabled="form.processing" 
                class="mt-4"
            >
                Enregistrer
            </PrimaryBtn>
        </form>
    </Container>






    
</template>