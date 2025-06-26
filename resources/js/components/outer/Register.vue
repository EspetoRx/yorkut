<template>
    <div class="bg-color w-100 min-height-vh100 pb-2">
        <div class="container-fluid ps-0 pe-0">
            <HeaderTopNavbar></HeaderTopNavbar>
            <div class="container bg-white rounded-1 mt-2">
                <div class="d-flew flex-row w-100">
                    <Form :validation-schema="schema" @submit="submitForm" v-slot="{ resetForm, errors }" ref="form">
                        <div class="fs-3 d-flex flex-inline">Boas vindas ao <div class="ms-1 navbar-title-2">yorkut!
                            </div>
                        </div>
                        <div>Só precisamos confirmar algumas coisas antes de você começar a usar o yorkut.</div>
                        <div class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-baseline">
                                <label for="email" class="text-nowrap me-2">E-mail:</label>
                                <Field name="email" type="email" id="email" v-model="email"
                                    :class="(errors.email) ? 'form-control is-invalid' : 'form-control'"
                                    placeholder="E-mail" autocomplete="on" />
                            </div>
                            <ErrorMessage name="email" class="d-flex flex-row invalid-feedback" v-slot="{ message }"
                                as="div">
                                {{ errors.email }}
                            </ErrorMessage>
                        </div>
                        <div class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-baseline">
                                <label for="password" class="text-nowrap me-2">Senha:</label>
                                <Field name="password" type="password" id="password" v-model="password"
                                    :class="(errors.password) ? 'form-control is-invalid' : 'form-control'"
                                    placeholder="Senha" autocomplete="off" />
                            </div>
                            <ErrorMessage name="password" class="d-flex flex-row invalid-feedback" v-slot="{ message }"
                                as="div">
                                {{ errors.password }}
                            </ErrorMessage>
                        </div>
                        <div class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-baseline">
                                <label for="password_confirmation" class="text-nowrap me-2">Confirmação de
                                    senha:</label>
                                <Field name="password_confirmation" type="password" id="password_confirmation"
                                    v-model="password_confirmation"
                                    :class="(errors.password_confirmation) ? 'form-control is-invalid' : 'form-control'"
                                    placeholder="Confirmação de senha" autocomplete="off" />
                            </div>
                            <ErrorMessage name="password_confirmation" class="d-flex flex-row invalid-feedback"
                                v-slot="{ message }" as="div">
                                {{ errors.password_confirmation }}
                            </ErrorMessage>
                        </div>
                        <div class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-baseline">
                                <label for="birthdate" class="text-nowrap me-2">Data de nascimento:</label>
                                <Field name="birthdate" type="date" id="birthdate" v-model="birthdate"
                                    :class="(errors.birthdate) ? 'form-control is-invalid' : 'form-control'"
                                    placeholder="Confirmação de senha" autocomplete="off" :max="maxDate"
                                    :min="minDate" />
                            </div>
                            <ErrorMessage name="birthdate" class="d-flex flex-row invalid-feedback" v-slot="{ message }"
                                as="div">
                                {{ errors.birthdate }}
                            </ErrorMessage>
                        </div>
                        <div class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-baseline">
                                <label for="name" class="text-nowrap me-2">Nome:</label>
                                <Field name="name" type="text" id="name" v-model="name"
                                    :class="(errors.name) ? 'form-control is-invalid' : 'form-control'"
                                    placeholder="Nome" autocomplete="on" />
                            </div>
                            <ErrorMessage name="name" class="d-flex flex-row invalid-feedback" v-slot="{ message }"
                                as="div">
                                {{ errors.name }}
                            </ErrorMessage>
                        </div>
                        <div class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-baseline">
                                <label for="sirname" class="text-nowrap me-2">Sobrenome:</label>
                                <Field name="sirname" type="text" id="sirname" v-model="sirname"
                                    :class="(errors.sirname) ? 'form-control is-invalid' : 'form-control'"
                                    placeholder="Sobrenome" autocomplete="on" />
                            </div>
                            <ErrorMessage name="sirname" class="d-flex flex-row invalid-feedback" v-slot="{ message }"
                                as="div">
                                {{ errors.sirname }}
                            </ErrorMessage>
                        </div>
                        <div class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-baseline">
                                <div class="me-2">Sexo:</div>
                                <div class="form-check form-check-inline">
                                    <Field name="sex" type="radio" id="maleRadio" value="male"
                                        :class="(errors.sex) ? 'form-check-input is-invalid' : 'form-check-input'"
                                        autocomplete="on" />
                                    <label class="form-check-label" for="maleRadio">Masculino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <Field name="sex" type="radio" id="femaleRadio" value="female"
                                        :class="(errors.sex) ? 'form-check-input is-invalid' : 'form-check-input'"
                                        autocomplete="on" />
                                    <label class="form-check-label" for="femaleRadio">Feminino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <Field name="sex" type="radio" id="otherRadio" value="none"
                                        :class="(errors.sex) ? 'form-check-input is-invalid' : 'form-check-input'"
                                        autocomplete="on" />
                                    <label class="form-check-label" for="otherRadio">Prefiro não dizer</label>
                                </div>
                            </div>
                            <ErrorMessage name="sex" class="d-flex flex-row invalid-feedback" v-slot="{ message }"
                                as="div">
                                {{ errors.sex }}
                            </ErrorMessage>
                        </div>
                        <div class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-baseline">
                                <label for="country" class="typo__label text-nowrap me-2">País:</label>
                                <Field name="country" v-slot="{ field, validate }" v-model="country">
                                    <Multiselect :allow-empy="false" :multiselect="false" :options="paises"
                                        deselectGroup="Pressione enter para remover grupo"
                                        deselectLabel="Pressione enter para remover" id="country" label="nome_pais"
                                        placeholder="País" name="country"
                                        selectGroupLabel="Pressione enter para selecionar grupo"
                                        selectedLabel="Selecionado" selectLabel="Pressione enter para selecionar"
                                        track_by="nome_pais" v-model="field.value" v-bind="field"
                                        @select="setSelectedCountry" @close="validate"
                                        :class="(errors.country) ? 'is-invalid' : ''">

                                        <template v-slot:noResult>
                                            <span>Nenhum elemento encontrado. Considere modificar os termos de
                                                pesquisa.</span>
                                        </template>
                                        <template v-slot:maxElements>
                                            <span>Número máximo de elementos selecionados. Primeiro remova algo
                                                selecionado para adicionar outro.</span>
                                        </template>
                                        <template v-slot:noOptions>
                                            <span>A lista está vazia.</span>
                                        </template>

                                    </Multiselect>
                                </Field>
                            </div>
                            <ErrorMessage name="country" class="d-flex flex-row invalid-feedback" v-slot="{ message }"
                                as="div">
                                {{ errors.country }}
                            </ErrorMessage>
                        </div>
                        <div class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-bottom">
                                <Field name="terms" type="checkbox" id="terms" :checked="false"
                                    :class="(errors.terms) ? 'form-check is-invalid me-2' : 'form-check me-2'"
                                    :value="true" />
                                <label for="terms" class="text-wrap me-2">Sei que devo ter 18 anos ou mais para usar o
                                    Yorkut. Tenho 18 anos ou mais
                                    e aceito cumprir o <a href="#">Estatuto da comunidade</a> ao usar o Yorkut. Também
                                    concordo com esses <a href="#">
                                        termos adicionais</a>.
                                </label>
                            </div>
                            <ErrorMessage name="terms" class="d-flex flex-row invalid-feedback" v-slot="{ message }"
                                as="div">
                                {{ errors.terms }}
                            </ErrorMessage>
                        </div>
                        <div class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-center justify-content-center">
                                <Field name="captcha" v-slot="{ validate }" v-model="captcha">
                                    <vue-hcaptcha :sitekey="hCaptchaKey" :language="'pt'"
                                        @verify="(token, eKey) => { markCaptchaAsVerified(token, eKey); validate() }"
                                        :size="'normal'"></vue-hcaptcha>
                                </Field>
                            </div>
                            <ErrorMessage name="captcha" class="d-flex flex-row invalid-feedback" v-slot="{ message }"
                                as="div">
                                {{ errors.captcha }}
                            </ErrorMessage>
                        </div>
                        <div class="mt-1 p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-center justify-content-around">
                                <button class="btn btn-sm btn-outline-secondary" @click="resetForm({
                                    values: {
                                        email: '',
                                        password: '',
                                        password_confirmation: '',
                                        birthdate: '',
                                        name: '',
                                        sirname: '',
                                        sex: '',
                                        country: null,
                                        terms: false,
                                        captcha: null
                                    }
                                })" type="button">
                                    <i class="fa-solid fa-broom"></i> Limpar formulário
                                </button>
                                <button class="btn btn-sm btn-outline-primary" :disabled="captcha == null">
                                    <i class="fa-solid fa-check"></i> Tudo
                                    certo, pode criar a minha conta</button>
                            </div>
                        </div>
                    </Form>
                </div>
            </div>
            <FooterBottomNavbar></FooterBottomNavbar>
        </div>
    </div>
</template>
<script>

    import { Form, Field, ErrorMessage, useForm, useField } from 'vee-validate';
    import { pt } from 'yup-locale-pt';
    import { ref } from 'vue';
    import axios from 'axios';
    import FooterBottomNavbar from './helpers/FooterBottomNavbar.vue';
    import moment from 'moment';
    import Multiselect from 'vue-multiselect';
    import Paises from './../../../assets/json/paises-gentilicos-google-maps.json';
    import HeaderTopNavbar from './helpers/HeaderTopNavbar.vue';
    import Swal from 'sweetalert2';
    import VueHcaptcha from '@hcaptcha/vue3-hcaptcha';
    import * as yup from 'yup';
    import 'vue-multiselect/dist/vue-multiselect.min.css';
    export default {
        components: {
            ErrorMessage,
            Field,
            FooterBottomNavbar,
            Form,
            Multiselect,
            HeaderTopNavbar,
            VueHcaptcha
        },
        setup(props, ctx) {
            yup.setLocale(pt);

            let maxDate = new Date();
            maxDate.setFullYear(maxDate.getFullYear() - 18);
            let formatedDate = moment(maxDate).format("YYYY-MM-DD");
            let minDate = new Date();
            minDate.setFullYear(minDate.getFullYear() - 100);
            let formatedMinDate = moment(minDate).format("YYYY-MM-DD")

            const { value: email } = useField('email');
            const { value: password } = useField('password');
            const { value: password_confirmation } = useField('password_confirmation');
            const { value: birthdate } = useField('birthdate');
            const { value: name } = useField('name');
            const { value: sirname } = useField('sirname');
            const { value: sex } = useField('sex');
            const { value: country } = useField('country');
            const { value: terms } = useField('terms');
            const { value: captcha } = useField('captcha');

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
                    .matches(/[!@#$%^&*(),.?":{}|<>]/, 'A senha deve conter ao menos um caractere especial.'),
                password_confirmation: yup.string()
                    .oneOf([yup.ref('password'), null], 'As senhas devem ser iguais.')
                    .required('Confirmação de senha é obrigatório.'),
                birthdate: yup.date()
                    .max(maxDate, 'Voce não pode ter menos que 18 anos.')
                    .required("Sua data de nascimento é obrigatória.")
                    .min(minDate, "Você não pode ter mais de um século de vida."),
                name: yup.string()
                    .required("Seu nome é obrigatório.")
                    .min(2, "Seu nome deve possuir ao menos dois caracteres")
                    .max(191, "Seu nome pode ter no máximo 20 caracteres."),
                sirname: yup.string()
                    .required("Seu sobrenome é obrigatório.")
                    .min(2, "Seu sobrenome deve possuir ao menos dois caracteres")
                    .max(191, "Seu nome pode ter no máximo 20 caracteres."),
                sex: yup.string()
                    .required("Seu sexo é obrigatório.")
                    .oneOf(['male', 'female', 'other'], 'Você deve aceitar os termos para participar do Yorkut.'),
                country: yup.object()
                    .typeError("O seu país é obrigatório.")
                    .required("O seu país é obrigatório."),
                terms: yup.boolean()
                    .required("Os termos de aceite são obrigatórios.")
                    .oneOf([true], 'Você deve aceitar os termos para participar do Yorkut.'),
                captcha: yup.object({
                    token: yup.string()
                        .required("Token não retornado."),
                    eKey: yup.string()
                        .required("eKey não retornada.")
                })
                    .required("É obrigatório completar o desafio.")
            });

            return {
                birthdate: birthdate,
                captcha: captcha,
                country: country,
                email: email,
                hCaptchaKey: import.meta.env.VITE_H_CAPTCHA_SITE_KEY,
                hCaptchaSecret: import.meta.env.VITE_H_CAPTCHA_SITE_SECRET,
                maxDate: formatedDate,
                minDate: formatedMinDate,
                name: name,
                paises: Paises,
                password: password,
                password_confirmation: password_confirmation,
                terms: terms,
                captcha: captcha,
                schema: schema,
                sex: sex,
                sirname: sirname,
                //validateField: validateField
            }
        },
        methods: {
            customLabel({ gentilico, nome_pais, nome_pais_int, sigla }) {
                return `${nome_pais}`
            },
            submitForm(values) {
                Swal.fire({
                    title: 'Aguarde!',
                    text: 'Estamos tentando te registrar...',
                    showConfirmButton: false,
                    showCancelButton: false,
                    showCloseButton: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                axios.post('/api/register', values)
                    .then((resp) => {
                        Swal.fire({
                            title: 'Pronto!',
                            text: 'Agora você já pode fazer Login.',
                            icon: 'success',
                            confirmButtonText: '<i class="fa-solid fa-arrow-left"></i> Redirecionar para Login.',
                            showCloseButton: true,
                            showConfirmButton: true,
                            customClass: {
                                confirmButton: 'btn btn-outline-primary'
                            },
                            didOpen: () => {
                                Swal.hideLoading();
                            },
                            didClose: () => {
                                window.location.href = "/";
                            }
                        });
                    })
                    .catch((err) => {
                        Swal.fire({
                            title: 'Eita...',
                            text: 'Não foi possível te registrar. Veja se retornou algum erro no formulário.',
                            icon: 'error',
                            cancelButtonText: '<i class="fa-solid fa-bomb"></i> Fazer o que...',
                            showConfirmButton: false,
                            showCloseButton: true,
                            customClass: {
                                confirmButton: 'btn btn-outline-danger'
                            },
                            didOpen: () => {
                                Swal.hideLoading();
                            },
                        });

                        if (typeof err.response.data.errors != 'undefined') {
                            if (Object.hasOwn(err.response.data.errors, 'email') && Array.isArray(err.response.data.errors.email)) {
                                this.$refs.form.setFieldError("email", err.response.data.errors.email[0]);
                            }
                            if (Object.hasOwn(err.response.data.errors, 'password') && Array.isArray(err.response.data.errors.password)) {
                                this.$refs.form.setFieldError("password", err.response.data.errors.password[0]);
                            }
                            if (Object.hasOwn(err.response.data.errors, 'password_confirmation') && Array.isArray(err.response.data.errors.password_confirmation)) {
                                this.$refs.form.setFieldError("password_confirmation", err.response.data.errors.password_confirmation[0]);
                            }
                            if (Object.hasOwn(err.response.data.errors, 'birthdate') && Array.isArray(err.response.data.errors.birthdate)) {
                                this.$refs.form.setFieldError("birthdate", err.response.data.errors.birthdate[0]);
                            }
                            if (Object.hasOwn(err.response.data.errors, 'name') && Array.isArray(err.response.data.errors.name)) {
                                this.$refs.form.setFieldError("name", err.response.data.errors.name[0]);
                            }
                            if (Object.hasOwn(err.response.data.errors, 'sirname') && Array.isArray(err.response.data.errors.sirname)) {
                                this.$refs.form.setFieldError("sirname", err.response.data.errors.sirname[0]);
                            }
                            if (Object.hasOwn(err.response.data.errors, 'sex') && Array.isArray(err.response.data.errors.sex)) {
                                this.$refs.form.setFieldError("sex", err.response.data.errors.sex[0]);
                            }
                            if (Object.hasOwn(err.response.data.errors, 'country') && Array.isArray(err.response.data.errors.country)) {
                                this.$refs.form.setFieldError("country", err.response.data.errors.country[0]);
                            }
                            if (Object.hasOwn(err.response.data.errors, 'country.gentilico') && Array.isArray(err.response.data.errors.country.gentilico)) {
                                this.$refs.form.setFieldError("country", err.response.data.errors.country.gentilico[0]);
                            }
                            if (Object.hasOwn(err.response.data.errors, 'country.nome_pais') && Array.isArray(err.response.data.errors.country.nome_pais)) {
                                this.$refs.form.setFieldError("country", err.response.data.errors.country.nome_pais[0]);
                            }
                            if (Object.hasOwn(err.response.data.errors, 'country.nome_pais_int') && Array.isArray(err.response.data.errors.country.nome_pais_int)) {
                                this.$refs.form.setFieldError("country", err.response.data.errors.country.nome_pais_int[0]);
                            }
                            if (Object.hasOwn(err.response.data.errors, 'country.sigla') && Array.isArray(err.response.data.errors.country.sigla)) {
                                this.$refs.form.setFieldError("country", err.response.data.errors.country.sigla[0]);
                            }
                            if (Object.hasOwn(err.response.data.errors, 'terms') && Array.isArray(err.response.data.errors.terms)) {
                                this.$refs.form.setFieldError("terms", err.response.data.errors.terms[0]);
                            }
                            if (Object.hasOwn(err.response.data.errors, 'captcha') && Array.isArray(err.response.data.errors.captcha)) {
                                this.$refs.form.setFieldError("captcha", err.response.data.errors.captcha[0]);
                            }
                            if (Object.hasOwn(err.response.data.errors, 'captcha.token') && Array.isArray(err.response.data.errors.captcha.token)) {
                                this.$refs.form.setFieldError("captcha", err.response.data.errors.captcha.token[0]);
                            }
                            if (Object.hasOwn(err.response.data.errors, 'captcha.eKey') && Array.isArray(err.response.data.errors.captcha.eKey)) {
                                this.$refs.form.setFieldError("captcha", err.response.data.errors.captcha.eKey[0]);
                            }
                        }
                    });
            },
            markCaptchaAsVerified(token, eKey) {
                this.captcha = ref({ token: token, eKey: eKey });
            },
            setSelectedCountry(value) {
                this.country = ref(value);
            }
        },
    }
</script>
<style lang="scss"
    scoped></style>