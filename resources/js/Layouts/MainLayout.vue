<template>
    <nav class="navigation">
        <Link href="/" class="nav-item">
            <img src="../../images/ukrposhta.png" alt="Ukrposhta" class="nav-logo">
            Index
        </Link>
        <Link href="/show"  class="nav-item">Show</Link>
    </nav>

<!--    <div>{{timer}}</div>-->

    <div v-if="flashSuccess" class="success">
        {{flashSuccess}}
    </div>
    <slot>Default</slot>
</template>

<script setup>
    import {computed} from 'vue'
    import {Link, usePage} from "@inertiajs/vue3"

    const page = usePage();
    const flashSuccess = computed(
        ()=> page.props.flash.success
    )

    // import {ref} from 'vue'
    //
    // const timer = ref(0);
    // setInterval(() => timer.value++, 1000)
</script>

<style scoped>
    .navigation{
        background: cyan;
        display: flex;
        justify-content: space-around;
        padding: 10px;
    }

    .nav-item{
        position:relative;
        background: yellow;
        padding: 10px 20px;
        border-radius: 5px;
        border: 1px solid black;
        text-decoration: none;
        color: magenta;
        display: flex;
        align-items: center;
        gap: 10px;

        &:hover{
            background: green;
            color: white;
        }

    }

    .nav-logo {
        height: 24px;
        width: auto;
        position: absolute;
    }
    .success {
        background: green;
        color: white;
    }
</style>
