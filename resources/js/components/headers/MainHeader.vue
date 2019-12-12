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
                             data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="
                             <div class='container pop-container border-dark hide'>
            <div class='row justify-content-center p-2  border-bottom'>
                <a href='' class='pop-link-main'>Name</a>
            </div>
            <div class='row justify-content-start p-2 pt-3'>
                <a href='' class='pop-link'>How to share?</a>
            </div>
            <div class='row justify-content-start p-2 pb-3 border-bottom'>
                <a href='' class='pop-link'>New idea</a>
            </div>
            <div class='row justify-content-start p-2 pt-3'>
                <a href='' class='pop-link'>Bookmarks</a>
            </div>
            <div class='row justify-content-start p-2 pb-3 border-bottom'>
                <a href='' class='pop-link'>Publications</a>
            </div>
            <div class='row justify-content-start p-2 pt-3 '>
                <a class='pop-link' role='button' @click='profile'>Profile</a>
            </div>
            <div class='row justify-content-start p-2'>
                <a href='' class='pop-link'>Sign out</a>
            </div>
        </div>">
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

                        <!--                            <form id="logout-form" action="" method="POST" style="display: none;">-->
                        <!--                                @csrf-->
                        <!--                            </form>-->
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
                name: 123
            }
        },
        mounted() {
        },
        methods: {
            profile() {
                console.log('red');
            }
        },
    }
</script>
