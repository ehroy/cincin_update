<template>
    <div class="flex justify-center text-center text-2xl mb-4 p-8">
        <h2>Gallery</h2>
    </div>
    <div class="gallery-feed p-4">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div>
                <img src="assets/images/logo.jpeg" alt="" />
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div v-for="image in images" :key="image.id">
                    <img
                        :src="image.src"
                        :alt="image.alt"
                        class="w-full h-full object-cover rounded-lg shadow-lg"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            images: [
                {
                    id: 1,
                    src: "assets/images/herosectionnew.jpg",
                    alt: "Image 1",
                    title: "Image 1",
                },
                {
                    id: 2,
                    src: "assets/images/logo.jpeg",
                    alt: "Image 2",
                    title: "Image 2",
                },
                {
                    id: 3,
                    src: "https://via.placeholder.com/300",
                    alt: "Image 3",
                    title: "Image 3",
                },
                {
                    id: 4,
                    src: "https://via.placeholder.com/300",
                    alt: "Image 4",
                    title: "Image 4",
                },
            ],
        };
    },
};
</script>

<style scoped>
.gallery-feed {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 1rem;
}
</style>
