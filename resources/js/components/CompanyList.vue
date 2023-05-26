<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="table-auto" width="100%">
            <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left">Name</th>
                    <th scope="col" class="px-6 py-3 text-left">Address</th>
                    <th scope="col" class="px-6 py-3 text-left">Zip code</th>
                    <th scope="col" class="px-6 py-3 text-right">Total positions available</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="company of result">
                    <td class="px-6 py-3 whitespace-nowrap text-left">
                        {{ company.name }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-left">
                        {{ company.address }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-left">
                        {{ company.zip_code }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-right">
                        {{ company.positions_available }}
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
