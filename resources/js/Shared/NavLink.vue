<template>
    <Link :class="{'text-decoration-underline': active}">
        <slot />
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    name: "NavLink",
    props: {
        active: Boolean
    },
    components: { Link }
}
</script>
