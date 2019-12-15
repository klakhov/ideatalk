<template>
    <div class="container">
        <div class="row">
            <textarea-autosize placeholder="Name your idea"
                               id="idea-header"
                               class="col-auto mr-auto ml-auto def-text"
                               :min-height=10
                               v-model="header"/>
            <textarea-autosize placeholder="Express the details"
                               id="idea-body"
                               class="col-auto mr-auto ml-auto def-text mt-5"
                               :min-height=10
                               v-model="body"/>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                header: "",
                body: "",
            }
        },
        mounted() {

        },
    }
</script>
