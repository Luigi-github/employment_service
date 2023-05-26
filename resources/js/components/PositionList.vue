<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="table-auto" width="100%">
            <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left">Role</th>
                    <th scope="col" class="px-6 py-3 text-left">Experienced required (years)</th>
                    <th scope="col" class="px-6 py-3 text-left">Salary</th>
                    <th scope="col" class="px-6 py-3 text-right">Company</th>
                    <th scope="col" class="px-6 py-3 text-left">Person</th>
                    <th scope="col" class="px-6 py-3 text-left">Available</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="position of result">
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
                        {{ position.company.name }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-left">
                        <span v-if="position.person">{{ position.person.name }}</span>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-left">
                        <span v-if="position.available">Yes</span>
                        <span v-if="!position.available">No</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['result']
    }
</script>
