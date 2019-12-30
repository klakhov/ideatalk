<template>
    <div class="row justify-content-center mb-5">
        <div class="col card">
            <div class="card-body container">
                <div class="row mb-4">
                    <user-info :user="this.user" :article="this.article"></user-info>
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
                <div class="row justify-content-center justify-content-lg-start">
                    <div class="col-auto">
                        <img :src="this.article.images.image_300_200" alt="" class="img-fluid" width="300px" height="200px">
                    </div>
                    <div class="col container-fluid ">
                        <a class="row justify-content-start ar-link" :href="'/idea/'+this.article.token">
                            <h2 class="col-auto pub-header">{{this.article.header}}</h2>
                        </a>
                        <a class="row justify-content-start ar-link" :href="'/idea/'+this.article.token">
                            <div class="col-auto pub-description">{{this.article.description}}</div>
                        </a>
                    </div>
                </div>
                <div class="row justify-content-end pr-2">
                    <div class="col-auto marks align-middle"><span class="d-inline-block">{{this.points}} points</span></div>
                    <button class="col-auto pub-interesting" id="interesting" @click="point" v-bind:class="{'pointed':this.pointed}">
                        <i class="material-icons md-gray md-30" id="interesting-hover" v-bind:class="{'pointed-icon':this.pointed}">emoji_objects</i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import UserInfo from "./UserInfo";
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
        components:{
            UserInfo
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
            const lamp = $('#interesting');
            lamp.on('mouseover',function () {
                $("#interesting-hover").addClass("pointed-icon-tohov");
            });
            lamp.on('mouseleave',function () {
                $("#interesting-hover").removeClass("pointed-icon-tohov");
            });
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
