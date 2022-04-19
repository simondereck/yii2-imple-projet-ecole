<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 25/11/2019
 * Time: 15:25
 */

?>

<div class="vie">
    <div class="top-bar-img">
        <img src="../../images/iplme/vie.jpg" />
        <div>Clubs étudiante</div>
    </div>
    <div class="vie-info">
        <h4>Bienvenue à l'IPLME</h4>
        <p>IPLME a son propre cercle social, avec environ 30 clubs d'étudiants,
            et organise souvent une variété d'événements sportifs et culturels.
            Voici quelques façons de vous aider à vous faire de nouveaux amis:
        </p>
    </div>
    <div class="vie-item">
        <div class="vie-item-img"><img src="../../images/iplme/vie_1.jpg" /></div>
        <div class="vie-item-detail">
<!--            <div class="vie-item-description">-->
<!--                <h4>IPLME</h4>-->
<!--                <p>L’IPLME a son propre cercle social, avec environ 30 clubs d'étudiants,-->
<!--                    et organise souvent une variété d'événements sportifs et culturels.-->
<!--                    Voici quelques façons de vous aider à vous faire de nouveaux amis:</p>-->
<!--            </div>-->
            <div class="vie-item-subview">
<!--                <ul class="vie-item-subview-title">-->
<!--                    <li class="active" data-val="0">Clubs d'étudiants</li>-->
<!--                    <li data-val="1">Campus</li>-->
<!--                    <li data-val="2">Service étudiante</li>-->
<!--                </ul>-->
                <div class="vie-item-subview-items">
                    <div class="vie-item-subview-item" data-val="0">
                        <p>Participez à votre activité préférée en rejoignant les
                            clubs qui vous intéressent pour trouver des amis partageant
                            les mêmes idées que vous!</p>
                        <div class="accordion-item">
                            <a class="accordion-title before-active">Forest Hill Aquaboulevard</a>
                            <div class="accordion-info hidden">
                                Ce club de finesse propose une variété de cours :
                                cours de danse, d’étirement et de natation, etc.
                            </div>
                        </div>
                        <div class="accordion-item">
                            <a class="accordion-title before-active">Atelier du Vin</a>
                            <div class="accordion-info hidden">
                                On propose les visites de vignobles, la dégustation de vins,
                                les cours de vinification , l’exploration de la cuisine régionale française.
                            </div>
                        </div>
                        <div class="accordion-item">
                            <a class="accordion-title before-active">Mode et Gastronomie</a>
                            <div class="accordion-info hidden">
                                On propose une série d’activités variées de l’industrie du
                                luxe et des pratiques d’entreprise.
                            </div>
                        </div>
                        <div class="accordion-item">
                            <a class="accordion-title before-active">Activité et Événements</a>
                            <div class="accordion-info hidden">
                                En participant aux soirées, les étudiants s'intéresseront plus aux disciplines culturelles
                                et artistiques, y compris la danse, la musique et les arts visuels.
                            </div>
                        </div>
                    </div>
                    <div class="vie-item-subview-item hidden" data-val="1">
                        <h4>美丽校园 & 方便设施</h4>
                        <p>
                            IPLME位于法国巴黎市市中心，学习环境优美。紧邻于塞纳河畔，是巴黎市最古老的区域之一，
                            周边众多繁类的历史建筑及其人文景观营造出了良好的学习氛围，同时在学校周边有诸多国家图书馆和历史博物馆，
                            学生在学习之余可以尽情的游览和感受厚重的法国历史和法国文化.
                        </p>
                        <h4>设施</h4>
                        <p>我们的设施既现代又舒适，为学生的学习及生活提供便利。</p>
                        <div class="accordion-item">
                            <a class="accordion-title before-active">图书馆</a>
                            <div class="accordion-info hidden">
                                这里有各类图书教材、有经验丰富的老师、有便捷的计算机网络、有温馨舒适的学习环境。
                            </div>
                        </div>
                        <div class="accordion-item">
                            <a class="accordion-title before-active">金融交易室</a>
                            <div class="accordion-info hidden">
                                最先进的金融交易室提供通常只为财务专业人士预留的一系列服务。
                            </div>
                        </div>
                        <div class="accordion-item">
                            <a class="accordion-title before-active">餐厅</a>
                            <div class="accordion-info hidden">
                                自助餐厅位于一楼，供应热饮，苏打水，羊角面包和其他小吃。
                                午餐时间，提供三明治和餐点，也可以从家里自带食物。
                                五分钟步行路程内，还有许多实惠且美味的选择。。
                            </div>
                        </div>
                        <div class="accordion-item">
                            <a class="accordion-title before-active">活动场所</a>
                            <div class="accordion-info hidden">
                                IPLME已与健身房 Forest Hill 和欧洲最大的水上乐园 Aquaboulevard 建立合作关系，
                                学生可以进行羽毛球、网球等团队运动，还有设备齐全的健身中心，进行舞蹈，瑜伽等活动。
                            </div>
                        </div>
                    </div>
                    <div class="vie-item-subview-item hidden" data-val="2">
                        <h4>国际关系办公室</h4>
                        <p>我们有一个专门的学生服务团队，为学生提供指导和建议：</p>
                        <ul>
                            <li>学生签证</li>
                            <li>住房合同</li>
                            <li>开立银行账户</li>
                            <li>课程信息和成绩单</li>
                            <li>法国社会保险</li>
                            <li>校园信息</li>
                            <li>CAF住房津贴</li>
                            <li>学生会</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.vie-item-subview-title').on('click','li',function () {
        $(this).parent('ul').children('li').each(function ($key,$item) {
            $($item).removeClass('active');
        });
        $(this).addClass('active');
        let val = $(this).attr('data-val');
        $(this).closest('.vie-item-subview').find('.vie-item-subview-item').each(function (key,item) {
            if ($(item).attr('data-val')===val){
                // $(item).show();
                $(item).removeClass('hidden');
            } else{
                $(item).addClass('hidden');
            }
        });
    });

    $('.accordion-item').on('click','a',function () {
        let select = $(this).parent().children('.accordion-info');
        if (select.hasClass('show')){
            select.removeClass('show');
            select.addClass('hidden');
            $(this).removeClass('after-active');
            $(this).addClass('before-active');
        } else{
            $(this).closest('.vie-item-subview-item').find('.show').each(function ($key,$item) {
                $($item).removeClass('show');
                $($item).addClass('hidden');
            });
            $(this).parent().children('.accordion-info').removeClass('hidden');
            $(this).parent().children('.accordion-info').addClass('show');
            $(this).closest('.vie-item-subview-item').find('a').each(function ($key,$item) {
                console.log($key,$item);
                if ($($item).hasClass('after-active')){
                    $($item).removeClass('after-active');
                    $($item).addClass('before-active');
                }
            });
            $(this).removeClass('before-active');
            $(this).addClass('after-active');
        }

    });

</script>

<style>
    body{
        background-color: whitesmoke;
    }

    .vie{
        width: 60vw;
        margin: 20px auto 20px;
        background-color: white;
        font-size: 1vw;
    }

    .top-bar-img,.top-bar-img img{
        width: 60vw;
        height: 20vw;
        position: relative;
    }

    .top-bar-img div{
        font-size: 2vw;
        color: white;
        padding: 2vw;
        position: absolute;
        top: 0;
        z-index: 200;
    }
    img{
        object-fit: cover;
    }

    h4{
        font-size: 1.5vw;
        font-weight: bold;
    }

    .vie-info{
        padding: 2vw;
        background-color: #1b6d85;
        color: white;
    }

    .vie-item{
        display: flex;
    }

    .vie-item-detail,.vie-item-img,.vie-item-img img{
        width: 30vw;
    }

    .vie-item-img img{
        height:100%;
    }

    .vie-item-description{
        padding: 2vw;
    }

    .vie-item-subview-title{
        padding: 6px;
        border-bottom: 1px grey solid;
    }
    .vie-item-subview-title li{
        display: inline;
        padding: 6px;
        font-size: 1vw;
        list-style: none;
    }

    .vie-item-subview-title li:hover{
        cursor: pointer;
    }
    .active{
        background-color: rgba(0,0,0,0.2);
        font-weight: bold;
    }

    .vie-item-subview-items{
        padding: 2vw;
    }

    .hidden{
        display: none;
    }

    .show{
        display: block;
    }
    .accordion-item{
        background-color: whitesmoke;
        margin-bottom: 5px;

    }
    .accordion-title{
        padding: 5px;
        background-color: #122b40;
        color: white;
        display: inline-block;
        width: 100%;
    }

    .accordion-title:hover{
        color: white;
        text-decoration: none;
        background-color: #1b6d85;
        cursor: pointer;
    }

    .before-active::after{
        content: "+";
        float: right;
    }
    .after-active::after{
        content: "-";
        float: right;
    }

    .accordion-info{
        padding: 10px;
    }

</style>
