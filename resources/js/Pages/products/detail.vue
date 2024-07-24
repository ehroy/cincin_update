<template>
    <Navbar :Categoris="Categoris" />
    <div class="mx-auto p-8 mt-20 font-primary">
        <div class="flex flex-wrap px-2">
            <div class="w-full md:w-1/2 px-4">
                <nav class="text-gray-900 text-sm mb-4">
                    <a href="/" class="hover:underline">home</a> /
                    <Link
                        :href="'/categori/' + Categori.id"
                        class="hover:underline"
                        >{{ Categori.name }}</Link
                    >
                    /
                    <a href="#" class="hover:underline">{{ Products.name }}</a>
                </nav>
                <div class="image-gallery">
                    <img
                        :src="imageUrl(Products.image[activeImage])"
                        alt="Product Image"
                        class="w-full rounded-lg mb-4 h-96 border border-gray-800 object-cover"
                    />
                    <div class="flex space-x-2">
                        <div
                            v-for="(images, index) in Products.image"
                            :key="index"
                            @click="activeImage = index"
                            class="cursor-pointer"
                        >
                            <img
                                :src="imageUrl(images)"
                                :class="{
                                    'border-2 border-blue-500':
                                        activeImage === index,
                                }"
                                class="w-24 h-24 rounded-lg object-cover"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 px-4">
                <h1 class="flex items-center gap-4 text-sm mb-2 mt-8">
                    Kategori : {{ Categori.name }}
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-6"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 6h.008v.008H6V6Z"
                        />
                    </svg>
                </h1>
                <h2 class="text-xl font-primary mb-4">
                    {{ Products.name }}
                </h2>
                <h2
                    class="text-sm font-primary mb-4 bg-yellow-300 w-44 p-1 px-2 items-center"
                >
                    Pre Order 7-14 hari kerja
                </h2>
                <p>kadar</p>
                <div class="flex gap-2">
                    <div v-for="(attributes, index) in Attribute" :key="index">
                        <div v-if="attributes.type === 'kadar'">
                            <div>
                                <p class="border p-1 px-2 text-sm">
                                    {{ attributes.name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="mt-2">bahan</p>
                <div class="flex gap-2">
                    <div v-for="(attributes, index) in Attribute" :key="index">
                        <div v-if="attributes.type === 'bahan'">
                            <div>
                                <p class="border p-1 px-2 text-sm">
                                    {{ attributes.name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <p
                    class="text-2xl font-bold text-gray-900 mb-4"
                    v-if="Products.price !== 0"
                >
                    {{ helpers.rupiah(Products.price) }}
                </p>
                <p v-else class="p-3 border rounded-xl w-52">
                    Harga Hubungi Admin
                </p>

                <button
                    @click="
                        helpers.redirectToWhatsApp(env.APP_URL + Products.slug)
                    "
                    class="border-[1px] border-gray-600 hover:bg-blue-400 hover:text-white px-12 py-2 rounded mt-8"
                >
                    <div class="flex justify-between items-center">
                        <h2 class="font-bold">Beli</h2>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="size-5 ms-9"
                        >
                            <path
                                d="M7.25361 18.4944L7.97834 18.917C9.18909 19.623 10.5651 20 12.001 20C16.4193 20 20.001 16.4183 20.001 12C20.001 7.58172 16.4193 4 12.001 4C7.5827 4 4.00098 7.58172 4.00098 12C4.00098 13.4363 4.37821 14.8128 5.08466 16.0238L5.50704 16.7478L4.85355 19.1494L7.25361 18.4944ZM2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22ZM8.39232 7.30833C8.5262 7.29892 8.66053 7.29748 8.79459 7.30402C8.84875 7.30758 8.90265 7.31384 8.95659 7.32007C9.11585 7.33846 9.29098 7.43545 9.34986 7.56894C9.64818 8.24536 9.93764 8.92565 10.2182 9.60963C10.2801 9.76062 10.2428 9.95633 10.125 10.1457C10.0652 10.2428 9.97128 10.379 9.86248 10.5183C9.74939 10.663 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.40738 11.0473 9.44455 11.1944C9.45903 11.25 9.50521 11.331 9.54708 11.3991C9.57027 11.4368 9.5918 11.4705 9.60577 11.4938C9.86169 11.9211 10.2057 12.3543 10.6259 12.7616C10.7463 12.8783 10.8631 12.9974 10.9887 13.108C11.457 13.5209 11.9868 13.8583 12.559 14.1082L12.5641 14.1105C12.6486 14.1469 12.692 14.1668 12.8157 14.2193C12.8781 14.2457 12.9419 14.2685 13.0074 14.2858C13.0311 14.292 13.0554 14.2955 13.0798 14.2972C13.2415 14.3069 13.335 14.2032 13.3749 14.1555C14.0984 13.279 14.1646 13.2218 14.1696 13.2222V13.2238C14.2647 13.1236 14.4142 13.0888 14.5476 13.097C14.6085 13.1007 14.6691 13.1124 14.7245 13.1377C15.2563 13.3803 16.1258 13.7587 16.1258 13.7587L16.7073 14.0201C16.8047 14.0671 16.8936 14.1778 16.8979 14.2854C16.9005 14.3523 16.9077 14.4603 16.8838 14.6579C16.8525 14.9166 16.7738 15.2281 16.6956 15.3913C16.6406 15.5058 16.5694 15.6074 16.4866 15.6934C16.3743 15.81 16.2909 15.8808 16.1559 15.9814C16.0737 16.0426 16.0311 16.0714 16.0311 16.0714C15.8922 16.159 15.8139 16.2028 15.6484 16.2909C15.391 16.428 15.1066 16.5068 14.8153 16.5218C14.6296 16.5313 14.4444 16.5447 14.2589 16.5347C14.2507 16.5342 13.6907 16.4482 13.6907 16.4482C12.2688 16.0742 10.9538 15.3736 9.85034 14.402C9.62473 14.2034 9.4155 13.9885 9.20194 13.7759C8.31288 12.8908 7.63982 11.9364 7.23169 11.0336C7.03043 10.5884 6.90299 10.1116 6.90098 9.62098C6.89729 9.01405 7.09599 8.4232 7.46569 7.94186C7.53857 7.84697 7.60774 7.74855 7.72709 7.63586C7.85348 7.51651 7.93392 7.45244 8.02057 7.40811C8.13607 7.34902 8.26293 7.31742 8.39232 7.30833Z"
                            ></path>
                        </svg>
                    </div>
                </button>

                <div class="tab-headers flex border-b border-black">
                    <div
                        @click="activeTab = 'description'"
                        :class="{
                            'border-b-2 border-gray-500 text-gray-500':
                                activeTab === 'description',
                        }"
                        class="px-4 py-2 cursor-pointer"
                    >
                        <button @click="toggleDescription" class="">
                            Deskripsi
                        </button>
                    </div>

                    <div
                        @click="activeTab = 'specifications'"
                        :class="{
                            'border-b-2 border-blue-500 text-blue-500':
                                activeTab === 'specifications',
                        }"
                        class="px-4 py-2 cursor-pointer"
                    ></div>
                </div>
                <div
                    class="tab-content bg-gray-50 left-0 right-0"
                    v-if="showDescription"
                >
                    <div v-if="activeTab === 'description'">
                        <p class="p-2" v-html="Products.desc" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-12">
        <div class="p-8 mx-auto">
            <h2
                class="text-xl font-primary underline text-center mb-6 text-gray-700"
            >
                Produk Serupa
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
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
                    <p class="text-sm mt-2" v-if="product.price !== 0">
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
        </div>
    </section>
    <Footer />
</template>

<script setup>
import Navbar from "../../Components/Navbar.vue";
import Footer from "../../Components/Footer.vue";
import { inject } from "vue";
const helpers = inject("helper");
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
defineProps({
    Products: Object,
    Categori: Object,
    ProductsPopuller: Object,
    Categoris: Object,
    Attribute: Object,
});
const showDescription = ref(true);

const toggleDescription = () => {
    showDescription.value = !showDescription.value;
};

function imageUrl(string) {
    const urlPattern = /^(http|https):\/\//i;

    // Check if the string matches the regular expression
    if (urlPattern.test(string)) {
        return string;
    } else {
        return "/storage/" + string;
    }
}
const activeImage = ref(0);
const activeTab = ref("description");
function addToCart() {
    // Logic for adding to cart
    alert(`Added to cart`);
}
</script>
<style scoped>
.container {
    max-width: 1200px;
}
.breadcrumbs a {
    color: #4a5568;
    text-decoration: none;
    margin-right: 5px;
}
.breadcrumbs span {
    color: #2d3748;
}
.image-gallery img {
    cursor: pointer;
}
.tabs .tab-headers div {
    padding-bottom: 0.5rem;
}
</style>
