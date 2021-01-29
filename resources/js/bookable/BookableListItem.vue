<template>
    <div class="card">
        <div class="card-body">
            <h3>{{ title }}</h3>
            <p>{{ description }}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: { id: Number, title: String, description: String, },
    mounted() {

    }
}
</script>