<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 25/11/2019
 * Time: 15:25
 */

?>

<div class="association">
    <div class="top-bar-img">
        <img src="../../images/iplme/association.jpg" />
        <div>校友会</div>
    </div>
    <div class="association-items">
        <div class="association-item">
            <div class="association-item-description">
                <h4>校友网络</h4>
                <p>
                    该网络涵盖200多个社区成员，由来自IPLME不同项目的23,000名校友和4700名学生组成。
                </p>
                <p>
                    超过250名校友大使承诺支持校友网：
                </p>
                <ul>
                    <li>
                        每个项目的学生大使会负责联系学生和校友；
                    </li>
                    <li>
                        班级大使将确保他们的同学，学校和校友网之间的联系；
                    </li>
                    <li>
                        国际社区大使将组织与海外毕业生举行非正式会议，并欢迎学生进行国际实习或学术交流；
                    </li>
                    <li>
                        法国社区大使将与法国大城市之间的校友们保持联系；
                    </li>
                    <li>
                        俱乐部大使将会在巴黎就一些时事主题提供专题会议和会面；
                    </li>
                </ul>

            </div>
            <div class="association-item-img">
                <img src="../../images/iplme/association_1.jpg"/>
            </div>
        </div>
        <div class="association-item">
            <div class="association-item-img">
                <img src="../../images/iplme/association_2.jpg"/>
            </div>
            <div class="association-item-description">
                <h4>校友团队</h4>
                <p>
                    校友团队是校友、协会、企业、招聘人员和学校其他合伙人之间的纽带。
                </p>
                <p>
                    我们的角色：
                </p>
                <ul>
                    <li><h4>连接：</h4>
                        创建，加强和维持学生、校友和学校之间的联系，保证校友网内的团结。
                    </li>
                    <li><h4>增强：</h4>
                        使学生和校友通过证实自己的职业发展、学历以及学校来充分展现自己。
                    </li>
                    <li>
                        <h4>涵盖：</h4>
                        使学生和校友能够为其网络和学校的发展与扩展做出贡献。
                    </li>
                </ul>

                <p>
                    联系我们：
                </p>
                <p>
                    邮箱: info@iplme.org
                </p>
                <p>
                    电话: +33 (0)1 45 30 02 29
                </p>

            </div>
        </div>
    </div>
</div>

<style>
    body{
        background-color: whitesmoke;

    }

    .association{
        margin: 20px auto 20px;
        background-color: white;
        width: 60vw;
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

    img {
        object-fit: cover;
    }


    .association-item{
        display: flex;
    }

    .association-item-img,.association-item-img img,
    .association-item-description{
        width: 30vw;
    }


    .association-item-img img{
        height: 100%;
    }


    .association-item-description{
        font-size: 1vw;
        padding: 2vw;
    }

    h4{
        font-weight: bold;
        font-size: 1.5vw;
    }
</style>
