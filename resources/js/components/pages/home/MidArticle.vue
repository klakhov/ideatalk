<template>
    <div class="container mb-5">
        <div class="row">
            <div class="col container height-reg">
                <div class="row">
                    <div class="col container-fluid ar-middle-tag">
                        <div class="row">
                            <span v-for="tag in this.article.tagList" v-text="tag" class="col-auto"/>
                        </div>
                    </div>
                </div>
                <a class="row ar-link" :href="'/idea/'+this.article.token">
                    <h2 class="col-auto ar-middle-header">{{this.article.header}}</h2>
                </a>
                <a class="row ar-link" :href="'/idea/'+this.article.token">
                    <div class="col ar-middle-description">{{this.article.description}}</div>
                </a>
                <div class="row" v-bind:class="{'mt-3':isFeatured}">
                    <div class="col container">
                        <div class="row mt-2">
                            <a class="col-auto ar-middle-author" :href="'/profile/'+this.article.user.profile_token">{{this.article.user.name}}</a>
                        </div>
                        <div class="row justify-content-start">
                            <div class="col article-date text-left">{{this.article.date}}</div>
                        </div>
                    </div>
                    <div class="col-auto" style="user-select: none;">
                        <i class="material-icons md-24 bookmark pointer"
                           data-toggle="tooltip" data-placement="bottom"
                           title="Bookmark the idea" @click="bookmark"
                           v-if="!bookmarked">bookmark_border</i>

                        <i class="material-icons md-24 bookmark pointer"
                           data-toggle="tooltip" data-placement="bot"
                           title="Remove from bookmarks" @click="bookmark"
                           v-if="bookmarked">bookmark</i>
                    </div>
                </div>
            </div>
            <a class="col-auto  p-0 ar-link d-150" v-bind:style="{ 'background-image': 'url(' + this.article.images.image_150 + ')',
            'background-repeat':'no-repeat' }"
               :href="'/idea/'+this.article.token">
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'article',
            'isFeatured'
        ],
        data() {
            return {
                bookmarked: null
            }
        },
        mounted() {
            this.bookmarked = this.article.bookmarked;
        },
        methods: {
            showArticle() {
                $(location).attr('href',this.$root.idea + this.article.token);
            },
            bookmark(){
                axios.post('/bookmark',{
                    _token:this.csrf,
                    article_id:this.article.id
                }).then(()=>{
                    this.bookmarked = !this.bookmarked;
                });
            },
        }
    }
</script>
