<template>
    <b-breadcrumb :items="items" class="bg-light rounded-0"></b-breadcrumb>
</template>

<script>
  export default {
    name: "breadcrumbs",
    data() {
      return {
        items: [
          {
            text: 'Frankie'
          },
          {
            text: 'Onboarding'
          },
          {
            text: 'Search',
            active: true
          }
        ]
      }
    }
  }
</script>

<style scoped>

</style>