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
    password:"",
})


const submit = () => {
    form.post(route('password.confirm'),{
        onFinish: () => form.reset()
    })
}

</script>

<template>
    <Head title="- Password confirmation"/>

    <Container class="pt-24">

            <Title>Confirmez votre mot de passe</Title>

            <p class="my-2"> 
                Pour des raisons de sécurité, veuillez confirmer votre mot de passe 
                avant d’accéder à cette section.
            </p>

        <form @submit.prevent="submit" class="space-y-6" action="#">
            
            <InputField
                label="Mot de passe"
                icon="key"
                placeholder="Entrez votre mot de passe"
                v-model="form.password"
                :errorMessage="form.errors.password"

            />

            <PrimaryBtn :disabled="form.processing" >
                Confirmer
            </PrimaryBtn>

        </form>        
    </Container>

</template>

