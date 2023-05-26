<template>
    <header-component />
    <div class="w-full sm:12/12 md:12/12 p-5 bg-white">
        <searcher @result="setResult"/>
        <result-list :result="result"/>
    </div>
</template>

<script>
    import HeaderComponent from '../components/Header.vue';
    import Searcher from '../components/CompanySearcher.vue';
    import ResultList from '../components/CompanyList.vue';

    export default {
        data() {
            return {
                result: null
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
        }
    }
</script>
