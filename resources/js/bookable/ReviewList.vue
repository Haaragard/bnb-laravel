<template>
    <div class="card-body">
        <h6 class="text-uppercase text-secondary font-weight-bolder">Review List</h6>

        <div v-if="loading">Loading...</div>
        <div v-else>
            <div
                class="border-bottom mt-4 d-none d-md-block"
                v-for="(review, index) in reviews"
                :key="`review-${index}`"
            >
                <div class="row mb-4">
                    <div class="col-md-6">Diogo Antunes</div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <star-rating :rating="review.rating" class="fa-lg"></star-rating>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12">{{ review.created_at | fromNow }}</div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12">{{ review.content }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        bookableId: String,
    },
    data() {
        return {
            loading: false,
            reviews: null,
        };
    },
    created() {
        this.loading = true;

        axios.get(`/api/bookables/${this.bookableId}/reviews`)
            .then(response => { this.reviews = response.data.data })
            .finally(() => { this.loading = false });
    }
}
</script>