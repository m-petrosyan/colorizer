export default {
    created() {
        if (sessionStorage.getItem('token')) {
            this.$store.dispatch('auth')
        }
    },
}