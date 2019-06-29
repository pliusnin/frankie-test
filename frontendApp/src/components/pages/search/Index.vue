<template>
    <div>
        <h3 class="border-bottom border-danger pb-5 pt-4 pl-4 font-weight-light">Search eKYC and AML</h3>
        <search-form/>
        <results-table/>
    </div>
</template>

<script>
  import SearchForm from './SearchForm'
  import ResultsTable from './Results'

  export default {
    name: "index",
    components: {
      SearchForm,
      ResultsTable
    }
  }
</script>

<style scoped>

</style>