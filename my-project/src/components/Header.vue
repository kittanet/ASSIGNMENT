<template lang="html">
    <b-navbar toggleable="md" type="dark" class="nav">
    <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>
    <b-navbar-brand href="/">Assignment</b-navbar-brand>
    <b-collapse is-nav id="nav_collapse">
        <b-navbar-nav>
        <b-nav-item href="/api">Restaurants in Bangsue</b-nav-item>
        </b-navbar-nav>
    </b-collapse>
    </b-navbar>
</template>

<script>
export default {
    name: 'Header'
}
</script>

<style lang="css">
    .nav {
        background: #353535;
    }
</style>
