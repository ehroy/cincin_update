<template>
    <Navbar :Categoris="Categoris" />
    <section class="py-12">
        <div
            class="container mx-auto font-primary mt-12 px-12"
            v-if="ProductCategori.length"
        >
            <div class="container mx-auto">
                <div class="container text-gray-600 text-sm mb-4">
                    <a href="/" class="hover:underline">home</a> /
                    <a
                        href="/categori"
                        class="hover:underline"
                        v-if="ProductCategori[0].category"
                        >{{ ProductCategori[0].category.name }}</a
                    >
                    <a href="/categori" class="hover:underline" v-else
                        >kategori</a
                    >
                    /
                    <!-- <a href="#" class="hover:underline">{{ product.name }}</a> -->
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div
                    class="bg-white p-4 rounded-lg text-center border"
                    v-for="(product, index) in ProductCategori"
                    :key="index"
                >
                    <img
                        :src="helpers.imageUrl(product.image[0])"
                        alt="ProductsAll.name"
                        class="w-full h-64 object-cover mb-2 rounded"
                    />
                    <Link :href="'/products/' + product.slug" class="text-xl">{{
                        product.name
                    }}</Link>
                    <p class="text-sm mt-2 mb-3" v-if="product.price !== 0">
                        {{ helpers.rupiah(parseInt(product.price)) }}
                    </p>
                    <div v-else class="mt-8">
                        <Link
                            :href="'/products/' + product.slug"
                            class="text-sm rounded-lg bg-blue-400 py-2 text-white hover:bg-blue-500 px-2"
                        >
                            Hubungi Admin
                        </Link>
                    </div>
                    <!-- <button
                        @click="helpers.redirectToWhatsApp(product.id)"
                        class="mt-4 bg-blue-400 text-white py-2 px-4 rounded"
                    >
                        Pesan Sekarang
                    </button> -->
                </div>
            </div>
            <div class="flex justify-center items-center mt-8">
                <h2 class="text-3xl font-bold"></h2>
                <a
                    href="/products"
                    class="text-black border-gray-800 border p-1.5 rounded-xl text-sm"
                    >Lihat Semua</a
                >
            </div>
        </div>
        <div v-else>
            <div class="container px-20 mt-8">
                <nav class="text-gray-600 text-sm">
                    <a href="/" class="hover:underline">home</a> /
                    <a href="/categori" class="hover:underline">kategori</a>
                </nav>
            </div>
            <div
                class="text-2xl mt-8 font-bold h-[480px] flex justify-center text-right items-center gap-4"
            >
                <h2>Product Not Found</h2>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-6 bg-gray-100 rounded-full"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18 18 6M6 6l12 12"
                    />
                </svg>
            </div>
        </div>
    </section>
    <Footer />
</template>
<script setup>
import Navbar from "../../Components/Navbar.vue";
import Footer from "../../Components/Footer.vue";
import { Link } from "@inertiajs/vue3";

import { inject } from "vue";
const helpers = inject("helper");

defineProps({
    ProductCategori: Object,
    Categoris: Object,
});
</script>
