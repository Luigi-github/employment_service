<template>
    <form @submit.prevent="handleSubmit" autocomplete="off" novalidate class="flex flex-row mb-5">
        <div class="bg-white">
            <label for="role" class="block text-sm font-medium leading-6 text-gray-900">Role</label>
            <input type="text" id="role" maxlength="255" v-model="role"
                   class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <div class="pl-5 mt-8 bg-white">
            <div class="text-right">
                <button type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Buscar</button>
                <a href="/positions/0" class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 ml-5">Crear nuevo</a>
            </div>
        </div>
    </form>
</template>

<script>
    import { apiCall } from '../api';
    import { useVuelidate } from '@vuelidate/core';
    import { required, maxLength, between } from '@vuelidate/validators';

    export default {
        data () {
            return {
                role: null
            }
        },
        methods: {
            async handleSubmit () {
                let comp = this;
                let data = comp.$data;
                apiCall('GET', '/positions')
                .then(function (response){
                    comp.$emit('result', response.data);
                });
            }
        },
        mounted() {
            this.handleSubmit();
        }
    }
</script>
