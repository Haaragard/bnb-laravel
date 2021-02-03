<template>
    <div class="row">
        <div class="col-md-8 mb-2">
            <div class="card">
                <div class="card-body">
                    <div v-if="loading">Loading...</div>
                    <div v-else>
                        <h2>{{ bookable.title }}</h2>
                        <hr />
                        <article>{{ bookable.description }}</article>
                    </div>
                </div>
            </div>

            <review-list :bookable-id="this.$route.params.id"></review-list>
        </div>
        <div class="col-md-4">
            <availability :bookable-id="this.$route.params.id"></availability>
        </div>
    </div>
</template>

<script>
import Availability from "./Availability";
import ReviewList from './ReviewList';

export default {
    components: {
        Availability,
        ReviewList,
    },
    data() {
        Availability
        return {
            loading: false,
            bookable: null,
        };
    },
    created() {
        this.loading = true;

        axios.get(`/api/bookables/${this.$route.params.id}`)
            .then(response => {
                this.bookable = response.data.data
            }).catch(error => {

            }).finally(() => {this.loading = false});
    }
}
</script>