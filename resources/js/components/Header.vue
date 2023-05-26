<template>
    <nav class="bg-gray-800">
        <div class="mx-auto">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <router-link to="/"
                                         class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                         active-class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                                         exact>
                                Available positions
                            </router-link>
                            <router-link to="/companies"
                                         class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                         active-class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                                         exact>
                                Companies
                            </router-link>
                            <router-link to="/people"
                                         class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                         active-class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                                         exact>
                                People
                            </router-link>
                            <router-link to="/positions"
                                         class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                         active-class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                                         exact>
                                Positions
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>
<script>
export default {}
</script>
