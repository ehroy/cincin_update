<template>
    <div class="bg-gray-100 mb-4">
        <div class="container mx-auto p-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                <div
                    class="text-center border border-spacing-14 justify-center align-text-top bg-white rounded-lg"
                    v-for="(feature, index) in features"
                    :key="index"
                >
                    <img
                        :src="feature.icon"
                        :alt="feature.title"
                        class="mx-auto mb-4 w-12 h-12"
                    />
                    <h3 class="text-lg font-semibold mb-2">
                        {{ feature.title }}
                    </h3>
                    <p class="mb-2">{{ feature.description }}</p>
                    <a
                        v-if="feature.link"
                        :href="feature.link"
                        class="text-blue-500 underline align-baseline"
                        >{{ feature.linkText }}</a
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            features: [
                {
                    icon: "assets/images/logo.jpeg",
                    title: "Kustomisasikan Produk Anda",
                    description:
                        "Semua produk VINTIA sepenuhnya dapat dikustomisasikan dengan preferensi Anda.",
                    link: null,
                    linkText: null,
                },
                {
                    icon: "assets/images/logo.jpeg",
                    title: "Kepuasan Dijamin 100%",
                    description:
                        "Jika Anda tidak puas dengan pilihan Anda, kembalikan dalam 60 hari.",
                    link: null,
                    linkText: null,
                },
                {
                    icon: "assets/images/logo.jpeg",
                    title: "Layanan Berorientasi Pelanggan",
                    description:
                        "VINTIA menjamin pengiriman yang aman untuk setiap pesanan.",
                    link: null,
                    linkText: null,
                },
                {
                    icon: "assets/images/logo.jpeg",
                    title: "Layanan-berorientasi Pelanggan",
                    description: "Hubungi kami kapan saja melalui",
                    link: "#", // Replace with actual link
                    linkText: "hubungi kami",
                },
            ],
        };
    },
};
</script>
