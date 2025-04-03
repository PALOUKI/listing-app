<script setup >
import { useForm } from '@inertiajs/vue3';
import FormContainer from '../../Layouts/Components/Auth/Container.vue';
import Title from '../../Layouts/Components/Auth/Title.vue';
import InputField from '../../Layouts/Components/InputField.vue';
import PrimaryBtn from '../../Layouts/Components/PrimaryBtn.vue';
import TextLink from '../../Layouts/Components/TextLink.vue';



const form = useForm({
    name:"",
    email:"",
    password:"",
    password_confirmation:"",
})

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
        onError: (errors) => {
            console.log(errors); // Vérifier si les erreurs sont reçues en frontend
        }
    })
}

</script>

<template>
    <Head title="- S'inscrire"/>

    <FormContainer>
        

        <form @submit.prevent="submit" class="space-y-6" action="#">

            <Title>Créer un compte</Title>

            <!-- ErrorMessages -->
            

            <InputField
                label="Name"
                icon="id-badge"
                placeholder="Entrez votre nom"
                v-model="form.name"
                :errorMessage="form.errors['name']"
            />

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

            <p class="text-slate-500 text-sm dark:text-slate-400">
                    En créant un compte, vous acceptez nos 
                <a href="#" class="text-blue-500 hover:underline">Conditions d'utilisation</a> 
                    et notre 
                <a href="#" class="text-blue-500 hover:underline">Politique de confidentialité</a>.
            </p>

            <PrimaryBtn :disabled="form.processing" >S'inscrire</PrimaryBtn>

            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                Vous avez déjà un compte? <TextLink routeName="login" label="Se connecter"/>
            </div>
        </form>        
    </FormContainer>

</template>
