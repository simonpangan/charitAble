<template>
    <Head>
        <title>My app</title>
        <meta type="description" content="Information About my app" head-key="description">
        <!-- <link rel="icon" type="image/svg+xml" href="/favicon.svg" /> -->
    </Head>

    <header>
        <Nav />
    </header>

    <slot />

    <!-- <Footer /> -->
</template>

<script setup>
import Nav from "./Nav";
import Footer from "./Footer";
import { Head } from "@inertiajs/inertia-vue3";

import '../../../public/css/vendor.css';
import '../../../public/css/app.css';
</script>
