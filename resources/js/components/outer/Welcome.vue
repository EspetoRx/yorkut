<template>
    <div class="bg-color w-100 vh-100">
        <div class="container">
            <div class="d-flex flex-row align-items-center justify-conent-center w-100 vh-100">
                <div class="flex-column w-100">
                    <div class="d-flex flex-row w-100 flex-wrap flex-md-nowrap" id="main">
                        <div class="bg-white text-dark me-md-1 w-100 mb-1 mb-md-0">
                            <div class="">
                                <div class="row pb-2 pb-sm-0 pt-0 pt-sm-0 pt-md-5">
                                    <div id="yorkut-logo" class="d-flex justify-content-center">
                                        <div class="logo">yorkut</div>
                                        <div class="text-secondary margin-top-2-75rem">beta</div>
                                    </div>
                                </div>
                                <div class="row p-1">
                                    <div class="col-12 d-flex flex-row justify-content-center text-gray-color">
                                        <div class="text-center"><span class="text-highlight">Conecte-se</span>&nbsp;aos seus amigos e familiares
                                        usando recados e mensagens instantâneas.</div>
                                    </div>
                                    <div class="col-12 d-flex flex-row justify-content-center text-gray-color">
                                        <div class="text-center"><span class="text-highlight">Conheça</span>&nbsp;novas pessoas através de amigos de
                                        seus amigos e comunidades.</div>
                                    </div>
                                    <div class="col-12 d-flex flex-row justify-content-center text-gray-color">
                                        <div class="text-center"><span class="text-highlight">Compartilhe</span>&nbsp;seus vídeos, fotos e paixões em
                                        um só lugar.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-xs-100">
                            <div class="w-100 login-block pt-2 pb-2">
                                <div class="text-gray-color text-center">Acesse o <span class="navbar-title-2">yorkut</span> com a sua conta</div>
                                <div class="w-100 mt-3 ps-2 pe-2">
                                    <div class="row mt-1">
                                        <div class="col-3 pt-2 text-end">
                                            <label for="email" class="text-end">E-mail: </label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" placeholder="E-mail" class="form-control" id="email"
                                                name="email">
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-3 pt-2 text-end">
                                            <label for="password">Senha: </label>
                                        </div>
                                        <div class="col-9">
                                            <input type="password" placeholder="Senha" class="form-control"
                                                id="password" name="password">
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-12 text-center">
                                            <input type="checkbox" class="form-check-input" id="saveLogin">
                                            <label class="form-check-label" for="saveLogin">&nbsp;Salvar minhas informações de
                                                login</label>
                                        </div>
                                    </div>
                                    <div class="row mt-3 ps-5 pe-5">
                                        <button type="button" id="login" name="login" class="btn btn-light"><i
                                                class="fa-solid fa-arrow-right-to-bracket"></i> Entrar</button>
                                    </div>
                                    <div class="row mt-3 text-center ps-1 pe-1">
                                        <a href="#" target="_blank" rel="">Não consegue acessar sua conta?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100 login-block mt-2 text-center">
                                <div class="mt-1">
                                    Ainda não é membro?
                                </div>
                                <div class="mt-1 mb-1">
                                    <RouterLink to="/register">ENTRAR JÁ</RouterLink>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row w-100 copyright-footer mt-2" id="footer">
                        <div class="col-12 text-center">
                            &#169; {{ currentYear }} Yorkut - <a href="#">Sobre o Yorkut</a> - <a href="#">Central de segurança</a> - <a href="#">Privacidade</a> - <a href="#">Termos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="module">
    export default {
        name: "Welcome Component",
        setup (props, ctx) {
            return {
                currentYear: new Date().getFullYear()
            }
        }
    }
</script>

<style lang="sass"
    scoped>

</style>