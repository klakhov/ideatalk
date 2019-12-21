<template>
    <div class="modal fade" tabindex="-1" role="dialog" id="create-modal" data-backdrop="static">
        <div class="modal-dialog dialog" role="document">
            <div class="modal-content pt-5 pb-5 b-none">
                <div class="container">
                    <div class="row justify-content-end">
                        <button type="button" class="close col-auto" aria-label="Close" @click="closeWindow" style="font-size: 28px">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col create-header pl-5">Idea preview</div>
                    </div>
                    <div class="row pr-5 pl-5">
                        <div class="col-6  mb-2 container">
                            <div class="row">
                                <div class="col file-create-col p-0">
                                    <input type="file" id="file-create" name="avatar" @change="onFileSelected">
                                    <label for="file-create" class="file-create-label" v-bind:style="{ 'background-image': 'url(' + previewUrl + ')' }">
                                        <i class="material-icons md-48"  id="file-icon">
                                            photo_camera
                                        </i>
                                    </label>
                                </div>
                            </div>
                            <div class="row mt-3">
                                    <textarea-autosize placeholder="Preview title"
                                                       class="col bb big-input"
                                                       v-bind:class="{'bb-2':this.title.length<=50}"
                                                       rows="1" maxlength="100"
                                                       :min-height=25
                                                       v-model="title"
                                                       id="idea-modal-title"/>
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
                                <tag-creator v-on:tagChange="tagList"></tag-creator>
                            </div>
                            <div class="row justify-content-center" v-if="error" v-for="er in errors">
                                <div class="col-auto mb-2 error-box" id="" v-text="er"></div>
                            </div>
                            <div class="row justify-content-center">
                                <button class="button-primary col-auto create-article-submit" @click="createArticle">Submit</button>
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
        props: [
            'titleBase',
            'body'
        ],
        components:{
            TagCreator,
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                description: "",
                title:"",
                error:false,
                errors:[],
                tags:[],
                articlePreview:null,
                previewUrl:null
            }
        },
        mounted() {
            $('#idea-modal-title').on('keyup',()=>{
                this.$emit('titleChange',this.title);
            });
            },
        methods: {
            createArticle() {
                let formData = new FormData();
                formData.append('preview', this.articlePreview);
                formData.append('_token', this.csrf);
                formData.append('title', this.title);
                formData.append('body', this.body);
                formData.append('description', this.description);
                formData.append('tags', this.tags);
                axios.post('/new-idea', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then((response)=>{
                    $(location).attr('href',this.$root.home);
                }).catch((error)=>{
                    this.error = true;
                    const errors = error.response.data.errors;
                    let titleErrors = errors.title ? errors.title : [];
                    let bodyErrors = errors.body ? errors.body : [];
                    let descriptionErrors = errors.description ? errors.description : [];
                    let tagsErrors = errors.tags ? errors.tags : [];
                    let previewErrors = errors.preview ? errors.preview : [];
                    this.errors = titleErrors.concat(bodyErrors,descriptionErrors,tagsErrors,previewErrors);
                });
            },
            tagList(data){
                this.tags = data.map((tag)=>{return tag.id});
            },
            closeWindow(){
                $('#create-modal').modal('hide');
            },
            onFileSelected(event){
                this.articlePreview = event.target.files[0];
                this.previewUrl = URL.createObjectURL(this.articlePreview);
                console.log(this.articlePreview);
            },
        },
        watch:{
            titleBase: function(newVal){
                this.title = newVal;
            }
        }
    }
</script>
