<script setup>

import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import Container from '../../../Layouts/Components/Auth/Container.vue';
import InputField from '../../../Layouts/Components/InputField.vue';
import PrimaryBtn from '../../../Layouts/Components/PrimaryBtn.vue';


const showConfirmBox = ref(false);

const form = useForm({
    password_confirmation:""
})

const submit = () => {
    form.delete(route('profile.delete', {
        preserveScroll:true,
        onFinish: () =>{
            form.reset()
        }
    }))
}


</script>

<template>
    <Container screen="3xl" class="mt-4">
        <div 
            class="p-4 border-red-600 border rounded-lg opacity-75"
            v-if = "!showConfirmBox"
        >
            <div class="flex space-x-4">
                <div class="px-4 py-2 rounded-lg bg-red-400">
                    <i class="fa-solid fa-triangle-exclamation" style="color: #ed333b"></i>
                </div>
                <div class="my-2">
                    <p class="">
                        Supprimer mon compte
                    </p>
                </div>
            </div>
            <div class="my-2">
                <p class="">
                   Vous n'aurez plus aucun moyen de récupérer votre compte une fois supprimer.
                </p>
            </div>

            <button
                class="w-1/4 text-white bg-red-700 hover:bg-red-800 
                focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold
                rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 
                dark:hover:bg-red-700 dark:focus:ring-red-800 
                disabled:bg-slate-300
                disabled:cursor-wait"
                @click="showConfirmBox = !showConfirmBox "
            >
                supprimer
            </button>
            
        </div>

        <div v-if="showConfirmBox">
            <form 
                @submit.prevent="submit" 
                action="">

                <InputField
                    label="Confirmer votre mot de passe"
                    placeholder="mot de passe"
                    icon="key"
                    v-model="form.password_confirmation"
                    :errorMessage="form.errors.password_confirmation"
                />

                <div class="flex space-x-3">
                    <button
                        class="mt-4 w-2/4 text-white bg-red-700 hover:bg-red-800 
                        focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold
                        rounded-lg text-sm px-2 py-2 text-center dark:bg-red-600 
                        dark:hover:bg-red-700 dark:focus:ring-red-800 
                        disabled:bg-slate-300
                        disabled:cursor-wait"
                        :disabled="form.processing" 
                    >
                        supprimer
                    </button>
                    <PrimaryBtn 
                        @click="showConfirmBox = !showConfirmBox "
                        class="mt-4"
                    >
                        Anuler
                    </PrimaryBtn>
                </div>
            </form>
        </div>
    </Container>

</template>