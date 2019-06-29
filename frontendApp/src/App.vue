<template>
  <div id="app">
    <navigation-bar/>

    <b-container fluid>
      <b-row>
        <b-col cols="2" class="h-100 vh-100 bg-light border-right p-0">
          <sidebar/>
        </b-col>
        <b-col cols="10" class="p-0">
          <breadcrumbs/>
          <pages-search/>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import NavigationBar from './components/layout/NavigationBar'
import Sidebar from './components/layout/Sidebar'
import Breadcrumbs from './components/layout/Breadcrumbs'
import PagesSearch from './components/pages/search/Index'

export default {
  name: 'app',
  components: {
    NavigationBar,
    Sidebar,
    Breadcrumbs,
    PagesSearch
  }
}
</script>

<style>

</style>
