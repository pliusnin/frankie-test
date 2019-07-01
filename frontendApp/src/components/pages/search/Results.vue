<template>
    <div>
        <h1 class="text-center pt-5">The results no found. Try again.</h1>
        <div v-if="data.entityResult">
            sdasd
        </div>
    </div>
</template>

<script>
  export default {
    name: "results",
      props: {
        data: Object
      }
  }
</script>

<style scoped>

</style>