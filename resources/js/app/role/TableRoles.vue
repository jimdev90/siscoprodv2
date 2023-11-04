<template>
    <div class="card-body">
        <button class="btn btn-warning" id="btn-open-modal-register-role" @click="showModal = true">Añadir Rol</button>
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
                        <span class="badge badge-danger" v-if="listPermissions.length <= 0">No se registraron permisos</span>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <modal v-if="showModal" @close="showModal = false">
            <h3 slot="header">custom header</h3>
        </modal>
    </div>
</template>

<script>

import Modal from "../../components/Modal.vue";
export default {
    name: 'TableRoles',
    props: ['roles', 'permissions'],
    components: {
        Modal
    },
    data() {
        return {
            listRoles : [],
            listPermissions: [],
            showModal: false
        }
    },
    mounted() {
        this.listRoles = this.roles;
        this.listPermissions = this.permissions;
    }
}
</script>

<style lang="scss" scoped>

</style>
