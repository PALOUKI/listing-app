<script setup >
import { useForm } from '@inertiajs/vue3';
import Container from '../../Layouts/Components/Auth/Container.vue';
import Title from '../../Layouts/Components/Auth/Title.vue';
import InputField from '../../Layouts/Components/InputField.vue';
import PrimaryBtn from '../../Layouts/Components/PrimaryBtn.vue';
import TextLink from '../../Layouts/Components/TextLink.vue';
import CheckBox from '../../Layouts/CheckBox.vue';
import SessionMessage from '../../Layouts/Components/SessionMessage.vue';



const form = useForm({
    email:"",
})

defineProps({
    status:String
})

const submit = () => {
    form.post(route('password.email'))
}

</script>

<template>
    <Head title="- Forgot Password"/>

    <Container>

            <SessionMessage :status="status"/>
        
            <p>
                Mot de passe oublié ? Pas de problème. Il suffit de nous indiquer votre 
                adresse e-mail et nous vous enverrons un lien de réinitialisation de mot 
                de passe qui vous permettra d'en choisir un nouveau.
            </p>

        <form @submit.prevent="submit" class="space-y-6" action="#">
            
            <InputField
                label="Email"
                icon="at"
                placeholder="Entrez votre email"
                v-model="form.email"
                :errorMessage="form.errors.email"

            />

            <PrimaryBtn :disabled="form.processing" >
                Réinitialiser mon mot de passe
            </PrimaryBtn>

        </form>        
    </Container>

</template>

