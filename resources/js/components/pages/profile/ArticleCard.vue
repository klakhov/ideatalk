<template>
    <div class="row justify-content-center mb-5">
        <div class="col card">
            <div class="card-body container">
                <div class="row mb-4">
                    <div class="col-auto">
                        <img :src="this.user.avatar" alt="" height="35" width="35" style="border-radius: 50%;margin-top: 2px" >
                    </div>
                    <div class="col-auto container p-0">
                        <div class="row">
                            <a class="col-auto ar-middle-author" :href="'/profile/'+this.user.profile_token">
                                {{this.user.name}}</a>
                        </div>
                        <div class="row">
                            <div class="col article-date">
                                {{this.article.date}}
                            </div>
                        </div>
                    </div>
                    <div class="col text-right" style="user-select: none;">
                        <i class="material-icons md-24 mt-2 pointer"
                           data-toggle="tooltip" data-placement="left"
                           title="Bookmark the idea" @click="bookmark"
                           v-if="!bookmarked">bookmark_border</i>
                        <i class="material-icons md-24 mt-2 pointer"
                           data-toggle="tooltip" data-placement="left"
                           title="Remove from bookmarks" @click="bookmark"
                           v-if="bookmarked">bookmark</i>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-auto">
                        <img :src="this.article.images.image_300_200" alt="" class="" width="300px" height="200px">
                    </div>
                    <div class="col container p-0">
                        <a class="row ar-link" :href="'/idea/'+this.article.token">
                            <h2 class="col pub-header">{{this.article.header}}</h2>
                        </a>
                        <a class="row ar-link" :href="'/idea/'+this.article.token">
                            <div class="col pub-description">{{this.article.description}}</div>
                        </a>
                    </div>
                </div>
                <div class="row justify-content-end pr-2">
                    <div class="col-auto marks align-middle"><span class="d-inline-block">{{this.points}} points</span></div>
                    <button class="col-auto pub-interesting" id="interesting" @click="point" v-bind:class="{'pointed':this.pointed}">
                        <i class="material-icons md-gray md-30" v-bind:class="{'pointed-icon':this.pointed}">emoji_objects</i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            article: {
                type: Object,
                default: null
            },
            user:{
                type:Object
            },
            isBookmarked:{},
            isPointed:{},
            pointsCount:{},
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                bookmarked: null,
                pointed:null,
                points:null,
            }
        },
        mounted() {
            this.bookmarked = this.isBookmarked;
            this.pointed = this.isPointed;
            this.points = this.pointsCount;
        },
        methods: {
            bookmark(){
                axios.post('/bookmark',{
                    _token:this.csrf,
                    article_id:this.article.id
                }).then(()=>{
                    this.bookmarked = !this.bookmarked;
                });
            },
            point(){
                axios.post('/point',{
                    _token:this.csrf,
                    article_id:this.article.id
                }).then(()=>{
                    this.pointed = !this.pointed;
                    this.points += this.pointed ? 1 : -1;
                });
            },
        },
    }
</script>
