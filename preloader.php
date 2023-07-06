<style>
#preloader {
    background: #fff;
    height: 100%;
    width: 100%;
    position: relative;
    top: 0px;
    position: fixed;
    z-index: 100;
    display: flex;
    justify-content: center;
    align-items: center;
}

#preloader img {
    width: 100% !important;
}



@media screen and (max-width: 1000px) {
    .loading_logo {
        width: 1000px !important;

    }

    #preloader {
        background-Color: black !important
    }
}

</style>

<div class="text-center" id='preloader'>
    <img src="Assets/Loading.gif" class="loading_logo" alt="">


</div>
