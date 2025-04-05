<script setup>
import { switchTheme } from "../../theme";
import NavLink from './NavLink.vue';
import okImage from '../../../assets/images/profil.jpeg';
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage()
const user = computed(() =>page.props.auth?.user)


</script>



<template>
  <nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="w-full flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Listing</span>
      </a>
     
      <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
      </button>

      <div v-if="user" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
        <ul class="flex flex-col w-full items-start md:items-center font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50  
           rtl:space-x-reverse md:flex-row md:mt-0 md:gap-11 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 
           dark:border-gray-700 gap-2">


          <NavLink routeName="home" componentName="Home">Quiz</NavLink>        
          <NavLink routeName="login" componentName="Auth/Login">Quiz</NavLink>
          <NavLink class="md:mr-24" routeName="register" componentName="Auth/Register">Quiz</NavLink>   
          <NavLink class="flex md:hidden" routeName="dashboard" componentName="Dashboard">Mon compte</NavLink> 

          <div v-if="user" class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button 
              type="button" 
              class="hidden md:flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 
                    dark:focus:ring-gray-600"
              id="user-menu-button" 
              aria-expanded="false" 
              data-dropdown-toggle="user-dropdown" 
              data-dropdown-placement="bottom"
            >
              <span class="sr-only">Open user menu</span>
              <img class="w-8 h-8 rounded-full" :src="okImage" alt="user photo"> 
            </button>

            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                  <div class="px-4 py-3">
                    <span v-if="user" class="block text-sm text-gray-900 dark:text-white">{{ user.name }}</span>
                    <span v-if="user" class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ user.email }}</span>
                  </div>
                  <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                      <a 
                        :href="route('profile.edit')" 
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100
                         dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                      >
                        Profil
                      </a>
                    </li>
                    <li>
                      <a 
                        :href="route('dashboard')" 
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100
                         dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                      >
                        Mon compte
                      </a>
                    </li>
                    <li>
                      <Link 
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 
                        dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                        >
                        Me déconnecter
                      </Link>
                    </li>
                  </ul>
            </div> 
              
          </div>

          <button
            @click="switchTheme"
            class="md:mr-5 hover:bg-slate-700 w-6 h-6 grid place-items-center rounded-full 
            hover:outline outline-1 outline-white" 
          >
            <i class="fa-solid fa-circle-half-stroke"></i> 
          </button>

        </ul>
      </div>


      <div v-if="!user" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
        <ul class="flex flex-col items-center font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50  rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">


            <NavLink class="md:mr-12" routeName = "home" componentName = "Home">Acceuil</NavLink>        
            <NavLink class="md:mr-12" routeName = "login" componentName = "Auth/Login">Se connecter</NavLink>
            <NavLink class="md:mr-24" routeName = "register" componentName = "Auth/Register">S'inscrire</NavLink>    
            
            <button
                @click="switchTheme"
                class="hover:bg-slate-700 w-6 h-6 grid place-items-center rounded-full 
                hover:outline outline-1 outline-white " 
            >
                <i class="fa-solid fa-circle-half-stroke" ></i> 
            </button>
        </ul>
      </div>

    </div>
  </nav>
</template>