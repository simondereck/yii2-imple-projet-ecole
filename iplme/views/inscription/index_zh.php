<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 26/11/2019
 * Time: 14:57
 */

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="inscription">
    <h4>学生注册</h4>
    <div class="inscription-items">
        <div class="inscription-item">
            <div class="inscription-item-head">
                <div class="inscription-item-icon">
                    <img src="../../images/iplme/FLE_icon.png" />
                </div>
                <h5>FLE</h5>
            </div>
            <div class="inscription-item-content">
                <div class="inscription-item-text">
                    <a data-href="../../images/pdf/FLE.pdf">下载和填写表格。<img src="../../images/iplme/download.jpg" /> </a>
                    <p>
                        近期证件照两张，其中一张贴在申请表的正面。

                        身份证复印件，签证和居留卡。

                        最后一份出勤证明/成绩单/文凭或成绩证明的复印件。

                        简历和动机信。

                        学费。
                    </p>
                </div>
            </div>
        </div>
        <div class="inscription-item">
            <div class="inscription-item-head">
                <div class="inscription-item-icon">
                    <img src="../../images/iplme/DBA_icon.png" />
                </div>
                <h5>DBA</h5>
            </div>
            <div class="inscription-item-content">
                <div class="inscription-item-text">
                    <a data-href="../../images/pdf/DBA.pdf">下载和填写表格。<img src="../../images/iplme/download.jpg" /></a>
                    <p>
                        近期证件照两张，其中一张贴在申请表的正面。

                        身份证复印件，签证和居留卡。

                        最后一份出勤证明/成绩单/文凭或成绩证明的复印件。

                        简历和动机信。

                        学费。
                    </p>
                </div>
            </div>
        </div>
        <div class="inscription-item">
            <div class="inscription-item-head">
                <div class="inscription-item-icon">
                    <img src="../../images/iplme/BAC_icon.png" />
                </div>
                <h5>BAC 1 - 5</h5>
            </div>
            <div class="inscription-item-content">
                <div class="inscription-item-text">
                    <a data-href="../../images/pdf/BAC.pdf">下载和填写表格。<img src="../../images/iplme/download.jpg" /></a>
                    <p>
                        近期证件照两张，其中一张贴在申请表的正面。

                        身份证复印件，签证和居留卡。

                        最后一份出勤证明/成绩单/文凭或成绩证明的复印件。

                        简历和动机信。

                        学费。
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.inscription-item-content').on('click','a',function () {
       let val = $(this).attr('data-href');
       window.open(val);
    });
</script>

<style>


    body{
        background-color: whitesmoke;
    }

    .inscription{
        margin: 20px auto 20px;
        width: 70vw;
        padding: 2vw;
        font-size: 1vw;
    }



    .inscription h4{
        font-size: 1.5vw;
        font-weight: bold;
        text-align: center;
    }


    .inscription-items{
        display: flex;
        justify-content: space-around;
    }

    .inscription-item{
        width: 20vw;
        border-radius: 10px;
    }

    .inscription-item-head{
        width: 10vw;
        height: 10vw;
        border-radius: 10vw;
        background-color: white;
        margin: 0 auto 0;
        box-shadow: 0px 0px 4px 2px rgba(0,0,0,0.1);
        z-index: 200;
        position: relative;
        top: 5vw;
    }


    .inscription h5{
        font-size: 1vw;
        font-weight: bold;
        text-align: center;
    }

    .inscription-item-icon{
        text-align: center;
        height: 2vw;
        line-height: 8vw;
    }

    .inscription-item-head h5{
        line-height: 7vw;
    }

    .inscription-item-icon img{
        height: 2vw;
        object-fit: cover;
    }



    .inscription-item-content{
        background-color: white;
        border-radius: 5px;
        box-shadow: 0px 0px 4px 2px rgba(0,0,0,0.1);
        padding: 2vw;
    }

    .inscription-item-text{
        margin-top: 5vw;
    }

    .inscription-item a{
        display: block;
        margin-bottom: 2vw;
    }
    .inscription-item a:hover{
        cursor: pointer;
        text-decoration: none;
    }

    .inscription-item-text img{
        width: 2vw;
        height: 2vw;
        margin-left: 2vw;
    }
</style>
