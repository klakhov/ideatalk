<template>
    <div class="modal fade" tabindex="-1" role="dialog" id="create-modal">
        <div class="modal-dialog dialog" role="document">
            <div class="modal-content pt-5 pb-5">
                <div class="container">
                    <div class="row justify-content-end">
                        <button type="button" class="close col-auto" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col create-header pl-5">Idea preview</div>
                    </div>
                    <div class="row pr-5 pl-5">
                        <div class="col-6  mb-2 container">
                            <div class="row">
                                <div class="col file-create-col">
                                    <input type="file" id="file-create" name="avatar">
                                    <label for="file-create" class="file-create-label">
                                        <i class="material-icons md-48"  id="file-icon">
                                            photo_camera
                                        </i>
                                    </label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                    <textarea-autosize placeholder="Preview title"
                                                       class="col bb big-input"
                                                       v-bind:class="{'bb-2':title.length<=50}"
                                                       rows="1" maxlength="100"
                                                       :min-height=25
                                                       v-model="title"/>
                            </div>
                            <div class="row">
                                <p class="col bb-2 size-info" v-if="title.length>50"  v-text="title.length+'/100'"></p>
                            </div>
                            <div class="row mt-3">
                                <textarea-autosize placeholder="Preview description"
                                                   class="col bb small-input"
                                                   v-bind:class="{'bb-1':description.length<=50}"
                                                   rows="1" maxlength="140"
                                                   :min-height=25
                                v-model="description"/>
                            </div>
                            <div class="row">
                                <p class="col bb-1 size-info" v-if="description.length>50"  v-text="description.length+'/140'"></p>
                            </div>
                            <div class="row mt-4">
                                <div class="col create-info"><strong>Note:</strong> Make short and impressive title to get more views</div>
                            </div>
                        </div>
                        <div class="col-6 container pl-5">
                            <div class="row">
                                <div class="col std-info ">Add tags (up to 5) so everyone know what your idea is about</div>
                            </div>
                            <div class="row">
                                <tag-creator></tag-creator>
                            </div>
                            <div class="row" v-if="error" v-for="er in errors">
                                <div class="col" id="error-box" v-text="er"></div>
                            </div>
                            <div class="row">
                                <button class="btn-primary" @click="createArticle">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import TagCreator from "../pages/create/TagCreator";
    export default {
        components:{
            TagCreator,
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                description: "",
                title:"",
                body:"",
                error:false,
                errors:[],
                descriptionErrors:[],
                titleErrors:[],
                bodyErrors:[],
            }
        },
        mounted() {
            },
        methods: {
            createArticle() {
                this.title = $('#idea-header').val();
                this.body = $('#idea-body').val();
                axios.post('/new-article',{
                    _token:this.csrf,
                    title:this.title,
                    body:this.body,
                    description:this.description,
                }).then((response)=>{
                    $(location).attr('href',this.$root.home);
                }).catch((error)=>{
                    this.error = true;
                    const errors = error.response.data.errors;
                    this.titleErrors = errors.header ? errors.header : [];
                    this.bodyErrors = errors.body ? errors.body : [];
                    this.descriptionErrors = errors.description ? errors.description : [];
                    this.errors = this.titleErrors.concat(this.bodyErrors,this.descriptionErrors);
                });
            }
        },
    }
</script>
