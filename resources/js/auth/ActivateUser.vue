<template>
    <div class="login-form pt-11" id="box-iniciar-registro" v-if="!searchStatus">
        <form class="form" novalidate="novalidate" id="form-iniciar-registro">
            <div class="text-center pb-8">
                <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Activar mi cuenta</h2>
                <p class="text-muted font-weight-bold font-size-h4">Ingresa tu número de CIP</p>
            </div>

            <div class="form-group">
                <input id="input-nro-cip"
                       class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text"
                       placeholder="Ingrese su número de CIP" v-model="cip" autocomplete="off"/>
            </div>

            <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                <button type="button" id="btn-iniciar-registro"
                        class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4"
                        @click="searchPersonal"
                >Consultar
                </button>
                <a
                    @click="redirectLogin"
                    type="button"
                    class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Cancelar</a>
            </div>
        </form>
    </div>
    <div class="login-form pt-11" id="box-finalizar-registro" v-else>

        <form @submit.prevent="activateUser" class="form" novalidate="novalidate" id="form-finalizar-registro"
              method="post">

            <div class="text-center pb-8">
                <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Activar usuario</h2>
                <p class="text-muted font-weight-bold font-size-h4">Si alguno de sus datos no son correctos, sírvase
                    actualizar</p>
            </div>

            <div class="form-group">
                <label for="data-nombrecompleto">Nombre Completo</label>
                <input id="data-nombrecompleto"
                       :class="`form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 ${searchStatus ? 'bg-success-o-30' : ''}`"
                       type="text"
                       autocomplete="off"
                       v-model="dataEfectivo.nombre_completo"

                />
            </div>

            <div class="form-group">
                <label for="data-cip">Nro. Cip</label>
                <input id="data-cip"
                       :class="`form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 ${searchStatus ? 'bg-success-o-30' : ''}`"
                       type="number"
                       autocomplete="off"
                       v-model="dataEfectivo.cip"
                />
            </div>

            <div class="form-group">
                <label for="data-uni_sql">Unidad</label>
                <input id="data-uni_sql"
                       :class="`form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 ${searchStatus ? 'bg-success-o-30' : ''}`"
                       type="text"
                       autocomplete="off"
                       v-model="dataEfectivo.unidad"
                />
            </div>

            <div class="form-group">
                <label for="data-correo">Correo Institucional</label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                       type="email"
                       placeholder="Correo Institucional"
                       v-model="dataEfectivo.correo_institucional"
                />
                <message-error :message="errors.correo_institucional"/>
            </div>

            <div class="form-group">
                <label for="data-celular">Número de celular</label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                       type="tel"
                       placeholder="Numero de celular"
                       v-model="dataEfectivo.celular_personal"
                />
                <message-error :message="errors.celular_personal"/>
            </div>

            <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                <button type="submit" id="kt_login_signup_submit"
                        class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4"
                >Activar usuario
                </button>
                <a type="button" id="kt_login_signup_cancel"
                   class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4"
                   @click="cancelRegister"
                >Cancelar</a>
            </div>

        </form>

    </div>
</template>

<script>
import MessageError from "../components/MessageError.vue";
import {routesApi, routesApp} from "../service";

export default {
    name: 'ActivateUser',
    components: {MessageError},
    data() {
        return {
            searchStatus: false,
            cip: '',
            dataEfectivo: {
                cip: '',
                correo_institucional: '',
                celular_personal: '',
                nombre_completo: '',
                unidad: ''
            },
            errors: {
                correo_institucional: '',
                celular_personal: ''
            }
        }
    },
    methods: {
        async searchPersonal() {
            let me = this;
            try {
                const response = await routesApi(HOST_URL).get(`/search-personal`, {params: {cip: me.cip}});
                if (Object.entries(response).length !== 0) {
                    me.searchStatus = true;
                    me.cip = '';
                    const {
                        basic_personal_data: {celular_personal, correo_institucional},
                        nombre,
                        unidad,
                        idusuarios
                    } = response.data.data;
                    me.dataEfectivo = {
                        cip: idusuarios,
                        nombre_completo: nombre,
                        correo_institucional: correo_institucional,
                        celular_personal: celular_personal,
                        unidad: unidad
                    };
                } else {
                    toastr.error('Comunicate con los administradores del sistema.', 'Error de Servidor!')
                }
            } catch (e) {
                if (Object.entries(e.response).length !== 0) {
                    const {status, data} = e.response;
                    if (status === 422) {
                        const {errors: {cip}} = data;
                        toastr.error(`${cip[0]}`, 'Lo sentimos!')
                        return;

                    } else if (status === 404) {
                        toastr.error('El número de CIP no existe o su cuenta ha sido desactivada.', 'Lo sentimos!')
                        $('#form-iniciar-registro').scrollTop();
                        me.cip = '';
                        return;
                    } else {
                        toastr.error('Comunicate con los administradores del sistema.', 'Error de Servidor!')
                        $('#form-iniciar-registro').scrollTop();
                        return;
                    }
                }
                toastr.error('Comunicate con los administradores del sistema.', 'Error de Servidor!')
            }
        },

        async activateUser() {
            let me = this;
            try {
                const response = await routesApp(HOST_URL).put(`/activar-usuario`, me.dataEfectivo)
                console.table({response});
                if (Object.entries(response).length !== 0) {
                    const message = `Usuario activado exitosamente. Ingrese sus credenciales para acceder al sistema`;
                    swal.fire({
                        text: `${message}`,
                        icon: "success",
                        buttonsStyling: true,
                        confirmButtonText: "Ok!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function () {
                        window.location.href = `${HOST_URL}/`;
                    });
                }
            } catch (e) {
                console.log(e.response)
                if (Object.entries(e.response).length !== 0) {
                    const {status, data} = e.response;
                    if (status === 422) {
                        const {errors: {correo_institucional, celular_personal, cip, unidad, nombre_completo}} = data;
                        if (cip) toastr.error(`${cip[0]}`, 'Lo sentimos!');
                        if (correo_institucional) toastr.error(`${correo_institucional[0]}`, 'Lo sentimos!');
                        if (celular_personal) toastr.error(`${celular_personal[0]}`, 'Lo sentimos!');
                        if (unidad) toastr.error(`${unidad[0]}`, 'Lo sentimos!');
                        if (nombre_completo) toastr.error(`${nombre_completo[0]}`, 'Lo sentimos!');
                        $('#form-iniciar-registro').scrollTop();
                        return;

                    } else {
                        toastr.error('Comunicate con los administradores del sistema.', 'Error de Servidor!')
                        $('#form-iniciar-registro').scrollTop();
                        return;
                    }
                }
                toastr.error('Comunicate con los administradores del sistema.', 'Error de Servidor!')
            }
        },
        cancelRegister() {
            let me = this
            me.dataEfectivo.cip = '';
            me.dataEfectivo.nombre_completo = '';
            me.dataEfectivo.unidad = '';
            me.dataEfectivo.correo_institucional = '';
            me.dataEfectivo.celular_personal = '';
            me.searchStatus = false
        },

        redirectLogin() {
            window.location.href = `${HOST_URL}/`;
        }
    }
}
</script>

