<script setup>
import { useForm } from '@inertiajs/vue3';
import Container from '../../Layouts/Components/Auth/Container.vue';
import PrimaryBtn from '../../Layouts/Components/PrimaryBtn.vue';
import SessionMessage from '../../Layouts/Components/SessionMessage.vue';

const form = useForm({})

defineProps({
    status:String
})

const submit = () => {
    form.post(route('verification.send'))
}

</script>

<template>
    <Head title = "- Email verification"/>
    <Container class="pt-24">
        <SessionMessage :status="status"/>
        <p>
            Merci de vous être inscrit ! Avant de commencer, pourriez-vous vérifier
            votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer ?
            Si vous n'avez pas reçu l'e-mail, nous nous ferons un plaisir de vous en envoyer un autre.
        </p>
        <form method="post" @submit.prevent="submit" class="mt-4">
            <PrimaryBtn :disabled = "form.processing">Renvoyez l'email de vérification</PrimaryBtn>
        </form>
    </Container>
</template>