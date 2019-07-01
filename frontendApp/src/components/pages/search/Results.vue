<template>
    <div>
        <h1 v-if="!data.entityResult" class="text-center pt-5">The results no found. Try again.</h1>
        <div v-if="data.entityResult">
            <div class="the-results-of-the-r">The results of the request:</div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">RequestID</th>
                    <th scope="col">Display Name</th>
                    <th scope="col">Initial Risk</th>
                    <th scope="col">Match Strength</th>
                    <th scope="col">Result</th>
                    <th scope="col">Statues</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span v-if="data.checkSummary.checkId">{{ data.checkSummary.checkId }}</span></td>
                        <td><span v-if="data.entityResult.nameCheck.name.displayName">{{ data.entityResult.nameCheck.name.displayName }}</span></td>
                        <td><span v-if="">{{  }}</span></td>
                        <td>
                            <b-progress v-if="data.checkSummary.confidenceLevel" :value="data.checkSummary.confidenceLevel" variant="primary"></b-progress>

                        </td>
                        <td>
                            <span v-if="data.checkSummary.resultState">
                                <span v-if="data.checkSummary.resultState == 'CHECKED_SUCCESS'">Success</span>
                                <span v-else>Fail</span>
                            </span>
                        </td>
                        <td><span v-if="">{{  }}</span></td>
                    </tr>
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