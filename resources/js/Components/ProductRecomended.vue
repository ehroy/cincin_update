<template>
    <section class="px-8 mx-auto">
        <div class="container mx-auto">
            <div class="flex underline font-bold gap-2 align-text-top px-4">
                <h2 class="text-xl mb-6 text-gray-900">Rekomendasi Produk</h2>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-5"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z"
                    />
                </svg>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div
                    class="bg-white p-6 rounded-lg text-center border"
                    v-for="(product, index) in ProductsPopuller"
                    :key="index"
                >
                    <img
                        :src="imageUrl(product.image[0])"
                        alt="ProductsAll.name"
                        class="w-full h-56 object-cover mb-4 rounded"
                    />
                    <Link :href="'/products/' + product.slug" class="text-xl">{{
                        product.name.toLowerCase()
                    }}</Link>
                    <p
                        class="text-sm mt-2"
                        v-if="parseInt(product.price) !== 0"
                    >
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
    </section>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { defineProps } from "vue";
import { inject } from "vue";
const helpers = inject("helper");
defineProps({
    ProductsPopuller: Object,
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
// export default {
//     components: { Product },
//     data() {
//         return {
//             products: [
//                 {
//                     id: 1,
//                     name: "Sofa Modern",
//                     description: "Sofa yang nyaman untuk ruang tamu Anda.",
//                     price: "Rp 2.500.000",
//                     image: "/assets/images/chair-3274474_1280.jpg",
//                 },
//                 {
//                     id: 2,
//                     name: "Meja Makan Minimalis",
//                     description: "Meja makan elegan untuk ruang makan Anda.",
//                     price: "Rp 3.000.000",
//                     image: "/assets/images/chair-3274474_1280.jpg",
//                 },
//                 {
//                     id: 3,
//                     name: "Meja Makan Minimalis",
//                     description: "Meja makan elegan untuk ruang makan Anda.",
//                     price: "Rp 3.000.000",
//                     image: "/assets/images/chair-3274474_1280.jpg",
//                 },
//             ],
//         };
//     },
// };
</script>
