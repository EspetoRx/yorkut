<template>

</template>
<script>
    export default {
        name: 'Home',
        props: {
            user: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                currentYear: new Date().getFullYear(),
            }
        },
        mounted() {
            // Any additional logic on mount can go here
        }
    }
</script>
<style scoped></style>