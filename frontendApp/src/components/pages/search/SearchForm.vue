<template>
  <b-container fluid class="border-bottom pb-5">
    <b-row class="f1">
      <b-col cols="4">
        <span class="Name-and-Details">Name and details</span>
      </b-col>
      <b-col cols="8">
        <search-switch
          :checked="formData.aml"
          name="check-button"
          class="float-right pr-4"
          @click="amlSwitch" />
        <div class="float-right pr-2">AML</div>
        <search-switch
          :checked="formData.kyc"
          name="check-button"
          class="float-right pr-4"
          @click="kycSwitch"
        />
        <div class="float-right pr-2">KYC</div>
      </b-col>
    </b-row>

    <b-row>
      <b-col cols="9">
        <b-row>
          <b-col cols="4">
            <label for="name">Name</label>
            <b-form-input id="name"
              type="text"
              placeholder="Name"
              v-model="formData.name"
              :state="errors.name">
            </b-form-input>
          </b-col>
          <b-col cols="4">
            <label for="nationality">Nationality (optional)</label>
            <country-select id="nationality" v-model="formData.nationality"/>
          </b-col>
          <b-col cols="4">
            <label for="dob">Date of Birth (optional)</label>
            <b-form-input id="dob" type="date" placeholder="YYYY-MM-DD" v-model="formData.dob"></b-form-input>
          </b-col>
        </b-row>
        
        <b-row v-if="formData.kyc" style="padding-top: 35px;">
          <b-col cols="4">
            <label for="address">Home Address (optional)</label>
            <b-form-input id="address" type="text" placeholder="Address" v-model="formData.address"></b-form-input>
          </b-col>
          <b-col cols="4">
            <label for="docType">ID Type (optional)</label>
            <b-form-select id="docType"
              :options="docTypes"
              placeholder="Document"
              v-model="formData.docType" />
          </b-col>
          <b-col cols="4">
            <label for="docNumber">Document Number (optional)</label>
            <b-form-input id="docNumber" type="text" placeholder="Number" v-model="formData.docNumber" />
          </b-col>
        </b-row>
        
        <b-row v-if="formData.aml">
          <b-col cols="9" style="padding-top: 40px;">
            <b-row>
              <b-col cols="12" class="Fuzziness-interval">Fuziness</b-col>
              <b-col cols="4">
                <label for="fuziness">Fuziness interval</label>
                <b-form-select id="fuziness" :options="fuzOptions" v-model="formData.fuziness"></b-form-select>
              </b-col>
              <b-col cols="8" class="pt-4 Level-of-flexibility">
                Level of flexibility of search (0% will check for exact matches only; 100% will look for results with
                even
                the slightest match in spelling and phonetics)
              </b-col>
            </b-row>
          </b-col>
        </b-row>
      </b-col>
      <b-col cols="3" class="actions">
        <div class="w-75">
          <b-button variant="dark" block @click.prevent="startSearch">Search Now</b-button>
        </div>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
  import CountrySelect from './CountrySelect';
  import SearchSwitch from './SearchSwitch';

  export default {
    name: 'search-form',
    components: { CountrySelect, SearchSwitch },
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
          fuziness: '',
        },
        fuzOptions: [
          { value: 0, text: '100% Broad Match' },
          { value: 0.1, text: '90%' },
          { value: 0.2, text: '80%' },
          { value: 0.3, text: '70%' },
          { value: 0.4, text: '60%' },
          { value: 0.5, text: '50%' },
          { value: 0.6, text: '40%' },
          { value: 0.7, text: '30%' },
          { value: 0.8, text: '20%' },
          { value: 0.9, text: '10%' },
          { value: 1, text: 'Exact Match' },
        ],
        docTypes: [
          { value: '', text: '' },
          { value: 'DRIVERS_LICENCE', text: 'Drivers Licence' },
          { value: 'PASSPORT', text: 'Passport' },
          { value: 'NATIONAL_HEALTH_ID', text: 'Medicare Card' },
        ],
        errors: {
          name: null,
        },
      };
    },
    methods: {
      amlSwitch() {
        const value = !this.formData.aml;

        if (!value && !this.formData.kyc) {
          this.formData.aml = true;
        } else {
          this.formData.aml = value;
        }
      },

      kycSwitch() {
        const value = !this.formData.kyc;

        if (!value && !this.formData.aml) {
          this.formData.kyc = true;
        } else {
          this.formData.kyc = value;
        }
      },

      startSearch() {
        const data = { ...this.formData };

        if (!data.name) {
          this.errors.name = false;

          return;
        }

        this.errors.name = null;

        delete data.kyc;
        delete data.aml;

        this.$emit('search', data)
      }
    },
  };
</script>

<style scoped lang="scss">
  .actions {
    display: flex;
    align-items: flex-end;
  }
</style>
