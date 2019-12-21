<template>
    <div class="container mb-5"  >
        <div class="row">
            <div class="col container" style="height: 150px">
                <div class="row">
                    <div class="col ar-middle-tag">
                        <span v-for="tag in this.article.tagList" v-text="tag" class="mr-2"></span>
                    </div>
                </div>
                <a class="row ar-link" :href="'/idea/'+this.article.token">
                    <h2 class="col ar-middle-header">{{this.article.header}}</h2>
                </a>
                <a class="row ar-link" :href="'/idea/'+this.article.token">
                    <div class="col ar-middle-description">{{this.article.description}}</div>
                </a>
                <div class="row mt-2">
                    <a class="col-auto ar-middle-author" :href="'/profile/'+this.article.userToken">{{this.article.userName}}</a>
                </div>
                <div class="row justify-content-start">
                    <div class="col article-date text-left">{{this.article.date}}</div>
                </div>
            </div>
            <a class="col-3  ar-link" v-bind:style="{ 'background-image': 'url(' + this.article.images.image_150 + ')' }"
               :href="'/idea/'+this.article.token">
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'article',
        ],
        mounted() {
            console.log(this.article);
        },
        methods: {
            showArticle() {
                $(location).attr('href',this.$root.idea + this.article.token);
            }
        },
    }
</script>
