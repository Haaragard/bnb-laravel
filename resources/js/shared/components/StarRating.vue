<template>
    <div class="d-flex">
        <i class="fas fa-star" v-for="star in fullStars" :key="`full-${star}`"></i>
        <i class="fas fa-star-half-alt" v-for="star in halfStar" :key="`half-${star}`"></i>
        <i class="far fa-star" v-for="star in emptyStars" :key="`empty-${star}`"></i>
    </div>
</template>

<script>
export default {
    props: {
        rating: Number,
    },
    computed: {
        fullStars() {
            return Math.round(this.rating);
        },
        halfStar() {
            const fraction = Math.round(
                (this.rating - Math.floor(this.rating)) * 100
            );
            return fraction > 0 && fraction < 50;
        },
        emptyStars() {
            return 5 - Math.ceil(this.rating);
        }
    },
}
</script>