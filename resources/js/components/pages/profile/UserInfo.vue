<template>
    <div class="col-auto container">
        <div class="row">
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
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            user: {},
            article:{},
        },
        mounted() {
        },
    }
</script>
