<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand"  href="/">
                Idea Talk
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" v-if="this.isNewArticle">
                        <button class="button-primary publish-button mt-1" data-toggle="modal" data-target="#create-modal">Publish</button>
                    </li>
                    <li class="nav-item container">
                        <div class="dropdown row">
                            <a class="nav-link col"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-text="this.user.name" role="button" style="cursor: pointer">
                            </a>
                            <div class="dropdown-menu pop-container" aria-labelledby="dropdownMenuButton">
                                <a :href="'/profile/' + this.user.profile_token" class="dropdown-item pop-link-main text-center p-2">{{this.user.name}}</a>
                                <div class="dropdown-divider divider mr-auto ml-auto"></div>
                                <a href="" class="dropdown-item pop-link p-2 pl-3">How to share?</a>
                                <a href="/new-idea" class="dropdown-item pop-link p-2 pl-3">New idea</a>
                                <div class="dropdown-divider divider mr-auto ml-auto"></div>
                                <a href="/bookmarks" class="dropdown-item pop-link p-2 pl-3">Bookmarks</a>
                                <a href="" class="dropdown-item pop-link p-2 pl-3">Publications</a>
                                <div class="dropdown-divider divider mr-auto ml-auto"></div>
                                <a :href="'/profile/' + this.user.profile_token" class="dropdown-item pop-link p-2 pl-3">Profile</a>
                                <a href="" class="dropdown-item pop-link p-2 pl-3" role="button" @click="logout">Sign out</a>
                            </div>
                            <img :src="this.user.avatar" alt="" height="35" width="35" style="border-radius: 50%;margin-top: 2px" >
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        props: [
            'user',
            'isNewArticle'
        ],
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        mounted() {
        },
        methods: {
            logout(){
                axios.post('/logout',{
                    _token:this.csrf,
                }).then(()=>{
                    $(location).attr('href',this.$root.welcome);
                }).catch(()=>{
                    $(location).attr('href',this.$root.welcome);
                })
            }
        },
    }
</script>
