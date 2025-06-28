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
                                        <div class="text-center"><span class="text-highlight">Conecte-se</span>&nbsp;aos
                                            seus amigos e familiares
                                            usando recados e mensagens instantâneas.</div>
                                    </div>
                                    <div class="col-12 d-flex flex-row justify-content-center text-gray-color">
                                        <div class="text-center"><span class="text-highlight">Conheça</span>&nbsp;novas
                                            pessoas através de amigos de
                                            seus amigos e comunidades.</div>
                                    </div>
                                    <div class="col-12 d-flex flex-row justify-content-center text-gray-color">
                                        <div class="text-center"><span
                                                class="text-highlight">Compartilhe</span>&nbsp;seus vídeos, fotos e
                                            paixões em
                                            um só lugar.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-xs-100">
                            <div class="w-100 login-block pt-2 pb-2">
                                <div class="text-gray-color text-center">Acesse o <span
                                        class="navbar-title-2">yorkut</span> com a sua conta</div>
                                <div class="w-100 mt-3 ps-2 pe-2">
                                    <Form :validation-schema="schema" @submit="submitForm" v-slot="{ errors }"
                                        ref="form">
                                        <div class="d-flex flex-column">
                                            <div class="d-flex flex-row mb-1">
                                                <label for="email"
                                                    class="text-end text-nowrap me-2 align-content-center">E-mail:
                                                </label>
                                                <Field name="email" type="email" id="email" v-model="email"
                                                    :class="(errors.email) ? 'form-control is-invalid' : 'form-control'"
                                                    placeholder="E-mail" autocomplete="on" />
                                            </div>
                                            <ErrorMessage name="email" class="d-flex flex-row invalid-feedback"
                                                v-slot="{ message }" as="div">
                                                {{ message }}
                                            </ErrorMessage>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <div class="d-flex flex-row mb-1">
                                                <label for="password"
                                                    class="text-end text-nowrap me-2 align-content-center">Senha:
                                                </label>
                                                <Field name="password" type="password" id="password" v-model="password"
                                                    :class="(errors.password) ? 'form-control is-invalid' : 'form-control'"
                                                    placeholder="Senha" autocomplete="off" />
                                            </div>
                                            <ErrorMessage name="password" class="d-flex flex-row invalid-feedback"
                                                v-slot="{ message }" as="div">
                                                {{ message }}
                                            </ErrorMessage>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-12 text-center">
                                                <Field name="remember" type="checkbox" id="remember" v-model="remember"
                                                    :class="'form-check-input'" autocomplete="off" :checked="false"
                                                    :value="true" />
                                                <label class="form-check-label" for="remember">&nbsp;Salvar minhas
                                                    informações de
                                                    login</label>
                                            </div>
                                        </div>
                                        <div class="row mt-3 ps-5 pe-5">
                                            <button id="login" name="login" class="btn btn-light" type="submit"
                                                ref="loginButton" :disabled="loginButtonDisabled"><i
                                                    class="fa-solid fa-arrow-right-to-bracket"></i>
                                                Entrar</button>
                                        </div>
                                    </Form>
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
                                    <RouterLink to="/registration">ENTRAR JÁ</RouterLink>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row w-100 copyright-footer mt-2" id="footer">
                        <div class="col-12 text-center">
                            &#169; {{ currentYear }} Yorkut - <a href="#">Sobre o Yorkut</a> - <a href="#">Central de
                                segurança</a> - <a href="#">Privacidade</a> - <a href="#">Termos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="module">
    import axios from 'axios';
    import Swal from 'sweetalert2';
    import { Field, Form, ErrorMessage, useField } from 'vee-validate';
    import { pt } from 'yup-locale-pt';
    import * as yup from 'yup';
    export default {
        name: "Welcome Component",
        components: {
            Field,
            Form,
            ErrorMessage
        },
        setup(props, ctx) {
            yup.setLocale(pt);

            const { value: email } = useField('email');
            const { value: password } = useField('password');
            const { value: remember } = useField('remember', false);

            const schema = yup.object({
                email: yup.string()
                    .email("E-mail inválido.")
                    .required("O e-mail é obrigatório."),
                password: yup.string()
                    .min(8, "A senha deve possuir no mínimo 8 caracteres.")
                    .max(32, "A senha deve possuir no máximo 32 caracteres.")
                    .required("A senha é obrigatória.")
                    .matches(/[a-z]/, 'A senha deve conter ao menos uma letra minúscula.')
                    .matches(/[A-Z]/, 'A senha deve conter ao menos uma letra maiúscula.')
                    .matches(/[0-9]/, 'A senha deve conter ao menos um número.')
                    .matches(/[!@#$%^&*(),.?":{}|<>]/, 'A senha deve conter ao menos um caractere especial.')
            });

            return {
                context: ctx,
                currentYear: new Date().getFullYear(),
                email: email,
                loginButtonDisabled: false,
                password: password,
                props: props,
                remember: remember,
                schema: schema,
            }
        },
        methods: {
            submitForm(values) {
                console.log("Valores do formulário:", values);
                this.loginButtonDisabled = true;
                axios.get('api/sanctum/csrf-cookie').then(response => {
                    console.log("Sanctum response: ", response, response.data);
                    axios.post('api/login', values).then((resp) => {
                        console.log(resp);
                        if (resp.status === 200) {
                            Swal.fire({
                                title: 'Pronto!',
                                text: 'Você está logado com sucesso.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                this.$router.push({ name: 'Bem Vindo' });
                            });
                        } else {
                            Swal.fire({
                                title: 'Erro!',
                                text: resp.data.message,
                                icon: 'error',
                                confirmButtonText: 'Tentar novamente'
                            });
                            this.loginButtonDisabled = false;
                        }
                    }).catch(error => {
                        console.error("Erro ao fazer login:", error);
                        Swal.fire({
                            title: 'Erro!',
                            text: 'Não foi possível fazer login. Tente novamente.',
                            icon: 'error',
                            confirmButtonText: 'Tentar novamente'
                        });
                    });
                }).catch(error => {
                    console.error("Erro ao obter o cookie CSRF:", error);
                });
                //this.$refs.form.submit();
            }
        }
    }
</script>

<style lang="sass"
    scoped>

</style>