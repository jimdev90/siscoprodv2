<template>
    <span class="form-text text-danger">{{ message }}</span>
</template>

<script>
export default {
    name: 'MessageError',
    props: ['message']
}
</script>
