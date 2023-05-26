<template>
    <header-component />
    <div class="w-full sm:8/12 md:8/12 p-5 bg-white">
        <div>
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
                Position data
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
                    <label for="role" class="sr-only">Role</label>
                    <input id="role" v-model="role"
                           class="relative block w-full rounded-t-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Role">
                </div>
                <div>
                    <label for="experience_required" class="sr-only">Experience required (years)</label>
                    <input id="experience_required" v-model="experienceRequired"
                           class="relative block w-full rounded-b-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Experience required">
                </div>
                <div>
                    <label for="salary" class="sr-only">Salary</label>
                    <input id="salary" v-model="salary"
                           class="relative block w-full rounded-b-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Salary">
                </div>
                <div>
                    <label for="company" class="sr-only">Company</label>
                    <select id="company" v-model="companyId">
                        <option v-for="company in companies" :value="company.id" :key="company.id">
                            {{ company.name }}
                        </option>
                    </select>
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
    import { email, required, maxLength } from '@vuelidate/validators';
    import HeaderComponent from "../components/Header.vue";

    export default {
        setup () {
            return { v$: useVuelidate() }
        },
        data () {
            return {
                role: null,
                experienceRequired: null,
                companyId: null,
                salary: null,
                companies: [],
                withError: false,
                message: null
            }
        },
        validations () {
            return {
                role: {
                    required,
                    maxLengthValue: maxLength(255),
                },
                companyId: {
                    required
                },
                experienceRequired: {
                    required,
                    maxLengthValue: maxLength(255)
                },
                salary: {
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
                apiCall('POST', '/positions', {
                    role: data.role,
                    experience_required: data.experienceRequired,
                    salary: data.salary,
                    company_id: data.companyId
                }).then(function (response){
                    if(response.status === 200){
                        router.push('positions');
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
        },
        mounted() {
            let data = this.$data;
            apiCall('GET', '/companies')
            .then(function (response){
                data.companies = response.data;
            });
        }
    }
</script>
