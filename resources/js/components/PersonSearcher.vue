<template>
    <form @submit.prevent="handleSubmit" autocomplete="off" novalidate class="flex flex-row mb-5">
        <div class="pl-5 mt-8 bg-white">
            <a href="/people/0" class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 ml-5">Create new</a>
        </div>
    </form>
</template>

<script>
    import { apiCall } from '../api';

    export default {
        data () {
            return {
                name: null
            }
        },
        methods: {
            async handleSubmit () {
                let comp = this;
                let data = comp.$data;
                apiCall('GET', '/people')
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
