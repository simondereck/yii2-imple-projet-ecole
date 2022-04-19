<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 05/12/2019
 * Time: 14:50
 */
?>

<div>
    <div class="nav-bba">
        <span data-url="index.php?r=programe/commerce">
            国际贸易
        </span>
        <span data-url="index.php?r=programe/marketing">
            市场营销
        </span>
        <span data-url="index.php?r=programe/logistique">
            国际物流
        </span>
        <span data-url="index.php?r=programe/management">
            奢侈品管理
        </span>
        <span data-url="index.php?r=programe/tourisme">
            酒店与旅游管理
        </span>
        <span data-url="index.php?r=programe/art">
            文化管理
        </span>
        <span data-url="http://www.isiac.fr/">
            电影专业
        </span>
    </div>
</div>
<div class="logistique">
    <div class="top-bar-img">
        <img src="../../images/programe/header_page.jpg" />
        <div>国际物流</div>
    </div>
    <div class="logistique-description">
        <p>国际物流行业缺乏物流的管理型人才。物流的核心在于通过现代化的管理理念和手段，来降低物流成本，提高效率，
            进而在整个供应链条上实现物品、信息和资金的高效、快速流动，为企业创造新的价值。其本质就是管理，
            这种管理最终要通过具备现代物流理念和管理能力的高素质管理人才来实现，而当今世界物流业最紧缺的，就是这类人才。
        </p>
        <p>
            由于物流本身是一个服务性行业，现代物流业的竞争将由人来决定。目前行业高级管理人才的匮乏，严重制约了我国物流企业的发展。
            如何改变这一现状，通过科学的教学方法培养出优秀的管理型人才，成为横亘在整个物流行业面前的难题。
        </p>
    </div>
    <div class="logistique-item">
        <div class="logistique-item-info">
            <p>
                国际商贸采购与物流专业培训宗旨： 国际经济正在日益深刻地融入全球经济体系，这为物流企业带来了前所未有的机遇和挑战。
                企业对具有现代物流管理知识和能力的人才需求迅速增大。借鉴国外经验,开展物流专业知识培训,改变物流人才短缺现状,
                以满足企业需求,已成为当务之急。
            </p>
            <p>
                其宗旨在于培养/培训全体会员及社会各界对采购，运输，物流，生产与库存管理等有兴趣人士，分享最新的管理理论及实际商务经验。
            </p>
            <p>
                主要课程：商务英语，物流管理，国际供应链管理，仓储，计算机信息系统知识，财务管理等。
            </p>
        </div>
        <div class="logistique-item-img">
            <img src="../../images/programe/bda1.jpg" />
        </div>
    </div>
    <div class="logistique-item">
        <div class="logistique-item-img">
            <img src="../../images/programe/bda2.jpg" />
        </div>
        <div class="logistique-item-info">
            <h4>计算机应用工具专业课程</h4>

            <p>1.	网络营销学</p>
            <p>2.	国际互联网网址管理</p>
            <p>3.	计算机软件应用</p>
            <p>4.	计算机系统与多媒体应用</p>
            <p>5.	计算机应用软件</p>
            <h4>专业公共课程</h4>
            <p>1.	国际经济学</p>
            <p>2.	商务英语</p>
            <p>3.	商务法语</p>
            <p>4.	职业生涯规划</p>
        </div>
    </div>
    <div class="logistique-item">

        <div class="logistique-item-info">
            <h4>提示</h4>
            <ul>
                <li>对于所有BAC+4/BAC+5的学生，每个学年理论课结束后，必须要完成3至6个月的全职实习</li>
                <li>实习期一般在每年的5月至10月之间</li>
                <li>BAC+4的学生实习结束后要完成一份实习报告</li>
                <li>BAC+5的学生实习结束后要完成一篇论文，并且论文交付后，要完成答辩</li>
            </ul>
           <h4>
               学年/学期日程表
           </h4>
            <ul>
                <li>为了更好的满足各界学生的学习需求， 我院每年分春、秋两季入学。</li>
                <li>春季班：每年2月中旬</li>
                <li>秋季班：每年10月中旬</li>
            </ul>

            <h4>教学优势</h4>
            <ul>
                <li>小班授课，每班学生不超过20人</li>
                <li>教师均来自高商以及公立大学的名师，教学经验丰富，灵活，耐心，特别适合刚就读大学的外国学生，课件丰富</li>
                <li>上课时间灵活，每周2-3天的集中上课，适合打工或参加实习的学生</li>
                <li>学校提供实习合同，以便学生多参与社会实践</li>
                <li>针对外国学生的法语语言问题，学院特别为学生免费开设法语课程，学生可以在学习专业的同时，提高自已的法语水平</li>
            </ul>
        </div>
        <div class="logistique-item-img">
            <img src="../../images/programe/bda3.jpg" />
        </div>
    </div>

</div>
<script>
    $('.nav-bba').on('click','span',function () {
        let url = $(this).attr('data-url');
        window.location = url;
    });
</script>

<style>
    body{
        background-color: whitesmoke;
    }
    .nav-bba{
        background-color: #31567C;
        color: white;
        overflow: scroll;
        display: flex;
        -ms-overflow-style: none;

    }


    .nav-bba span {
        display: inline-block;
        padding: 1vw;
        font-size: 1.25vw;
        list-style: none;
        position: relative;
        text-align: center;
    }

    .nav-bba span:hover{
        background-color: rgba(0,0,0,0.3);
        cursor: pointer;
    }

    .logistique{
        background-color: white;
        width: 60vw;
        margin: 20px auto 20px;
        font-size: 1vw;
    }

    .logistique h4{
        font-size: 1.5vw;
        font-weight: bold;
    }

    .top-bar-img , .top-bar-img img{
        width: 100%;
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

    .logistique-description{
        padding: 2vw;
        background-color: #1b6d85;
        color: white;
    }

    .logistique img{
        object-fit: cover;
    }

    .logistique-item{
        display: flex;
    }

    .logistique-item-img ,
    .logistique-item-img img,
    .logistique-item-info{
        width: 30vw;
    }

    .logistique-item-info{
        padding: 2vw;
    }

    .logistique-item-img img{
        height: 100%;
    }

    ::-webkit-scrollbar {
        display: none;
    }


</style>
