<template>
    <section class="py-12">
        <div class="container mx-auto p-8">
            <div
                class="flex flex-wrap gap-2 justify-start mb-8 border-b border-gray-800"
            >
                <Link
                    href="?filter=all"
                    class="hover:text-blue-500 text-gray-900 py-2 px-4 rounded-xl"
                    preserve-scroll
                >
                    <i class="mdi mdi-view-list"></i> Semua Produk
                </Link>
                <Link
                    href="?filter=new"
                    class="hover:text-blue-500 text-gray-900 py-2 px-4 rounded-xl"
                    preserve-scroll
                >
                    <i class="mdi mdi-moon-new"></i> Terbaru
                </Link>
                <Link
                    href="?filter=rekomendasi"
                    class="hover:text-blue-500 text-gray-900 py-2 px-4 rounded-xl"
                    preserve-scroll
                >
                    <i class="mdi mdi-star-box"></i> Rekomendasi
                </Link>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div
                    class="bg-white p-6 rounded-lg text-center border"
                    v-for="(product, index) in ProductsAll"
                    :key="index"
                >
                    <img
                        :src="helpers.imageUrl(product.image[0])"
                        alt="ProductsAll.name"
                        class="w-full h-56 object-cover mb-4 rounded"
                    />
                    <Link :href="'/products/' + product.slug" class="text-xl">{{
                        product.name.toLowerCase()
                    }}</Link>
                    <br />

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
    </section>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { defineProps } from "vue";
import { inject } from "vue";
const helpers = inject("helper");
defineProps({
    ProductsAll: Object,
});
function imageUrl(string) {
    const urlPattern = /^(http|https):\/\//i;

    // Check if the string matches the regular expression
    if (urlPattern.test(string)) {
        return string;
    } else {
        return "/storage/" + string;
    }
}
</script>
