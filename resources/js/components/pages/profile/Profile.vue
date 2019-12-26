<template>
    <div class="container profile-container">
            <div class="row mt-5 pb-3 mb-5 border-bottom">
                <div class="col-8 container">
                    <div class="row align-middle justify-content-lg-start justify-content-center">
                        <div class="col-sm-auto  user-name text-center text-md-left"><strong>{{this.user.name}}</strong></div>
                        <a class="col-sm-auto col-6 border-link edit-link text-center align-middle"  v-if="editable"
                           :href="'/profile/'+this.user.profile_token +'/edit'">Edit profile</a>
                    </div>
                    <div class="row mt-md-2 mt-4 justify-content-center">
                        <div class="col-auto col-md text-gray fs-20">{{this.user.bio}}</div>
                    </div>
                    <div class="row justify-content-start mt-3">
                        <div class="col-auto text-gray">following: {{this.user.follows_count}}</div>
                        <div class="col-auto text-gray">followers: {{this.user.followedBy}}</div>
                    </div>
                    <div class="row">
                        <div class="col-auto text-right">
                            <div v-if="!followed" class="fs-16 plain-button ar-plain-bottom-button  text-center" @click="follow">Follow</div>
                            <button v-else class="fs-16 button-primary ar-plain-bottom-button  text-center" @click="follow">Following</button>
                        </div>
                    </div>
                </div>
                <div class="col-4 text-right">
                    <img :src="this.user.avatar" alt="" height="130" width="130" style="border-radius: 50%;margin-top: 2px">
                </div>
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
            'settings'
        ],
        data() {
            return{
                editable:null,
                followed:null,
            }
        },
        mounted() {
            this.editable = this.settings.editable;
            this.followed = this.settings.followed;
        },
        methods: {
            follow(){
                axios.post('/follow',{
                    _token:this.csrf,
                    user_to_follow_id:this.user.id,
                }).then((response)=>{
                    this.followed = response.data;
                });
            },
        },
    }
</script>
