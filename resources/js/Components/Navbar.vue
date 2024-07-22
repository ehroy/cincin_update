<template>
    <nav
        class="bg-white shadow-md fixed bg-fixed top-0 left-0 right-0 bg-blend-saturation"
    >
        <div
            class="container mx-auto flex items-center justify-between px-12 py-4"
        >
            <div class="flex items-center">
                <img
                    src="/assets/images/logo.jpeg"
                    alt="Vintia"
                    class="h-10 w-12 mr-2 absolute"
                />
                <div class="px-16 font-bold">Vintia Jelwery</div>
            </div>
            <button @click="toggleMenu" class="text-black lg:hidden">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16m-7 6h7"
                    />
                </svg>
            </button>
            <div
                :class="
                    menuOpen
                        ? 'absolute w-full mt-20 bg-white right-0 flex justify-between p-4'
                        : 'hidden '
                "
                class="items-center space-x-6 lg:flex justify-between"
            >
                <a
                    href="/"
                    class="text-gray-700 hover:text-gray-900 hover:underline"
                    >Beranda</a
                >
                <a
                    href="/products"
                    class="text-gray-700 hover:text-gray-900 hover:underline"
                    >Produk</a
                >
                <a
                    href="/contact"
                    class="text-gray-700 hover:text-gray-900 hover:underline"
                    >Hubungi</a
                >
                <a
                    href="#"
                    class="text-gray-700 hover:text-gray-900 hover:underline"
                    >Blog</a
                >
                <div class="relative group">
                    <button
                        class="text-gray-700 hover:text-gray-900 flex items-center hover:underline"
                    >
                        Kategori
                        <svg
                            class="ml-1 h-4 w-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7"
                            ></path>
                        </svg>
                    </button>

                    <div
                        class="absolute hidden group-hover:block bg-white text-black align-bottom rounded-md shadow-lg"
                    >
                        <Link
                            class="block px-8 p-1 hover:bg-yellow-400 text-sm"
                            v-for="Categories in Categoris"
                            :key="Categories.id"
                            :href="'/categori/' + Categories.id"
                            >{{ Categories.name }}</Link
                        >
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    Categoris: Object,
});
const menuOpen = ref(false);

const toggleMenu = () => {
    menuOpen.value = !menuOpen.value;
};
</script>

<style scoped>
/* Add any additional styles if needed */
</style>
