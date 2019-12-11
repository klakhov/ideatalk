<template>
    <div class="container mb-5 mt-5">
        <div class="row">
            <div class="col container" style="max-height: 130px">
                <div class="row">
                    <div class="col ar-middle-tag">Data Science</div>
                </div>
                <div class="row">
                    <h2 class="col ar-middle-header">{{this.article.header}}</h2>
                </div>
                <div class="row">
                    <div class="col ar-middle-description">{{this.article.description}}</div>
                </div>
                <div class="row">
                    <div class="col ar-middle-author">{{this.article.user_id}}</div>
                </div>
                <div class="row justify-content-start">
                    <div class="col article-date text-left">Jan 3</div>
                </div>
            </div>
            <div class="col-3">
                <img src="https://picsum.photos/130" alt="">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'article',
        ],
        mounted() {
        },
    }
</script>
