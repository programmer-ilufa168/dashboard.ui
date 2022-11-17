<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/inertia-vue3";

import { useDark, useToggle } from '@vueuse/core';

const showingNavigationDropdown = ref(false);
const showingMenuUserDropdown = ref(false);
const showingMenuApplicationDropdown = ref(false);

const openSide = ref(false);

const isDark = useDark();
const toggleDark = useToggle(isDark);

</script>

<template>
    <div class="min-h-screen w-full bg-gray-50 dark:bg-gray-s100">
        <div class="mix-h-screen p-4">
            <nav
                class="dark:text-white-smooth bg-white dark:bg-gray-s200 px-3 md:px-5 py-2 shadow-md rounded-md text-gray-800 flex justify-between place-items-center">
                <div> Selamat Datang </div>
                <div class="flex">
                    <ul class="flex space-x-3 place-items-center">
                        <li>
                            <button class="p-2" @click="toggleDark()">
                                <font-awesome-icon icon="fa-doutone fa-moon" class="text-xl" />
                            </button>
                        </li>
                        <li>
                            <font-awesome-icon icon="fa-solid fa-bell" class="text-xl" />
                        </li>
                        <li>
                            <Dropdown>
                                <template #trigger>
                                    <button class="flex rounded-md place-items-center">
                                        <img class="w-10 h-10 rounded-full"
                                            src="https://www.kibrispdr.org/data/312/gambar-cewek2-cantik-4.jpg" />
                                        <div class="mx-2">
                                            {{ $page.props.auth.user.name }} </div>
                                    </button>
                                </template>
                                <template #content>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        <div class="flex flex-wrap space-x-2">
                                            <div>
                                                <font-awesome-icon icon="fa-solid fa-user" />
                                            </div>
                                            <div>Profile</div>
                                        </div>
                                    </DropdownLink>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        <div class="flex flex-wrap space-x-2">
                                            <div>
                                                <font-awesome-icon icon="fa-solid fa-arrow-right-from-bracket" />
                                            </div>
                                            <div>Log Out</div>
                                        </div>
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </li>
                    </ul>
                </div>
            </nav>
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>

<style scoped>
/* width */
::-webkit-scrollbar {
    width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>
