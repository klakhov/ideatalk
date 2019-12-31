<template>
    <div class="container ar-padding">
        <div class="row justify-content-sm-start">
            <h1 class="col-auto ar-plain-header">{{this.article.header}}</h1>
        </div>
        <div class="row justify-content-sm-start">
            <h2 class="col-auto ar-plain-description pl-4 pr-4">{{this.article.description}}</h2>
        </div>
        <div class="row mb-5 mt-4">
            <div class="col container">
                <div class="row">
                    <div class="col-auto">
                        <img :src="this.article.user.avatar" alt="" width="50" height="50" class="br-50">
                    </div>
                    <div class="col container">
                        <div class="row">
                           <div class="col-auto">
                               <span class="ar-plain-username">{{this.article.user.name}}</span>
                           </div>
                            <div class="col-auto p-0">
                                <div v-if="!followed" class="plain-button ar-plain-button text-center mt-05" @click="follow">Follow</div>
                                <button v-else class="button-primary ar-plain-button text-center" @click="follow">Following</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col ar-plain-date">{{this.article.date}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col text-right pointer" @click="bookmark">
                <i class="material-icons md-24 bookmark"
                   data-toggle="tooltip" data-placement="top"
                   title="Bookmark the idea"
                   v-if="!bookmarked">bookmark_border</i>

                <i class="material-icons md-24 bookmark"
                   data-toggle="tooltip" data-placement="top"
                   title="Remove from bookmarks"
                   v-if="bookmarked">bookmark</i>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <img :src="this.article.images.image_def" alt="" class="img-fluid">
            </div>
        </div>
        <div class="row">
            <div class="col ar-plain-body" v-html="this.article.body">
            </div>
        </div>
        <div class="row mt-5 mb-4">
            <div class="col" >
                <div class="tag d-inline-block p-1 fs-16 mr-3" v-for="tag in this.article.tags">{{tag.name}}</div>
            </div>
        </div>
        <div class="row  pl-3 pr-3">
            <button class="col-auto interesting" id="interesting" @click="point" v-bind:class="{'pointed':this.pointed}">
                <i class="material-icons md-gray md-48" id="interesting-hover" v-bind:class="{'pointed-icon':this.pointed}">emoji_objects</i>
            </button>
            <div class="col-auto marks align-middle"><span class="d-inline-block">{{this.points}} points</span></div>
            <div class="col text-right" >
                <i class="material-icons md-24 bookmark pointer"
                   data-toggle="tooltip" data-placement="top"
                   title="Bookmark the idea" @click="bookmark"
                    v-if="!bookmarked">bookmark_border</i>

                <i class="material-icons md-24 bookmark pointer"
                   data-toggle="tooltip" data-placement="top"
                title="Remove from bookmarks" @click="bookmark"
                   v-if="bookmarked">bookmark</i>
            </div>
        </div>
        <div class="row mt-4 border-top border-bottom pt-4 pb-4">
            <div class="col-auto">
                <img :src="this.article.user.avatar" alt="" width="70" height="70" class="br-50">
            </div>
            <div class="col container">
                <div class="row">
                    <div class="col ar-middle-tag">WRITTEN BY</div>
                </div>
                <div class="row">
                    <div class="col ar-plain-author">{{this.article.user.name}}</div>
                </div>
                <div class="row">
                    <div class="col">{{this.article.user.bio}}</div>
                </div>
            </div>
            <div class="col-auto text-right">
                <div v-if="!followed" class="plain-button ar-plain-bottom-button text-center" @click="follow">Follow</div>
                <button v-else class="button-primary ar-plain-bottom-button" @click="follow">Following</button>
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
            settings:{},
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                bookmarked: null,
                pointed:null,
                points:null,
                followed:null,
            }
        },
        mounted() {
            console.log(this.settings);
            this.pointed = this.settings.pointed;
            this.bookmarked = this.settings.bookmarked;
            this.points = this.settings.points_count;
            this.followed = this.settings.followed;
            const lamp = $('#interesting');
            lamp.on('mouseover',function () {
                $("#interesting-hover").addClass("pointed-icon-tohov");
            });
            lamp.on('mouseleave',function () {
                $("#interesting-hover").removeClass("pointed-icon-tohov");
            });
        },
        methods: {
            bookmark() {
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
            follow(){
                axios.post('/follow',{
                    _token:this.csrf,
                    user_to_follow_id:this.article.user.id,
                }).then((response)=>{
                    this.followed = response.data;
                });
            },
        },
    }
</script>
