<template>
    <div class="card-body">
        <button class="btn btn-warning" id="btn-open-modal-register-role" @click="$vm2.open('modal-2')">Añadir Permiso
        </button>
        <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Guard</th>
                <th>Fecha de creación</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="(permission, index) in listPermissions" :key="index">
                    <td>{{ index +1 }}</td>
                    <td>{{ permission.name }}</td>
                    <td>{{ permission.description }}</td>
                    <td>{{ permission.guard_name }}</td>
                    <td>{{ permission.created_at }}</td>
                    <td nowrap="nowrap">
                        <a @click="editPermission(permission)" class="btn btn-sm btn-clean btn-icon mr-2" title="Editar rol">
                        <span class="svg-icon svg-icon-md">
                            <i class="fa fa-edit"></i>
                        </span>
                        </a>
                        <a @click="deletePermission(permission)" class="btn btn-sm btn-clean btn-icon" title="Eliminar rol">
                        <span class="svg-icon svg-icon-md">
                             <i class="fa fa-trash"></i>
                        </span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

        <modal-vue
            @on-close="$vm2.close('modal-2')"
            name="modal-2"
            modalSize="lg"
            :headerOptions="{
                title: stateEdit ? 'Editar permiso' : 'Registrar permiso',
            }"
            :footerOptions="{
                btn1: 'Cancelar',
                btn2: stateEdit ? 'Editar' : 'Registrar',
                btn2Style: {
                  backgroundColor: 'success',
                },
                btn1OnClick: () => {
                    clearFormData();
                    $vm2.close('modal-2');
                },
                btn2OnClick: () => {
                  stateEdit ? updatePermission() :createPermission();
                },

            }"
        >

            <form class="form m-5">
                <div class="form-group validated">
                    <label for="nombre_rol">Nombre (*)</label>
                    <input id="nombre_rol" type="text" :class="{'is-invalid' : errors.name}"
                           class="form-control form-control-solid" name="name"
                           v-model="data.name"/>
                </div>
                <div class="form-group validated">
                    <label for="description_rol">Descripción (*)</label>
                    <input id="description_rol" type="text" :class="{'is-invalid' : errors.description}"
                           class="form-control form-control-solid"
                           name="description" v-model="data.description"/>
                </div>
            </form>
        </modal-vue>
    </div>
</template>

<script>
import {routesApi, routesApp} from "../../service";

export default {
    name: 'TablePermissions',
    data() {
        return {
            listPermissions: [],
            data: {
                id: '',
                name: '',
                description: '',
            },
            errors: {
                name: '',
                description: '',
            },
            stateEdit: false
        }
    },
    mounted() {
        this.getPermissions();
    },

    methods: {
        async getPermissions() {
            let me = this;
            try {
                const response = await routesApi(HOST_URL).get(`/permisos`)
                if (Object.entries(response).length !== 0) {
                    me.listPermissions = response.data.data
                }
            } catch (e) {
                console.log(e.response)
                if (Object.entries(e.response).length !== 0) {
                    const {status, data} = e.response;
                    if (status === 422) {
                        return;

                    } else {
                        toastr.error('Comunicate con los administradores del sistema.', 'Error de Servidor!')
                        return;
                    }
                }
                toastr.error('Comunicate con los administradores del sistema.', 'Error de Servidor!')
            }
        },

        async createPermission(){
          let me = this;
            try {
                const response = await routesApp(HOST_URL).post(`/permisos`, {
                    name: me.data.name,
                    description: me.data.description,
                })
                console.log(response);
                if (Object.entries(response).length !== 0 && response.status === 200) {
                    me.clearErrorsForm();
                    me.clearFormData();
                    me.$vm2.close('modal-2');
                    toastr.success(`${response.data}`, 'Felicitaciones!!');
                    await me.getPermissions();
                }
            } catch (e) {
                if (Object.entries(e.response).length !== 0) {
                    const {status, data} = e.response;
                    if (status === 422) {
                        const {errors: {name, description}} = data;
                        if (name) this.showMessageError(name, 'name')
                        if (description) this.showMessageError(description, 'description')
                        return;

                    } else {
                        toastr.error('Comunicate con los administradores del sistema.', 'Error de Servidor!')
                        return;
                    }
                }

                toastr.error('Comunicate con los administradores del sistema.', 'Error de Servidor!')
            }
        },

        async updatePermission(){
          let me = this;
            try {
                const response = await routesApp(HOST_URL).put(`/permisos/${me.data.id}`, {
                    id: me.data.id,
                    name: me.data.name,
                    description: me.data.description,
                })
                console.log(response);
                if (Object.entries(response).length !== 0 && response.status === 200) {
                    me.stateEdit = false;
                    me.clearErrorsForm();
                    me.clearFormData();
                    me.$vm2.close('modal-2');
                    toastr.success(`${response.data}`, 'Felicitaciones!!');
                    await me.getPermissions();
                }
            } catch (e) {
                if (Object.entries(e.response).length !== 0) {
                    const {status, data} = e.response;
                    if (status === 422) {
                        const {errors: {name, description}} = data;
                        if (name) this.showMessageError(name, 'name')
                        if (description) this.showMessageError(description, 'description')
                        return;

                    } else {
                        toastr.error('Comunicate con los administradores del sistema.', 'Error de Servidor!')
                        return;
                    }
                }

                toastr.error('Comunicate con los administradores del sistema.', 'Error de Servidor!')
            }
        },

        editPermission(permission) {
            let me = this;
            me.clearErrorsForm();
            me.stateEdit = true;
            me.$vm2.open('modal-2');
            me.data.id = permission.id;
            me.data.name = permission.name;
            me.data.description = permission.description;
        },
        deletePermission(permission){
            let me = this;
            swal.fire({
                title: `¿Desea eliminar el permiso ${permission.name}?`,
                text: `Eliminar un permiso es permanente. No es posible deshacer la operación. ¿Desea continuar?`,
                icon: "warning",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: "Si eliminar!",
                cancelButtonText: "Cancelar",
            }).then(async function (result) {
                if (result.value) {
                    const response = await routesApp(HOST_URL).delete(`/permisos/${permission.id}`)
                    if (Object.entries(response).length !== 0 && response.status === 200) {
                        toastr.success(`${response.data}`, 'Felicitaciones!!');
                        await me.getPermissions();
                    }
                }
            });
        },

        showMessageError(value, key) {
            toastr.error(`${value[0]}`, 'Lo sentimos!');
            this.errors[key] = value[0];
        },

        clearErrorsForm() {
            this.errors.name = '';
            this.errors.description = '';
        },
        clearFormData() {
            this.data.id='';
            this.data.name = '';
            this.data.description = '';
        }
    }
}
</script>

<style scoped>

</style>
<script setup>
</script>
