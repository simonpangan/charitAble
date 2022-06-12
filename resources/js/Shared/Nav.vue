<template>
    <nav>
        <ul>
            <li>
                <NavLink href=" /"  class="text-secondary" :active="$page.component == 'home'">
                    Home
                </NavLink>
            </li>
            <li>
                <NavLink href="/settings"  class="text-secondary" :active="$page.component == 'settings'">
                    Settings
                </NavLink>
            </li>
            <li>
                <NavLink href="/users"  class="text-secondary" :active="$page.component == 'users'">
                    Users
                </NavLink>
            </li>
            <li>
                <NavLink method="post" href="/logout"  class="text-secondary">
                    Logout
                </NavLink>
            </li>
        </ul>
    </nav>
</template>

<script>
import NavLink from "./NavLink";

export default {
    name: "nav",
    components: {NavLink }
}
</script>


<style scoped>
a:link { text-decoration: none; }
</style>
