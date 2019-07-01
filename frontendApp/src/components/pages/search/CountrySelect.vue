<template>
  <v-select :options="countries" label="name" placeholder="Nationality" @input="selected">
    <template slot="selected-option" slot-scope="country">
      <span class="flag-icon" :class="'flag-icon-' + country.alpha2.toLowerCase()"></span><span class="ml-1">{{country.name}}</span>
    </template>
    <template slot="option" slot-scope="country">
      <span class="flag-icon" :class="'flag-icon-' + country.alpha2.toLowerCase()"></span><span class="ml-1">{{country.name}}</span>
    </template>
  </v-select>
</template>

<script>
  import countries from 'iso-3166-1-codes';

  export default {
    name: 'country-select',
    data() {
      return {
        countries: countries.map(c => c),
      };
    },
    methods: {
      selected(newVal) {
        this.$emit('input', newVal.alpha3);
      },
    },
  };
</script>

<style scoped>

</style>
