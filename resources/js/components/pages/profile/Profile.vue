<template>
    <div class="container profile-container">
            <div class="row mt-5">
                <div class="col-8 container">
                    <div class="row align-middle justify-content-md-start justify-content-center">
                        <div class="col-sm-auto  user-name text-center text-md-left"><strong>{{this.user.name}}</strong></div>
                        <a class="col-sm-auto col-6 border-link edit-link text-center align-middle"  v-if="edit"
                           :href="'/profile/'+this.user.profile_token +'/edit'">Edit profile</a>
                    </div>
                    <div class="row mt-md-2 mt-4 justify-content-center">
                        <div class="col-auto col-md text-gray">followers: {{this.user.followers}}</div>
                    </div>
                </div>
                <div class="col-4 text-right">
                    <img :src="this.user.avatar" alt="" height="130" width="130" style="border-radius: 50%;margin-top: 2px">
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col-8 text-gray">{{this.user.bio}}</div>
            </div>
            <profile-timeline v-bind:user="this.user"></profile-timeline>
    </div>
</template>

<script>
    import ProfileTimeline from "./ProfileTimeline";
    export default {
        components:{
          ProfileTimeline
        },
        props:[
            'user',
            'editable'
        ],
        data() {
            return{
                edit:false,
            }
        },
        mounted() {
            this.edit = (this.editable === 1);
        },
    }
</script>
