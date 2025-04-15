<script setup>
import { computed } from 'vue'; // Pour rendre translatedError réactif

const model = defineModel();

const props = defineProps({
    label: String,
    icon: String,
    errorMessage: String,
    placeholder: {
        type: String,
        default: "",
    },
    type: {
        type: String,
        default: "text",
    }
});

// Dictionnaire des erreurs courantes en français
const errorMessagesFR = {
    "The name field is required.": "Le nom est requis.",
    "The email field is required.": "L'email est requis.",
    "The email field must be a valid email address.": "Veuillez entrer une adresse email valide.",
    "The password field is required.": "Le mot de passe est requis.",
    "The password field must be at least 4 characters.": "Le mot de passe doit contenir au moins 4 caractères.",
    "The password field confirmation does not match.": "La confirmation du mot de passe ne correspond pas.",
    "The password is incorrect.": "Le mot de passe est incorrect.",
    "The password confirmation field is required.": "Le mot de passe de confirmation est requis",
    "The current password field is required.": "Le mot de passe actuel est requis",
    "We can't find a user with that email address.": "Nous ne trouvons aucun utilisateur avec cette adresse e-mail"
};

// Rendre la traduction de l'erreur réactive
const translatedError = computed(() => {
    return props.errorMessage ? errorMessagesFR[props.errorMessage] || props.errorMessage : "";
});
</script>

<template>
    <div class="w-full">
        <label 
            :for="label"
            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1"
        >
            {{ label }}
        </label>
            
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                <span class="text-gray-400">
                    <i :class="`fa-solid fa-${icon}`"></i>
                </span>
            </div>
            
            <input 
                :type="type"
                :name="label"
                :placeholder="placeholder"
                v-model="model"
                :class="{
                    'border-red-500 focus:ring-red-500 focus:border-red-500 dark:border-red-500': translatedError,
                    'border-gray-300 focus:ring-indigo-400 focus:border-indigo-400': !translatedError
                }"
                class="block w-full rounded-md pl-10 pr-3 py-2 text-sm border outline-none placeholder-gray-400
                       dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
            />
        </div>

        <p v-if="translatedError" class="text-red-500 text-xs mt-1">
            {{ translatedError }}
        </p>
    </div>
</template>