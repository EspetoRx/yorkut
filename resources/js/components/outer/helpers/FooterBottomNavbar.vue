<template>
    <div class="container p-0">
        <div class="d-flex flex-column flex-lg-row justify-content-between w-100 bg-white rounded">
            <div class="d-flex flex-row justify-content-center align-items-center p-1">
                <div class="navbar-title m-1 ms-3 me-3 text-nowrap">
                    Yorkut
                </div>
            </div>
            <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center m-1">
                <a href="#"
                    class="text-primary m-1 ms-2 me-2 text-center text-nowrap text-sm-wrap text-decoration-none">Sobre
                    o
                    Yorkut</a><span class="d-none d-sm-block text-muted">|</span>
                <a href="#"
                    class="text-primary m-1 ms-2 me-2 text-center text-nowrap text-sm-wrap text-decoration-none">Novidades</a><span
                    class="d-none d-sm-block text-muted">|</span>
                <a href="#"
                    class="text-primary m-1 ms-2 me-2 text-center text-nowrap text-sm-wrap text-decoration-none">Centro
                    de
                    segurança</a><span class="d-none d-sm-block text-muted">|</span>
                <a href="#"
                    class="text-primary m-1 ms-2 me-2 text-center text-nowrap text-sm-wrap text-decoration-none">Privacidade</a><span
                    class="d-none d-sm-block text-muted">|</span>
                <a href="#"
                    class="text-primary m-1 ms-2 me-2 text-center text-nowrap text-sm-wrap text-decoration-none">Ajuda</a>
            </div>
            <div class="d-flex flex-row justify-content-center align-items-center m-1 ms-3 me-3">
                <div class="text-muted text-center">
                    © {{ currentYear }} Todos os direitos reservados.
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "FooterBottomNavbar",
        data() {
            return {
                currentYear: new Date().getFullYear(),
            };
        },
        mounted() {
            // You can add any additional logic here if needed
        },
    };
</script>
<style scoped
    lang="scss"></style>