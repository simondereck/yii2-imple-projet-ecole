<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 24/11/2019
 * Time: 12:59
 */

?>
<div class="cours">
    <div class="cours-en-top">
        <div class="cours-top-img">
            <img src="../../images/iplme/cours_en_ligne.jpg"/>
            <div>在线课程</div>
        </div>
        <div class="cours-description">
            <p>
                IPLME 线上课程提供一个或多个在线课程，每一个课程在系统学习完成并通过考试之后都会提供一份证明。
                您可以通过填写在线课程申请表报名参加在线课程培训，报名成功后我们会通过邮件形式给您发送对应的课件。
                一些在线课程在学习的同时也提供实习的机会并可以出具有效的实习证证明。对于想要实习的同学，
                请到《实习》页面申请实习。
            </p>
        </div>
    </div>


    <div class="cours-items">
        <?php
        if ($models&&count($models)>0){
            foreach ($models as $key=>$value){
                if ($key%3==0){
                    echo '<div class="cours-items-row">';
                }
                ?>
                <div class="cours-item" data-id="<?php echo $value->id;?>" >
                    <div class="cours-item-img"><img src="<?php echo $value->image;?>"/></div>
                    <div class="cours-item-starts"><?php echo ArrayDatas::getFaculty()[$value->faculty];?></div>
                    <div class="cours-item-name"><?php echo ArrayDatas::getCoursProgramYear()[$value->year];?></div>
                    <div class="cours-item-starts"><?php echo ArrayDatas::getSession()[$value->session];?></div>
                    <div class="cours-item-status"><?php echo $value->description;?></div>
                </div>
                <?php
                if ($key%3==2){
                    echo "</div>";
                }
            }
        }
        ?>

    </div>
</div>

<script>
    $(".cours-items").on('click','.cours-item',function () {
        let id = $(this).attr("data-id");
        window.location = "index.php?r=cours/detail&id="+id;
    });
</script>

<style>
    body{
        background-color: whitesmoke;
    }

    .cours{
        width: 60vw;
        margin: 20px auto 20px;
    }

    .cours-en-top{
        background-color: white;
    }

    .cours-top-img,.cours-top-img img{
        width: 100%;
        height: 20vw;
        position: relative;
    }

    .cours-top-img div{
        padding: 2vw;
        font-size: 2vw;
        color: white;
        position: absolute;
        top: 0;
        z-index: 200;
    }



    img{
        object-fit: cover;
    }


    .cours-description{
        padding: 2vw;
    }

    .cours-description section p{
        margin-bottom: 2vw;
    }

    .cours-items{
        margin-top: 10px;
        background-color: white;
    }

    .cours-items-row{
        display: flex;
        justify-content: flex-start;
    }

    .cours-item{
        display: inline-block;
        width: 18vw;
        justify-content: space-between;
        height: 23vw;
        background-color: white;
        margin-bottom: 1vw;
        margin-top: 1vw;
        font-size: 1vw;
        box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, .2);
        margin-left: 1.5vw;
    }

    .cours-item div{
        margin-bottom: 1vw;
    }

    .cours-item img{
        width: 18vw;
        height: 15vw ;
    }

    .cours-item-name,.cours-item-status,.cours-item-starts{
        padding-left: 5px;
        padding-right: 5px;
    }


    .cours-item:hover{
        box-shadow: 5px 5px 2px 1px rgba(0, 0, 0, .2);;
    }

    @media (max-width: 767px) {
        .cours-top-img,.cours-top-img img{
            height: 40vw;
        }

        .cours-description{
            padding: 4vw;
        }

        .cours-description section p{
            margin-bottom: 4vw;
        }

        .cours-items-row{
            display: block;
        }
        .cours-item{
            display: block;
            height: 60vw;
            width: 100%;
            background-color: white;
            margin:0;
            margin-bottom: 2vw;
        }

        .cours-item img{
            width: 100%;
            height: 40vw ;
        }

        .cours-item-name,.cours-item-status,.cours-item-starts{
            padding-left: 2vw;
            padding-right: 5vw;
        }

    }

</style>
