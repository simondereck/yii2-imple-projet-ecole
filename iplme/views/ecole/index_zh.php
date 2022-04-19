<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 22/11/2019
 * Time: 19:54
 */
$this->title = 'IPLME';

?>


<div class="video">
    <iframe src="https://www.youtube.com/embed/70LuVRg-1Rk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<script>
    // document.onreadystatechange = function () {
    //     if (document.readyState === "complete") {
    //         setTimeout(function () {
    //             $('.top-bar-img').toggle("hidden");
    //         },3500);
    //     }
    // };
</script>

<style>
    body {
        background: whitesmoke;
    }


    .video{
        margin: 20px auto 20px;
        width: 60vw;
        height: 40vw;
        background-color: white;
        box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.3);
    }

    .video iframe{
        width: 100%;
        height: 100%;
    }

</style>
