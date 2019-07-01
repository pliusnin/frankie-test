<template>
    <div>
        <h3 class="border-bottom border-danger pb-5 pt-4 pl-4 font-weight-light">Search eKYC and AML</h3>
        <search-form @search="startSearch"/>
        <results-table :data="responseData"/>
    </div>
</template>

<script>
  import SearchForm from './SearchForm'
  import ResultsTable from './Results'

  const url = '/api/v1/search';

  export default {
    name: "index",
    components: {
      SearchForm,
      ResultsTable
    },
      data() {
        return {
            responseData: {}
        };
      },
    methods: {
      async startSearch(data){
          const resp = await this.$http.post(url, data).catch(e => console.log(e));

          if(resp && resp.data){
            this.responseData = resp.data.data;
          }
      }
    }
  }
</script>

<style scoped>

</style>