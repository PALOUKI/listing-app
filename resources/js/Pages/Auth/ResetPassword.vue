<script setup >
import { useForm } from '@inertiajs/vue3';
import Container from '../../Layouts/Components/Auth/Container.vue';
import Title from '../../Layouts/Components/Auth/Title.vue';
import InputField from '../../Layouts/Components/InputField.vue';
import PrimaryBtn from '../../Layouts/Components/PrimaryBtn.vue';

const props = defineProps({
    token:String,
    email:String
})


const form = useForm({
    token:props.token,
    email:props.email,
    password:"",
    password_confirmation:"",
})

const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    })
}

</script>

<template>
    <Head title="- Reset password"/>

    <Container class="pt-24">
        

        <form @submit.prevent="submit" class="space-y-6" action="#">

            <Title>Entrez un nouveau mot de passe</Title>

            <InputField
                label="Email"
                icon="at"
                placeholder="Entrez votre email"
                v-model="form.email"
                :errorMessage="form.errors.email"

            />

            <InputField
                label="Mot de passe"
                icon="key"
                placeholder="Entrez un mot de passe"
                type="password"
                v-model="form.password"
                :errorMessage="form.errors.password"

            />

            <InputField
                label="Confirmez le mot de passe"
                icon="key"
                placeholder="confirmez le mot de passe"
                type="password"
                v-model="form.password_confirmation"
                :errorMessage="form.errors.password_confirmation"

            />


            <PrimaryBtn :disabled="form.processing" >
                Modifier le mot de passe
            </PrimaryBtn>

        </form>        
    </Container>

</template>
