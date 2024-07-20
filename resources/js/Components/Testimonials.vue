<template>
    <section class="bg-gray-100 p-8">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold mb-4">Testimoni Pelanggan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    v-for="testimonial in testimonials"
                    :key="testimonial.id"
                    class="bg-white p-6 rounded-lg shadow-md"
                >
                    <div class="items-center flex justify-center">
                        <img
                            :src="testimonial.url"
                            alt=""
                            class="w-20 h-20 rounded-full object-cover border mb-2"
                        />
                    </div>
                    <p class="text-gray-700 mb-4">{{ testimonial.message }}</p>
                    <h3 class="text-lg font-semibold">
                        {{ testimonial.name }}
                    </h3>
                    <p class="text-gray-600">{{ testimonial.location }}</p>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            testimonials: [
                {
                    id: 1,
                    url: "assets/images/logo.jpeg",
                    name: "John Doe",
                    message:
                        "Produk-produk dari Toko Furniture Kami sangat berkualitas dan nyaman digunakan.",
                    location: "Jakarta",
                },
                {
                    id: 2,
                    url: "assets/images/logo.jpeg",
                    name: "Jane Smith",
                    message:
                        "Pelayanan yang sangat baik dan ramah, sangat puas dengan pembelian saya.",
                    location: "Bandung",
                },
                {
                    id: 2,
                    url: "assets/images/logo.jpeg",
                    name: "Jane Smith",
                    message:
                        "Pelayanan yang sangat baik dan ramah, sangat puas dengan pembelian saya.",
                    location: "Bandung",
                },
                {
                    id: 2,
                    url: "assets/images/logo.jpeg",
                    name: "Jane Smith",
                    message:
                        "Pelayanan yang sangat baik dan ramah, sangat puas dengan pembelian saya.",
                    location: "Bandung",
                },
            ],
        };
    },
};
</script>
