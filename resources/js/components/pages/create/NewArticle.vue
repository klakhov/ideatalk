<template>
    <div class="">
        <create-modal v-bind:title-base="this.title" v-bind:body="body" v-on:titleChange="titleChange"></create-modal>
        <div class="container">
            <div class="row">
                <textarea-autosize placeholder="Name your idea"
                                   id="idea-title"
                                   class="col-auto mr-auto ml-auto def-text"
                                   :min-height=10
                                   v-model="title"/>
                <textarea-autosize placeholder="Express the details"
                                   id="idea-body"
                                   class="col-auto mr-auto ml-auto def-text mt-5"
                                   :min-height=10
                                   v-model="body"/>
            </div>
        </div>
    </div>
</template>

<script>
    import CreateModal from "../../modals/CreateModal";
    export default {
        components:{
            CreateModal
        },
        data() {
            return {
                title: "",
                body: "",
            }
        },
        mounted() {
        },
        methods: {
            titleChange(data){
                this.title = data;
            }
        },
    }
</script>
