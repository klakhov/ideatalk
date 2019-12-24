<template>
    <div class="container mb-4">
        <div class="row">
            <div class="col-3 p-0" >
                <img src="https://picsum.photos/90" alt="">
            </div>
            <div class="col-9 container">
                <div class="row justify-content-start">
                    <h1 class="col  ar-small-header text-left ml-2">{{this.article.header}}</h1>
                </div>
                <div class="row justify-content-start">
                    <h2 class="col ar-small-description text-left ml-2">{{this.article.description}}</h2>
                </div>
                <div class="row justify-content-start mt-3">
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
