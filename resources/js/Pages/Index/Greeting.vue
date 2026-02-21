<template>
    <div>{{ message }}</div>
    <Link href="/">Index Page</Link>
</template>


<script setup>
import {Link} from "@inertiajs/vue3"
defineProps({
    message: Number
})
</script>
