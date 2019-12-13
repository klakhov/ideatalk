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
                    <li class="nav-item container">
                        <div class="row" data-html="true"
                             data-toggle="popover" data-placement="bottom" data-trigger="focus" :data-content="inner">
                            <a id="navbarDropdown" class="nav-link col" href="#" role="button"
                               v-text="this.user.name"></a>
                            <img :src="this.user.avatar" alt="" height="35" width="35" style="border-radius: 50%;margin-top: 2px" >
                        </div>
                        <!--                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">-->
                        <!--                            <a class="dropdown-item" href=""-->
                        <!--                               onclick="event.preventDefault();-->
                        <!--                                                     document.getElementById('logout-form').submit();">-->
                        <!--                                logout-->
                        <!--                            </a>-->

<!--                                                    <form id="logout-form" action="" method="POST" style="display: none;">-->
<!--                                                        @csrf-->
<!--                                                    </form>-->
                        <!--                        </div>-->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        props: [
            'user'
        ],
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                inner:"<div class='container pop-container border-dark hide'>" +
                    "            <div class='row justify-content-center p-2  border-bottom'>\n" +
                    "                <a href='' class='pop-link-main'>Name</a>\n" +
                    "            </div>" +
                    "            <div class='row justify-content-start p-2 pt-3'>\n" +
                    "                <a href='' class='pop-link'>How to share?</a>\n" +
                    "            </div>"+
                    "            <div class='row justify-content-start p-2 pb-2 border-bottom'>\n" +
                    "                <a href='' class='pop-link'>New idea</a>\n" +
                    "            </div>"+
                    "            <div class='row justify-content-start p-2  border-bottom'>\n" +
                    "                <a href='' class='pop-link'>New idea</a>\n" +
                    "            </div>\n" +
                    "            <div class='row justify-content-start p-2 pt-3'>\n" +
                    "                <a href='' class='pop-link'>Bookmarks</a>\n" +
                    "            </div>\n" +
                    "            <div class='row justify-content-start p-2 pb-3 border-bottom'>\n" +
                    "                <a href='' class='pop-link'>Publications</a>\n" +
                    "            </div>\n" +
                    "            <div class='row justify-content-start p-2 pt-3 '>\n" +
                    "                <a href='/profile/" + this.user.profile_token +"' class='pop-link'>Profile</a>"+
                    "            </div>\n" +
                    "            <div class='row justify-content-start p-2'>\n" +
                    "                <div class='pop-link'  id='logout' role='button' >Sign out</div>\n" +
                    "            </div>"+
                    "</div>"

            }
        },
        mounted() {
            $('#logout').click(function(event){
                console.log('red');
                event.preventDefault();
                this.logout();
            });
            console.log($('#logout'))
        },
        methods: {
            profile() {
                console.log('red');
            },
            logout(){
                console.log('red');

                axios.post({
                    _token:this.csrf,
                })
            }
        },
    }
</script>
