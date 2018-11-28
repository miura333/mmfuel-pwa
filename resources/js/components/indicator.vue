<template>
    <div v-if="show">
        <img src="/img/ajax-loader.gif">&nbsp;<span v-text="text"></span>
    </div>
</template>

<script>
export default {
    props: {
        text: {
            default: '',
            type: String
        },
        show: {
            default: false,
            type: Boolean
        }
    }
}
</script>

<style>
</style>
