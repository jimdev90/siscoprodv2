<template>
    <div class="card-body">
        <button class="btn btn-warning" id="btn-open-modal-register-role" @click="$vm2.open('modal-2')">Añadir Rol
        </button>
        <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
               style="margin-top: 13px !important">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Guard</th>
                <th>Fecha de creación</th>
                <th>Permisos</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(role, index) in listRoles" :key="index">
                <td>{{ index + 1 }}</td>
                <td>{{ role.name }}</td>
                <td>{{ role.description }}</td>
                <td>{{ role.guard_name }}</td>
                <td>{{ role.created_at }}</td>
                <td>
                    <div v-if="role.permissions && role.permissions.length > 0">
                        <span class="badge badge-info m-1"
                              v-for="permission in role.permissions">{{ permission.description }}</span>
                    </div>
                    <span v-else class="badge badge-danger">No se asignaron permisos</span>
                </td>
                <td nowrap="nowrap">
                    <a @click="editRole(role)" class="btn btn-sm btn-clean btn-icon mr-2" title="Editar rol">
                        <span class="svg-icon svg-icon-md">
                            <i class="fa fa-edit"></i>
                        </span>
                    </a>
                    <a @click="deleteRole(role)" class="btn btn-sm btn-clean btn-icon" title="Eliminar rol">
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
                title: stateEdit ? 'Editar rol' : 'Registrar rol',
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
                  stateEdit ? updateRole() :createRole();
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
                <div class="form-group validated">
                    <label>Permisos para este Rol (*): </label>
                    <div class="checkbox-list">
                        <label class="checkbox" v-for="(permission, index) in listPermissions"
                               :key="index">
                            <input
                                type="checkbox"
                                v-model="data.permissions"
                                :value="permission.id"
                                :checked="true"
                            />
                            <span></span>
                            {{ permission.description }}
                        </label>
                    </div>
                </div>
            </form>

        </modal-vue>

    </div>
</template>

<script>
import {routesApi, routesApp} from "../../service";

export default {
    name: 'TableRoles',
    props: ['permissions'],
    data() {
        return {
            listRoles: [],
            listPermissions: [],
            data: {
                id: '',
                name: '',
                description: '',
                permissions: []
            },
            errors: {
                name: '',
                description: '',
                permissions: ''
            },
            stateEdit: false
        }
    },
    mounted() {
        this.getRoles();
        this.listPermissions = this.permissions;
    },
    methods: {
        async getRoles() {
            let me = this;
            try {
                const response = await routesApi(HOST_URL).get(`/roles`)
                if (Object.entries(response).length !== 0) {
                    me.listRoles = response.data.data
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
        async createRole() {
            let me = this;
            try {
                const response = await routesApp(HOST_URL).post(`/roles`, {
                    name: me.data.name,
                    description: me.data.description,
                    permissions: me.data.permissions
                })
                console.log(response);
                if (Object.entries(response).length !== 0 && response.status === 200) {
                    me.clearErrorsForm();
                    me.clearFormData();
                    me.$vm2.close('modal-2');
                    toastr.success(`${response.data}`, 'Felicitaciones!!');
                    await me.getRoles();
                }
            } catch (e) {
                console.log(e.response)

                if (Object.entries(e.response).length !== 0) {
                    const {status, data} = e.response;
                    if (status === 422) {
                        const {errors: {name, description, permissions}} = data;
                        if (name) this.showMessageError(name, 'name')
                        if (description) this.showMessageError(description, 'description')
                        if (permissions) this.showMessageError(permissions, 'permissions')
                        return;

                    } else {
                        toastr.error('Comunicate con los administradores del sistema.', 'Error de Servidor!')
                        return;
                    }
                }

                toastr.error('Comunicate con los administradores del sistema.', 'Error de Servidor!')
            }
        },
        async updateRole() {
            let me = this;
            try {
                const response = await routesApp(HOST_URL).put(`/roles/${me.data.id}`, {
                    id: me.data.id,
                    name: me.data.name,
                    description: me.data.description,
                    permissions: me.data.permissions
                })
                console.log(response);
                if (Object.entries(response).length !== 0 && response.status === 200) {
                    me.stateEdit = false;
                    me.clearErrorsForm();
                    me.clearFormData();
                    me.$vm2.close('modal-2');
                    toastr.success(`${response.data}`, 'Felicitaciones!!');
                    await me.getRoles();
                }
            } catch (e) {
                console.log(e.response)

                if (Object.entries(e.response).length !== 0) {
                    const {status, data} = e.response;
                    if (status === 422) {
                        const {errors: {name, description, permissions}} = data;
                        if (name) this.showMessageError(name, 'name')
                        if (description) this.showMessageError(description, 'description')
                        if (permissions) this.showMessageError(permissions, 'permissions')
                        return;

                    } else {
                        toastr.error('Comunicate con los administradores del sistema.', 'Error de Servidor!')
                        return;
                    }
                }

                toastr.error('Comunicate con los administradores del sistema.', 'Error de Servidor!')
            }
        },
        deleteRole(role){
            let me = this;
            swal.fire({
                title: `¿Desea eliminar el rol ${role.name}?`,
                text: `Eliminar un rol es permanente. No es posible deshacer la operación. ¿Desea continuar?`,
                icon: "warning",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: "Si eliminar!",
                cancelButtonText: "Cancelar",
            }).then(async function (result) {
                if (result.value) {
                    const response = await routesApp(HOST_URL).delete(`/roles/${role.id}`)
                    if (Object.entries(response).length !== 0 && response.status === 200) {
                        toastr.success(`${response.data}`, 'Felicitaciones!!');
                        await me.getRoles();
                    }
                }
            });
        },
        editRole(role) {
            console.log({role})
            let me = this;
            me.clearErrorsForm();
            me.data.permissions = [];
            me.stateEdit = true;
            me.$vm2.open('modal-2');
            me.data.id = role.id;
            me.data.name = role.name;
            me.data.description = role.description;
            role.permissions.forEach(permission => {
                console.log({permission})
                me.data.permissions.push(permission.id);
            })

        },

        showMessageError(value, key) {
            toastr.error(`${value[0]}`, 'Lo sentimos!');
            this.errors[key] = value[0];
        },

        clearErrorsForm() {
            this.errors.name = '';
            this.errors.description = '';
            this.permissions = []
        },
        clearFormData() {
            this.data.id='';
            this.data.name = '';
            this.data.description = '';
            this.data.permissions = [];
        }
    }
}
</script>

<style scoped>

</style>
