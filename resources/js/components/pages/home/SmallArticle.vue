<template>
    <div class="container mb-4">
        <div class="row">
            <a class="col-3 p-0 ar-link" v-bind:style="{ 'background-image': 'url(' + this.article.images.image_90 + ')',
            'background-repeat':'no-repeat' }"
               :href="'/idea/'+this.article.token">
            </a>
            <div class="col-9 container">
                <div class="row justify-content-start">
                    <h1 class="col  ar-small-header text-left ml-2">{{this.article.header}}</h1>
                </div>
                <div class="row justify-content-start">
                    <h2 class="col ar-small-description text-left ml-2">{{this.article.description}}</h2>
                </div>
                <div class="row justify-content-start mt-1">
                    <div class="col ar-small-author text-left ml-2">{{this.article.user.name}}</div>
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
