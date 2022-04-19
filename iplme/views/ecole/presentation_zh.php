<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 24/11/2019
 * Time: 15:17
 */
?>
<div class="presentation">
    <div class="top-bar-img">
        <img src="../../images/iplme/presentation.jpg" />
        <div>组织架构</div>
    </div>
    <div class="presentation-info">
        <div class="presentation-item">
            <div class="presentation-item-description">
                <div class="cell color-white" style="">
                    <h4 class="section-title text-">组织架构</h4>
                    <p>
                        IPLME 巴黎亿搏商学院(Institut Privé de Luxe et Management de l’Entreprise)成立于 2009 年,
                        是经法国教育部批准成立, 有正式的教育编号及社会保险号,具有独立办学资质的正规教育机构。
                    </p>
                </div>
            </div>
            <div class="presentation-item-img"><img src="../../images/iplme/present_1.jpg" /></div>
        </div>
        <div class="presentation-item">
            <div class="presentation-item-img"><img src="../../images/iplme/present_2.jpg" /></div>
            <div class="presentation-item-description">
                <div class="cell color-white" style="">
                    <h4 class="section-title text-">组织</h4>
                    <section>
                        <div class="padding-left-0 padding-top-0 cell" style="">
                            <p>
                                巴黎亿博商学院 IPLME 师资力量强大,与国内和法国多所著名高校都有合作,可颁发由中法共同认证的本科,硕士,博士文凭。
                                办学宗旨:学风严谨 打造全面型人才。IPLME 与法国高等资深院校建立加强深化合作;
                                同时 IPLME 与国内高校联合办学。通过国内外的合作,巴黎亿博商学院 IPLME 为学生营造了更好的学习平台。
                            </p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="presentation-item-end">
            <div class="cell" style="">
                <h4 class="section-title text-">IPLME</h4>
                <div class="tabs-content" data-tabs-content="">
                    <p>
                        巴黎亿博商学院优越的环境和地理位置可以让学生在学习的同时,体验见证真正的法国文化和法式生。IPLME 学院有两个校区,总校区和分校区都位于巴黎 15区,
                        临近繁华商业街 rue de convention。紧靠美丽的塞纳河左岸;这里是文人荟萃的巴黎中心,更是法国历史建筑与现代商业街区的交汇处。
                        学校周围坐落着著名的埃菲尔铁塔和法国荣军院等巴黎地标,周围有大大小小的巴黎城市公园,该街区亦有无数法式咖啡馆、餐厅、甜点店以及超市,
                        极大的方便了您的日常生活。在这里学习的同时,您也可以在端一杯意式浓缩咖啡,在和煦的阳光中慢慢品尝,漫步于绿树成荫的巴黎街道,体验见证真正
                        的法国文化和法式生活。
                    </p>
                    <p>
                        巴黎亿博商学院 IPLME 是一所国际院校,学校有来自法国,俄罗斯,中国,日本, 印度,韩国等各个国家的学生。
                    </p>
                    <p>
                        IPLME 有多样化的教学方案,即保证学生的法语水平随着课程进度的开展而提高,又为学生在商务领域打下坚实的理论基础;
                        学院经过几年的精心建设,为学生量身提供了一套完善的教学方案,并始终贯彻“理论与实践相结合” 的教学宗旨,摈弃“死读书”的观念。
                        IPLME 为学生提供相应的实践活动(参观,文化郊游,法式沙龙等),为学生创造丰富的专业实践机会,并帮学生实现更远大的商业梦想。
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    body{
        background-color: whitesmoke;
    }

    .presentation{
        margin: 20px auto 20px;
        width: 60vw;
        background-color: white;
        text-align: center;
        font-size: 1vw;
    }

    .top-bar-img,.top-bar-img img{
        width: 60vw;
        height: 20vw;
        background-color: deeppink;
        position: relative;
    }

    .top-bar-img div{
        position: absolute;
        z-index: 200;
        padding: 2vw;
        font-size: 2vw;
        top: 0;
        color: white;
    }

    img{
        object-fit: cover;
    }


    .presentation-item{
        display: flex;
    }

    .presentation-item-description,.presentation-item-img,.presentation-item-img img{
        width: 30vw;
        height: 20vw;
    }

    .presentation-item-description,.presentation-item-end{
        padding: 2vw;
    }

    .presentation-item-end{
        margin-top: 2vw;
        text-align: left;
    }
</style>
