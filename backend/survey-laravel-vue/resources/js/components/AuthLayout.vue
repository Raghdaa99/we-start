<template>
    <div class="auth">
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "Login"
}
</script>

<style scoped>
.auth {
    width: 400px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

</style>
