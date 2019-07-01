<template>
    <div>
        <h1 v-if="!data.entityResult" class="text-center pt-5">The results no found. Try again.</h1>
        <div v-if="data.entityResult">
            <div class="the-results-of-the-r">The results of the request:</div>
            <table>
                <thead>
                <tr>
                    <td>RequestID</td>
                    <td>Display Name</td>
                    <td>Initial Risk</td>
                    <td>Match Strength</td>
                    <td>Result</td>
                    <td>Statues</td>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
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