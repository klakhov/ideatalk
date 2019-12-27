    <template>
    <div class="container">
        <div class="row justify-content-center">
            <a class="col-auto  p-0 ar-link d-300-200" v-bind:style="{ 'background-image': 'url(' + this.article.images.image_300_200 + ')',
            'background-repeat':'no-repeat' }"
               :href="'/idea/'+this.article.token">
            </a>
        </div>
        <a :href="'/idea/'+this.article.token" class="row justify-content-start ar-link">
            <h1 class="col article-header text-left ml-2">{{this.article.header}}</h1>
        </a>
        <a :href="'/idea/'+this.article.token" class="row ar-link justify-content-start">
            <h2 class="col article-description text-left ml-2">{{this.article.description}}</h2>
        </a>
        <div class="row justify-content-start mt-1">
            <a class="col-auto article-author pr-1 text-left ml-2" :href="'/profile/'+this.article.user.profile_token">{{this.article.user.name}}</a>
            <span class="col-auto p-0 pr-1 article-author">in </span>
            <a href="#" class="col-auto p-0 article-author">{{this.article.render_tag.name}}</a>
        </div>
        <div class="row justify-content-start">
            <div class="col article-date text-left ml-2">{{this.article.date}}</div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            article:{}
        },
        data() {
            return {
            }
        },
        mounted() {
            console.log(this.article);
        },
    }
</script>
