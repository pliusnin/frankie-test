<template>
    <b-container fluid class="border-bottom pb-5">
        <b-row>
            <b-col cols="12">
                <b-form-checkbox v-model="formData.aml" name="check-button" class="float-right pr-4" switch/>
                <div class="float-right pr-2">AML</div>
                <b-form-checkbox v-model="formData.kyc" name="check-button" class="float-right pr-4" switch/>
                <div class="float-right pr-2">KYC</div>
            </b-col>
        </b-row>

        <b-row>
            <b-col>Name and details</b-col>
        </b-row>

        <b-row>
            <b-col cols="3">
                <label for="name">Name</label>
                <b-form-input id="name" type="text" placeholder="Name" v-model="formData.name"></b-form-input>
            </b-col>
            <b-col cols="3">
                <label for="nationality">Nationality (optional)</label>
                <b-form-input id="nationality" type="text" placeholder="Nationality" v-model="formData.nationality"></b-form-input>
            </b-col>
            <b-col cols="3">
                <label for="dob">Date of Birth (optional)</label>
                <b-form-input id="dob" type="text" placeholder="YYYY-MM-DD" v-model="formData.dob"></b-form-input>
            </b-col>
        </b-row>

        <b-row>
            <b-col cols="3">
                <label for="address">Home Address (optional)</label>
                <b-form-input id="address" type="text" placeholder="Address" v-model="formData.address"></b-form-input>
            </b-col>
            <b-col cols="3">
                <label for="docType">ID Type (optional)</label>
                <b-form-input id="docType" type="text" placeholder="Document" v-model="formData.docType"></b-form-input>
            </b-col>
            <b-col cols="3">
                <label for="docNumber">Document Number (optional)</label>
                <b-form-input id="docNumber" type="text" placeholder="Number" v-model="formData.docNumber"></b-form-input>
            </b-col>
        </b-row>

        <b-row>
            <b-col cols="9">
                <b-row v-if="formData.aml">
                    <b-col cols="12">Fuziness (AML check only)</b-col>
                    <b-col cols="4">
                        <label for="fuziness">Fuziness interval</label>
                        <b-form-select id="fuziness" :options="fuzOptions" v-model="formData.fuziness"></b-form-select>
                    </b-col>
                    <b-col cols="8" class="pt-4">
                        Level of flexibility of search (0% will check for exact matches only; 100% will look for results with even the slightest match in spelling and phonetics)
                    </b-col>
                </b-row>
            </b-col>
            <b-col cols="3" class="align-bottom">
                <div class="w-75">
                    <b-button variant="dark" block @click.prevent="startSearch">Search Now</b-button>
                </div>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
  export default {
    name: "search-form",
    data() {
      return {
        formData: {
          kyc: true,
          aml: true,
          name: '',
          nationality: '',
          dob: '',
          address: '',
          docType: '',
          docNumber: '',
          fuziness: ''
        },
        fuzOptions: [
          {value: 0, text: '100% Broad Match'},
          {value: 0.1, text: '90%'},
          {value: 0.2, text: '80%'},
          {value: 0.3, text: '70%'},
          {value: 0.4, text: '60%'},
          {value: 0.5, text: '50%'},
          {value: 0.6, text: '40%'},
          {value: 0.7, text: '30%'},
          {value: 0.8, text: '20%'},
          {value: 0.9, text: '10%'},
          {value: 1, text: 'Exact Match'}
        ]
      }
    },
    methods: {
        startSearch(){
            this.$emit('search', {...this.$data})
        }
    }
  }
</script>

<style scoped>

</style>