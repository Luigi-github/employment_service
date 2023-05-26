<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="border bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert" v-if="withError">
            {{ message }}
        </div>
        <table class="table-auto" width="100%">
            <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left">Role</th>
                    <th scope="col" class="px-6 py-3 text-left">Experienced required (years)</th>
                    <th scope="col" class="px-6 py-3 text-left">Salary</th>
                    <th scope="col" class="px-6 py-3 text-right">Company</th>
                    <th scope="col" class="px-6 py-3 text-left">Allocate person</th>
                    <th scope="col" class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="position of result" v-show="!position.hide">
                    <td class="px-6 py-3 whitespace-nowrap text-left">
                        {{ position.role }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-left">
                        {{ position.experience_required }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-left">
                        {{ position.salary }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-right">
                        <span v-if="position.company">
                            {{ position.company.name }}
                        </span>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-left">
                        <select id="company" v-model="position.person_id">
                            <option v-for="person in people" :value="person.id" :key="person.id">
                                {{ person.name }}
                            </option>
                        </select>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-right">
                        <button type="button" @click="allocatePerson(position)"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="padding: 0.225rem;">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Allocate person</span>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import {apiCall} from "../api";

    export default {
        props: ['result', 'people'],
        data () {
            return {
                withError: false,
                message: null
            }
        },
        methods: {
            async allocatePerson (position) {
                if(!position.person_id){
                    this.$data.withError = true;
                    this.$data.message = "You must select a person to allocate.";
                    return;
                }

                let comp = this;
                apiCall('PATCH', '/set-person-positions', {
                    id: position.id,
                    person_id: position.person_id
                }).then(function (response){
                    if(response.status === 200){
                        position.hide = true;
                    }
                });
            }
        }
    }
</script>
