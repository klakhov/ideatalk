<template>
    <div class="container profile-container">
            <div class="row mt-5">
                <div class="col-8 container">
                    <div class="row align-middle">
                        <div class="col-auto user-name"><strong>{{this.user.name}}</strong></div>
                        <a class="col-auto border-link edit-link text-center align-middle" href="/profile/edit">Edit profile</a>
                    </div>
                    <div class="row">
                        <div class="col text-gray">followers</div>
                    </div>
                </div>
                <div class="col-4 text-right">
                    <img :src="this.user.avatar" alt="" height="130" width="130" style="border-radius: 50%;margin-top: 2px" >
                </div>
            </div>
            <div class="row">
                <div class="col text-gray">some info</div>
            </div>
    </div>
</template>

<script>
    export default {
        props:[
          'user'
        ],
        mounted() {
        },
    }
</script>
