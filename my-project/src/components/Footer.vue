<template lang="html">
    <div class="footer">
        <p><a href="mailto:kittanet@hotmail.com">Kittanet@hotmail.com</a><br>
        Copyright © 2019</p>
    </div>
</template>

<script>
export default {
    name: 'Footer'
}
</script>

<style lang="css">
    .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: gray;
            color: white;
            text-align: center;
    }
    a {
        color: #000;
        font-weight: bold;
    }
</style>