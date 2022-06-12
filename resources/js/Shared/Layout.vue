<template>
    <!-- Hello, {{ username }} -->  
    <Head>
        <title>My app</title>
        <meta type="description" 
            content="Information About my app" 
            head-key="description"
        >
        <!-- <link rel="icon" type="image/svg+xml" href="/favicon.svg" /> -->
    </Head>

    <header>
        <Nav />
    </header>

    <slot />

    <Footer />
</template>

<script>
import Nav from "./Nav";
import Footer from "./Footer";
import { Head } from "@inertiajs/inertia-vue3";

export default {
    name: "Layout",
    components: {Nav, Head, Footer},
    // computed: {
    //     username() {
    //         return this.$page.props.auth.user.username;
    //     }
    // }
}
</script>
