<template>
    <header-component />
    <div class="w-full sm:12/12 md:12/12 p-5 bg-white">
        <searcher @result="setResult"/>
        <result-list :result="result" :people="people"/>
    </div>
</template>

<script>
    import { apiCall } from '../api';
    import HeaderComponent from '../components/Header.vue';
    import Searcher from '../components/AvailablePositionSearcher.vue';
    import ResultList from '../components/AvailablePositionList.vue';

    export default {
        data() {
            return {
                result: null,
                people: []
            }
        },
        methods: {
            setResult(result) {
                this.result = result;
            }
        },
        components: {
            HeaderComponent,
            Searcher,
            ResultList
        },
        mounted() {
            let data = this.$data;
            apiCall('GET', '/people')
            .then(function (response){
                data.people = response.data;
            });
        }
    }
</script>
