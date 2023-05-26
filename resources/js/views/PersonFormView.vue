<template>
    <header-component />
    <div class="w-full sm:12/12 md:12/12 p-5 bg-white">
        <div>
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
                Person data
            </h2>
        </div>
        <form @submit.prevent="handleSubmit" autocomplete="off" novalidate class="mt-8 space-y-6">
            <div class="border bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"
                 v-if="(v$.$dirty && v$.$invalid) || withError">
                <div v-for="error of v$.$errors" :key="error.$uid">
                    {{ error.$property }} - {{ error.$message }}
                </div>
                <div v-if="withError">
                    {{ message }}
                </div>
            </div>
            <div class="-space-y-px rounded-md shadow-sm">
                <div>
                    <label for="name" class="sr-only">Name</label>
                    <input id="name" v-model="name"
                           class="relative block w-full rounded-t-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Name">
                </div>
                <div>
                    <label for="birth_date" class="sr-only">Birth date</label>
                    <input id="birth_date" type="date" v-model="birth_date"
                           class="relative block w-full rounded-b-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Birth date">
                </div>
                <div>
                    <label for="education_level" class="sr-only">Education level</label>
                    <input id="education_level" v-model="education_level"
                           class="relative block w-full rounded-b-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Education level">
                </div>
                <div>
                    <label for="client_recorded_date" class="sr-only">Client recorded date</label>
                    <input id="client_recorded_date" type="date" v-model="client_recorded_date"
                           class="relative block w-full rounded-b-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Client recorded date">
                </div>
            </div>
            <div>
                <button type="submit" class="group relative flex w-full justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import { apiCall } from '../api';
    import { useVuelidate } from '@vuelidate/core';
    import { required, maxLength } from '@vuelidate/validators';
    import HeaderComponent from "../components/Header.vue";

    export default {
        setup () {
            return { v$: useVuelidate() }
        },
        data () {
            return {
                name: null,
                birth_date: null,
                education_level: null,
                client_recorded_date: null,
                withError: false,
                message: null
            }
        },
        validations () {
            return {
                name: {
                    required,
                    maxLengthValue: maxLength(255),
                },
                birth_date: {
                    required,
                    maxLengthValue: maxLength(255)
                },
                education_level: {
                    required,
                    maxLengthValue: maxLength(255)
                },
                client_recorded_date: {
                    required,
                    maxLengthValue: maxLength(255)
                }
            }
        },
        methods: {
            async handleSubmit () {
                const isFormCorrect = await this.v$.$validate()
                if (!isFormCorrect) return;

                let data = this.$data;
                let router = this.$router;
                apiCall('POST', '/people', {
                    name: data.name,
                    birth_date: data.birth_date,
                    education_level: data.education_level,
                    client_recorded_date: data.client_recorded_date
                }).then(function (response){
                    if(response.status === 200){
                        //router.push('searcher');
                    }
                }).catch(function (error){
                    if(error.response.status === 401) {
                        data.withError = true;
                        data.message = error.response.data.message;
                    }
                });
            }
        },
        components: {
            HeaderComponent
        }
    }
</script>
