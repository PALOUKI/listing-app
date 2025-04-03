<script setup >
import { useForm } from '@inertiajs/vue3';
import Container from '../../Layouts/Components/Auth/Container.vue';
import Title from '../../Layouts/Components/Auth/Title.vue';
import InputField from '../../Layouts/Components/InputField.vue';
import PrimaryBtn from '../../Layouts/Components/PrimaryBtn.vue';
import TextLink from '../../Layouts/Components/TextLink.vue';
import CheckBox from '../../Layouts/CheckBox.vue';
import SessionMessage from '../../Layouts/Components/SessionMessage.vue';


defineProps({
    status:String
})
const form = useForm({
    email:"",
    password:"",
    remember:null,
})

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
        onError: (errors) => {
            console.log(errors); // Vérifier si les erreurs sont reçues en frontend
        }
    })
}

</script>

<template>
    <Head title="- Se connecter"/>

    <Container>
        

        <form @submit.prevent="submit" class="space-y-6" action="#">

            <Title>Connectez vous</Title>

                        <!-- Message d'erreur global -->
            <div v-if="form.errors.loginError" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md relative text-sm">
                <strong class="font-semibold">Erreur :</strong> {{ form.errors.loginError }}
            </div>

            <SessionMessage :status="status"/>


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

            <div class="flex items-start">
                <CheckBox 
                    name="remember"
                    v-model="form.remember"
                >
                    Se rappeler de moi
                </CheckBox>
                <a :href="route('password.request')" class="ms-auto text-sm text-blue-700 hover:underline dark:text-blue-500">Mot de passe oublié?</a>

            </div>

            <PrimaryBtn :disabled="form.processing" >Se Connecter</PrimaryBtn>

            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                Vous n'avez pas de compte? <TextLink routeName="register" label="S'inscrire"/>
            </div>
        </form>        
    </Container>

</template>

