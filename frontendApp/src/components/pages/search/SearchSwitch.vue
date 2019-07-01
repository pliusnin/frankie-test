<template>
  <div class="custom-control custom-switch">
    <input type="checkbox"
      name="check-button"
      autocomplete="off"
      class="custom-control-input"
      value="true"
      :id="id"
      :checked="checked"
    >
    <label class="custom-control-label" :for="id" @click.prevent="click"
    >
    </label>
  </div>
</template>

<script>
  export default {
    name: 'search-switch',
    props: {
      checked: Boolean,
    },
    data() {
      return {
        id: null,
      };
    },
    beforeMount() {
      this.id = 'search-switch-' + this._uid;
    },
    methods: {
      click() {
        this.$emit('click');
      },
    },
  };
</script>.

<style scoped lang="scss">
  @import "../../../styles/variables";
  
  .custom-control-input:checked ~ .custom-control-label::before {
    border-color: $warm-pink;
    background-color: $warm-pink;
  }
</style>
