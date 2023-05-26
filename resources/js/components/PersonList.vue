<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="table-auto" width="100%">
            <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left">Name</th>
                    <th scope="col" class="px-6 py-3 text-left">Birth date</th>
                    <th scope="col" class="px-6 py-3 text-left">Education level</th>
                    <th scope="col" class="px-6 py-3 text-right">Client recorded date</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="person of result">
                    <td class="px-6 py-3 whitespace-nowrap text-left">
                        {{ person.name }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-left">
                        {{ person.birth_date }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-left">
                        {{ person.education_level }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-right">
                        {{ person.client_recorded_date }}
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
