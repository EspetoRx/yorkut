<template>
    <div class="bg-color w-100 min-height-vh100 pb-2">
        <div class="container-fluid ps-0 pe-0">
            <HeaderTopNavbar></HeaderTopNavbar>
            <div class="container bg-white rounded-1 mt-2">
                <div class="d-flew flex-row w-100">
                    <Form :validation-schema="schema" v-slot="{errors, validate}">
                        <div class="fs-3 d-flex flex-inline">Boas vindas ao <div class="ms-1 navbar-title-2">yorkut!</div>
                        </div>
                        <div>Só precisamos confirmar algumas coisas antes de você começar a usar o yorkut.</div>
                        <div
                            class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-baseline">
                                <label for="email" class="text-nowrap me-2">E-mail:</label>
                                <Field name="email" type="email" id="email" :class="(errors.email)?'form-control is-invalid':'form-control'" placeholder="E-mail" autocomplete="on"/>
                            </div>
                            <ErrorMessage name="email" class="d-flex flex-row invalid-feedback"></ErrorMessage>
                        </div>
                        <div
                            class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-baseline">
                                <label for="password" class="text-nowrap me-2">Senha:</label>
                                <Field name="password" type="password" id="password" :class="(errors.password)?'form-control is-invalid':'form-control'" placeholder="Senha" autocomplete="off"/>
                            </div>
                            <ErrorMessage name="password" class="d-flex flex-row invalid-feedback"></ErrorMessage>
                        </div>
                        <div
                            class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-baseline">
                                <label for="password_confirmation" class="text-nowrap me-2">Confirmação de senha:</label>
                                <Field name="password_confirmation" type="password" id="password_confirmation" :class="(errors.password_confirmation)?'form-control is-invalid':'form-control'" placeholder="Confirmação de senha" autocomplete="off"/>
                            </div>
                            <ErrorMessage name="password_confirmation" class="d-flex flex-row invalid-feedback"></ErrorMessage>
                        </div>
                        <div
                            class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-baseline">
                                <label for="birthdate" class="text-nowrap me-2">Data de nascimento:</label>
                                <Field name="birthdate" type="date" id="birthdate" :class="(errors.birthdate)?'form-control is-invalid':'form-control'" placeholder="Confirmação de senha" autocomplete="off" :max="maxDate" :min="minDate"/>
                            </div>
                            <ErrorMessage name="birthdate" class="d-flex flex-row invalid-feedback"></ErrorMessage>
                        </div>
                        <div
                            class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-baseline">
                                <label for="name" class="text-nowrap me-2">Nome:</label>
                                <Field name="name" type="text" id="name" :class="(errors.name)?'form-control is-invalid':'form-control'" placeholder="Nome" autocomplete="on"/>
                            </div>
                            <ErrorMessage name="name" class="d-flex flex-row invalid-feedback"></ErrorMessage>
                        </div>
                        <div
                            class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-baseline">
                                <label for="sirname" class="text-nowrap me-2">Sobrenome:</label>
                                <Field name="sirname" type="text" id="sirname" :class="(errors.sirname)?'form-control is-invalid':'form-control'" placeholder="Sobrenome" autocomplete="on"/>
                            </div>
                            <ErrorMessage name="sirname" class="d-flex flex-row invalid-feedback"></ErrorMessage>
                        </div>
                        <div
                            class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-baseline">
                                <div class="me-2">Sexo:</div>
                                <div class="form-check form-check-inline">
                                    <Field name="sex" type="radio" id="maleRadio" value="male" :class="(errors.sex)?'form-check-input is-invalid':'form-check-input'" autocomplete="on"/>
                                    <label class="form-check-label" for="maleRadio">Masculino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <Field name="sex" type="radio" id="femaleRadio" value="female" :class="(errors.sex)?'form-check-input is-invalid':'form-check-input'" autocomplete="on"/>
                                    <label class="form-check-label" for="femaleRadio">Feminino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <Field name="sex" type="radio" id="otherRadio" value="none" :class="(errors.sex)?'form-check-input is-invalid':'form-check-input'" autocomplete="on"/>
                                    <label class="form-check-label" for="otherRadio">Prefiro não dizer</label>
                                </div>
                            </div>
                            <ErrorMessage name="sex" class="d-flex flex-row invalid-feedback"></ErrorMessage>
                        </div>
                        <div
                            class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-baseline">
                                <label for="country" class="typo__label text-nowrap me-2">País:</label>
                                <Field name="country" v-slot="{ field, validate }">
                                    <Multiselect
                                        :allow-empy="false"
                                        :multiselect="false" 
                                        :options="paises"
                                        deselectGroup="Pressione enter para remover grupo"
                                        deselectLabel="Pressione enter para remover"
                                        id="country"
                                        label="nome_pais" 
                                        placeholder="País" 
                                        name="country"
                                        selectGroupLabel="Pressione enter para selecionar grupo"
                                        selectedLabel="Selecionado"
                                        selectLabel="Pressione enter para selecionar"
                                        track_by="nome_pais" 
                                        v-model="field.value"
                                        v-bind="field"
                                        @close="validate()"
                                        :class="(errors.country)?'is-invalid':''"
                                        >

                                        <template v-slot:noResult>
                                            <span>Nenhum elemento encontrado. Considere modificar os termos de pesquisa.</span>
                                        </template>
                                        <template v-slot:maxElements>
                                            <span>Número máximo de elementos selecionados. Primeiro remova algo selecionado para adicionar outro.</span>
                                        </template>
                                        <template v-slot:noOptions>
                                            <span>A lista está vazia.</span>
                                        </template>
                                        
                                    </Multiselect>
                                </Field>
                            </div>
                            <ErrorMessage name="country" class="d-flex flex-row invalid-feedback"></ErrorMessage>
                        </div>
                        <div
                            class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-bottom">
                                <Field name="terms" type="checkbox" id="terms" :checked="false" :class="(errors.terms)?'form-check is-invalid me-2':'form-check me-2'" :value="true"/>
                                <label for="terms" class="text-wrap me-2">Sei que devo ter 18 anos ou mais para usar o Yorkut. Tenho 18 anos ou mais 
                                    e aceito cumprir o <a href="#">Estatuto da comunidade</a> ao usar o Yorkut. Também concordo com esses <a href="#">
                                        termos adicionais</a>.
                                </label>
                            </div>
                            <ErrorMessage name="terms" class="d-flex flex-row invalid-feedback"></ErrorMessage>
                        </div>
                        <div class="mt-1 blue-background-register rounded p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-center justify-content-center">
                                <Field name="captcha" v-slot="{ validate }" v-model="captchaAcceptance">
                                    <vue-hcaptcha :sitekey="hCaptchaKey" :language="'pt'" @verify="(token, eKey) => {markCaptchaAsVerified(token, eKey); validate()}" :size="'normal'"></vue-hcaptcha>
                                </Field>
                            </div>
                            <ErrorMessage name="captcha" class="d-flex flex-row invalid-feedback"></ErrorMessage>
                        </div>
                        <div class="mt-1 p-2 mb-2">
                            <div class="d-flex flex-inline w-100 align-items-center justify-content-center">
                                <button class="btn bt-sm btn-outline-primary" :disabled="captchaAcceptance == null">Tudo certo, pode criar a minha conta</button>
                            </div>
                        </div>
                    </Form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

    import { Form, Field, ErrorMessage } from 'vee-validate';
    import { pt } from 'yup-locale-pt';
    import { ref } from 'vue';
    import moment from 'moment';
    import Multiselect from 'vue-multiselect';
    import Paises from './../../../assets/json/paises-gentilicos-google-maps.json';
    import HeaderTopNavbar from './helpers.vue/HeaderTopNavbar.vue';
    import VueHcaptcha from '@hcaptcha/vue3-hcaptcha';
    import * as yup from 'yup';
    import 'vue-multiselect/dist/vue-multiselect.min.css';

    export default {
        components: {
            ErrorMessage,
            Field,
            Form,
            Multiselect,
            HeaderTopNavbar,
            VueHcaptcha
        },
        setup(props, ctx) {
            yup.setLocale(pt);

            let maxDate = new Date();
            maxDate.setFullYear( maxDate.getFullYear() - 18 );
            let formatedDate = moment(maxDate).format("YYYY-MM-DD");
            let minDate = new Date();
            minDate.setFullYear( minDate.getFullYear() - 100 );
            let formatedMinDate = moment(minDate).format("YYYY-MM-DD")

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
                         .required("Seu nome é obrigatório."),
                sirname: yup.string()
                         .required("Seu sobrenome é obrigatório."),
                sex: yup.string()
                        .required("Seu sexo é obrigatório."),
                country: yup.object()
                            .required("O seu país é obrigatório."),
                terms: yup.boolean()
                          .required("Os termos de aceite são obrigatórios.")
                          .oneOf([true],'Você deve aceitar os termos para participar do Yorkut.'),
                captcha: yup.object({
                                token: yup.string()
                                          .required("Token não retornado."),
                                eKey: yup.string()
                                         .required("eKey não retornada.")
                            })
                            .required("É obrigatório completar o desafio.")
            });

            return {
                chosenCountry: ref(null),
                hCaptchaKey: import.meta.env.VITE_H_CAPTCHA_SITE_KEY,
                hCaptchaSecret: import.meta.env.VITE_H_CAPTCHA_SITE_SECRET,
                maxDate: formatedDate,
                minDate: formatedMinDate,
                paises: Paises,
                schema: schema,
                captchaAcceptance: ref(null),
            }
        },
        methods: {
            customLabel({ gentilico, nome_pais, nome_pais_int, sigla }) {
                return `${nome_pais}`
            },
            submitForm() {
                alert(JSON.stringify(values, null, 2));
            },
            markCaptchaAsVerified(token, eKey) {
                console.log("Marked acceptance as verified:", token, eKey);
                this.captchaAcceptance = ref({token: token, eKey: eKey});
            }
        },
    }
</script>
<style lang="scss"
    scoped>
</style>