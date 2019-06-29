<template>
    <div>
        <b-navbar toggleable="lg" type="light" variant="transparent">
            <b-navbar-brand tag="h1" class="mb-0 pl-3 font-weight-bold logo">Frankie.</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <b-nav-item href="#" class="btn btn-sm btn-transparent active ml-3">Onboarding</b-nav-item>
                    <b-nav-item href="#" class="btn btn-sm btn-transparent ml-2">Monitoring</b-nav-item>
                </b-navbar-nav>

                <b-navbar-nav class="ml-auto">
                    <b-nav-item-dropdown right>
                        <template slot="button-content">
                            <em>User</em>
                        </template>
                        <b-dropdown-item href="#">Profile</b-dropdown-item>
                        <b-dropdown-item href="#">Sign Out</b-dropdown-item>
                    </b-nav-item-dropdown>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </div>
</template>

<script>
  export default {
    name: "navigation-bar"
  }
</script>

<style scoped>

</style>