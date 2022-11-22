<template>
    <div class="secondary-header">
        <slot name="header"></slot>
    </div>
    <div class="main-content">
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: "PageComponent",
    props:['title']
}
</script>

<style scoped>
.secondary-header{
    padding: 20px;
    box-shadow: 2px 2px 10px #dfdfdf;
}
.secondary-header h1{
    margin: 0;
}
.main-content{
    padding: 40px;
}
</style>
