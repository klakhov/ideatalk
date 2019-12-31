<template>
    <div class="">
        <create-modal v-bind:title-base="this.title" v-bind:body="body" v-on:titleChange="titleChange"></create-modal>
        <div class="container">
            <div class="row">
                <textarea-autosize placeholder="Name your idea"
                                   id="idea-title"
                                   class="col-auto mr-auto ml-auto def-text"
                                   :min-height=10
                                   maxlength="100"
                                   v-model="title"/>
            </div>
            <div class="row">
                <p class="col-auto bb-2 size-info mr-auto ml-auto def-text text-right" v-if="title.length>50"  v-text="title.length+'/100'"></p>
            </div>

            <div class="row">
                <text-editor v-on:bodyChange="bodyChange"></text-editor>
            </div>
        </div>
    </div>
</template>

<script>
    import CreateModal from "../../modals/CreateModal";
    import TextEditor from "./TextEditor";
    export default {
        components:{
            CreateModal,
            TextEditor
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
            },
            bodyChange(data){
                this.body = data;
            }
        },
    }
</script>
