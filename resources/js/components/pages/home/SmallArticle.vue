<template>
    <div class="container mb-4">
        <div class="row">
            <a class="col-auto ar-link d-90 p-0" v-bind:style="{ 'background-image': 'url(' + this.article.images.image_90 + ')',
            'background-repeat':'no-repeat' }"
               :href="'/idea/'+this.article.token">
            </a>
            <div class="col container-fluid">
                <a class="row justify-content-start ar-link" :href="'/idea/'+this.article.token">
                    <h1 class="col ar-small-header text-left ml-2">{{this.article.header}}</h1>
                </a>
                <a class="row justify-content-start ar-link" :href="'/idea/'+this.article.token">
                    <h2 class="col ar-small-description text-left ml-2">{{this.article.description}}</h2>
                </a>
                <div class="row justify-content-start mt-1">
                    <a class="col-auto ar-small-author text-left ml-2" :href="'/profile/'+this.article.user.profile_token">{{this.article.user.name}}</a>
                </div>
                <div class="row justify-content-start">
                    <div class="col article-date text-left ml-2">{{this.article.date}}</div>
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
            },
        },
        mounted() {
        },
    }
</script>
