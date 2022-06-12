<template>
    <!-- Hello, {{ username }} -->  
    <Head>
        <title>My app </title>
        <meta type="description" content="Information About my app" head-key="description">
    </Head>
    <header>
        <h1>My App</h1>
        <Nav />
    </header>

    <slot />
</template>

<script>
import Nav from "./nav";
import { Head } from "@inertiajs/inertia-vue3";

export default {
    name: "Layout",
    components: {Nav, Head},
    // computed: {
    //     username() {
    //         return this.$page.props.auth.user.username;
    //     }
    // }
}
</script>
