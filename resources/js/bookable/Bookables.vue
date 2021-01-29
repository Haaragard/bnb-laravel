<template>
    <div>
        <div v-if="this.loading">Data is Loading...</div>
        <div v-else>
            <div class="row" v-for="row in rows" :key="`row-${row}`">
                <div
                    class="col mb-4"
                    v-for="(bookable, column) in bookablesInRow(row)"
                    :key="`row-${row}-col-${column}-bookable`"
                >
                    <bookable-list-item
                        v-bind="bookable"
                    ></bookable-list-item>
                </div>
                <div
                    class="col"
                    v-for="placeholder in placeholdersInRow(row)"
                    :key="`row-${row}-col-${placeholder}-placeholder`"
                ></div>
            </div>
        </div>
    </div>
</template>

<script>
import BookableListItem from "./BookableListItem";

export default {
    components: {
        BookableListItem,
    },
    data() {
        return {
            loading: false,
            bookables: null,
            columns: 3,
        };
    },
    computed: {
        rows() {
            return this.bookables.length === null
            ? 0
            : Math.ceil(this.bookables.length / this.columns);
        }
    },
    methods: {
        bookablesInRow(row) {
            return this.bookables.slice((row - 1) * this.columns, row * this.columns)
        },
        placeholdersInRow(row) {
            return this.columns - this.bookablesInRow(row).length;
        }
    },
    created() {
        this.loading = true;

        setTimeout(() => {
            this.bookables = [
                { title: "Title 1", description: "Description 1" },
                { title: "Title 2", description: "Description 2" },
                { title: "Title 3", description: "Description 3" },
                { title: "Title 4", description: "Description 4" },
                { title: "Title 5", description: "Description 5" },
            ];

            this.loading = false;
        }, 2500);
    },
}
</script>